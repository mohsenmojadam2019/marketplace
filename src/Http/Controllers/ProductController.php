<?php

namespace marketplace\src\Http\Controllers;

use Illuminate\Http\Request;
use marketplace\src\Http\Resources\ProductResource;
use marketplace\src\Models\Product;
use marketplace\src\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return ProductResource::collection($products);
    }

    public function show($productId)
    {
        $product = $this->productRepository->getProductById($productId);
        return new ProductResource($product);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $result = $this->productRepository->searchProducts($keyword);
        return ProductResource::collection($result);
    }

    public function filterByMaxPrice(Request $request)
    {
        $maxPrice = $request->input('max_price');
        $result = $this->productRepository->filterByMaxPrice($maxPrice);
        return ProductResource::collection($result);
    }

    public function sortByMinPrice()
    {
        $result = $this->productRepository->sortByMinPrice();
        return ProductResource::collection($result);
    }

    public function userProducts($userId)
    {
        $userProducts = $this->productRepository->getUserProducts($userId);
        return ProductResource::collection($userProducts);
    }


    public function store(ProductRequest $request, $productId)
    {
        $this->validateImages($request);

        $validatedData = $request->validated();

        $images = $request->file('images');
        $this->productRepository->storeProductImages($productId, $images);

        return response()->json(['message' => 'Images stored successfully']);
    }

    public function update(ProductRequest $request, $productId)
    {
        $this->validateImages($request);

        $validatedData = $request->validated();

        $images = $request->file('images');
        $this->productRepository->updateProductImages($productId, $images);

        return response()->json(['message' => 'Images updated successfully']);
    }


    public function delete($productId)
    {
        $product = $this->productRepository->getProductById($productId);

        $this->authorize('delete', $product);

        $this->productRepository->deleteProduct($productId);

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
