<?php

namespace marketplace\src\Test;

use marketplace\src\Database\Factories\CategoryFactory;
use Tests\TestCase;
use marketplace\src\Database\Factories\ProductFactory;
use marketplace\src\Http\Services\ProductService;

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
    public function it_can_create_a_product_with_factory()
    {
        $product = ProductFactory::new()->create()->toArray();

        $productData = (new ProductService())->createProduct($product);

        $this->assertDatabaseHas('products', ['title' => $productData['title']]);
    }

    /** @test */
    public function it_can_update_a_product()
    {
        $category = CategoryFactory::new()->create();
        $product = ProductFactory::new()->create();

        $updatedData = [
            'title' => 'Updated Product',
            'price' => 150,
            'description' => 'This is an updated description.',
            'quantity' => 20,
            'is_available' => false,
            'category_id' => $category->id,
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
}
