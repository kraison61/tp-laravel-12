@extends('layouts.clean')

@section('child-title', $phase->exists ? 'แก้ไขงวดงาน' : 'เพิ่มงวดงานใหม่')

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
            <div style="background: #eef2ff; color: #4f46e5; width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                <i class="fa fa-tasks"></i>
            </div>
            <div>
                <h2 class="page-title" style="margin-bottom: 3px;">
                    {{ $phase->exists ? 'แก้ไขงวดงาน' : 'เพิ่มงวดงานใหม่' }}
                </h2>
                <p class="page-subtitle" style="margin: 0; color: #64748b;">
                    สำหรับอัพเดททามไลน์ในโครงการ: <strong>{{ $project->name }}</strong>
                </p>
            </div>
        </div>
        <a href="{{ route('admin.projects.show', $project->id) }}" class="admin-btn admin-btn-secondary" style="background: white; border: 1px solid #cbd5e1; color: #475569; padding: 10px 20px; border-radius: 8px; font-weight: 600;">
            <i class="fa fa-arrow-left"></i> ย้อนกลับ
        </a>
    </div>

    <div class="form-card" style="max-width: 800px; margin: 0;">
        <div class="form-header">
            <i class="fa fa-edit"></i>
            <h2>รายละเอียดงวดงาน (Phase)</h2>
        </div>
        
        <form action="{{ $phase->exists ? route('admin.project.phases.update', [$project->id, $phase->id]) : route('admin.project.phases.store', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($phase->exists)
                @method('PUT')
            @endif

            <input type="hidden" name="project_id" value="{{ $project->id }}">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">งวดงานที่ (ลำดับ) <span style="color:#ef4444;">*</span></label>
                        <input type="number" name="phase_number" class="form-control" 
                               value="{{ old('phase_number', $phase->phase_number ?? ($project->phases->max('phase_number') + 1)) }}" 
                               required min="1">
                        <span style="color: #64748b; font-size: 12px; margin-top: 6px; display: block;">เลขลำดับโชว์หน้า Timeline</span>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label class="form-label">ชื่องวดงาน (หัวข้อ) <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="title" class="form-control" 
                               value="{{ old('title', $phase->title) }}" 
                               placeholder="เช่น งานตอกเสาเข็ม งานเทคาน" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group" style="margin-top: 10px;">
                        <label class="form-label">สถานะการดำเนินงาน</label>
                        <select name="status" class="form-control" required style="cursor: pointer;">
                            <option value="รอดำเนินการ" {{ old('status', $phase->status) == 'รอดำเนินการ' ? 'selected' : '' }}>รอดำเนินการ (Draft/Pending)</option>
                            <option value="กำลังดำเนินการ" {{ old('status', $phase->status) == 'กำลังดำเนินการ' ? 'selected' : '' }}>กำลังดำเนินการ (In Progress)</option>
                            <option value="เสร็จแล้ว" {{ old('status', $phase->status) == 'เสร็จแล้ว' ? 'selected' : '' }}>เสร็จแล้ว (Completed)</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group" style="margin-top: 15px;">
                        <label class="form-label">อัปโหลดรูปภาพประกอบ (เลือกได้หลายรูป)</label>
                        <input type="file" name="photos[]" class="form-control" multiple accept="image/*">
                        <span style="color: #64748b; font-size: 12px; margin-top: 6px; display: block;">รองรับไฟล์ JPEG, PNG, JPG, GIF (ขนาดไม่เกิน 5MB ต่อรูป)</span>
                    </div>
                </div>
            </div>

            @if($phase->exists && $phase->images->count() > 0)
                <div style="margin-top: 25px;">
                    <label class="form-label">รูปภาพปัจจุบัน ({{ $phase->images->count() }} รูป)</label>
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 15px; margin-top: 10px; background: #f8fafc; padding: 15px; border-radius: 8px; border: 1px solid #e2e8f0;">
                        @foreach($phase->images as $img)
                            <div style="position: relative; group;">
                                <img src="{{ Storage::url($img->img_url) }}" style="width: 100%; aspect-ratio: 1; object-fit: cover; border-radius: 6px; border: 1px solid #cbd5e1;">
                                <div style="margin-top: 5px;">
                                    <button type="button" 
                                            onclick="if(confirm('ยืนยันลบรูปภาพนี้?')) { document.getElementById('delete-img-{{ $img->id }}').submit(); }"
                                            style="width: 100%; padding: 4px; background: #fee2e2; color: #ef4444; border: 1px solid #fecaca; border-radius: 4px; font-size: 11px; cursor: pointer;">
                                        <i class="fa fa-trash"></i> ลบรูป
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <hr style="margin-top: 25px; margin-bottom: 25px; border-color: #f1f5f9;">

            <div style="display: flex; justify-content: flex-end; gap: 15px;">
                <a href="{{ route('admin.project.phases.index', $project->id) }}" class="btn" style="padding: 12px 24px; font-weight: 600; color: #64748b; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px;">
                    ยกเลิก
                </a>
                <button type="submit" class="btn-submit">
                    <i class="fa fa-save" style="margin-right: 5px;"></i> {{ $phase->exists ? 'บันทึกแก้ไขข้อมูล' : 'สร้างรายการงวดงาน' }}
                </button>
            </div>
        </form>

        {{-- Hidden Delete Forms --}}
        @if($phase->exists)
            @foreach($phase->images as $img)
                <form id="delete-img-{{ $img->id }}" action="{{ route('admin.project.phases.image.destroy', $img->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        @endif
    </div>
</div>

@endsection
