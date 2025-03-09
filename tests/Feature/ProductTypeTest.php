<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ProductType;
use App\Models\TypeAssignment;

class ProductTypeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_product_type_can_be_created()
    {
        // Create a ProductType
        $productType = ProductType::factory()->create();

        // Assert the product type exists in the database
        $this->assertDatabaseHas('product_types', [
            'id' => $productType->id,
            'name' => $productType->name,
        ]);
    }

    public function test_product_type_requires_name()
    {
        // Attempt to create a product type without a name
        $response = $this->post(route('product-types.store'), [
            'api_unique_number' => '12345',
        ]);

        // Assert that the response contains a validation error for the name field
        $response->assertSessionHasErrors('name');
    }

    public function test_product_type_has_type_assignments()
    {
        // Create a ProductType
        $productType = ProductType::factory()->create();

        // Create a TypeAssignment for the ProductType
        $typeAssignment = TypeAssignment::factory()->create([
            'type_id' => $productType->id,
        ]);

        // Assert the ProductType has the TypeAssignment
        $this->assertTrue($productType->typeAssignments->contains($typeAssignment));
    }

}
