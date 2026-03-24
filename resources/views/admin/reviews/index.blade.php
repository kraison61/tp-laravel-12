@extends('layouts.clean')

@section('child-title', 'Reviews - รีวิวจากลูกค้า')

@section('child-content')

    <!-- TOP BAR -->
    <div class="admin-topbar">
        <a href="{{ route('dashboard') }}" class="brand">
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

            {{-- ===== ซ้าย: รายการรีวิว ===== --}}
            <div class="col-md-8">
                <div class="form-card">
                    <div class="form-header">
                        <i class="fa fa-star"></i>
                        <h2>รายการรีวิวทั้งหมด</h2>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="font-size: 13px;">
                            <thead>
                                <tr class="active">
                                    <th style="width: 50px;">รูป</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th style="width: 80px;" class="text-center">คะแนน</th>
                                    <th>ความคิดเห็น</th>
                                    <th style="width: 70px;" class="text-center">สถานะ</th>
                                    <th style="width: 90px;" class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reviews as $item)
                                <tr class="{{ $review->exists && $review->id === $item->id ? 'info' : '' }}">
                                    <td class="text-center">
                                        @if($item->image)
                                            <img src="{{ Storage::disk('s3')->url($item->image) }}"
                                                 alt="{{ $item->customer_name }}"
                                                 style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%; border: 1px solid #ddd;">
                                        @else
                                            <span class="text-muted"><i class="fa fa-user-circle fa-2x"></i></span>
                                        @endif
                                    </td>
                                    <td><strong>{{ $item->customer_name }}</strong></td>
                                    <td class="text-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star{{ $i <= $item->rating ? '' : '-o' }}"
                                               style="color: #f39c12; font-size: 11px;"></i>
                                        @endfor
                                        <br><small class="text-muted">{{ $item->rating }}/5</small>
                                    </td>
                                    <td>
                                        <small>{{ Str::limit($item->comment ?? '-', 70) }}</small>
                                    </td>
                                    <td class="text-center">
                                        @if($item->is_active)
                                            <span class="label label-success">เปิด</span>
                                        @else
                                            <span class="label label-default">ปิด</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.review.edit', $item->id) }}"
                                           class="btn btn-xs btn-warning" title="แก้ไข">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.review.destroy', $item->id) }}"
                                              method="POST" style="display:inline;"
                                              onsubmit="return confirm('ยืนยันการลบรีวิวของ {{ addslashes($item->customer_name) }}?')">
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
                                        <i class="fa fa-inbox"></i> ยังไม่มีข้อมูลรีวิว
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div style="margin-top: 10px;">
                        {{ $reviews->links('vendor.pagination.semantic-ui') }}
                    </div>
                </div>
            </div>

            {{-- ===== ขวา: ฟอร์ม Create / Edit ===== --}}
            <div class="col-md-4">
                <div class="form-card">
                    <div class="form-header">
                        <i class="fa fa-edit"></i>
                        <h2>{{ $review->exists ? 'แก้ไขรีวิว' : 'เพิ่มรีวิวใหม่' }}</h2>
                    </div>

                    @php
                        $actionUrl = $review->exists
                            ? route('admin.review.update', $review->id)
                            : route('admin.review.store');
                    @endphp

                    {{-- ใช้ POST สำหรับทั้ง Store และ Update เพราะมีไฟล์อัปโหลด --}}
                    <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @include('admin.reviews.form')

                        <div style="margin-top: 20px; border-top: 1px solid #f0f0f0; padding-top: 15px;">
                            @if($review->exists)
                                <a href="{{ route('admin.review.index') }}"
                                   class="btn btn-default" style="margin-right: 8px;">
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
