@extends('layouts.app')

@section('title','งานรับเหมาก่อสร้างที่ บ.ธีรพงษ์เซอร์วิส จำกัด ให้บริการ')

@section('content')
<div class="header-base">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="title-base text-left">
                    <h1>เลือกบริการที่ตอบโจทย์คุณ</h1>
                    <p>ยินดีต้อนรับสู่บริการงานวิศวกรรมฐานรากและรั้วรอบขอบชิด เราคือผู้เชี่ยวชาญด้านการจัดการพื้นที่ต่างระดับและการล้อมรั้วมาตรฐานสูง โดยเน้นความแข็งแรงทนทานในราคาที่ยุติธรรม</p>
                </div>
            </div>
            <div class="col-md-3">
                <ol class="breadcrumb b white">
                    <li><a href="/">หน้าแรก</a></li>
                    <li class="active">บริการ</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="section-empty section-item">
    <div class="content container">
        <div class="maso-list  list-sm-6">
            <div class="maso-box row" data-lightbox-anima="fade-top">

                @foreach ($services as $item)
                <div class="maso-item col-md-4 col-sm-6">
                    <div class="img-box adv-img adv-img-classic-box">
                        <a class="img-box" target="_blank" href="{{route('service.show',$item->category->slug)}}">
                            <img src="{{ asset('storage/'.$item->img_1) }}" alt="">
                        </a>
                        <div class="caption">
                            <div class="caption-inner">
                                <h2>{{ $item->title }}</h2>
                                <p class="sub-text">{{ $item->category->name }}</p>
                                <p class="big-text">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="clear"></div>
            </div>
            <div class="list-nav">
                <a href="#" class="btn btn-sm circle-button load-more-maso" data-pagination-anima="fade-bottom" data-page-items="9">
                    Load More
                    <i class="fa fa-arrow-down"></i>
                </a>
            </div>
        </div>
        <hr class="space m" />
    </div>
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
