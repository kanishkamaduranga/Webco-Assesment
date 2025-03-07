<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductColor;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductColor::create([
            'name' => 'Red',
            'description' => 'A vibrant red color',
            'hex_code' => '#FF0000',
        ]);

        ProductColor::create([
            'name' => 'Blue',
            'description' => 'A calming blue color',
            'hex_code' => '#0000FF',
        ]);

        ProductColor::create([
            'name' => 'Green',
            'description' => 'A natural green color',
            'hex_code' => '#00FF00',
        ]);
    }
}
