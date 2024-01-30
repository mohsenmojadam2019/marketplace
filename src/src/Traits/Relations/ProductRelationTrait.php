<?php

namespace marketplace\src\Traits\Relations;

use marketplace\src\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ProductRelationTrait
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
