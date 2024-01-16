<?php
namespace marketplace\src\Repositories;

use marketplace\src\Contracts\CategoryInterface;
use marketplace\src\Eloquent\Repository;
use marketplace\src\Repositories\Interfaces\HelloRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryInterface
{

    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function getAllCategories()
    {
        return Category::all();
    }

    public function getCategoryById($categoryId)
    {
        return Category::findOrFail($categoryId);
    }

    public function searchCategories($keyword)
    {
        return Category::where('name', 'like', "%$keyword%")->get();
    }

    public function getCategoryProducts($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return $category->products;
    }

    public function createCategory($data)
    {
        return Category::create($data);
    }

    public function updateCategory($categoryId, $data)
    {
        $category = Category::findOrFail($categoryId);
        $category->update($data);

        return $category;
    }

    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        return true;
    }
}
