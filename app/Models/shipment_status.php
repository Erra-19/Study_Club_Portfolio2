<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment_status extends Model
{
    protected $fillable = [
        'status_name',
        'status_desc',
    ];
    use HasFactory;
}
