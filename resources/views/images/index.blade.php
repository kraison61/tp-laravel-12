@extends('layouts.app')

@section('title', 'Image Gallery')

@section('content')
<div class="header-base">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="title-base text-left">
                    <h1>Multimedia gallery</h1>
                    <p>When words become unclear, I shall focus with photographs. When images become inadequate, I shall be content with silence.</p>
                </div>
            </div>
            <x-breadcrumb>รูปภาพ & วิดีโอ</x-breadcrumb>
        </div>
    </div>
</div>
    <div class="section-empty">
        <div class="container content">

            <x-image-slide :images="$images" />

            <hr class="space" />
            <div class="maso-list gallery">
                <div class="navbar navbar-inner">
                    <div class="navbar-toggle"><i class="fa fa-bars"></i><span>Menu</span><i class="fa fa-angle-down"></i>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav over ms-minimal inner maso-filters">
                            <li class="current-active active"><a data-filter="maso-item">All</a></li>
                            @foreach ($allServices as $item)
                                <li><a href="images/{{ $item->category->id }}">{{ $item->category->name }}</a></li>
                            @endforeach
                            <li><a class="maso-order" data-sort="asc"><i class="fa fa-arrow-down"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="maso-box row" data-lightbox-anima="fade-top">
                    @foreach ($images as $item)
                        <div class="maso-item col-md-4">
                            <a class="img-box" href="{{ asset($item->img_url) }}" data-lightbox-anima="fade-top">
                                <img class="ratio-16-9" src="{{ asset($item->img_url) }}" alt="" />
                            </a>
                        </div>
                    @endforeach
                    <div class="clear"></div>
                </div>
                <div class="list-nav d-flex justify-content-center">
                    {{ $images->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
