<div class="row">
    <div class="col-md-8">
        <div class="form-group" style="margin-bottom: 20px;">
            <label class="form-label">ชื่อผู้ใช้งาน (Name) <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control"
                value="{{ old('name', $user->name ?? '') }}" placeholder="เช่น วินัย ใจดี"
                required>
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label class="form-label">อีเมล (Email) <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control"
                value="{{ old('email', $user->email ?? '') }}" placeholder="เช่น example@email.com" required>
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label class="form-label">รหัสผ่าน (Password)
                @if(!isset($user->id))
                    <span class="text-danger">*</span>
                @endif
            </label>
            <input type="password" name="password" class="form-control"
                placeholder="{{ isset($user->id) ? 'เว้นว่างไว้หากไม่ต้องการเปลี่ยนรหัสผ่าน' : 'กำหนดรหัสผ่าน (อย่างน้อย 8 ตัวอักษร)' }}"
                {{ !isset($user->id) ? 'required' : '' }}>
        </div>
        
        <div class="form-group" style="margin-bottom: 20px;">
            <label class="form-label">เบอร์โทรศัพท์ (Phone)</label>
            <input type="text" name="phone" class="form-control"
                value="{{ old('phone', $user->phone ?? '') }}" placeholder="เช่น 0812345678">
        </div>
    </div>
    <div class="col-md-4">
        <div style="background: #f9fafb; padding: 20px; border-radius: 8px; border: 1px solid #eee;">
            <h5 style="margin-top: 0; margin-bottom: 15px; font-size: 16px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                <i class="fa fa-cog"></i> การตั้งค่า
            </h5>

            <div class="form-group">
                <label class="form-label">บทบาท (Role) <span class="text-danger">*</span></label>
                <select name="role" class="form-control" required>
                    <option value="user" {{ old('role', $user->role ?? 'user') == 'user' ? 'selected' : '' }}>
                        👤 ผู้ใช้งานทั่วไป (User)
                    </option>
                    <option value="admin" {{ old('role', $user->role ?? 'user') == 'admin' ? 'selected' : '' }}>
                        👑 ผู้ดูแลระบบ (Admin)
                    </option>
                </select>
                <small class="text-muted" style="display:block; margin-top:5px;">
                    * ผู้ดูแลระบบสามารถเข้าถึงหน้านี้และจัดการระบบได้
                </small>
            </div>
        </div>
    </div>
</div>
