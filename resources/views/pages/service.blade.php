@extends('layouts.app')

@section('title',$service->services->first()->title)
@section('description',trim($service->services->first()->description))
@section('image',$service->services->first()->img_1)

@push('seo-schema')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [{
                "@type": "ConstructionBusiness",
                "@id": "{{ url('/') }}#organization",
                "name": "บริษัทธีรพงษ์เซอร์วิส จำกัด",
                "url": "{{ url('/') }}",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('storage/images/logo.png') }}"
                },
                "image": "{{ asset('storage/images/img_landing_1.png') }}",
                "telephone": "+66627188847",
                "priceRange": "$$",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "14 ต.บางกร่าง อ.บางกรวย",
                    "addressLocality": "Nonthaburi",
                    "postalCode": "11000",
                    "addressCountry": "TH"
                }
            },
            {
                "@type": "WebSite",
                "@id": "{{ url('/') }}#website",
                "url": "{{ url('/') }}",
                "name": "Theeraphong Construction",
                "publisher": {
                    "@id": "{{ url('/') }}#organization"
                },
                "inLanguage": "th"
            },
            {
                "@type": "WebPage",
                "@id": "{{ url()->current() }}#webpage",
                "url": "{{ url()->current() }}",
                "name": "{{ $item->title }}",
                "isPartOf": {
                    "@id": "{{ url('/') }}#website"
                },
                "inLanguage": "th"
            },
            {
                "@type": "Person",
                "@id": "{{ url('/') }}#person",
                "name": "ช่างรัก (Mr.Theeraphong Sarsuk)",
                "url": "{{ url('/') }}",
                "jobTitle": "ผู้เชี่ยวชาญด้านงานก่อสร้าง",
                "worksFor": {
                    "@id": "{{ url('/') }}#organization"
                }
            },
            {
                "@type": "Article",
                "@id": "{{ url()->current() }}#article",
                "headline": "{{ $item->h1 }}",
                "description": "{{ trim($item->description) }}",
                "image": "{{ asset('storage/' . $item->img_1) }}",
                "author": {
                    "@id": "{{ url('/') }}#person"
                },
                "publisher": {
                    "@id": "{{ url('/') }}#organization"
                },
                "isPartOf": {
                    "@id": "{{ url()->current() }}#webpage"
                },
                "mainEntityOfPage": {
                    "@id": "{{ url()->current() }}#webpage"
                },
                "inLanguage": "th"
            }
        ]
    }
</script>
@endpush

@section('content')
<div class="header-base">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="title-base text-left">
                    <h1>{{ $service->services->first()->title }}</h1>
                    <p>{{ $service->services->first()->description }}</p>
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
                <!-- <img src="../images/mk-8.png" alt="" /> -->
                {{-- <img class="rounded" src="{{ asset('storage/'.$service->services->first()->img_1) }}" alt="" /> --}}
                <img class="rounded" src="{{ Storage::url($service->services->first()->img_1) }}" alt="" />
            </div>
            <div class="col-md-7">
                <div class="title-base text-left">
                    <hr />
                    <h2>{{ $service->services->first()->top_1 }}</h2>
                    <p>Super solutions</p>
                </div>

                {!! $service->services->first()->content_1 !!}

                <hr class="space s" />

            </div>
        </div>
        <hr class="space" />
        <div class="row vertical-row" data-anima="fade-bottom">
            <div class="col-md-7">
                <div class="title-base text-left">
                    <hr />
                    <h2>{{ $service->services->first()->top_2 }}</h2>
                    <p>Cheap prices</p>
                </div>

                {!! $service->services->first()->content_2 !!}

                <hr class="space s" />
            </div>
            <div class="col-md-5 text-right">
                <!-- <img src="../images/mk-9.png" alt="" /> -->
                <img src="{{ asset('storage/'.$service->services->first()->img_2) }}" alt="" />
            </div>
        </div>
    </div>
    <hr class="space" />
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection