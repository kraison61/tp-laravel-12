@extends('layouts.app')

{{-- ปรับ Title ให้สอดคล้องกับโปรเจกต์ --}}
@section('title', 'ความคืบหน้าโครงการ ' . $timelines->first()->project->name . ' | บริษัทธีรพงษ์เซอร์วิส จำกัด')

@section('content')
    <!-- <div id="preloader"></div> -->
    <div class="header-base">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-base text-left">
                        <h1>Timeline โครงการ : {{ $timelines->first()->project->name }}</h1>
                        <p>รุปภาพรวมความคืบหน้างานก่อสร้างประจำงวด
                            ติดตามรายละเอียดงานที่แล้วเสร็จและแผนการดำเนินงานในขั้นตอนต่อไปได้อย่างสะดวกรวดเร็ว
                        </p>
                    </div>
                </div>
                <x-breadcrumb>
                    งวดงาน
                </x-breadcrumb>
            </div>
        </div>
    </div>
    <div class="section-empty">
        <div class="container content">
            <ul class="timeline">
                @foreach($timelines as $item)
                    {{-- ใช้ @if หรือ Ternary check ลำดับเพื่อสลับฝั่งซ้ายขวา --}}
                    <li class="{{ $loop->iteration % 2 == 0 ? 'timeline-inverted' : '' }}">
                        <div class="timeline-badge"></div>

                        <div class="timeline-label">
                            <h4>งวดที่ {{ $item->phase_number }}</h4>
                            <p>{{ $item->title }}</p>
                        </div>

                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">รูป</h4>
                                @if($item->created_at)
                                    <p><small class="text-muted">{{ $item->created_at->format('Y-F-d') }}</small></p>
                                @endif
                            </div>
                            <div class="timeline-body">
                                <x-coverflow :photos="$item->images" />
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection