@extends('layouts.clean')

@section('child-title', 'Create New Price')

@section('child-content')


    <!-- TOP BAR -->
    <div class="admin-topbar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <i class="fa fa-cogs"></i> Admin Panel
        </a>
    </div>

    <!-- SIDEBAR -->
    <div class="admin-sidebar">
        @include('admin.layouts.partials.sidebar')
    </div>

    <!-- MAIN CONTENT -->
    <div class="admin-content-wrapper">

        <div class="form-card">
            <div class="form-header">
                <i class="fa fa-edit"></i>
                @if(isset($price) && $price->exists)
                    <h2>แก้ไขราคา</h2>
                @else
                    <h2>สร้างราคาใหม่</h2>
                @endif
            </div>

            @php
                // เช็คว่ามีข้อมูลเดิมไหม (ถ้ามี = Edit, ถ้าไม่มี = Create)
                $isEdit = $price->exists;

                // กำหนด URL ของ Action
                $actionUrl = $isEdit ? route('admin.price.update', $price->id) : route('admin.price.store');
            @endphp

            {{-- ถ้าเป็นการแก้ไข ให้พิมพ์ @method('PUT') ออกมา --}}


            <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if($isEdit)
                    @method('PUT')
                @endif

                @if (isset($errors) && (is_object($errors) ? $errors->any() : count($errors) > 0))
                    <div style="background-color: #fee2e2; color: #dc2626; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                        <strong style="display:block; margin-bottom: 10px;">พบข้อผิดพลาด:</strong>
                        <ul style="margin: 0; padding-left: 20px;">
                            @php $errorList = is_object($errors) ? $errors->all() : $errors; @endphp
                            @foreach ($errorList as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @include('admin.prices.form')
                <div style="text-align: right; margin-top: 30px; border-top: 1px solid #f0f0f0; padding-top: 20px;">
                    <button type="button" class="btn-submit" onclick="window.history.back();"
                        style="background:#f3f4f6; color:#4b5563 !important; margin-right: 10px;">
                        ยกเลิก
                    </button>

                    <button type="submit" class="btn-submit">
                        <i class="fa fa-save"></i> บันทึกข้อมูล
                    </button>
                </div>
            </form>
        </div>

    </div>



@endsection