@extends('layouts.clean')

@section('child-title', 'จัดการโครงการ (Projects)')

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

    <!-- PAGE HEADER -->
    <div class="admin-page-header">
        <div>
            <h2 class="page-title">
                <i class="fa fa-building"></i> จัดการโครงการ
            </h2>
            <p class="page-subtitle">แสดงรายชื่อโครงการและผู้รับเหมา/ลูกค้าทั้งหมด</p>
        </div>
        <x-admin.admin-button :route="'admin.projects.create'" :label="'เพิ่มโครงการใหม่'" />
    </div>

    <!-- DATA TABLE CARD -->
    <div class="admin-card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:50px;">#</th>
                        <th>ชื่อโครงการ</th>
                        <th>ลูกค้า/เจ้าของ</th>
                        <th>สถานะ</th>
                        <th>สร้างเมื่อ</th>
                        <th style="width:240px;text-align:center;">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $index => $row)
                        <tr>
                            <td class="text-muted" style="font-size:12px; font-weight:600;">{{ $index + 1 }}</td>
                            <td>
                                <strong>{{ $row->name }}</strong>
                            </td>
                            <td>
                                <span style="background:#eef0fe;color:#7289f5;padding:4px 10px;border-radius:6px;font-size:12px;font-weight:600;">
                                    {{ $row->user ? $row->user->name : 'ไม่มี (Not Set)' }}
                                </span>
                            </td>
                            <td>
                                @if(in_array(strtolower($row->status), ['active', 'progress', '1']))
                                    <span class="badge-status-active"><i class="fa fa-circle" style="font-size:8px;"></i> กำลังดำเนินการ</span>
                                @elseif(in_array(strtolower($row->status), ['completed', 'done']))
                                    <span style="background:#e8f5e9;color:#2e7d32;padding:4px 8px;border-radius:12px;font-size:11px;"><i class="fa fa-check" style="font-size:8px;"></i> เสร็จสิ้น</span>
                                @else
                                    <span class="badge-status-inactive"><i class="fa fa-circle" style="font-size:8px;"></i> {{ $row->status }}</span>
                                @endif
                            </td>
                            <td style="color:#666; font-size:13px;">
                                {{ $row->created_at ? $row->created_at->format('d/m/Y') : '-' }}
                            </td>
                            <td>
                                <div style="display:flex;gap:6px;align-items:center;justify-content:center;">
                                    <a href="{{ route('admin.project.phases.index', $row->id) }}" class="btn-edit-icon" style="background:#0dcaf0; color:white; border-color:#0dcaf0;">
                                        <i class="fa fa-list"></i> ตารางงวดงาน
                                    </a>
                                    
                                    <a href="{{ route('admin.projects.edit', $row->id) }}" class="btn-edit-icon">
                                        <i class="fa fa-pencil"></i> แก้ไข
                                    </a>
                                    
                                    <form action="{{ route('admin.projects.destroy', $row->id) }}" method="POST" style="margin:0;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-delete-icon"
                                            onclick="return confirm('ข้อมูลโครงการและงวดงานทั้งหมดจะถูกลบ! ยืนยันการลบ?')">
                                            <i class="fa fa-trash"></i> ลบ
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="empty-state">
                            <td colspan="6" style="text-align:center;">
                                <i class="fa fa-inbox"></i>
                                ยังไม่มีข้อมูลโครงการ
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
