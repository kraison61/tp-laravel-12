<div class="form-group">
    <label class="form-label">ชื่อลูกค้า <span class="text-danger">*</span></label>
    <input type="text" name="customer_name" class="form-control" required
        value="{{ old('customer_name', $review->customer_name ?? '') }}"
        placeholder="เช่น คุณสมชาย ใจดี">
</div>

<div class="form-group">
    <label class="form-label">คะแนนความพึงพอใจ <span class="text-danger">*</span></label>
    <select name="rating" class="form-control" required>
        @foreach([5 => '⭐⭐⭐⭐⭐ ดีมาก', 4 => '⭐⭐⭐⭐ ดี', 3 => '⭐⭐⭐ ปานกลาง', 2 => '⭐⭐ พอใช้', 1 => '⭐ ควรปรับปรุง'] as $val => $label)
            <option value="{{ $val }}" {{ old('rating', $review->rating ?? 5) == $val ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label class="form-label">ความคิดเห็น (Comment)</label>
    <textarea name="comment" class="form-control" rows="4"
        placeholder="รีวิวจากลูกค้า...">{{ old('comment', $review->comment ?? '') }}</textarea>
</div>

<div class="form-group">
    <label class="form-label">รูปภาพ (ลูกค้าหรือผลงาน)</label>

    {{-- แสดงรูปปัจจุบันเมื่อแก้ไข --}}
    @if($review->exists && $review->image)
        <div style="margin-bottom: 10px;">
            <img src="{{ Storage::disk('s3')->url($review->image) }}"
                 alt="รูปรีวิว" style="max-height: 80px; border-radius: 4px; border: 1px solid #ddd;">
            <small class="text-muted" style="display:block; margin-top: 4px;">อัปโหลดไฟล์ใหม่เพื่อเปลี่ยนรูป</small>
        </div>
    @endif

    <input type="file" name="image" class="form-control" accept="image/*">
    <small class="text-muted">ไฟล์ภาพ JPG/PNG ไม่เกิน 2MB — บันทึกบน Cloudflare Storage</small>
</div>

<div class="form-group">
    <label class="form-label">สถานะการแสดงผล</label>
    <select name="is_active" class="form-control">
        <option value="1" {{ old('is_active', $review->is_active ?? 1) == 1 ? 'selected' : '' }}>🟢 เปิดใช้งาน</option>
        <option value="0" {{ old('is_active', $review->is_active ?? 1) == '0' ? 'selected' : '' }}>🔴 ปิดซ่อนไว้</option>
    </select>
</div>
