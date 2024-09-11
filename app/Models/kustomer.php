<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kustomer extends Model
{
    protected $table = 'kustomer';
    protected $fillable = [
        'nama_pengirim',
        'email_pengirim',
        'nomor_telpon_pengirim',
        'nama_penerima',
        'nomor_telpon_penerima',
        'alamat_kirim',
        'alamat_tujuan',
    ];
    use HasFactory;
}
