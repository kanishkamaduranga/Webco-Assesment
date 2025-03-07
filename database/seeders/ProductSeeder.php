<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = ProductCategory::first();
        $color = ProductColor::first();

        Product::create([
            'name' => 'Sample Product 1',
            'price' => 99.99,
            'description' => 'This is a sample product.',
            'status' => true,
            'product_category_id' => $category->id,
            'product_color_id' => $color->id,
        ]);

        Product::create([
            'name' => 'Sample Product 2',
            'price' => 149.99,
            'description' => 'Another sample product.',
            'status' => true,
            'product_category_id' => $category->id,
            'product_color_id' => $color->id,
        ]);
    }
}
