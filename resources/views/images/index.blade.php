@extends('layouts.app')

@section('title', 'รวมผลงานหน้างานจริง งานถมดิน กดเสาเข็ม และกำแพงกันดินจากบริษัทธีรพงษ์เซอร์วิส จำกัด')
@section('description','ชมภาพผลงานการปฏิบัติงานจริงของทีมงาน บริษัทธีรพงษ์เซอร์วิส จำกัด ไม่ว่าจะเป็นงานกดเสาเข็ม I-18 งานถมที่ด้วยเศษปูน และงานก่อสร้างคุณภาพ การันตีด้วยผลงานหลากหลายโครงการทั่วประเทศ')

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
