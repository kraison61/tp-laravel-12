<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaborCategory extends Model
{
    protected $fillable = ['name', 'parent_id'];

    // 🌟 1. สิ่งที่ต้องเพิ่ม: ความสัมพันธ์ 1 หมวดหมู่ มีหลายรายการค่าแรง (hasMany)
    // ฟังก์ชันนี้แหละครับที่จะไปแก้ Error ให้หายไป!
    public function costs()
    {
        return $this->hasMany(LaborCost::class, 'category_id');
    }

    // 🌟 2. สิ่งที่แนะนำให้เพิ่ม: ดึง "หมวดหมู่ย่อย" ทั้งหมดที่อยู่ใต้หมวดหมู่นี้
    public function children()
    {
        return $this->hasMany(LaborCategory::class, 'parent_id');
    }

    // --- (โค้ดเดิมของคุณ) ---
    // ความสัมพันธ์เดิม (ดึงหมวดหมู่หลัก)
    public function parent()
    {
        return $this->belongsTo(LaborCategory::class, 'parent_id');
    }

    // สร้าง Accessor เพื่อส่งชื่อ Parent ออกไป (Virtual Column)
    public function getParentNameAttribute()
    {
        // ถ้ามี parent ให้ส่งชื่อออกมา ถ้าไม่มีให้ส่งค่าว่าง หรือ 'หมวดหมู่หลัก'
        return $this->parent ? $this->parent->name : '-';
    }
}