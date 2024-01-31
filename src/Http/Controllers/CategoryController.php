<?php

namespace marketplace\src\Http\Controllers;

use App\Http\Resources\Api\V1\Dashboard\LicenseFormResource;
use Illuminate\Http\Request;
use marketplace\src\Http\Requests\CategoryRequest;
use marketplace\src\Models\Category;
use marketplace\src\Http\Services\CategoryService;
use marketplace\src\Http\Resources\CategoryResource;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->index();
        return $this->response(CategoryResource::collection($categories));
    }

    public function show(Category $category)
    {
        $category = $this->categoryService->show($category);
        $this->response(CategoryResource::make($category->load('products')));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = $this->categoryService->store($data);
        return $this->response(CategoryResource::make($category), Response::HTTP_ACCEPTED);
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $this->categoryService->update($category, $data);

        return $this->response(CategoryResource::make($category), Response::HTTP_OK);
    }

    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);
        return response()->json(['message' => 'Category deleted successfully', Response::HTTP_NO_CONTENT]);
    }
}
