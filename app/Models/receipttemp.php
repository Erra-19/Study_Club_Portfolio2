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
    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id');
    }
    use HasFactory;
}
