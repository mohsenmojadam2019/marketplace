<?php

namespace marketplace\src\Traits\Relations;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use marketplace\src\Models\Product;
use marketplace\src\Models\User;

trait OrderRelationTrait
{
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
