<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NonFormalEducation extends Model
{
    //
    protected $fillable = [
        'profile_id',
        'tmt',
        'name',
    ];

    // Relasi ke Profile
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    // Accessor untuk tampilan lengkap
    public function getFullEducationAttribute(): string
    {
        return "TMT {$this->tmt} - {$this->name}";
    }
}
