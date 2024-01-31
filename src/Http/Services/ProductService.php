<?php

namespace marketplace\src\Http\Services;

use Illuminate\Http\Request;
use marketplace\src\Contracts\ProductInterface;
use marketplace\src\Models\Product;


class ProductService implements ProductInterface
{
    public function getAllProducts(Request $request)
    {
        $products = Product::query();

        if ($request->has('search')) {
            $products->where('title', 'like', '%' . $request->input("search") . '%');
        }

        if ($request->has('max_price')) {
            $products->where('price', '<=', $request->input("max_price"));
        }

        if ($request->has('sort_by') && in_array($request->input("sort_by"), ['price', '-price'])) {
            $sortDirection = $request->input("sort_by") == 'price' ? 'asc' : 'desc';
            $products->orderBy('price', $sortDirection);
        }

        return $products->paginate(10);
    }

    public function getProduct(Product $product)
    {
        return $product;
    }

    public function createProduct(array $data)
    {
        $product = Product::create($data);
        if (isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $product->addMedia($image)->toMediaCollection('images');
            }
        }
        return $product;
    }

    public function updateProduct(Product $product, array $data)
    {
        $product->update($data);
        if (isset($data['images'])) {
            $product->clearMediaCollection('images');
            foreach ($data['images'] as $image) {
                $product->addMedia($image)->toMediaCollection('images');
            }
        }
        return $product;
    }

    public function deleteProduct(Product $product)
    {
       return $product->delete();
    }
}
