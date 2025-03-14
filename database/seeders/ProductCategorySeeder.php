<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'name' => 'Electronics',
            'description' => 'All electronic gadgets and devices.',
            'external_url' => 'electronics',
            'status' => true,
        ]);

        ProductCategory::create([
            'name' => 'Clothing',
            'description' => 'Men, women, and kids clothing.',
            'external_url' => 'clothing',
            'status' => true,
        ]);

        ProductCategory::create([
            'name' => 'Furniture',
            'description' => 'Home and office furniture.',
            'external_url' => 'furniture',
            'status' => false, // Inactive category
        ]);
    }
}
