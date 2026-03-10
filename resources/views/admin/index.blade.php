@extends('layouts.clean')

@section('child-title', $title ?? 'Admin Panel')

@section('child-content')

<style>
    /* ====================================
       ADMIN PANEL - MODERN REDESIGN
       Uses Bootstrap 3's grid, but heavily
       styled to look fresh & professional
    ======================================= */
    body {
        background-color: #f0f2f5;
        font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
    }

    /* ---- TOP NAV BAR ---- */
    .admin-topbar {
        position: fixed;
        top: 0; left: 0; right: 0;
        height: 58px;
        background: linear-gradient(135deg, #1a1f36 0%, #2d3561 100%);
        display: flex;
        align-items: center;
        padding: 0 24px;
        z-index: 1001;
        box-shadow: 0 2px 10px rgba(0,0,0,0.25);
    }
    .admin-topbar .brand {
        color: #fff;
        font-size: 18px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-decoration: none !important;
    }
    .admin-topbar .brand i {
        color: #7289f5;
        margin-right: 8px;
    }
    .admin-topbar .topbar-right {
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .admin-topbar .topbar-right .admin-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: linear-gradient(135deg, #7289f5, #a78bfa);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: bold;
        font-size: 14px;
    }
    .admin-topbar .topbar-right .topbar-text {
        color: rgba(255,255,255,0.8);
        font-size: 13px;
    }

    /* ---- SIDEBAR ---- */
    .admin-sidebar {
        width: 220px;
        position: fixed;
        top: 58px;
        left: 0;
        bottom: 0;
        background: #1e2340;
        overflow-y: auto;
        z-index: 1000;
        padding: 20px 0 40px;
        box-shadow: 2px 0 10px rgba(0,0,0,0.15);
    }
    .admin-sidebar .sidebar-section-label {
        color: rgba(255,255,255,0.35);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 16px 20px 6px;
    }
    .admin-sidebar .nav-pills > li > a {
        border-radius: 0;
        color: rgba(255,255,255,0.65);
        padding: 10px 20px;
        font-size: 13.5px;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        border-left: 3px solid transparent;
    }
    .admin-sidebar .nav-pills > li > a:hover {
        background: rgba(114, 137, 245, 0.12);
        color: #fff;
        border-left-color: #7289f5;
    }
    .admin-sidebar .nav-pills > li.active > a {
        background: rgba(114, 137, 245, 0.2);
        color: #fff;
        border-left-color: #7289f5;
        font-weight: 600;
    }
    .admin-sidebar .nav-pills > li > a i {
        width: 18px;
        text-align: center;
        font-size: 14px;
        opacity: 0.8;
    }
    .admin-sidebar .nav-pills > li.active > a i {
        opacity: 1;
        color: #7289f5;
    }

    /* ---- MAIN CONTENT ---- */
    .admin-content-wrapper {
        margin-left: 220px;
        padding: 80px 28px 40px;
        min-height: 100vh;
    }

    /* ---- PAGE HEADER ---- */
    .admin-page-header {
        background: #fff;
        border-radius: 12px;
        padding: 18px 24px;
        margin-bottom: 22px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    .admin-page-header .page-title {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #1e2340;
    }
    .admin-page-header .page-title i {
        color: #7289f5;
        margin-right: 10px;
    }
    .admin-page-header .page-subtitle {
        color: #888;
        font-size: 12.5px;
        margin: 3px 0 0;
    }
    .btn-add-new {
        background: linear-gradient(135deg, #7289f5, #a78bfa);
        color: #fff !important;
        border: none;
        border-radius: 8px;
        padding: 9px 18px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: opacity 0.2s;
        box-shadow: 0 3px 10px rgba(114,137,245,0.4);
    }
    .btn-add-new:hover { opacity: 0.88; }

    /* ---- DATA CARD ---- */
    .admin-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.07);
        overflow: hidden;
    }

    /* ---- TABLE STYLES (override) ---- */
    .admin-card .table {
        margin-bottom: 0;
    }
    .admin-card .table thead tr {
        background: #f7f8fc;
    }
    .admin-card .table thead th {
        border-top: none;
        border-bottom: 2px solid #eef0f8;
        color: #555;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        padding: 14px 16px;
    }
    .admin-card .table tbody td {
        vertical-align: middle !important;
        padding: 13px 16px !important;
        border-color: #f2f3f8;
        font-size: 13.5px;
        color: #333;
    }
    .admin-card .table tbody tr:hover td {
        background: #fafaff;
    }
    .admin-card .table tbody tr:last-child td {
        border-bottom: none;
    }

    /* ---- BADGE STYLES ---- */
    .badge-status-active {
        background: #ecfdf5;
        color: #059669;
        border: 1px solid #6ee7b7;
        border-radius: 20px;
        padding: 4px 12px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .badge-status-inactive {
        background: #fff7ed;
        color: #d97706;
        border: 1px solid #fcd34d;
        border-radius: 20px;
        padding: 4px 12px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .badge-order {
        background: #eef0fe;
        color: #7289f5;
        border-radius: 6px;
        padding: 3px 10px;
        font-size: 12px;
        font-weight: 700;
    }

    /* ---- ACTION BUTTONS ---- */
    .btn-edit-icon {
        background: #eef0fe;
        color: #7289f5;
        border: none;
        border-radius: 7px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        text-decoration: none !important;
    }
    .btn-edit-icon:hover { background: #d9dcfd; color: #4c65e4; }
    .btn-delete-icon {
        background: #fff1f1;
        color: #e04444;
        border: none;
        border-radius: 7px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .btn-delete-icon:hover { background: #fdd; color: #c02020; }

    /* ---- EMPTY STATE ---- */
    .empty-state td {
        padding: 50px 20px !important;
        text-align: center;
        color: #aaa;
    }
    .empty-state td i {
        font-size: 36px;
        display: block;
        margin-bottom: 10px;
        color: #ccc;
    }
</style>

<!-- TOP BAR -->
<div class="admin-topbar">
    <a href="{{ route('admin.index') }}" class="brand">
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
        <a href="#" class="btn-add-new">
            <i class="fa fa-plus"></i> เพิ่มข้อมูลใหม่
        </a>
        
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
                                    <a href="#" class="btn-edit-icon"><i class="fa fa-pencil"></i> แก้ไข</a>
                                    <form action="#" method="POST" style="margin:0;">
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