@extends('layouts.app')

@php
    // 1. ดึงข้อมูล URL และภาษาปัจจุบัน (สมมติว่า Controller ส่งตัวแปร $blog มาให้)
    $currentUrl = url()->current();
    $locale = app()->getLocale();

    // 2. เตรียมข้อมูลสำหรับ JSON-LD ในรูปแบบ Array ด้วยโครงสร้าง @graph
    $schemaData = [
        '@context' => 'https://schema.org',
        '@graph' => [
            // [1] ข้อมูลองค์กร
            [
                '@type' => 'LocalBusiness',
                '@id' => url('/') . '#organization',
                'name' => 'บริษัทธีรพงษ์เซอร์วิส จำกัด',
                'url' => url('/'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => Storage::disk('s3')->url('images/tp-logo.svg'),
                ],
                'telephone' => '+66627188847',
                'priceRange' => isset($minPrice) ? '฿' . number_format($minPrice) . ' - ฿' . number_format($maxPrice) : 'ติดต่อสอบถามราคา',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => '14 ต.บางกร่าง อ.เมืองนนทบุรี',
                    'addressLocality' => 'นนทบุรี',
                    'postalCode' => '11000',
                    'addressCountry' => 'TH',
                ],
                'image' => Storage::disk('s3')->url($blog->image),
            ],

            // [2] ข้อมูลบริการ (แยกก้อนออกมาให้ Google เห็นราคาชัดเจน)
            [
                '@type' => 'Service',
                '@id' => $currentUrl . '#service',
                'name' => 'บริการ' . $blog->title,
                'provider' => ['@id' => url('/') . '#organization'],
                'offers' => [
                    '@type' => 'AggregateOffer',
                    'priceCurrency' => 'THB',
                    'lowPrice' => $minPrice ?? 0,
                    'highPrice' => $maxPrice ?? 0,
                ]
            ],

            // [3] ข้อมูลผู้เขียนบทความ (Author)
            [
                '@type' => 'Person',
                '@id' => $currentUrl . '#author',
                'name' => 'ช่างรัก (Mr.Theeraphong Sarsuk)',
                'jobTitle' => 'ผู้เชี่ยวชาญด้านงานก่อสร้าง',
                'url' => url('/about-us'),
            ],

            // [4] โครงสร้างหน้าเว็บ
            [
                '@type' => 'WebPage',
                '@id' => $currentUrl . '#webpage',
                'url' => $currentUrl,
                'name' => $blog->title,
                'inLanguage' => 'th',
            ],

            // [5] ข้อมูลบทความ
            [
                '@type' => 'BlogPosting',
                '@id' => $currentUrl . '#article',
                'mainEntityOfPage' => ['@id' => $currentUrl . '#webpage'],
                'headline' => $blog->title,
                'description' => $blog->description,
                'image' => asset('storage/' . $blog->image),
                'author' => ['@id' => $currentUrl . '#author'],
                'publisher' => ['@id' => url('/') . '#organization'],
                'datePublished' => $blog->created_at->toIso8601String(),
                'dateModified' => $blog->updated_at->toIso8601String(),
            ],

            // [6] Breadcrumb List
            [
                '@type' => 'BreadcrumbList',
                '@id' => $currentUrl . '#breadcrumb',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => __('Home'),
                        'item' => url('/'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => __('Blogs'),
                        'item' => url('/blogs'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => $blog->title,
                    ],
                ],
            ],
        ],
    ];
@endphp

{{-- ส่งข้อมูลไปที่ Meta Tags ใน Layout --}}
@section('title', $blog->title)
@section('description', $blog->description)
@section('image', Storage::disk('s3')->url($blog->image))

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
                        <h1>{{ $blog->title }}</h1>
                        <p><i class="fa fa-calendar"></i> อัปเดตล่าสุด: {{ $blog->updated_at->format('d M Y') }}</p>
                    </div>
                </div>
                <x-breadcrumb>
                    {{ $blog->title }}
                </x-breadcrumb>
            </div>
        </div>
    </div>

    <div class="section-empty section-item">
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ Storage::disk('s3')->url($blog->image) }}?width=800&format=webp"
                        style="width: 50%; height: auto; display: block; margin: 0 auto; border-radius: 8px;"
                        alt="{{ $blog->title }}">

                    <div class="blog-content">
                        <style>
                            .blog-content img {
                                width: 50% !important;
                                height: auto !important;
                                margin-bottom: 15px;

                                display: block !important;
                                margin-left: auto !important;
                                margin-right: auto !important;
                                border-radius: 8px;
                            }
                        </style>
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection