<?php

namespace marketplace\src\Http\Controllers;

use Illuminate\Http\Request;
use marketplace\src\Http\Resources\ProductResource;
use marketplace\src\Models\Product;
use marketplace\src\Http\Requests\ProductRequest;
use marketplace\src\Http\Requests\ProductListRequest;
use Symfony\Component\HttpFoundation\Response;
use marketplace\src\Http\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(ProductListRequest $request, ProductService $productService)
    {
        $products = $productService->getAllProducts($request);
        return $this->response(ProductResource::collection($products));
    }

    public function show(Product $product)
    {
        $product = $this->productService->getProduct($product);
        $this->response(ProductResource::make($product));
    }

    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();
        $product = $this->productService->createProduct($validatedData);
        return $this->response(ProductResource::make($product), Response::HTTP_ACCEPTED);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $product = $this->productService->updateProduct($product, $validatedData);
        return $this->response(ProductResource::make($product), Response::HTTP_OK);
    }

    public function destroy(Product $product)
    {
        if ($this->productService->deleteProduct($product)) {
            return response()->json(['message' => 'Product deleted successfully'], Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Failed to delete product'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
