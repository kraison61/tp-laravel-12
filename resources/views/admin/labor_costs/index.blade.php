@extends('layouts.clean')

@section('child-title', 'จัดการรายการค่าแรง')

@section('child-content')

    <div class="admin-topbar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <i class="fa fa-cogs"></i> Admin Panel
        </a>
    </div>

    <div class="admin-sidebar">
        @include('admin.layouts.partials.sidebar')
    </div>

    <div class="admin-content-wrapper">

        <div class="form-card">
            <div class="form-header">
                <i class="fa fa-tools"></i>
                @if($laborCost->exists)
                    <h2>แก้ไขรายการค่าแรง</h2>
                @else
                    <h2>เพิ่มรายการค่าแรงใหม่</h2>
                @endif
            </div>

            @php
                // เช็คว่ามีข้อมูลเดิมไหม (ถ้ามี = Edit, ถ้าไม่มี = Create)
                $isEdit = $laborCost->exists;

                // กำหนด URL ของ Action
                $actionUrl = $isEdit ? route('admin.labor_cost.update', $laborCost->id) : route('admin.labor_cost.store');
            @endphp

            <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ถ้าเป็นการแก้ไข ให้พิมพ์ @method('PUT') ออกมา --}}
                @if($isEdit)
                    @method('PUT')
                @endif

                @if ($errors->any())
                    <div
                        style="background-color: #fee2e2; color: #dc2626; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                        <strong style="display:block; margin-bottom: 10px;">พบข้อผิดพลาด:</strong>
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @include('admin.labor_costs.form')

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