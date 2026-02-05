<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
