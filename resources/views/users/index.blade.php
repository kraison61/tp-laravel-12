@extends('layouts.app')

<!-- {{-- ปรับ Title ให้สอดคล้องกับโปรเจกต์ --}} -->
@section('title', 'ความคืบหน้าโครงการ ' . (auth()->user()->name) . ' | บริษัทธีรพงษ์เซอร์วิส จำกัด')

@section('content')
    <!-- <div id="preloader"></div> -->
    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>รวมโครงการของ {{ auth()->user()->name }}</h1>
                        <p>สรุปรวม งานก่อสร้างที่ได้ดำเนินงานตามงวดงาน
                        </p>
                    </div>
                </div>
                <x-breadcrumb>
                    งวดงาน
                </x-breadcrumb>
            </div>
        </div>
    </div>

    <div class="section-empty section-item text-center">
        <div class="container content">
            <div class="row">
                <hr class="space s" />
                <h5>รายการโครงการที่ผ่านการอนุมัติแล้ว</h5>
                <hr class="space m" />
                <div class="text-center">
                    <div class="row">
                        @foreach ($timelines as $item)
                            <div class="col-md-3">
                                <a class="img-box inner" href="{{ route('projects.user.show', $item->id) }}">
                                    <span><img class="ratio-16-9"
                                            src="{{ Storage::url($item->phases->first()->images->first()->img_url) }}"
                                            alt="" /></span>
                                    <span class="caption-box">
                                        <span class="caption">
                                            {{ $item->description }}
                                        </span>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr class="space s" />
                <hr />
            </div>
        </div>
    </div>
@endsection