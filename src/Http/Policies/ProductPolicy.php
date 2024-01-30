<?php

namespace Shab\Marketplace\Http\Policies;

use App\Models\User;
use Shab\Marketplace\Models\Product;

class ProductPolicy
{
    public function delete(User $user, Product $product)
    {
        return $user->id === $product->user_id;
    }
}
