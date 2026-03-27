@extends('layouts.clean')

@section('child-title', 'FAQ - คำถามที่พบบ่อย')

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

        @if(session('success'))
            <div class="alert alert-success alert-dismissible" style="margin-bottom: 20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible" style="margin-bottom: 20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>พบข้อผิดพลาด:</strong>
                <ul style="margin: 8px 0 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">

            {{-- ===== ซ้าย: รายการ FAQ ===== --}}
            <div class="col-md-8">
                <div class="form-card">
                    <div class="form-header">
                        <i class="fa fa-question-circle"></i>
                        <h2>รายการ FAQ ทั้งหมด</h2>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="font-size: 13px;">
                            <thead>
                                <tr class="active">
                                    <th style="width: 40px;">#</th>
                                    <th>บริการ</th>
                                    <th>คำถาม / คำตอบ</th>
                                    <th style="width: 60px;" class="text-center">ลำดับ</th>
                                    <th style="width: 70px;" class="text-center">สถานะ</th>
                                    <th style="width: 90px;" class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($faqs as $item)
                                    <tr class="{{ $faq->exists && $faq->id === $item->id ? 'info' : '' }}">
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <small class="text-muted">{{ $item->category->name ?? '-' }}</small>
                                        </td>
                                        <td>
                                            <strong>{{ Str::limit($item->question, 60) }}</strong>
                                            <br>
                                            <small class="text-muted">{{ Str::limit($item->answer, 80) }}</small>
                                        </td>
                                        <td class="text-center">{{ $item->sort_order }}</td>
                                        <td class="text-center">
                                            @if($item->is_active)
                                                <span class="label label-success">เปิด</span>
                                            @else
                                                <span class="label label-default">ปิด</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.faqs.edit', $item->id) }}" class="btn btn-xs btn-warning"
                                                title="แก้ไข">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.faqs.destroy', $item->id) }}" method="POST"
                                                style="display:inline;" onsubmit="return confirm('ยืนยันการลบ FAQ นี้?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger" title="ลบ">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted" style="padding: 30px;">
                                            <i class="fa fa-inbox"></i> ยังไม่มีข้อมูล FAQ
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div style="margin-top: 10px;">
                        {{ $faqs->links('vendor.pagination.semantic-ui') }}
                    </div>
                </div>
            </div>

            {{-- ===== ขวา: ฟอร์ม Create / Edit ===== --}}
            <div class="col-md-4">
                <div class="form-card">
                    <div class="form-header">
                        <i class="fa fa-edit"></i>
                        <h2>{{ $faq->exists ? 'แก้ไข FAQ' : 'เพิ่ม FAQ ใหม่' }}</h2>
                    </div>

                    @php
                        $actionUrl = $faq->exists
                            ? route('admin.faqs.update', $faq->id)
                            : route('admin.faqs.store');
                    @endphp

                    <form action="{{ $actionUrl }}" method="POST">
                        @csrf
                        @if($faq->exists)
                            @method('PUT')
                        @endif

                        @include('admin.faqs.form')

                        <div style="margin-top: 20px; border-top: 1px solid #f0f0f0; padding-top: 15px;">
                            @if($faq->exists)
                                <a href="{{ route('admin.faqs.index') }}" class="btn btn-default" style="margin-right: 8px;">
                                    <i class="fa fa-times"></i> ยกเลิก
                                </a>
                            @endif
                            <button type="submit" class="btn-submit">
                                <i class="fa fa-save"></i> บันทึกข้อมูล
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>{{-- end row --}}
    </div>{{-- end admin-content-wrapper --}}

@endsection