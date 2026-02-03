<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    //
    protected $fillable = ['name','slug'];

    function services(){
        return $this->hasMany(Service::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function blogs(){
        return $this->hasMany(Blog::class,'service_id');
    }
}
