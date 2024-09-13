<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipttemp extends Model
{
    protected $fillable = [
        'receipt_number',
    ];
    protected $casts = [
        'receipt_number' => 'string',
    ];
    use HasFactory;
}
