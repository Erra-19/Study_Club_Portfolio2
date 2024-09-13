<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_category extends Model
{
    protected $fillable = [
        'category_name',
        'category_desc',
    ];
    public function items()
    {
        return $this->hasMany(items::class, 'category_id');
    }
    use HasFactory;
}