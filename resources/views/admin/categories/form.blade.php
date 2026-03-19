<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label class="form-label">ชื่อหมวดหมู่บริการ (Category Name) <span class="text-danger">*</span></label>
            <input type="text" name="name" id="nameInput" class="form-control"
                value="{{ old('name', $category->name ?? '') }}" placeholder="เช่น งานเทปูน, งานต่อเติมหลังคา..."
                required>
        </div>

        <div class="form-group">
            <label class="form-label">ลิงก์ URL (Slug) <span class="text-danger">*</span></label>
            <input type="text" name="slug" id="slugInput" class="form-control"
                value="{{ old('slug', $category->slug ?? '') }}" placeholder="เช่น concrete-work" required>
            <!-- <small class="text-muted">ระบบจะสร้างให้อัตโนมัติจากชื่อหมวดหมู่ แต่สามารถแก้ไขเองได้</small> -->
        </div>
    </div>
    <div class="col-md-4">
        <div style="background: #f9fafb; padding: 20px; border-radius: 8px; border: 1px solid #eee;">
            <h5
                style="margin-top: 0; margin-bottom: 15px; font-size: 16px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                <i class="fa fa-cog"></i> การตั้งค่า
            </h5>

            <div class="form-group">
                <label class="form-label">สถานะการแสดงผล</label>
                <select name="status" class="form-control">
                    <option value="1" {{ old('status', $category->status ?? 1) == 1 ? 'selected' : '' }}>
                        🟢 เปิดใช้งาน (Active)
                    </option>
                    <option value="0" {{ old('status', $category->status ?? 1) == '0' ? 'selected' : '' }}>
                        🔴 ปิดซ่อนไว้ (Inactive)
                    </option>
                </select>
            </div>
        </div>
    </div>
</div> @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nameInput = document.getElementById('nameInput');
            const slugInput = document.getElementById('slugInput');

            // ฟังก์ชันแปลงข้อความไทย/อังกฤษ เป็น Slug
            function generateSlug(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')           // เปลี่ยนช่องว่างเป็น -
                    .replace(/[^\w\-]+/g, '')       // ลบอักขระพิเศษ (แต่ยังเก็บภาษาไทยไว้เพราะไม่ได้อยู่ใน \w)
                    .replace(/\-\-+/g, '-')         // เปลี่ยน - ที่ติดกันหลายตัวให้เหลือตัวเดียว
                    .replace(/^-+/, '')             // ลบ - ออกจากจุดเริ่มต้น
                    .replace(/-+$/, '');            // ลบ - ออกจากจุดสิ้นสุด
            }

            // เมื่อพิมพ์ชื่อหมวดหมู่ ให้ไปอัปเดตช่อง Slug ด้วย (เฉพาะกรณีที่เพิ่งสร้างใหม่)
            // ถ้าเป็นหน้า Edit (มีค่า Slug เดิมอยู่แล้ว) เราจะไม่ไปยุ่งกับมัน เผื่อกระทบ SEO
            @if(!isset($category->id))
                nameInput.addEventListener('keyup', function () {
                    slugInput.value = generateSlug(this.value);
                });
            @endif
                });
    </script>
@endpush