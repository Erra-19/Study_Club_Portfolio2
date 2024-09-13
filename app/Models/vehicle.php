<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $fillable = [
        'vehicle_type',
        'police_number',            
    ];
    use HasFactory;
}
