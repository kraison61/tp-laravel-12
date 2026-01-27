@extends('layouts.app')

@section('title', 'Image Gallery')

@section('content')
<x-header-base />
    <div class="section-empty">
        <div class="container content">

            <x-image-slide :images="$images" />

            <hr class="space" />
            <div class="maso-list gallery">
                <div class="navbar navbar-inner">
                    <div class="navbar-toggle"><i class="fa fa-bars"></i><span>Menu</span><i class="fa fa-angle-down"></i>
                    </div>
                    <x-media-service />
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
                    {{ $images->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
