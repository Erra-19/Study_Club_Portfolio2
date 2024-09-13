<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = [
        'customer_id',
        'item_name',
        'category_id',
        'item_weight',
        'fragile',
    ];

    public function item_categories()
    {
        return $this->belongsTo(item_category::class, 'category_id');
    }
    use HasFactory;
}