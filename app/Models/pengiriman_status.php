<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman_status extends Model
{
    protected $table = 'pengiriman_status';
    protected $fillable = [
        'nama_status',
        'deskripsi_status',
    ];
    use HasFactory;
}
