<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'service_category_id',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id', 'id');
    }

    public function prices()
    {
        // เชื่อมโยงไปที่ตาราง Price โดยใช้ service_id เป็นตัวเชื่อม
        return $this->hasMany(Price::class, 'service_id', 'service_category_id');
    }
}
