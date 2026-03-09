@extends('layouts.app')

@section('title', 'งานรับเหมาก่อสร้างที่ บ.ธีรพงษ์เซอร์วิส จำกัด ให้บริการ')

@section('content')
    {{-- Header Section --}}
    <div class="header-title ken-burn-center white" data-parallax="scroll" data-position="top" data-natural-height="650"
        data-natural-width="1920" data-image-src="{{ Storage::disk('s3')->url('images/bg-5.jpg') }}?width=1920&format=webp">
        <div class="container">
            <div class="title-base"> {{-- จัดหัวข้อให้อยู่ตรงกลาง --}}
                <hr class="anima" />
                <h1>เลือกบริการที่ตอบโจทย์คุณ</h1>
                <p>ยินดีต้อนรับสู่บริการงานวิศวกรรมฐานรากและรั้วรอบขอบชิด เราคือผู้เชี่ยวชาญด้านการจัดการพื้นที่ต่างระดับและการล้อมรั้วมาตรฐานสูงโดยเน้นความแข็งแรงทนทานในราคาที่ยุติธรรม</p>
            </div>
        </div>
    </div>

    {{-- Services Grid Section --}}
    <div class="section-bg-color">
        <div class="container content">
            <div class="row">
                {{-- สำหรับ Bootstrap 3: ใช้ col-md-offset เพื่อจัดกึ่งกลาง --}}
                <div class="col-md-10 col-md-offset-1 col-sm-12">
                    <div class="grid-list grid-layout grid-15">
                        <div class="grid-box row">

                            @foreach ($services as $item)
                                <div class="grid-item col-md-4 col-sm-6">
                                    <div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse text-center"
                                        data-anima="scale-rotate" data-trigger="hover">

                                        {{-- Image Box พร้อม Cloudflare Optimization --}}
                                        <a class="img-box ratio-16-9" href="{{ route('service.show', $item->category->slug) }}">
                                            <img class="anima"
                                                 src="{{ Storage::disk('s3')->url($item->img_1) }}?width=450&format=webp&fit=cover"
                                                 alt="{{ $item->title }}" />
                                        </a>

                                        <div class="advs-box-content">
                                            <h2 class="text-m">
                                                <a href="{{ route('service.show', $item->category->slug) }}">
                                                    {{ Str::limit($item->title, 20) }}
                                                </a>
                                            </h2>
                                            <div class="niche-box-content">
                                                <p>{{ Str::limit($item->description, 60) }}</p>
                                            </div>
                                            <a class="btn-text" href="{{ route('service.show', $item->category->slug) }}">ดูรายละเอียด</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        {{-- Pagination --}}
                        <div class="list-nav text-center">
                            <ul class="pagination pagination-grid" data-page-items="9" data-pagination-anima="show-scale">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
