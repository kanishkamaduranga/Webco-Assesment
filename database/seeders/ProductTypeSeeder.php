<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductType;
class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductType::create([
            'name' => 'Electronics',
            'api_unique_number' => 'ELEC123',
        ]);

        ProductType::create([
            'name' => 'Clothing',
            'api_unique_number' => 'CLOTH456',
        ]);

        ProductType::create([
            'name' => 'Furniture',
            'api_unique_number' => 'FURN789',
        ]);
    }
}
