<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    // Jika tidak menggunakan timestamps, hilangkan baris ini
    public $timestamps = true;

    // Tentukan kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'ip',
        'user_agent',
    ];
}
