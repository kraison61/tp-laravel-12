@extends('layouts.app')

{{-- @section('title',$service->title) --}}
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
                <img class="rounded" src="{{ asset($service->services->first()->img_1) }}" alt="" />
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
                <img src="{{ asset($service->services->first()->img_2) }}" alt="" />
            </div>
        </div>
        <div class="row vertical-row">
            <div class="col-md-9">
                <table class="grid-table border-table text-left">
                    <tbody>
                        <tr>
                            <td>
                                <h4 class="text-color text-m">Small areas</h4>
                                <h5>From $1.000</h5>
                            </td>
                            <td>
                                <h4 class="text-color text-m">Medium areas</h4>
                                <h5>From $2.000</h5>
                            </td>
                            <td>
                                <h4 class="text-color text-m">Large areas</h4>
                                <h5>From $10.000</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <a href="#" class="circle-button btn-border btn btn-sm nav-justified">Informations</a>
            </div>
        </div>
        <hr class="space" />
    </div>
</div>
<i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
@endsection
