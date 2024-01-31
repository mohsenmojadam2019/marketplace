<?php

namespace marketplace\src\Traits\Relations;

use Illuminate\Database\Eloquent\Relations\HasMany;
use marketplace\src\Models\Product;

trait CategoryRelationTrait
{
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
