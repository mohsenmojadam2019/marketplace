<?php

namespace marketplace\src\Http\Services;

use marketplace\src\Models\Category;
use marketplace\src\Contracts\CategoryInterface;

class CategoryService implements CategoryInterface
{
    public function index()
    {
        return Category::with("products")->get();
    }

    public function store(array $data)
    {
        return Category::create($data);
    }

    public function show(Category $category)
    {
        return $category->load('products');
    }

    public function update(Category $category, array $data)
    {
        $category->fill($data);
        $category->save();

        return $category;
    }

    public function delete(Category $category)
    {
        $category->delete();
    }
}
