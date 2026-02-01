@extends('layouts.app')

@section('title', 'Image Gallery')

@section('content')
<x-header-base />
    <div class="section-empty">
        <div class="container content">

            <hr class="space" />
            <div class="maso-list gallery">
                <div class="navbar navbar-inner">
                    <div class="navbar-toggle"><i class="fa fa-bars"></i><span>Menu</span><i class="fa fa-angle-down"></i>
                    </div>
                    <x-media-service />
                </div>
                <livewire:photo-gallery :id="$id" />
            </div>
        </div>
    </div>
@endsection
