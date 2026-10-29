<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormalEducation extends Model
{
    //
    protected $fillable = [
        'profile_id',
        'tmt',
        'degree',
        'institution',
    ];

    // Relasi ke Profile
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    // Accessor untuk tampilan lengkap
    public function getFullEducationAttribute(): string
    {
        return "{$this->degree} - {$this->institution} ({$this->tmt})";
    }
}
