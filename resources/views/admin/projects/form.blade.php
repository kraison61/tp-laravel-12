@extends('layouts.clean')

@section('child-title', $project->exists ? 'แก้ไขโครงการ' : 'เพิ่มโครงการใหม่')

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
        <div class="admin-page-header" style="margin-bottom: 30px;">
            <div style="display: flex; align-items: center; gap: 15px;">
                <div
                    style="background: #eef2ff; color: #4f46e5; width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                    <i class="fa {{ $project->exists ? 'fa-pencil' : 'fa-plus' }}"></i>
                </div>
                <div>
                    <h2 class="page-title" style="margin-bottom: 3px;">
                        {{ $project->exists ? 'แก้ไขข้อมูลโครงการ' : 'เพิ่มโครงการใหม่' }}
                    </h2>
                    <p class="page-subtitle" style="margin: 0; color: #64748b;">
                        ระบุรายละเอียดของโครงการและเลือกลูกค้าเจ้าของงาน
                    </p>
                </div>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="admin-btn admin-btn-secondary"
                style="background: white; border: 1px solid #cbd5e1; color: #475569;">
                <i class="fa fa-arrow-left"></i> ย้อนกลับ
            </a>
        </div>

        <div class="custom-card" style="max-width: 800px; margin: 0 auto;">
            <form
                action="{{ $project->exists ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}"
                method="POST">
                @csrf
                @if($project->exists)
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-12 form-group" style="margin-bottom: 25px;">
                        <label class="form-label">ชื่อโครงการ <span class="required-star">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}"
                            placeholder="เช่น โครงการก่อสร้างบ้านคุณสมชาย" required>
                    </div>

                    <div class="col-md-12 form-group" style="margin-bottom: 25px;">
                        <label class="form-label">รายละเอียดเพิ่มเติม</label>
                        <textarea name="description" class="form-control" rows="4"
                            placeholder="ระบุรายละเอียด, สถานที่ก่อสร้าง, หรือสโคปงานคร่าวๆ...">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="col-md-6 form-group" style="margin-bottom: 30px;">
                        <label class="form-label">ลูกค้า / เจ้าของโครงการ <span class="required-star">*</span></label>
                        <select name="user_id" class="form-control" required style="cursor: pointer;">
                            <option value="">-- เลือกลูกค้า --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $project->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} {{ $user->phone ? '(โทร: ' . $user->phone . ')' : '' }}
                                </option>
                            @endforeach
                        </select>
                        <span class="form-hint"><i class="fa fa-info-circle"></i>
                            ลูกค้าจะสามารถดูความคืบหน้าของตึกตัวเองผ่านหน้าเว็บได้</span>
                    </div>

                    <div class="col-md-6 form-group" style="margin-bottom: 30px;">
                        <label class="form-label">สถานะของโครงการ</label>
                        <select name="status" class="form-control" required style="cursor: pointer;">
                            <option value="Active" {{ old('status', $project->status) == 'Active' ? 'selected' : '' }}>
                                กำลังดำเนินการ (Active)</option>
                            <option value="Completed" {{ old('status', $project->status) == 'Completed' ? 'selected' : '' }}>
                                เสร็จสิ้น (Completed)</option>
                            <option value="Draft" {{ old('status', $project->status) == 'Draft' ? 'selected' : '' }}>
                                แบบร่างรอเปิดตัว (Draft)</option>
                        </select>
                    </div>
                </div>

                <hr style="margin-top: 10px; margin-bottom: 30px; border-color: #f1f5f9;">

                <div style="display: flex; justify-content: flex-end; gap: 15px;">
                    <a href="{{ route('admin.projects.index') }}" class="btn"
                        style="padding: 14px 24px; font-weight: 600; color: #64748b; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px;">
                        ยกเลิก
                    </a>
                    <button type="submit" class="btn-submit">
                        <i class="fa fa-save" style="margin-right: 5px;"></i>
                        {{ $project->exists ? 'บันทึกการแก้ไข' : 'สร้างโครงการใหม่' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection