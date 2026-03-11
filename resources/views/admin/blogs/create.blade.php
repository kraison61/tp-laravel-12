@extends('layouts.clean')

@section('child-title', 'Create New Blog Post')

@section('child-content')


    <!-- TOP BAR -->
    <div class="admin-topbar">
        <a href="{{ route('admin.index') }}" class="brand">
            <i class="fa fa-cogs"></i> Admin Panel
        </a>
    </div>

    <!-- SIDEBAR -->
    <div class="admin-sidebar">
        @include('admin.layouts.partials.sidebar')
    </div>

    <!-- MAIN CONTENT -->
    <div class="admin-content-wrapper">

        <div class="form-card">
            <div class="form-header">
                <i class="fa fa-edit"></i>
                <h2>ออกแบบตัวอย่างฟอร์ม (สร้างบทความใหม่)</h2>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="form-label">หัวข้อบทความ (Title)</label>
                            <input type="text" name="title" class="form-control" placeholder="กรอกหัวข้อบทความที่นี่..."
                                required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">ลิงก์ URL (Slug-SEO)</label>
                            <input type="text" name="slug" class="form-control" placeholder="example-url-path">
                        </div>

                        <div class="form-group">
                            <label class="form-label">หมวดหมู่บริการ (Category)</label>
                            <select name="service_category_id" class="form-control">
                                <option value="">-- เลือกหมวดหมู่ --</option>
                                @foreach($categories as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">รูปภาพหน้าปก (Cover Image)</label>
                            <div class="image-preview-box" onclick="document.getElementById('imgInput').click()">
                                <input type="file" id="imgInput" name="image" style="display:none" accept="image/*"
                                    onchange="previewImage(this)">
                                <div id="placeholder" class="upload-placeholder">
                                    <i class="fa fa-cloud-upload"></i>
                                    <span>คลิกเพื่ออัปโหลดรูปภาพ</span>
                                </div>
                                <img id="preview" src="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">คำอธิบายสั้นๆ (Description)</label>
                    <textarea name="description" class="form-control" rows="3"
                        placeholder="สรุปเนื้อหาเบื้องต้น..."></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">เนื้อหาบทความ (Content)</label>
                    <textarea name="content" class="form-control" rows="8"
                        placeholder="เขียนรายละเอียดเนื้อหาที่นี่..."></textarea>
                </div>

                <div style="text-align: right; margin-top: 30px; border-top: 1px solid #f0f0f0; padding-top: 20px;">
                    <button type="button" class="btn-submit"
                        style="background:#f3f4f6; color:#4b5563 !important; margin-right: 10px;">ยกเลิก</button>
                    <button type="submit" class="btn-submit">
                        <i class="fa fa-save"></i> บันทึกข้อมูล
                    </button>
                </div>
            </form>
        </div>

    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const placeholder = document.getElementById('placeholder');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    placeholder.style.display = 'none';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection