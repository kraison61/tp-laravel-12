@extends('layouts.app')

@section('title',$service->services->first()->title)
@section('description',trim($service->services->first()->description))

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
            <x-breadcrumb >
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
                <img class="rounded" src="{{ asset('storage/'.$service->services->first()->img_1) }}" alt="" />
            </div>
            <div class="col-md-7">
                <div class="title-base text-left">
                    <hr />
                    <h2>{{ $service->services->first()->top_1 }}</h2>
                    <p>Super solutions</p>
                </div>
                <p>
                    {!! $service->services->first()->content_1 !!}
                </p>
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
                <p>
                    {!! $service->services->first()->content_2 !!}
                </p>
                <hr class="space s" />
            </div>
            <div class="col-md-5 text-right">
                <!-- <img src="../images/mk-9.png" alt="" /> -->
                <img src="{{ asset('storage/'.$service->services->first()->img_2) }}" alt="" />
            </div>
        </div></div>
        <hr class="space" />
    </div>
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
