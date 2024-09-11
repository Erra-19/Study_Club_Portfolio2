<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barang';
    protected $fillable = [
        'id_kustomer',
        'nama_barang',
        'id_jenis_barang',
        'berat_barang',
        'mudah_pecah',
    ];

    public function jenis_barang()
    {
        return $this->belongsTo(Jenis_barang::class, 'id_jenis_barang');
    }
    use HasFactory;
}
