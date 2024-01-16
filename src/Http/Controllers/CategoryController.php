<?php

namespace marketplace\src\Http\Controllers;

use Illuminate\Http\Request;
use marketplace\src\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAllCategories();
        return CategoryResource::collection($categories);
    }

    public function show($categoryId)
    {
        $category = $this->categoryRepository->getCategoryById($categoryId);
        return new CategoryResource($category);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $result = $this->categoryRepository->searchCategories($keyword);
        return CategoryResource::collection($result);
    }

    public function categoryProducts($categoryId)
    {
        $products = $this->categoryRepository->getCategoryProducts($categoryId);
        return ProductResource::collection($products);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = $this->categoryRepository->createCategory($data);

        return new CategoryResource($category);
    }

    public function update(CategoryRequest $request, $categoryId)
    {
        $data = $request->validated();
        $category = $this->categoryRepository->updateCategory($categoryId, $data);

        return new CategoryResource($category);
    }

    public function destroy($categoryId)
    {
        $result = $this->categoryRepository->deleteCategory($categoryId);

        return response()->json(['success' => $result]);
    }
}
