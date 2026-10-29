<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PejabatStruktural extends Model
{
    //
    use HasFactory;
    // add fillable
    protected $table = 'pejabat_strukturals';
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
