<div class="form-group">
    <label class="form-label">บริการที่เกี่ยวข้อง <span class="text-danger">*</span></label>
    <select name="service_id" class="form-control" required>
        <option value="">-- เลือกบริการ --</option>
        @foreach($serviceCategories as $serviceCategory)
            <option value="{{ $serviceCategory->id }}" {{ old('service_id', $faq->service_id ?? '') == $serviceCategory->id ? 'selected' : '' }}>
                {{ $serviceCategory->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label class="form-label">คำถาม (Question) <span class="text-danger">*</span></label>
    <textarea name="question" class="form-control" rows="3" required
        placeholder="เช่น ราคาค่าบริการเริ่มต้นที่เท่าไหร่?">{{ old('question', $faq->question ?? '') }}</textarea>
</div>

<div class="form-group">
    <label class="form-label">คำตอบ (Answer) <span class="text-danger">*</span></label>
    <textarea name="answer" class="form-control" rows="4" required
        placeholder="อธิบายคำตอบอย่างละเอียด...">{{ old('answer', $faq->answer ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">ลำดับการแสดงผล</label>
            <input type="number" name="sort_order" class="form-control" min="0"
                value="{{ old('sort_order', $faq->sort_order ?? 0) }}">
            <small class="text-muted">เลขน้อยจะแสดงก่อน</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">สถานะการแสดงผล</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ old('is_active', $faq->is_active ?? 1) == 1 ? 'selected' : '' }}>🟢 เปิดใช้งาน
                </option>
                <option value="0" {{ old('is_active', $faq->is_active ?? 1) == '0' ? 'selected' : '' }}>🔴 ปิดซ่อนไว้
                </option>
            </select>
        </div>
    </div>
</div>