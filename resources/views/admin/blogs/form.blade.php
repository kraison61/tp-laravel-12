<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label class="form-label">หัวข้อบทความ (Title)</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title ?? "") }}"
                placeholder="กรอกหัวข้อบทความที่นี่..." required>
        </div>

        <div class="form-group">
            <label class="form-label">ลิงก์ URL (Slug-SEO)</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $blog->slug ?? "") }}"
                placeholder="example-url-path">
        </div>

        <div class="form-group">
            <label class="form-label">หมวดหมู่บริการ (Category)</label>
            <select name="service_category_id" class="form-control">
                <option value="">-- เลือกหมวดหมู่ --</option>
                @foreach($categories as $item)
                    <option value="{{ $item->id }}" {{ old('service_category_id', $blog->service_category_id ?? "") == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">รูปภาพหน้าปก (Cover Image)</label>
                <div class="image-preview-box" onclick="document.getElementById('imgInput').click()"
                    style="cursor: pointer; border: 2px dashed #ddd; border-radius: 8px; text-align: center; position: relative; min-height: 200px; display: flex; align-items: center; justify-content: center; overflow: hidden;">

                    <input type="file" id="imgInput" name="image" style="display:none" accept="image/*"
                        onchange="previewImage(this)">

                    <div id="placeholder" class="upload-placeholder" style="{{ $blog->image ? 'display:none' : '' }}">
                        <i class="fa fa-cloud-upload" style="font-size: 40px; color: #aaa;"></i><br>
                        <span style="color: #666;">คลิกเพื่ออัปโหลดรูปภาพ</span>
                    </div>

                    <img id="preview" src="{{ $blog->image ? Storage::disk('s3')->url($blog->image) : '' }}"
                        style="max-width: 100%; max-height: 100%; display: {{ $blog->image ? 'block' : 'none' }};">
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">คำอธิบายสั้นๆ (Description)</label>
        <textarea name="description" class="form-control" rows="3"
            placeholder="สรุปเนื้อหาเบื้องต้น...">{{ old('description', $blog->description ?? "") }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label">เนื้อหาบทความ (Content)</label>
        <textarea name="content" id="summernote"
            class="form-control">{!! old('content', $blog->content ?? '') !!}</textarea>
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


    @push('scripts')
        <script>
            $(document).ready(function () {
                // เรียกใช้ Summernote ผ่าน ID ที่เรากำหนดใน textarea
                $('#summernote').summernote({
                    placeholder: 'เริ่มเขียนเนื้อหาที่นี่...',
                    tabsize: 2,
                    height: 300,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    // ถ้าต้องการจัดการเรื่องรูปภาพอัปโหลดเข้า S3/R2 สามารถเขียนฟังก์ชันเพิ่มตรงนี้ได้
                    callbacks: {
                        onImageUpload: function (files) {
                            // Logic สำหรับส่งรูปไปที่ Controller เพื่อเก็บใน S3
                        }
                    }
                });
            });
        </script>
    @endpush