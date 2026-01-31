<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ImageUpload;

class PhotoGallery extends Component
{
    public $perPage = 12; // เริ่มต้นแสดง 12 รูป

    // ฟังก์ชันนี้จะถูกเรียกเมื่อเลื่อนหน้าจอมาถึงจุดดักจับ
    public function loadMore()
    {
        $this->perPage += 12; // เพิ่มจำนวนที่จะแสดงครั้งละ 12 รูป
    }

    public function render()
    {
        // ดึงข้อมูลตามจำนวนที่กำหนด (ใช้ take เพื่อประสิทธิภาพ)
        $photos = ImageUpload::latest()->take($this->perPage)->get();
        
        return view('livewire.photo-gallery', [
            'photos' => $photos
        ]);
    }
}