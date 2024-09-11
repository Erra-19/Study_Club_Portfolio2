<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_barang extends Model
{
    protected $table = 'jenis_barang';
    protected $fillable = [
        'jenis_barang',
        'deskripsi_jenis_barang',
    ];
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'id_jenis_barang');
    }
    use HasFactory;
}
