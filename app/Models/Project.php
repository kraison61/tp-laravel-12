<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'status',
        'slug'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function phases(): HasMany
    {
        // เรียงตามเลขงวดงาน (phase_number) ตามโครงสร้าง table
        return $this->hasMany(ProjectPhase::class)->orderBy('phase_number', 'asc');
    }
    public function getUserNameAttribute()
    {
        // คืนค่าชื่อจากความสัมพันธ์ user (ถ้าไม่มีให้แสดง 'ไม่ระบุ')
        return $this->user ? $this->user->name : 'ไม่ระบุ';
    }
}
