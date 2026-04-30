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
                            @php
                                // ดึง URL รูปภาพอย่างปลอดภัย ถ้าไม่มีรูปจะคืนค่า null ไม่พ่น Error 500
                                $imageUrl = $item->phases->first()?->images->first()?->img_url;
                            @endphp

                            <div class="col-md-3">
                                <a class="img-box inner" href="{{ route('projects.user.show', $item->id) }}">
                                    <span>
                                        @if($imageUrl)
                                            {{-- กรณีที่มีรูปภาพ --}}
                                            <img class="ratio-16-9" src="{{ Storage::url($imageUrl) }}" alt="" />
                                        @else
                                            {{-- กรณีที่ไม่มีรูปภาพ (หาไฟล์ default-image.jpg มาใส่ไว้ในโฟลเดอร์ public/images/
                                            หรือปรับ path ตามที่คุณมี) --}}
                                            <img class="ratio-16-9" src="{{ asset('images/default-image.jpg') }}"
                                                alt="No image available" style="background-color: #f3f4f6;" />
                                        @endif
                                    </span>
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