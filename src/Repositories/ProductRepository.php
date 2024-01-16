<?php
namespace marketplace\src\Repositories;

use marketplace\src\Contracts\ProductInterface;
use marketplace\src\Eloquent\Repository;
use marketplace\src\Models\Product;
use marketplace\src\Repositories\Interfaces\HelloRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductInterface
{

    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($productId)
    {
        return Product::findOrFail($productId);
    }

    public function searchProducts($keyword)
    {
        return Product::where('title', 'like', "%$keyword%")->get();
    }

    public function filterByMaxPrice($maxPrice)
    {
        return Product::where('price', '<=', $maxPrice)->get();
    }

    public function sortByMinPrice()
    {
        return Product::orderBy('price', 'asc')->get();
    }

    public function getUserProducts($userId)
    {
        return Product::where('user_id', $userId)->get();
    }

    public function storeProductImages($productId, $images)
    {
        $product = $this->getProductById($productId);

        foreach ($images as $image) {
            $product->addMedia($image)->toMediaCollection('images');
        }
    }

    public function updateProductImages($productId, $images)
    {
        $product = $this->getProductById($productId);

        $product->clearMediaCollection('images');

        foreach ($images as $image) {
            $product->addMedia($image)->toMediaCollection('images');
        }
    }

    public function deleteProduct($productId, $mediaId)
    {
        $product = $this->getProductById($productId);

        $product->media()->where('id', $mediaId)->delete();
    }
}
