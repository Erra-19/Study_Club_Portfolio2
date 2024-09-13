<?php

namespace Database\Seeders;

use App\Models\Item_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item_categories = [
            [
                'category_name' => 'General',
                'category_desc' => 'General items, no special handling required',
            ],
            [
                'category_name' => 'Valuable',
                'category_desc' => 'High-value items, such as jewelry and important documents',
            ],
            [
                'category_name' => 'Hazardous',
                'category_desc' => 'Hazardous items like chemicals, gas, or flammable materials',
            ],
            [
                'category_name' => 'Fragile',
                'category_desc' => 'Easily damaged or breakable items',
            ],
            [
                'category_name' => 'Documents',
                'category_desc' => 'Letters or other general documents',
            ],
            [
                'category_name' => 'Electronics',
                'category_desc' => 'Electronic items like cameras, laptops, or mobile phones',
            ],
            [
                'category_name' => 'Frozen',
                'category_desc' => 'Frozen items that require fast shipping',
            ],
            [
                'category_name' => 'Medical',
                'category_desc' => 'Health-related items such as medicines or medical equipment',
            ],
            [
                'category_name' => 'Live Animals',
                'category_desc' => 'Animals shipped alive, requiring special care during shipment',
            ],
        ];        

        foreach ($item_categories as $categories) {
            Item_category::create($categories);
        }
    }
}
