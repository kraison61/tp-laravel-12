<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaborCategory extends Model
{
    protected $fillable = ['name', 'parent_id'];

    // ความสัมพันธ์เดิม
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