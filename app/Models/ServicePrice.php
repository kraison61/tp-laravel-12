<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    use HasFactory;

    // อนุญาตให้บันทึกข้อมูลเหล่านี้ลง DB ได้ (Mass Assignment)
    protected $fillable = [
        'service_id', 'name', 'spec_description', 'price_type',
        'price', 'max_price', 'discount_price', 'price_currency',
        'unit', 'unit_code', 'sort_order', 'is_active'
    ];

    // ผูกกลับไปหาตารางหลัก
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
