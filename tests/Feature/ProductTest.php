<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;

class ProductTest extends TestCase
{

    use RefreshDatabase;

    public function test_product_can_be_created(): void
    {
        // Create a category and color
        $category = ProductCategory::factory()->create();
        $color = ProductColor::factory()->create();

        $product = Product::factory()->create([
            'product_category_id' => $category->id,
            'product_color_id' => $color->id,
        ]);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => $product->name,
            'product_category_id' => $category->id,
            'product_color_id' => $color->id,
        ]);
    }

    public function test_product_requires_name()
    {
        // Attempt to create a product without a name
        $response = $this->post(route('products.store'), [
            'price' => 100,
            'description' => 'Test product',
            'status' => true,
            'product_category_id' => 1,
            'product_color_id' => 1,
        ]);

        // Assert that the response contains a validation error for the name field
        $response->assertSessionHasErrors('name');
    }

    public function test_product_belongs_to_category_and_color()
    {
        // Create a ProductCategory and ProductColor
        $category = ProductCategory::factory()->create();
        $color = ProductColor::factory()->create();

        // Create a Product
        $product = Product::factory()->create([
            'product_category_id' => $category->id,
            'product_color_id' => $color->id,
        ]);

        // Assert the product belongs to the category and color
        $this->assertEquals($category->id, $product->category->id);
        $this->assertEquals($color->id, $product->color->id);
    }
}
