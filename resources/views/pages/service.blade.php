
@extends('layouts.app')

@section('title',$service->title)

@section('content')
<div class="header-base">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="title-base text-left">
                    <h1>{{ $service->h1 }}</h1>
                    <p>{{ $service->description }}</p>
                </div>
            </div>
            <x-breadcrumb >
                {{ $service->category->name }}
            </x-breadcrumb>
        </div>
    </div>
</div>
<div class="section-empty section-item">
    <div class="container content">
        <div class="row vertical-row">
            <div class="col-md-5">
                <!-- <img src="../images/mk-8.png" alt="" /> -->
                <img class="rounded" src="{{ asset($service->img_1) }}" alt="" />
            </div>
            <div class="col-md-7">
                <div class="title-base text-left">
                    <hr />
                    <h2>{{ $service->top_1 }}</h2>
                    <p>Super solutions</p>
                </div>
                <p>
                    {!! $service->content_1 !!}
                </p>
                <hr class="space s" />
                
            </div>
        </div>
        <hr class="space" />
        <div class="row vertical-row" data-anima="fade-bottom">
            <div class="col-md-7">
                <div class="title-base text-left">
                    <hr />
                    <h2>{{ $service->top_2 }}</h2>
                    <p>Cheap prices</p>
                </div>
                <p>
                    {!! $service->content_2 !!}
                </p>
                <hr class="space s" />
            </div>
            <div class="col-md-5 text-right">
                <!-- <img src="../images/mk-9.png" alt="" /> -->
                <img src="{{ asset($service->img_2) }}" alt="" />
            </div>
        </div>
        <hr class="space" />
    </div>
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
