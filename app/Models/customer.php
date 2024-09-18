<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'sender_name',
        'sender_email',
        'sender_phone_number',
        'receiver_name',
        'receiver_phone_number',
        'address_from',
        'address_to',
        'status',
    ];
    use HasFactory;
}