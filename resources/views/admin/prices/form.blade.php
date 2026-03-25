<div class="row">
    <div class="col-md-8">

        <h5 style="font-size: 16px; margin-bottom: 15px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
            <i class="fa fa-info-circle"></i> ข้อมูลแพ็กเกจ
        </h5>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">บริการที่เกี่ยวข้อง (Service) <span class="text-danger">*</span></label>
                    <select name="service_id" class="form-control" required>
                        <option value="">-- เลือกบริการ --</option>

                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id', $price->service_id ?? '') == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">รหัสแพ็กเกจ (SKU) <small class="text-muted">(สำหรับ SEO)</small></label>
                    <input type="text" name="sku" class="form-control" value="{{ old('sku', $price->sku ?? '') }}"
                        placeholder="เช่น PKG-001">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">ชื่อแพ็กเกจราคา <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $price->name ?? '') }}"
                placeholder="เช่น บริการมาตรฐาน, ทำความสะอาด 1 ครั้ง" required>
        </div>

        <div class="form-group">
            <label class="form-label">รายละเอียดแพ็กเกจ (Description)</label>
            <textarea name="description" class="form-control" rows="3"
                placeholder="อธิบายเงื่อนไขของราคานี้...">{{ old('description', $price->description ?? '') }}</textarea>
        </div>

        <h5
            style="font-size: 16px; margin-top: 30px; margin-bottom: 15px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
            <i class="fa fa-money"></i> โครงสร้างราคา
        </h5>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">ประเภทราคา <span class="text-danger">*</span></label>
                    <select name="price_type" id="priceTypeSelector" class="form-control" required>
                        <option value="exact" {{ old('price_type', $price->price_type ?? '') == 'exact' ? 'selected' : '' }}>ราคาคงที่ (Exact)</option>
                        <option value="starting" {{ old('price_type', $price->price_type ?? '') == 'starting' ? 'selected' : '' }}>ราคาเริ่มต้น (Starting)</option>
                        <option value="range" {{ old('price_type', $price->price_type ?? '') == 'range' ? 'selected' : '' }}>ช่วงราคา (Range)</option>
                        <option value="variable" {{ old('price_type', $price->price_type ?? '') == 'variable' ? 'selected' : '' }}>ตามตกลง (Variable)</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">สกุลเงิน</label>
                    <input type="text" name="currency" class="form-control"
                        value="{{ old('currency', $price->currency ?? 'THB') }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">หน่วยวัด (Unit)</label>
                    <input type="text" name="unit_text" class="form-control"
                        value="{{ old('unit_text', $price->unit_text ?? '') }}" placeholder="เช่น /ตร.ม., /เดือน">
                </div>
            </div>
        </div>

        <div class="row"
            style="background: #fdfdfd; padding: 15px 0; border: 1px dashed #ccc; border-radius: 8px; margin: 0;">
            <div class="col-md-4">
                <div class="form-group mb-0">
                    <label class="form-label">ราคาปกติ / เริ่มต้น <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="price" class="form-control"
                        value="{{ old('price', $price->price ?? '') }}" required>
                </div>
            </div>

            <div class="col-md-4" id="maxPriceContainer">
                <div class="form-group mb-0">
                    <label class="form-label">ราคาสูงสุด (Max Price)</label>
                    <input type="number" step="0.01" name="max_price" id="maxPriceInput" class="form-control"
                        value="{{ old('max_price', $price->max_price ?? '') }}" placeholder="สำหรับช่วงราคา">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-0">
                    <label class="form-label text-success">ราคาโปรโมชั่น (ลดเหลือ)</label>
                    <input type="number" step="0.01" name="sale_price" class="form-control"
                        value="{{ old('sale_price', $price->sale_price ?? '') }}">
                </div>
            </div>
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
                <label class="form-label">สถานะการแสดงผล</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active', $price->is_active ?? 1) == 1 ? 'selected' : '' }}>🟢 เปิดใช้งาน
                    </option>
                    <option value="0" {{ old('is_active', $price->is_active ?? 1) == '0' ? 'selected' : '' }}>🔴
                        ปิดซ่อนไว้</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">ลำดับการแสดงผล (Sort Order)</label>
                <input type="number" name="sort_order" class="form-control"
                    value="{{ old('sort_order', $price->sort_order ?? 0) }}">
                <small class="text-muted">เลขน้อยจะแสดงก่อน</small>
            </div>
        </div>

        <div
            style="background: #f0f8ff; padding: 20px; border-radius: 8px; border: 1px solid #cce5ff; margin-bottom: 20px;">
            <h5
                style="margin-top: 0; margin-bottom: 15px; font-size: 16px; border-bottom: 1px solid #b8daff; padding-bottom: 10px; color: #004085;">
                <i class="fa fa-google"></i> ข้อมูล SEO (Schema.org)
            </h5>

            <div class="form-group">
                <label class="form-label">สถานะสินค้า (Availability)</label>
                <select name="availability" class="form-control">
                    <option value="https://schema.org/InStock" {{ old('availability', $price->availability ?? '') == 'https://schema.org/InStock' ? 'selected' : '' }}>พร้อมให้บริการ (In Stock)</option>
                    <option value="https://schema.org/OutOfStock" {{ old('availability', $price->availability ?? '') == 'https://schema.org/OutOfStock' ? 'selected' : '' }}>งดให้บริการชั่วคราว (Out of Stock)
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">วันสิ้นสุดราคา (Valid Until)</label>
                <input type="date" name="price_valid_until" class="form-control"
                    value="{{ old('price_valid_until', $price->price_valid_until ?? '') }}">
                <small class="text-muted">ปล่อยว่างได้หากไม่มีวันหมดอายุ</small>
            </div>

            <div class="form-group">
                <label class="form-label">ลิงก์จองบริการนี้โดยตรง (URL)</label>
                <input type="url" name="url" class="form-control" value="{{ old('url', $price->url ?? '') }}"
                    placeholder="https://...">
            </div>
        </div>

    </div>
</div> @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const priceTypeSelector = document.getElementById('priceTypeSelector');
            const maxPriceContainer = document.getElementById('maxPriceContainer');
            const maxPriceInput = document.getElementById('maxPriceInput');

            // ฟังก์ชันตรวจสอบและซ่อน/แสดง
            function toggleMaxPrice() {
                if (priceTypeSelector.value === 'range') {
                    // ถ้าเป็นช่วงราคา ให้แสดงช่องราคาสูงสุดและบังคับกรอก
                    maxPriceContainer.style.opacity = '1';
                    maxPriceInput.removeAttribute('disabled');
                } else {
                    // ถ้าเป็นแบบอื่น ให้ซ่อน ล้างค่า และปิดการใช้งานไม่ให้ส่งค่าไปหลังบ้าน
                    maxPriceContainer.style.opacity = '0.4';
                    maxPriceInput.setAttribute('disabled', 'disabled');
                    maxPriceInput.value = '';
                }
            }

            // สั่งทำงานครั้งแรกเมื่อโหลดหน้า (เผื่อหน้า Edit)
            toggleMaxPrice();

            // สั่งทำงานทุกครั้งที่มีการเปลี่ยนค่า Dropdown
            priceTypeSelector.addEventListener('change', toggleMaxPrice);
        });
    </script>
@endpush