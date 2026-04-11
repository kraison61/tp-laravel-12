@extends('layouts.app')

@php
    // 1. เตรียมข้อมูลพื้นฐาน
    $item = $service->services->first(); 
    $currentUrl = url()->current();
    $locale = app()->getLocale();
    
    $pageTitle = $item?->title ?? $service->name ?? 'บริการของเรา'; 
    
    // จัดการ Description และใส่ Fallback ป้องกันค่าว่าง
    $pageDescription = strip_tags($item?->description ?? '');
    if (empty(trim($pageDescription))) {
        $pageDescription = 'บริการรับเหมาก่อสร้าง มาตรฐานวิศวกรรม ควบคุมงานโดยทีมช่างผู้ชำนาญการจาก ธีรพงษ์เซอร์วิส';
    }

    // ---------------------------------------------------------
    // 2. เตรียมข้อมูล Offers (ดึงจากตาราง Prices)
    // ---------------------------------------------------------
    $schemaOffers = [];

    if (isset($prices) && $prices->isNotEmpty()) {
        foreach ($prices as $p) {
            $offer = [
                '@type' => 'Offer',
                'name' => $p->name ?? $pageTitle,
                'price' => $p->sale_price ?? $p->price ?? '0.00',
                'priceCurrency' => $p->currency ?? 'THB',
                'url' => $p->url ? $p->url : $currentUrl,
                'availability' => $p->availability == 'out_of_stock' ? 'https://schema.org/OutOfStock' : 'https://schema.org/InStock',
                'itemCondition' => 'https://schema.org/NewCondition'
            ];

            if (!empty($p->price_valid_until)) {
                $offer['priceValidUntil'] = date('Y-m-d', strtotime($p->price_valid_until));
            }

            $schemaOffers[] = $offer;
        }
    } else {
        $schemaOffers[] = [
            '@type' => 'Offer',
            'price' => '0.00',
            'priceCurrency' => 'THB',
            'url' => $currentUrl,
            'availability' => 'https://schema.org/InStock'
        ];
    }

    // ---------------------------------------------------------
    // 3. เตรียมข้อมูล FAQs
    // ---------------------------------------------------------
    $schemaFaqs = [];
    if (isset($faqs) && $faqs->isNotEmpty()) {
        foreach ($faqs as $faq) {
            $schemaFaqs[] = [
                '@type' => 'Question',
                'name' => $faq->question, 
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => strip_tags($faq->answer) 
                ]
            ];
        }
    }

    // ---------------------------------------------------------
    // 4. ประกอบร่าง JSON-LD Graph 
    // ---------------------------------------------------------
    $schemaData = [
        '@context' => 'https://schema.org',
        '@graph' => [

            // --- 4.1 องค์กร (LocalBusiness) ---
            [
                '@type' => 'LocalBusiness',
                '@id' => url('/') . '#organization',
                'name' => 'บริษัทธีรพงษ์เซอร์วิส จำกัด',
                'url' => url('/'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => Storage::disk('s3')->url('images/tp-logo.svg'),
                ],
                'image' => Storage::disk('s3')->url('images/about/194911_0.jpg'),
                'telephone' => '+66627188847',
                'priceRange' => '$$',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => '14 ต.บางกร่าง อ.เมืองนนทบุรี',
                    'addressLocality' => 'นนทบุรี',
                    'postalCode' => '11000',
                    'addressCountry' => 'TH',
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => '13.836991091487384', 
                    'longitude' => '100.44377996643809'
                ],
                'openingHoursSpecification' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                    'opens' => '08:00',
                    'closes' => '19:00'
                ]
            ],

            // --- 4.2 ข้อมูลบริการหลัก (Service & Product รวมกัน) ---
            [
                '@type' => ['Service', 'Product'],
                '@id' => $currentUrl . '#service',
                'name' => $pageTitle,
                'provider' => [
                    '@id' => url('/') . '#organization',
                ],
                'brand' => [
                    '@type' => 'Brand',
                    'name' => 'ธีรพงษ์เซอร์วิส'
                ],
                'sku' => $service->sku ?? 'TP-SRV-' . ($service->id ?? rand(100, 999)),
                'image' => Storage::disk('s3')->url($item?->img_1 ?? 'images/about/194911_0.jpg'),
                'description' => $pageDescription,
                'areaServed' => [
                    ['@type' => 'Country', 'name' => 'Thailand'],
                    ['@type' => 'City', 'name' => 'Bangkok'],
                    ['@type' => 'City', 'name' => 'Nonthaburi'],
                    ['@type' => 'City', 'name' => 'Pathum Thani'],
                    ['@type' => 'City', 'name' => 'Samut Prakan'],
                    ['@type' => 'City', 'name' => 'Samut Sakhon']
                ],
                'offers' => $schemaOffers,
                // 🌟 เพิ่มดาวโชว์บน Google กลับเข้ามา 
                'aggregateRating' => [
                    '@type' => 'AggregateRating',
                    'ratingValue' => $service->services->first()->rating_value,
                    'reviewCount' => $service->services->first()->review_count
                ]
            ],

            // ⚠️ (ส่วน 4.3 แผนสำรอง ถูกลบทิ้งไปแล้วเพราะรวมอยู่ใน 4.2 ด้านบนครบแล้ว)

            // --- 4.4 Breadcrumbs ---
            [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'หน้าแรก',
                        'item' => url('/')
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'บริการของเรา',
                        'item' => url('/services')
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => $pageTitle,
                        'item' => $currentUrl 
                    ]
                ]
            ]
        ]
    ];

    // --- 4.5 เช็คและใส่ FAQ ลงไปใน Graph ถ้ามีข้อมูล ---
    if (!empty($schemaFaqs)) {
        $schemaData['@graph'][] = [
            '@type' => 'FAQPage',
            'mainEntity' => $schemaFaqs
        ];
    }
