<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StructuralPosition extends Model
{
    //
    protected $fillable = [
        'profile_id',
        'period',
        'position_name',
        'skpd',
    ];

    // Relasi ke Profile
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    // Accessor jika diperlukan
    public function getPeriodTextAttribute(): string
    {
        return "TMT: {$this->period}";
    }

    public function getSkpdTextAttribute(): string
    {
        return "SKPD: {$this->skpd}";
    }
}
