<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ImageUpload;

class PhotoGallery extends Component
{
    public $serviceId = 'all';
    public $perPage = 6;

    // 1. รับค่า ID จาก URL ที่ส่งมาจากหน้าอื่น
    public function mount($id = null)
    {
        if ($id) {
            $this->serviceId = $id;
        }
    }

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function render()
    {
        // 2. สร้าง Query พื้นฐาน
        $query = ImageUpload::query();

        // 3. ถ้า $serviceId ไม่ใช่ 'all' ให้ดึงเฉพาะรูปที่มี service_id ตรงกัน
        if ($this->serviceId !== 'all') {
            $query->where('service_id', $this->serviceId);
        }

        $photos = $query->latest()->take($this->perPage)->get();

        return view('livewire.photo-gallery', [
            'photos' => $photos
        ]);
    }
}
