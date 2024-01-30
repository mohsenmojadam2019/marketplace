<?php
namespace marketplace\src\Contracts;

use marketplace\src\Models\Category;

interface CategoryInterface
{
    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Category[]
     */
    public function index();

    /**
     * Store a newly created category.
     *
     * @param array $data
     * @return Category
     */
    public function store(array $data);

    /**
     * Display the specified category.
     *
     * @param Category $category
     * @return Category
     */
    public function show(Category $category);

    /**
     * Update the specified category in storage.
     *
     * @param Category $category
     * @param array $data
     * @return Category
     */
    public function update(Category $category, array $data);

    /**
     * Remove the specified category from storage.
     *
     * @param Category $category
     * @return void
     */
    public function delete(Category $category);
}
