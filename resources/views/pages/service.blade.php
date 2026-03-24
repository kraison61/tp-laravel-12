@extends('layouts.app')

@php
    // 1. ดึงข้อมูลตัวแรกมาเก็บไว้ก่อน เพื่อป้องกัน Error และลดการเขียนซ้ำ
    $item = $service->services->first();
    $currentUrl = url()->current();
    $locale = app()->getLocale();

    // ---------------------------------------------------------
    // 🌟 ใหม่: นำข้อมูลราคาจากตาราง prices มาสร้างเป็น Schema Offers
    // ---------------------------------------------------------
    $schemaOffers = [];
    
    if (isset($prices) && $prices->isNotEmpty()) {
        foreach ($prices as $p) {
            $offer = [
                '@type' => 'Offer',
                'name' => $p->name, // ชื่อแพ็กเกจราคา
                // ถ้ามีราคาโปรโมชั่น (sale_price) ให้ใช้ราคานั้น ถ้าไม่มีให้ใช้ราคาปกติ (price)
                'price' => $p->sale_price ?? $p->price, 
                'priceCurrency' => $p->currency ?? 'THB',
                'url' => $p->url ? $p->url : $currentUrl,
                'availability' => $p->availability ?? 'https://schema.org/InStock'
            ];

            // ถ้ามีวันหมดอายุโปรโมชั่น ให้ใส่เข้าไปด้วย
            if (!empty($p->price_valid_until)) {
                $offer['priceValidUntil'] = date('Y-m-d', strtotime($p->price_valid_until));
            }

            $schemaOffers[] = $offer; // เก็บลงกล่อง array
        }
    } else {
        // Fallback: กรณีที่บริการนี้ยังไม่ได้เพิ่มราคาลงในระบบ
        $schemaOffers = [
            '@type' => 'Offer',
            'price' => '0.00', // ปรับเป็น 0 หรือราคาเริ่มต้นมาตรฐาน
            'priceCurrency' => 'THB',
            'url' => $currentUrl,
        ];
    }

    // 2. เตรียมข้อมูลสำหรับ JSON-LD ในรูปแบบ Array 
    $schemaData = [
        '@context' => 'https://schema.org',
        '@graph' => [
            // ข้อมูลองค์กร (รับเหมาก่อสร้าง)
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
                'priceRange' => "$$",
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => '14 ต.บางกร่าง อ.เมืองนนทบุรี',
                    'addressLocality' => 'นนทบุรี',
                    'postalCode' => '11000',
                    'addressCountry' => 'TH',
                ],
            ],
            // ข้อมูลบริการ (Service)
            [
                '@type' => 'Service',
                'name' => $service->title,
                'provider' => [
                    '@id' => url('/') . '#organization',
                ],
                'description' => strip_tags($service->description),
                'areaServed' => [
                    '@type' => 'Country',
                    'name' => 'Thailand',
                ],
                
                // 🌟 ใหม่: นำตัวแปร $schemaOffers มาใส่ตรงนี้แทนค่าคงที่
                'offers' => $schemaOffers, 
            ]
        ]
    ];
@endphp

{{-- ส่งข้อมูลไปที่ Meta Tags ใน Layout --}}
@section('title', $item->title ?? 'Service')
@section('description', trim($item->description ?? ''))
@section('image', asset('storage/' . ($item->img_1 ?? '')))

@push('seo-schema')

    <script type="application/ld+json">
        {!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

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

    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
