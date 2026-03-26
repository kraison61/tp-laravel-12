<div class="row g-3">
    {{-- ชื่อหมวดหมู่ --}}
    <div class="col-md-6">
        <label class="form-label fw-bold">ชื่อหมวดหมู่</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $category->name) }}" required>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- เลือกหมวดหมู่หลัก (Parent) --}}
    <div class="col-md-6">
        <label class="form-label fw-bold">อยู่ภายใต้หมวดหมู่ (เว้นว่างถ้าเป็นหมวดหลัก)</label>
        <select name="parent_id" class="form-select">
            <option value="">-- เป็นหมวดหมู่หลัก --</option>
            @foreach($mainCategories as $main)
                <option value="{{ $main->id }}" {{ old('parent_id', $category->parent_id) == $main->id ? 'selected' : '' }}>
                    {{ $main->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>