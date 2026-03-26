<div class="row g-3">
    {{-- เลือกหมวดหมู่ย่อย --}}
    <div class="col-md-6">
        <label class="form-label fw-bold">หมวดหมู่งาน (ย่อย) <span class="text-danger">*</span></label>
        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
            <option value="">-- เลือกหมวดหมู่งาน --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $laborCost->category_id) == $cat->id ? 'selected' : '' }}>
                    {{ $cat->parent->name ?? 'หมวดหมู่หลัก' }} > {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- ชื่อรายการ --}}
    <div class="col-md-6">
        <label class="form-label fw-bold">ชื่อรายการค่าแรง <span class="text-danger">*</span></label>
        <input type="text" name="item_name" class="form-control @error('item_name') is-invalid @enderror"
            value="{{ old('item_name', $laborCost->item_name) }}" placeholder="เช่น เสาเข็ม คร. 4 นิ้ว" required>
        @error('item_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- ค่าแรงต่อหน่วย --}}
    <div class="col-md-4">
        <label class="form-label fw-bold">ค่าแรงต่อหน่วย (บาท) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" name="cost_per_unit" class="form-control @error('cost_per_unit') is-invalid @enderror"
            value="{{ old('cost_per_unit', $laborCost->cost_per_unit) }}" placeholder="0.00" required>
        @error('cost_per_unit') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- หน่วย --}}
    <div class="col-md-4">
        <label class="form-label fw-bold">หน่วย <span class="text-danger">*</span></label>
        <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror"
            value="{{ old('unit', $laborCost->unit) }}" placeholder="เช่น ตร.ม., ต้น, ตัน" required>
        @error('unit') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- เอกสารอ้างอิง --}}
    <div class="col-md-4">
        <label class="form-label fw-bold">เอกสารอ้างอิง</label>
        <input type="text" name="document_ref" class="form-control @error('document_ref') is-invalid @enderror"
            value="{{ old('document_ref', $laborCost->document_ref ?? 'ว 809') }}">
        @error('document_ref') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- หมายเหตุ --}}
    <div class="col-12 mt-3">
        <label class="form-label fw-bold">หมายเหตุ (ถ้ามี)</label>
        <textarea name="remark" class="form-control @error('remark') is-invalid @enderror"
            rows="2" placeholder="รายละเอียดเพิ่มเติม...">{{ old('remark', $laborCost->remark) }}</textarea>
        @error('remark') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>