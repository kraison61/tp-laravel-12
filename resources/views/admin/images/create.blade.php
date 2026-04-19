@extends('layouts.clean')

@section('child-title', 'เพิ่มรูปภาพใหม่')

@section('child-content')

    <!-- TOP BAR -->
    <div class="admin-topbar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <i class="fa fa-cogs"></i> Admin Panel
        </a>
        <div class="topbar-right">
            <a href="{{ route('home') }}" class="topbar-text" style="color:rgba(255,255,255,0.7); text-decoration:none;">
                <i class="fa fa-globe"></i> ดูหน้าเว็บ
            </a>
            <div class="admin-avatar">A</div>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="admin-sidebar">
        @include('admin.layouts.partials.sidebar')
    </div>

    <!-- MAIN CONTENT WRAPPER -->
    <div class="admin-content-wrapper">

        <div class="form-card">
            <div class="form-header">
                <i class="fa fa-image"></i>
                <h2>อัปโหลดรูปภาพผลงาน</h2>
            </div>

            <form action="{{ route('admin.photo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div style="background-color: #fee2e2; color: #dc2626; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                        <strong style="display:block; margin-bottom: 10px;">พบข้อผิดพลาด:</strong>
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @include('admin.images.form')

                <div style="text-align: right; margin-top: 30px; border-top: 1px solid #f0f0f0; padding-top: 20px;">
                    <button type="button" class="btn-submit" onclick="window.location.href='{{ route('admin.photo.index') }}';"
                        style="background:#f3f4f6; color:#4b5563 !important; margin-right: 10px;">
                        กลับหน้ารูปภาพ
                    </button>

                    <button type="submit" class="btn-submit">
                        <i class="fa fa-upload"></i> อัปโหลดรูปภาพ
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection
