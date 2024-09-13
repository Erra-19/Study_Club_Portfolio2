<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment extends Model
{
    protected $table = 'shipment';
    protected $fillable = [        
        'id_resi',
        'id_staff',
        'id_kustomer',
        'id_barang',        
        'id_status',
    ];
    use HasFactory;
}
