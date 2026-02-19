@extends('layouts.app')

@php
    // 1. ดึงข้อมูลตัวแรกมาเก็บไว้ก่อน เพื่อป้องกัน Error และลดการเขียนซ้ำ
    $item = $service->services->first();
    
    // 2. เตรียมข้อมูลสำหรับ JSON-LD ในรูปแบบ Array (แก้ปัญหา Syntax Error จากเครื่องหมาย @)
    $schemaData = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "ConstructionBusiness",
                "@id" => url('/') . "#organization",
                "name" => "บริษัทธีรพงษ์เซอร์วิส จำกัด",
                "url" => url('/'),
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => asset('storage/images/logo.png')
                ],
                "image" => asset('storage/images/img_landing_1.png'),
                "telephone" => "+66627188847",
                "priceRange" => "$$",
                "address" => [
                    "@type" => "PostalAddress",
                    "streetAddress" => "14 ต.บางกร่าง อ.บางกรวย",
                    "addressLocality" => "Nonthaburi",
                    "postalCode" => "11000",
                    "addressCountry" => "TH"
                ]
            ],
            [
                "@type" => "WebPage",
                "@id" => url()->current() . "#webpage",
                "url" => url()->current(),
                "name" => $item->title ?? 'Service',
                "inLanguage" => "th"
            ],
            [
                "@type" => "Article",
                "headline" => $item->h1 ?? ($item->title ?? ''),
                "description" => trim($item->description ?? ''),
                "image" => asset('storage/' . ($item->img_1 ?? '')),
                "author" => [
                    "@type" => "Person",
                    "name" => "ช่างรัก (Mr.Theeraphong Sarsuk)"
                ]
            ]
        ]
    ];
@endphp

{{-- ส่งข้อมูลไปที่ Meta Tags ใน Layout --}}
@section('title', $item->title ?? 'Service')
@section('description', trim($item->description ?? ''))
@section('image', asset('storage/' . ($item->img_1 ?? '')))

@push('seo-schema')
    {{-- พิมพ์ JSON ออกมาโดยใช้ PHP เพื่อเลี่ยงปัญหา Blade Syntax --}}
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
                <img src="{{ asset('storage/'.$item->img_2) }}" alt="{{ $item->bottom_alt ?? '' }}" />
            </div>
        </div>
        {{-- ลบ </div> ที่เกินออกให้แล้วครับ --}}
    </div>
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection