<?php

namespace marketplace\src\Http\Policies;

use App\Models\User;
use marketplace\src\Models\Product;

class ProductPolicy
{
    public function delete(User $user, Product $product)
    {
        return $user->id === $product->user_id;
    }
}
