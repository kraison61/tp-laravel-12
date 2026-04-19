@extends('layouts.clean')

@section('child-title', 'จัดการงวดงาน: ' . $project->name)

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
        <div class="admin-page-header">
            <div style="display: flex; align-items: center; gap: 15px;">
                <div
                    style="background: #eef2ff; color: #4f46e5; width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                    <i class="fa fa-tasks"></i>
                </div>
                <div>
                    <h2 class="page-title" style="margin-bottom: 3px;">
                        จัดการงวดงาน (Project Phases)
                    </h2>
                    <p class="page-subtitle" style="margin: 0; color: #64748b;">
                        โครงการ: <strong>{{ $project->name }}</strong>
                    </p>
                </div>
            </div>
            <div style="display: flex; gap: 10px;">
                <a href="{{ route('admin.projects.index') }}" class="admin-btn admin-btn-secondary"
                    style="background: white; border: 1px solid #cbd5e1; color: #475569; padding: 10px 20px; border-radius: 8px; font-weight: 600;">
                    <i class="fa fa-arrow-left"></i> กลับหน้าโครงการ
                </a>
                <form action="{{ route('admin.project.phases.create', $project->id) }}" method="GET" style="margin: 0;">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <button type="submit" class="btn-add-new">
                        <i class="fa fa-plus"></i> เพิ่มงวดงานใหม่
                    </button>
                </form>
            </div>
        </div>

        <!-- DATA TABLE CARD -->
        <div class="admin-card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 80px; text-align: center;">งวดที่</th>
                            <th>รายละเอียดงวดงาน</th>
                            <th>รูปภาพ</th>
                            <th style="width: 150px;">สถานะ</th>
                            <th style="width: 180px; text-align: center;">เครื่องมือจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($project->phases as $phase)
                            <tr>
                                <td style="text-align: center;">
                                    <div
                                        style="width: 35px; height: 35px; background: #eef2ff; color: #4f46e5; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; margin: 0 auto;">
                                        {{ $phase->phase_number }}
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 700; color: #1e293b; font-size: 15px; margin-bottom: 4px;">
                                        {{ $phase->title }}
                                    </div>
                                    <div style="font-size: 12px; color: #64748b;">อัปเดตเมื่อ:
                                        {{ $phase->updated_at->format('d/m/Y H:i') }}
                                    </div>
                                </td>
                                <td>
                                    <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                                        @forelse($phase->images as $img)
                                            <div style="position: relative;">
                                                <img src="{{ Storage::url($img->img_url) }}"
                                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0;">
                                            </div>
                                        @empty
                                            <span style="color: #cbd5e1; font-size: 12px; font-style: italic;">ยังไม่มีรูปภาพ</span>
                                        @endforelse

                                        {{-- Placeholder for Add Image Button --}}
                                        <a href="#" class="btn-edit-icon"
                                            style="width: 50px; height: 50px; background: #f8fafc; border: 1px dashed #cbd5e1; color: #94a3b8; display: flex; align-items: center; justify-content: center; border-radius: 6px;"
                                            title="เพิ่มรูปภาพ">
                                            <i class="fa fa-plus" style="font-size: 14px;"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    @if(in_array(strtolower($phase->status), ['completed', 'เสร็จแล้ว', 'done', 'เสร็จสิ้น']))
                                        <span
                                            style="background:#ecfdf5;color:#059669; border: 1px solid #a7f3d0; padding:5px 12px;border-radius:20px;font-size:11px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                                            <i class="fa fa-check-circle"></i> เสร็จสมบูรณ์
                                        </span>
                                    @elseif(in_array(strtolower($phase->status), ['กำลังดำเนินการ', 'active', 'progress']))
                                        <span
                                            style="background:#eff6ff;color:#2563eb; border: 1px solid #bfdbfe; padding:5px 12px;border-radius:20px;font-size:11px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                                            <i class="fa fa-spinner fa-spin"></i> กำลังทำ
                                        </span>
                                    @else
                                        <span
                                            style="background:#f8fafc;color:#64748b; border: 1px solid #e2e8f0; padding:5px 12px;border-radius:20px;font-size:11px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                                            <i class="fa fa-clock-o"></i> รอเริ่มงาน
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div style="display:flex;gap:8px;align-items:center;justify-content:center;">
                                        <a href="{{ route('admin.project.phases.edit', [$project->id, $phase->id]) }}"
                                            class="btn-edit-icon" title="แก้ไขงวดงาน">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <form action="{{ route('admin.project.phases.destroy', [$project->id, $phase->id]) }}"
                                            method="POST" style="margin:0;">
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
                                <td colspan="5" style="padding: 60px 0;">
                                    <div style="font-size: 40px; color: #e2e8f0; margin-bottom: 15px;"><i
                                            class="fa fa-tasks"></i></div>
                                    <div style="font-weight: 600; color: #94a3b8;">ยังไม่ได้กำหนดงวดงานสำหรับโครงการนี้</div>
                                    <div style="margin-top: 20px;">
                                        <form action="{{ route('admin.project.phases.create', $project->id) }}" method="GET">
                                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                                            <button type="submit" class="btn-add-new">
                                                เริ่มสร้างงวดงานแรก
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