@extends('layouts.app')

@section('title', 'รวมบทความความรู้เรื่องงานฐานราก กำแพงกันดิน และเทคนิคก่อสร้างบริษัทธีรพงษ์เซอร์วิส จำกัด')
@section('description','แหล่งรวบรวมความรู้จากหน้างานจริง เจาะลึกเทคนิคการกดเสาเข็ม งานถมดิน และการก่อสร้างกำแพงกันดินตามหลักวิศวกรรม โดยทีมช่างผู้เชี่ยวชาญ พร้อมอัปเดตข่าวสารวงการก่อสร้างที่คุณต้องรู้')

@section('content')
<div class="header-title ken-burn-center white" data-parallax="scroll" data-position="top" data-natural-height="650" data-natural-width="1920" data-image-src="{{ asset('images/bg-blog.jpg') }}">
        <div class="container">
            <div class="title-base">
                <hr class="anima" />
                <h1>ข่าวสาร และบทความ</h1>
                <p>เหตุการณ์ข่าวสาร และบทความล่าสุด</p>
            </div>
        </div>
    </div>
    <div class="section-bg-color">
        <div class="container content">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="grid-list grid-layout grid-15">
                        <div class="grid-box row">

                            @foreach($blogs as $item)
                                <div class="grid-item col-md-6">
                                <div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse" data-anima="scale-rotate" data-trigger="hover">
                                    <div class="block-infos">
                                        <div class="block-data">
                                            <p class="bd-day">{{ $item->created_at->format('d-M-Y') }}</p>
                                        </div>
                                        <a class="block-comment" href="#">2 <i class="fa fa-comment-o"></i></a>
                                    </div>
                                    <a class="img-box ratio-16-9" href="{{ route('blog.show',$item->id)}}"><img class="anima" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" /></a>
                                    <div class="advs-box-content">
                                        <h2 class="text-m"><a href="#">{{ Str::limit($item->title, 30) }}</a></h2>
                                        <div class="tag-row">
                                            <span><i class="fa fa-bookmark"></i> <a href="#">{{ $item->serviceCategory->name }}</a></span>
                                            <span><i class="fa fa-pencil"></i><a href="#">Admin</a></span>
                                        </div>
                                        <p class="niche-box-content">
                                            {{ Str::limit($item->description, 45) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="">
                                {{ $blogs->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                        <div class="list-nav">
                            <ul class="pagination pagination-grid" data-page-items="8" data-pagination-anima="show-scale"></ul>
                        </div>
                    </div>
                </div>

                <x-blog-sidebar />

            </div>
        </div>
    </div>
    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
