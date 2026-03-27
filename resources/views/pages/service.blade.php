@extends('layouts.app')

@php
    // 1. เตรียมข้อมูลพื้นฐาน
    $item = $service->services->first(); // เช็กให้ดีว่าตัวนี้มีการใช้งานต่อหรือไม่
    $currentUrl = url()->current();
    $locale = app()->getLocale();
    $pageTitle = $service->title ?? 'บริการของเรา';
    $pageDescription = strip_tags($service->description ?? '');

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
        // Fallback: หากยังไม่มีข้อมูลราคา ให้ส่งโครงสร้างกลับไปเป็น Array เหมือนเดิม
        $schemaOffers[] = [
            '@type' => 'Offer',
            'price' => '0.00',
            'priceCurrency' => 'THB',
            'url' => $currentUrl,
            'availability' => 'https://schema.org/InStock'
        ];
    }

    $schemaFaqs = [];
    foreach ($faqs as $faq) {
        $schemaFaqs[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a']
            ]
        ];
    }

    // 3. เพิ่มเข้าไปใน $schemaData (ที่อยู่ในไฟล์ service.blade.php ของคุณ)
    $schemaData['@graph'][] = [
        '@type' => 'FAQPage',
        'mainEntity' => $schemaFaqs
    ];

    // ---------------------------------------------------------
    // 3. ประกอบร่าง JSON-LD Graph
    // ---------------------------------------------------------
    $schemaData = [
        '@context' => 'https://schema.org',
        '@graph' => [

            // --- 3.1 องค์กร (LocalBusiness) ---
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
            ],

            // --- 3.2 ข้อมูลบริการหลัก (Service) ---
            [
                '@type' => 'Service',
                '@id' => $currentUrl . '#service',
                'name' => $pageTitle,
                'provider' => [
                    '@id' => url('/') . '#organization',
                ],
                'description' => $pageDescription,
                'areaServed' => [
                    ['@type' => 'City', 'name' => 'Bangkok'],
                    ['@type' => 'City', 'name' => 'Nonthaburi'],
                    ['@type' => 'City', 'name' => 'Pathum Thani']
                ],
                'offers' => $schemaOffers, // ยัด Array ของราคาลงไป
            ],

            // --- 3.3 แผนสำรอง: แปลงร่างเป็น Product เพื่อชิงพื้นที่ Google Merchant (สู้คู่แข่ง) ---
            [
                '@type' => 'Product',
                '@id' => $currentUrl . '#product',
                'name' => $service->title,
                'description' => $service->description,
                'image' => Storage::disk('s3')->url('images/about/194911_0.jpg'), // ควรเปลี่ยนเป็นรูปหน้างานเฉพาะบริการนี้ถ้ามี
                'brand' => [
                    '@id' => url('/') . '#organization'
                ],
                'sku' => $service->sku ?? 'TP-SRV-' . ($service->id ?? rand(100, 999)),
                'offers' => $schemaOffers, // ดึงราคาชุดเดียวกันมาใช้
            ],

            // --- 3.4 Breadcrumbs (เพื่อให้ URL บน Google สวยงาม) ---
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
                        'name' => $pageTitle
                    ]
                ]
            ]

        ]
    ];
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