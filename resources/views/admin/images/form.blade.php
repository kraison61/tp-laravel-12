<div class="row">
    <div class="col-md-6 form-group" style="margin-bottom: 20px;">
        <label class="form-label text-bold">หมวดหมู่บริการ (Service Category) <span class="text-danger">*</span></label>
        <select name="service_id" class="form-control" required style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ddd;">
            <option value="" disabled selected>-- เลือกหมวดหมู่บริการ --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('service_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 form-group" style="margin-bottom: 20px;">
        <label class="form-label text-bold">งวดงานโปรเจกต์ (Phase) <span class="text-muted" style="font-weight:normal;">(ถ้ามี)</span></label>
        <select name="phase_id" class="form-control" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ddd;">
            <option value="">-- ไม่ระบุงวดงาน (ภาพทั่วไป) --</option>
            @if(isset($phases) && count($phases) > 0)
                @foreach($phases as $phase)
                    <option value="{{ $phase->id }}" {{ old('phase_id') == $phase->id ? 'selected' : '' }}>
                        {{ optional($phase->project)->name }} - งวดที่ {{ $phase->phase_number }} ({{ $phase->title }})
                    </option>
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="form-group" style="margin-bottom: 20px;">
    <label class="form-label text-bold">สถานที่ปฏิบัติงาน (Location) <span class="text-danger">*</span></label>
    <input type="text" name="location" class="form-control" placeholder="เช่น บ้านเดี่ยว นนทบุรี, ซอยไทรม้า 19" value="{{ old('location') }}" required style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ddd;">
    <small class="text-muted" style="display:block; margin-top:5px; color:#6b7280;">สถานที่นี้จะถูกบันทึกให้กับทุกรูปภาพที่คุณอัปโหลดในครั้งนี้</small>
</div>

<div class="form-group" style="margin-bottom: 20px;">
    <label class="form-label text-bold">เลือกรูปภาพ <span class="text-danger">*</span></label>
    <div style="border: 2px dashed #cbd5e1; padding: 40px 20px; border-radius: 10px; text-align: center; background: #f8fafc; cursor: pointer; transition: all 0.3s ease;" onclick="document.getElementById('photos').click();" id="dropzoneArea" onmouseover="this.style.borderColor='#3b82f6'; this.style.background='#eff6ff';" onmouseout="this.style.borderColor='#cbd5e1'; this.style.background='#f8fafc';">
        <i class="fa fa-cloud-upload" style="font-size: 48px; color: #94a3b8; margin-bottom: 15px; display: block;"></i>
        <p style="margin: 0; color: #475569; font-size: 16px; font-weight: bold;">คลิกเพื่อเลือกไฟล์ หรือ ลากไฟล์มาวางที่นี่</p>
        <p style="margin: 5px 0 0 0; color: #94a3b8; font-size: 14px;">รองรับ jpg, jpeg, png (เลือกได้หลายไฟล์พร้อมกัน)</p>
        <input type="file" name="photos[]" id="photos" multiple accept="image/*" style="display: none;" onchange="updateFileList(this)" required>
    </div>
    
    <!-- แสดงรายชื่อไฟล์ที่เลือก -->
    <div id="fileListPreview" style="margin-top: 15px;">
        <!-- รายการไฟล์ที่ถูกเลือกจะแสดงตรงนี้ -->
    </div>
</div>

<script>
function updateFileList(input) {
    const fileListPreview = document.getElementById('fileListPreview');
    fileListPreview.innerHTML = '';
    
    if (input.files && input.files.length > 0) {
        document.getElementById('dropzoneArea').style.borderColor = '#10b981';
        document.getElementById('dropzoneArea').style.background = '#ecfdf5';
        
        let fileCountLabel = document.createElement('div');
        fileCountLabel.style.width = '100%';
        fileCountLabel.style.marginBottom = '10px';
        fileCountLabel.style.color = '#047857';
        fileCountLabel.style.fontWeight = 'bold';
        fileCountLabel.innerHTML = '<i class="fa fa-check-circle"></i> เลือกแล้ว ' + input.files.length + ' ไฟล์';
        fileListPreview.appendChild(fileCountLabel);
        
        // แสดงรายชื่อไฟล์
        let nameList = document.createElement('ul');
        nameList.style.paddingLeft = '20px';
        nameList.style.margin = '0';
        nameList.style.fontSize = '14px';
        nameList.style.color = '#475569';
        
        // โชว์แค่ 5 ไฟล์แรก ป้องกันลิสต์ยาวเกิน
        const maxDisplay = 5;
        for (let i = 0; i < Math.min(input.files.length, maxDisplay); i++) {
            let li = document.createElement('li');
            li.textContent = input.files[i].name;
            nameList.appendChild(li);
        }
        
        if(input.files.length > maxDisplay) {
            let li = document.createElement('li');
            li.textContent = '...และอีก ' + (input.files.length - maxDisplay) + ' ไฟล์';
            li.style.fontStyle = 'italic';
            nameList.appendChild(li);
        }
        
        fileListPreview.appendChild(nameList);
    } else {
        // หากยกเลิกการเลือก
        document.getElementById('dropzoneArea').style.borderColor = '#cbd5e1';
        document.getElementById('dropzoneArea').style.background = '#f8fafc';
    }
}
</script>