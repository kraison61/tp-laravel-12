<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaborCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'item_name',
        'unit',
        'cost_per_unit',
        'remark',
        'document_ref'
    ];

    // ความสัมพันธ์: ค่าแรงนี้ สังกัดอยู่ในหมวดหมู่ไหน (BelongsTo)
    public function category()
    {
        return $this->belongsTo(LaborCategory::class, 'category_id');
    }

    // Accessor สำหรับแสดงชื่อหมวดหมู่ในตาราง Admin
    public function getCategoryNameAttribute()
    {
        if ($this->category) {
            $name = $this->category->name;
            if ($this->category->parent) {
                $name = $this->category->parent->name . ' > ' . $name;
            }
            return $name;
        }
        return '-';
    }
}
