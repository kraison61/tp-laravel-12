@extends('layouts.app')

@php
    // 1. ดึงข้อมูลตัวแรกมาเก็บไว้ก่อน เพื่อป้องกัน Error และลดการเขียนซ้ำ
    $item = $service->services->first();
    $currentUrl = url()->current();
    $locale = app()->getLocale();

    // 2. เตรียมข้อมูลสำหรับ JSON-LD ในรูปแบบ Array (แก้ปัญหา Syntax Error จากเครื่องหมาย @)
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
                    // 'url' => asset('storage/images/tp-logo.svg'),
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
            // ข้อมูลผู้เชี่ยวชาญ
            [
                '@type' => 'Person',
                '@id' => $currentUrl . '#person',
                'name' => 'ช่างรัก (Mr.Theeraphong Sarsuk)',
                'jobTitle' => 'ผู้เชี่ยวชาญด้านงานก่อสร้าง',
            ],
            // โครงสร้างหน้าเว็บ
            [
                '@type' => 'WebPage',
                '@id' => $currentUrl . '#webpage',
                'url' => $currentUrl,
                'name' => $item->title ?? 'Service',
                'inLanguage' => 'th',
            ],
            // ข้อมูลบริการ (ปรับจาก Article เป็น Service)
            [
                '@type' => 'Service',
                '@id' => $currentUrl . '#service',
                'name' => $item->h1 ?? ($item->title ?? ''),
                'description' => trim(strip_tags($item->description ?? '')),
                'image' => asset('storage/' . ($item->img_1 ?? '')),
                'provider' => ['@id' => url('/') . '#organization'],
                'areaServed' => [
                    '@type' => 'Country',
                    'name' => 'Thailand',
                ],
                'mainEntityOfPage' => ['@id' => $currentUrl . '#webpage'],
            ],
            // เพิ่ม Breadcrumb List Schema
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
                        'name' => __('Services'),
                        'item' => url('/services'), // อย่าลืมเปลี่ยนให้ตรงกับ Route รวมบริการของคุณ
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => $service->name,
                    ],
                ],
            ],
        ],
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
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
