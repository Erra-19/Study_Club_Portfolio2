<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resitemp extends Model
{
    protected $table = 'resitemp';
    protected $fillable = [
        'nomor_resi',
    ];
    protected $casts = [
        'nomor_resi' => 'string',
    ];
    use HasFactory;
}
