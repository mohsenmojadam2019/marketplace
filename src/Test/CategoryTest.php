<?php

namespace marketplace\src\Test;

use marketplace\src\Models\Category;
use Tests\TestCase;
use marketplace\src\Database\Factories\CategoryFactory;

class CategoryTest extends TestCase
{
    /** @test */
    public function it_can_create_a_category()
    {
        $category = CategoryFactory::new()->create();

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => $category->name,
        ]);

        $this->assertInstanceOf(Category::class, $category);
        $this->assertNotNull($category->id);
        $this->assertNotEmpty($category->name);
    }

    /** @test */
    public function it_can_update_a_category()
    {
        $category = CategoryFactory::new()->create();

        $newAttributes = [
            'name' => 'Updated Category Name',
        ];
        $category->update($newAttributes);

        $this->assertDatabaseHas('categories', $newAttributes);

        $this->assertEquals($newAttributes['name'], $category->fresh()->name);
    }

    /** @test */
    public function it_can_delete_a_category()
    {
        $category = CategoryFactory::new()->create();

        $category->delete();

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