@endphp

<script type="application/ld+json">
    {!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

{{-- ส่งข้อมูลไปที่ Meta Tags ใน Layout --}}
@section('title', $item->title ?? 'Service')
@section('description', trim($item->description ?? ''))
@section('image', asset('storage/' . ($item->img_1 ?? '')))



@section('content')
    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>{{ $item->title }}</h1>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
                <x-breadcrumb>
                    {{ $service->name }}
                </x-breadcrumb>
            </div>
        </div>
    </div>

    <div class="section-empty section-item">
        <div class="container content">
            <div class="row vertical-row">
                <div class="col-md-5">
                    <img class="rounded" src="{{ Storage::url($item->img_1) }}" alt="{{ $item->top_alt ?? '' }}" />
                </div>
                <div class="col-md-7">
                    <div class="title-base text-left">
                        <hr />
                        <h2>{{ $item->top_1 }}</h2>
                        <p>Super solutions</p>
                    </div>
                    {!! $item->content_1 !!}
                    <hr class="space s" />
                </div>
            </div>

            <hr class="space" />

            <div class="row vertical-row" data-anima="fade-bottom">
                <div class="col-md-7">
                    <div class="title-base text-left">
                        <hr />
                        <h2>{{ $item->top_2 }}</h2>
                        <p>Cheap prices</p>
                    </div>
                    {!! $item->content_2 !!}
                    <hr class="space s" />
                </div>
                <div class="col-md-5 text-right">
                    <img src="{{ Storage::disk('s3')->url($item->img_2) }}" alt="{{ $item->bottom_alt ?? '' }}" />
                </div>
            </div>
        </div>
    </div>
    @if($prices->count() > 0)
        <div class="section-empty section-item">
            <div class="container">
                <div class="title-base text-left">
                    <hr />
                    <h2>ราคาประมาณการสินค้าและบริการ</h2>
                    <p>ราคาอาจมีการเปลี่ยนแปลงขึ้นอยู่กับขนาดและวัสดุ</p>
                </div>
                <x-pricing-table :prices="$prices" />
            </div>
        </div>
    @endif
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection