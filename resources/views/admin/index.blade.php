@extends('layouts.clean')

@section('child-title', $title ?? 'Admin Panel')

@section('child-content')



<!-- TOP BAR -->
<div class="admin-topbar">
    <a href="{{ route('dashboard') }}" class="brand">
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

    <!-- PAGE HEADER -->
    <div class="admin-page-header">
        <div>
            <h2 class="page-title">
                <i class="fa fa-list-alt"></i> {{ $title ?? 'Dashboard' }}
            </h2>
            <p class="page-subtitle">จัดการข้อมูลในระบบ</p>
        </div>
        @if(isset($createRoute))
            <x-admin.admin-button :route="$createRoute" :label="'เพิ่ม '.str_replace('Admin - ',' ',$title)" />
        @endif
    </div>

    <!-- DATA TABLE CARD -->
    @if(isset($data) && isset($headers) && is_array($headers))
    <div class="admin-card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:50px;">#</th>
                        @foreach ($headers as $key => $label)
                            <th>{{ $label }}</th>
                        @endforeach
                        <th style="width:140px;">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $row)
                        <tr>
                            <td class="text-muted" style="font-size:12px; font-weight:600;">{{ $index + 1 }}</td>
                            @foreach ($headers as $key => $label)
                                <td>
                                    @if(in_array($key, ['img_1','img_2','image']))
                                        @if($row->$key)
                                            <img src="{{ Storage::url($row->$key) }}"
                                                 style="width:46px;height:46px;object-fit:cover;border-radius:8px;border:1px solid #eee;">
                                        @else
                                            <span style="color:#ccc;font-size:12px;"><i class="fa fa-image"></i> ไม่มีรูป</span>
                                        @endif

                                    @elseif($key == 'service_category_id')
                                        <span style="background:#eef0fe;color:#7289f5;padding:4px 10px;border-radius:6px;font-size:12px;font-weight:600;">
                                            {{ is_object($row->category) ? ($row->category->name ?? 'ทั่วไป') : ($row->category ?? 'ทั่วไป') }}
                                        </span>

                                    @elseif(in_array($key, ['description','content_1','answer']))
                                        <span title="{{ strip_tags($row->$key) }}" style="color:#555;">
                                            {{ Str::limit(strip_tags($row->$key), 70) }}
                                        </span>

                                    @elseif($key == 'question')
                                        <strong style="color:#1e2340;">{{ $row->$key }}</strong>

                                    @elseif(in_array($key, ['status','is_active']))
                                        @if($row->$key == 'Active' || $row->$key == '1' || $row->$key === true)
                                            <span class="badge-status-active"><i class="fa fa-circle" style="font-size:8px;"></i> เปิดใช้งาน</span>
                                        @else
                                            <span class="badge-status-inactive"><i class="fa fa-circle" style="font-size:8px;"></i> ปิดใช้งาน</span>
                                        @endif

                                    @elseif($key == 'sort_order')
                                        <span class="badge-order">{{ $row->$key }}</span>

                                    @else
                                        <span style="color:#444;">{{ $row->$key }}</span>
                                    @endif
                                </td>
                            @endforeach
                            <td>
                                <div style="display:flex;gap:6px;align-items:center;">
                                    <a href="{{ route($routeBase.'edit'.$row->id) }}" class="btn-edit-icon"><i class="fa fa-pencil"></i> แก้ไข</a>
                                    <form action="{{ route('admin.blog.destroy', $row->id) }}" method="POST" style="margin:0;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-delete-icon"
                                            onclick="return confirm('ยืนยันการลบข้อมูลนี้?')">
                                            <i class="fa fa-trash"></i> ลบ
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="empty-state">
                            <td colspan="{{ count($headers) + 2 }}">
                                <i class="fa fa-inbox"></i>
                                ยังไม่มีข้อมูลในระบบ
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endif

</div>

@endsection
