<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = [
    'service_category_id',
    'title',
    'description',
    'h1',
    'top_1',
    'top_2',
    'content_1',
    'content_2',
    'img_1',
    'img_2',
    'top_alt',
    'bottom_alt',
    'is_active',
    'schema_type'
    ];

    public function category()
    {
    return $this->belongsTo(ServiceCategory::class,'service_category_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(ImageUpload::class,'service_id','id');
    }
    public function prices()
    {
        return $this->hasMany(ServicePrice::class)->where('is_active', true)->orderBy('sort_order');
    }

    // ดึงข้อมูลผลงาน
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class)->orderBy('completion_date', 'desc');
    }
}
