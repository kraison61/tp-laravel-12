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

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
