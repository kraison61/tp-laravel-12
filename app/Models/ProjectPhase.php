<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectPhase extends Model
{
    protected $fillable = ['project_id', 'phase_number', 'title', 'status'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // ดึงรูปภาพที่เกี่ยวข้องกับงวดงานนี้ (ตาม FK phase_id ใน SQL)
    public function images(): HasMany
    {
        return $this->hasMany(ImageUpload::class, 'phase_id');
    }
}
