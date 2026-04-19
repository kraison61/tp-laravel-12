@extends('layouts.clean')

@section('child-title', 'แฟ้มโครงการ: ' . $project->name)

@section('child-content')

<div class="admin-topbar">
    <a href="{{ route('admin.dashboard') }}" class="brand">
        <i class="fa fa-cogs"></i> Admin Panel
    </a>
    <div class="topbar-right">
        <a href="{{ route('home') }}" class="topbar-text" style="color:rgba(255,255,255,0.7); text-decoration:none;">
            <i class="fa fa-globe"></i> ดูหน้าเว็บ
        </a>
    </div>
</div>

<div class="admin-sidebar">
    @include('admin.layouts.partials.sidebar')
</div>

<div class="admin-content-wrapper">
    <div class="admin-page-header" style="margin-bottom: 25px;">
        <div style="display: flex; align-items: center; gap: 15px;">
            <div style="background: #eef2ff; color: #4f46e5; width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                <i class="fa fa-folder-open"></i>
            </div>
            <div>
                <h2 class="page-title" style="margin-bottom: 3px;">
                    แฟ้มรายละเอียดโครงการ
                </h2>
                <p class="page-subtitle" style="margin: 0; color: #64748b;">
                    ดูรายละเอียดและจัดการรายชื่องวดงาน (Phases)
                </p>
            </div>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="admin-btn admin-btn-secondary" style="background: white; border: 1px solid #cbd5e1; color: #475569; padding: 10px 20px; border-radius: 8px; font-weight: 600;">
            <i class="fa fa-arrow-left"></i> กลับหน้ารวม
        </a>
    </div>

    <!-- PROJECT INFO CARD -->
    <div class="form-card" style="margin-bottom: 25px; border-top: 5px solid #4f46e5; padding: 25px 30px;">
        <h3 style="margin-top: 0; margin-bottom: 15px; color: #1e2340; font-weight: 700;">{{ $project->name }}</h3>
        
        <div class="row">
            <div class="col-md-4" style="margin-bottom: 15px;">
                <label style="color: #64748b; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">ลูกค้าเจ้าของ</label>
                <div style="font-size: 15px; font-weight: 600; color: #334155; margin-top: 4px;">
                    <i class="fa fa-user-circle" style="color:#94a3b8; margin-right:5px;"></i> {{ $project->user->name ?? 'ไม่มี (ไม่ได้ระบุ)' }}
                </div>
            </div>
            
            <div class="col-md-4" style="margin-bottom: 15px;">
                <label style="color: #64748b; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">สถานะ</label>
                <div style="margin-top: 4px;">
                    @if(in_array(strtolower($project->status), ['active', 'progress']))
                        <span class="badge-status-active"><i class="fa fa-circle" style="font-size:8px;"></i> กำลังดำเนินการ</span>
                    @elseif(in_array(strtolower($project->status), ['completed', 'done']))
                        <span style="background:#e8f5e9;color:#2e7d32;padding:4px 10px;border-radius:12px;font-size:12px;font-weight:600;"><i class="fa fa-check" style="font-size:8px;"></i> เสร็จสิ้น</span>
                    @else
                        <span class="badge-status-inactive"><i class="fa fa-circle" style="font-size:8px;"></i> {{ $project->status }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-4" style="margin-bottom: 15px;">
                <label style="color: #64748b; font-size: 12px; text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">รายละเอียดเพิ่มเติม</label>
                <div style="font-size: 14px; color: #475569; margin-top: 4px; line-height: 1.5;">
                    {{ $project->description ?: '-' }}
                </div>
            </div>
        </div>
    </div>

    <!-- PHASES TABLE HEADER -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <h3 style="margin: 0; font-size: 18px; font-weight: 700; color: #1e2340;">
            <i class="fa fa-tasks" style="color: #7289f5; margin-right: 5px;"></i> รายการงวดงาน (Phases Timeline)
        </h3>
        
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.project.phases.index', $project->id) }}" class="admin-btn admin-btn-secondary" style="background: #f8fafc; border: 1px solid #cbd5e1; color: #475569; padding: 10px 20px; border-radius: 8px; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
                <i class="fa fa-list"></i> จัดการงวดงานทั้งหมด
            </a>
            
            <form action="{{ route('admin.project.phases.create', $project->id) }}" method="GET" style="margin: 0;">
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <button type="submit" class="btn-add-new">
                    <i class="fa fa-plus"></i> เพิ่มงวดงานใหม่
                </button>
            </form>
        </div>
    </div>

    <!-- PHASES TABLE -->
    <div class="admin-card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 100px; text-align: center;">งวดที่</th>
                        <th>ชื่องวดงาน (Title)</th>
                        <th>อัพเดทข้อมูล</th>
                        <th>สถานะงาน</th>
                        <th style="width: 150px; text-align: center;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($project->phases as $phase)
                        <tr>
                            <td style="text-align: center;">
                                <div style="width: 32px; height: 32px; background: #eef2ff; color: #4f46e5; border-radius: 8px; font-weight: 700; font-size: 14px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                    {{ $phase->phase_number }}
                                </div>
                            </td>
                            <td>
                                <strong style="font-size: 15px; color: #334155;">{{ $phase->title }}</strong>
                            </td>
                            <td>
                                <div style="color: #64748b; font-size: 13px;">
                                    <i class="fa fa-calendar-o" style="margin-right: 4px;"></i> {{ $phase->created_at->format('d/m/Y') }}
                                </div>
                            </td>
                            <td>
                                @if(in_array(strtolower($phase->status), ['completed', 'เสร็จแล้ว', 'done', 'เสร็จสิ้น']))
                                    <span style="background:#ecfdf5;color:#059669; border: 1px solid #a7f3d0; padding:4px 10px;border-radius:12px;font-size:12px; font-weight: 600;"><i class="fa fa-check"></i> เสร็จเรียบร้อย</span>
                                @elseif(in_array(strtolower($phase->status), ['กำลังดำเนินการ', 'active', 'progress']))
                                    <span class="badge-status-active"><i class="fa fa-circle" style="font-size:8px;"></i> งานกำลังดำเนินการ</span>
                                @else
                                    <span class="badge-status-inactive"><i class="fa fa-clock-o"></i> รอดำเนินการ</span>
                                @endif
                            </td>
                            <td>
                                <div style="display:flex;gap:6px;align-items:center;justify-content:center;">
                                    <a href="{{ route('admin.projects.phases.edit', $phase->id) }}" class="btn-edit-icon" title="แก้ไขข้อมูล">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.projects.phases.destroy', $phase->id) }}" method="POST" style="margin:0;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-delete-icon" title="ลบงวดงาน"
                                            onclick="return confirm('ยืนยันลบงวดงานนี้?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="empty-state">
                            <td colspan="5">
                                <i class="fa fa-calendar-times-o"></i>
                                โครงการนี้ยังไม่มีระบุงวดงาน
                                <div style="margin-top: 10px;">
                                    <form action="{{ route('admin.projects.phases.create') }}" method="GET" style="display: inline-block;">
                                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                                        <button type="submit" class="btn-add-new" style="background: #fff; color: #4f46e5 !important; border: 1px solid #4f46e5; box-shadow: none;">
                                            เริ่มเพิ่มงวดที่ 1
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection