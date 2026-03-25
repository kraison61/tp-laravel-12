<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price extends Model
{
    use HasFactory;

    // ระบุชื่อตาราง (ใส่ไว้เพื่อความชัวร์ แม้ Laravel จะเดาได้ว่าคือ prices)
    protected $table = 'prices';

    // ฟิลด์ที่อนุญาตให้บันทึกข้อมูลได้ (Mass Assignment)
    protected $fillable = [
        'service_id',
        'sku',
        'name',
        'description',
        'price',
        'max_price',
        'sale_price',
        'price_type',
        'unit_text',
        'currency',
        'price_valid_until',
        'availability',
        'url',
        'sort_order',
        'is_active',
    ];

    // แปลงชนิดข้อมูลอัตโนมัติ (Casting) เพื่อให้เรียกใช้งานง่ายขึ้น
    protected $casts = [
        'price' => 'decimal:2',
        'max_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'is_active' => 'boolean',
        'price_valid_until' => 'date', // แปลงเป็น Carbon instance เพื่อใช้จัดรูปแบบวันที่ได้ง่าย
    ];

    /**
     * ความสัมพันธ์: ราคา 1 รายการ เป็นของ 1 บริการ
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_id');
    }

}
