<div class="row">
    <div class="col-md-8">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">หมวดหมู่บริการ (Category) <span class="text-danger">*</span></label>
                    <select name="service_category_id" class="form-control" required>
                        <option value="">-- เลือกหมวดหมู่ --</option>
                        @foreach($categories ?? [] as $cat)
                            <option value="{{ $cat->id }}" {{ old('service_category_id', $service->service_category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">หัวข้อ (Title) <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control"
                        value="{{ old('title', $service->title ?? '') }}" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">คำอธิบาย (Description)</label>
            <textarea name="description" class="form-control"
                rows="3">{{ old('description', $service->description ?? '') }}</textarea>
        </div>

        <hr style="border-top: 1px dashed #ddd; margin: 20px 0;">
        <h5 style="font-size: 16px; margin-bottom: 15px;"><i class="fa fa-font"></i> ส่วนหัวและข้อความแนะนำ</h5>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">แท็ก H1 (ส่วนหัวหลัก)</label>
                    <input type="text" name="h1" class="form-control" value="{{ old('h1', $service->h1 ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">ข้อความ Top 1</label>
                    <input type="text" name="top_1" class="form-control"
                        value="{{ old('top_1', $service->top_1 ?? '') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">ข้อความ Top 2</label>
                    <input type="text" name="top_2" class="form-control"
                        value="{{ old('top_2', $service->top_2 ?? '') }}">
                </div>
            </div>
        </div>

        <hr style="border-top: 1px dashed #ddd; margin: 20px 0;">
        <h5 style="font-size: 16px; margin-bottom: 15px;"><i class="fa fa-file-text-o"></i> เนื้อหาบทความ</h5>

        <div class="form-group">
            <label class="form-label">เนื้อหาส่วนที่ 1 (Content 1)</label>
            <textarea name="content_1"
                class="summernote form-control">{!! old('content_1', $service->content_1 ?? '') !!}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">เนื้อหาส่วนที่ 2 (Content 2)</label>
            <textarea name="content_2"
                class="summernote form-control">{!! old('content_2', $service->content_2 ?? '') !!}</textarea>
        </div>

    </div>
    <div class="col-md-4">

        <div
            style="background: #f9fafb; padding: 20px; border-radius: 8px; border: 1px solid #eee; margin-bottom: 20px;">
            <h5
                style="margin-top: 0; margin-bottom: 15px; font-size: 16px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                <i class="fa fa-cog"></i> การตั้งค่า (Settings)
            </h5>
            <div class="form-group">
                <label class="form-label">สถานะ (Is Active)</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active', $service->is_active ?? 1) == 1 ? 'selected' : '' }}>🟢
                        เปิดใช้งาน
                    </option>
                    <option value="0" {{ old('is_active', $service->is_active ?? 1) == '0' ? 'selected' : '' }}>🔴
                        ปิดซ่อนไว้
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Schema Type</label>
                <input type="text" name="schema_type" class="form-control"
                    value="{{ old('schema_type', $service->schema_type ?? '') }}" placeholder="เช่น Service, Article">
            </div>
        </div>

        <div style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #eee; margin-bottom: 20px;">
            <h5 style="margin-top: 0; margin-bottom: 15px; font-size: 14px;"><i class="fa fa-star text-warning"></i>
                ระบบ Rating</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">คะแนน (เต็ม 5)</label>
                        <input type="number" step="0.1" max="5" min="0" name="rating_value" class="form-control"
                            value="{{ old('rating_value', $service->rating_value ?? '5.00') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">จำนวนคนรีวิว</label>
                        <input type="number" name="review_count" class="form-control"
                            value="{{ old('review_count', $service->review_count ?? '0') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">รูปภาพที่ 1 (Image 1)</label>
            <div class="image-preview-box" onclick="document.getElementById('imgInput1').click()"
                style="cursor: pointer; border: 2px dashed #ddd; border-radius: 8px; text-align: center; position: relative; min-height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; background-color: #f9fafb;">
                <input type="file" id="imgInput1" name="img_1" style="display:none" accept="image/*"
                    onchange="previewMultiImage(this, 'preview1', 'placeholder1')">
                <div id="placeholder1" class="upload-placeholder"
                    style="{{ isset($service) && $service->img_1 ? 'display:none' : '' }}">
                    <i class="fa fa-cloud-upload" style="font-size: 40px; color: #aaa;"></i><br>
                    <span style="color: #666;">คลิกเพื่ออัปโหลดรูป 1</span>
                </div>
                <img id="preview1"
                    src="{{ isset($service) && $service->img_1 ? Storage::disk('s3')->url($service->img_1) : '' }}"
                    style="max-width: 100%; max-height: 100%; object-fit: cover; display: {{ isset($service) && $service->img_1 ? 'block' : 'none' }};">
            </div>
            <input type="text" name="top_alt" class="form-control mt-2" placeholder="คำอธิบายรูป (Alt Text)"
                value="{{ old('top_alt', $service->top_alt ?? '') }}">
        </div>

        <div class="form-group mt-4">
            <label class="form-label">รูปภาพที่ 2 (Image 2)</label>
            <div class="image-preview-box" onclick="document.getElementById('imgInput2').click()"
                style="cursor: pointer; border: 2px dashed #ddd; border-radius: 8px; text-align: center; position: relative; min-height: 180px; display: flex; align-items: center; justify-content: center; overflow: hidden; background-color: #f9fafb;">
                <input type="file" id="imgInput2" name="img_2" style="display:none" accept="image/*"
                    onchange="previewMultiImage(this, 'preview2', 'placeholder2')">
                <div id="placeholder2" class="upload-placeholder"
                    style="{{ isset($service) && $service->img_2 ? 'display:none' : '' }}">
                    <i class="fa fa-cloud-upload" style="font-size: 40px; color: #aaa;"></i><br>
                    <span style="color: #666;">คลิกเพื่ออัปโหลดรูป 2</span>
                </div>
                <img id="preview2"
                    src="{{ isset($service) && $service->img_2 ? Storage::disk('s3')->url($service->img_2) : '' }}"
                    style="max-width: 100%; max-height: 100%; object-fit: cover; display: {{ isset($service) && $service->img_2 ? 'block' : 'none' }};">
            </div>
            <input type="text" name="bottom_alt" class="form-control mt-2" placeholder="คำอธิบายรูป (Alt Text)"
                value="{{ old('bottom_alt', $service->bottom_alt ?? '') }}">
        </div>

    </div>
</div> @push('scripts')
    <script>
        // ฟังก์ชันพรีวิวรูปภาพแบบรองรับหลายกล่อง
        function previewMultiImage(input, previewId, placeholderId) {
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);
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

        $(document).ready(function () {
            // ใช้ class .summernote เพื่อให้ทำงานได้ทั้ง content_1 และ content_2
            $('.summernote').summernote({
                placeholder: 'เขียนเนื้อหา...',
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
                ]
            });
        });
    </script>
@endpush