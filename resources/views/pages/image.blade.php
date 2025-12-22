@extends('layouts.app')

@section('title', 'Image-TheeraphongServices')

@section('content')
<div class="header-base">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="title-base text-left">
                    <h1>Multimedia gallery</h1>
                    <p>When words become unclear, I shall focus with photographs. When images become inadequate, I shall
                        be content with silence.</p>
                </div>
            </div>
            <x-breadcrumb>
                ภาพ & วิดีโอ
            </x-breadcrumb>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="flexslider carousel gallery white visible-dir-nav nav-inner"
            data-options="minWidth:200,itemMargin:15,numItems:3,controlNav:true,directionNav:true">
            <ul class="slides">
                <li>
                    <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                        <img src="../images/gallery/image-8.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                        <img src="../images/gallery/image-3.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                        <img src="../images/gallery/image-4.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                        <img src="../images/gallery/image-5.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                        <img src="../images/gallery/image-6.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                        <img src="../images/gallery/image-7.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a class="img-box lightbox" data-lightbox-anima="fade-top" href="../images/gallery/image-1.jpg">
                        <img src="../images/gallery/image-9.jpg" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <hr class="space" />
        <div class="maso-list gallery">
            <div class="navbar navbar-inner">
                <div class="navbar-toggle"><i class="fa fa-bars"></i><span>Menu</span><i class="fa fa-angle-down"></i>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav over ms-minimal inner maso-filters">
                        <li class="current-active active"><a data-filter="maso-item">All</a></li>
                        @foreach ($services as $item)
                        <li><a
                                data-filter="{{ $item->service_category_id }}">{{ Str::limit($item->category->name, 10, '...') }}
                            </a>
                        </li>
                        @endforeach
                        <li><a class="maso-order" data-sort="asc"><i class="fa fa-arrow-down"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="maso-box row" id="image-container" data-lightbox-anima="fade-top">
                @foreach ($images as $image)
                <div data-sort="1" class="maso-item col-md-4 {{ $image->service_id }}">
                    <a class="img-box" href="{{ asset($image->img_url) }}" data-lightbox-anima="fade-top">
                        <img src="{{ asset($image->img_url) }}" alt="Image description" loading="lazy" />
                    </a>
                </div>
                @endforeach
                <div class="clear"></div>
            </div>
            <div class="list-nav">
                <a href="#" class="btn-sm btn load-more-maso" data-page-items="9">Load More <i
                        class="fa fa-arrow-down"></i></a>
            </div>
        </div>
    </div>
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
