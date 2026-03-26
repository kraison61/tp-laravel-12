@extends('layouts.app')

@php
    // 1. เตรียมข้อมูลพื้นฐาน
    $currentUrl = url()->current();
    $pageTitle = 'บัญชีราคากลางและค่าแรงงานก่อสร้าง (ว 809)';
    $pageDescription = 'ระบบสืบค้นบัญชีค่าแรงงาน/ดำเนินการสำหรับถอดแบบคำนวณราคากลางงานก่อสร้าง อ้างอิงประกาศกรมบัญชีกลาง บริษัทธีรพงษ์เซอร์วิส จำกัด';

    // ---------------------------------------------------------
    // 2. เตรียมข้อมูล Schema.org (ปรับให้เป็น WebPage และ DataCatalog)
    // ---------------------------------------------------------
    $schemaData = [
        '@context' => 'https://schema.org',
        '@graph' => [
            // --- 2.1 องค์กร (LocalBusiness) ---
            [
                '@type' => 'LocalBusiness',
                '@id' => url('/') . '#organization',
                'name' => 'บริษัทธีรพงษ์เซอร์วิส จำกัด',
                'url' => url('/'),
                // ถ้ามี Logo บน S3 ค่อยใส่กลับมา หรือใช้ asset ปกติ
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/tp-logo.svg'), 
                ],
                'telephone' => '+66627188847',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => '14 ต.บางกร่าง อ.เมืองนนทบุรี',
                    'addressLocality' => 'นนทบุรี',
                    'postalCode' => '11000',
                    'addressCountry' => 'TH',
                ],
            ],

            // --- 2.2 หน้าเว็บนี้ (WebPage) ---
            [
                '@type' => 'WebPage',
                '@id' => $currentUrl . '#webpage',
                'url' => $currentUrl,
                'name' => $pageTitle,
                'description' => $pageDescription,
                'publisher' => ['@id' => url('/') . '#organization'],
            ],

            // --- 2.3 Breadcrumbs ---
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
                        'name' => 'บัญชีค่าแรงงาน',
                        'item' => $currentUrl
                    ]
                ]
            ]
        ]
    ];
@endphp

{{-- ส่งข้อมูลไปที่ Meta Tags ใน Layout --}}
@section('title', $pageTitle)
@section('description', $pageDescription)

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
                        <h1>{{ $pageTitle }}</h1>
                        <p>{{ $pageDescription }}</p>
                    </div>
                </div>
                <x-breadcrumb>
                    บัญชีค่าแรงงาน
                </x-breadcrumb>
            </div>
        </div>
    </div>

    <div class="section-empty section-item" style="padding-top: 40px; padding-bottom: 60px;">
        <div class="container">
            
            <div style="background-color: #f8f9fa; padding: 25px; border-radius: 8px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <form action="{{ route('public.labor_costs') }}" method="GET" class="row">
                    <div class="col-md-5" style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">ค้นหารายการ</label>
                        <input type="text" name="search" class="form-control" placeholder="เช่น ทาสี, ก่ออิฐ, แอร์..." value="{{ $search ?? '' }}">
                    </div>
                    
                    <div class="col-md-5" style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">หมวดหมู่งาน</label>
                        <select name="category_id" class="form-control">
                            <option value="">-- ดูทุกหมวดหมู่ --</option>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ ($categoryId ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-2" style="display: flex; align-items: flex-end; margin-bottom: 15px;">
                        <button type="submit" class="btn btn-primary btn-block" style="width: 100%; height: 40px;">
                            <i class="fa fa-search"></i> ค้นหา
                        </button>
                    </div>
                </form>
            </div>

            <div class="title-base text-left">
                <hr />
                <h2>รายการค่าแรงและค่าดำเนินการ</h2>
                <p>ข้อมูลอ้างอิงจากหนังสือ กค. 0433.2/ว809 (ปรับปรุงแก้ไขตามความเหมาะสมของบริษัท)</p>
            </div>

            <div style="overflow-x: auto; background: #fff; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <table class="table table-striped table-hover" style="margin-bottom: 0;">
                    <thead style="background-color: #333; color: #fff;">
                        <tr>
                            <th style="padding: 15px 10px; width: 5%;">ลำดับ</th>
                            <th style="padding: 15px 10px; width: 45%;">รายการงานก่อสร้าง</th>
                            <th style="padding: 15px 10px; width: 20%;">หมวดหมู่</th>
                            <th style="padding: 15px 10px; text-align: center; width: 15%;">หน่วย</th>
                            <th style="padding: 15px 10px; text-align: right; width: 15%;">ค่าแรง/หน่วย (บาท)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($laborCosts) && $laborCosts->count() > 0)
                            @foreach($laborCosts as $index => $cost)
                            <tr>
                                <td style="padding: 12px 10px; vertical-align: middle;">{{ $laborCosts->firstItem() + $index }}</td>
                                <td style="padding: 12px 10px; vertical-align: middle; font-weight: 500;">
                                    {{ $cost->item_name }}
                                    @if($cost->remark)
                                        <div style="font-size: 0.85em; color: #666; margin-top: 4px;"><i class="fa fa-info-circle"></i> {{ $cost->remark }}</div>
                                    @endif
                                </td>
                                <td style="padding: 12px 10px; vertical-align: middle;">
                                    <span style="background-color: #eee; padding: 3px 8px; border-radius: 4px; font-size: 0.85em; color: #555;">
                                        {{ $cost->category->name ?? '-' }}
                                    </span>
                                </td>
                                <td style="padding: 12px 10px; vertical-align: middle; text-align: center;">{{ $cost->unit }}</td>
                                <td style="padding: 12px 10px; vertical-align: middle; text-align: right; font-weight: bold; color: #d32f2f;">
                                    {{ number_format($cost->cost_per_unit, 2) }}
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" style="padding: 40px; text-align: center; color: #888;">
                                    <i class="fa fa-folder-open fa-3x" style="margin-bottom: 15px; color: #ddd;"></i><br>
                                    ไม่พบรายการค่าแรงที่คุณค้นหา
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            @if(isset($laborCosts) && $laborCosts->hasPages())
            <div style="margin-top: 30px; display: flex; justify-content: center;">
                {{ $laborCosts->appends(request()->query())->links() }}
            </div>
            @endif

        </div>
    </div>

    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection