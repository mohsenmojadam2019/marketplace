<?php

namespace marketplace\src\Test;

use Tests\TestCase;
use marketplace\src\Database\Factories\ProductFactory;
use marketplace\src\Http\Services\ProductService;
use marketplace\src\Http\Resources\ProductResource;

class ProductTest extends TestCase
{

    /** @test */
    public function it_can_get_all_products()
    {
        $products = ProductFactory::new()->count(5)->create();

        $response = (new ProductService())->getAllProducts($this->createMock(\Illuminate\Http\Request::class));

        $this->assertCount(5, $response);
    }

    /** @test */
    public function it_can_get_a_specific_product()
    {
        $product = ProductFactory::new()->create();

        $retrievedProduct = (new ProductService())->getProduct($product);

        $this->assertEquals($product->id, $retrievedProduct->id);
    }

    /** @test */
    /** @test */
    public function it_can_create_a_product_with_factory()
    {
        $product = ProductFactory::new()->create();

        $createdProduct = (new ProductService())->createProduct($product);

        $this->assertDatabaseHas('products', ['title' => $productData['title']]);
    }

    /** @test */
    public function it_can_update_a_product()
    {
        $product = ProductFactory::new()->create();

        $updatedData = [
            'title' => 'Updated Product',
            'price' => 150,
            'description' => 'This is an updated description.',
            'quantity' => 20,
            'is_available' => false,
            'shipping_cost' => 10.5,
            'category_id' => 2,
        ];


        $updatedProduct = (new ProductService())->updateProduct($product, $updatedData);

        $this->assertEquals('Updated Product', $updatedProduct->fresh()->title);
    }

    /** @test */
    public function it_can_delete_a_product()
    {
        $product = ProductFactory::new()->create();

        (new ProductService())->deleteProduct($product);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    /** @test */
    public function it_returns_correct_product_resource_structure()
    {
        $product = ProductFactory::new()->create();

        $productResource = new ProductResource($product);

        $expectedStructure = [
            'id',
            'title',
            'price',
            'description',
            'quantity',
            'is_available',
            'shipping_cost',
            'category',
            'images' => [
                'original',
                'thumb',
            ],
        ];

        $this->assertEquals($expectedStructure, array_keys($productResource->toArray($this->createMock(\Illuminate\Http\Request::class))));
    }
}
