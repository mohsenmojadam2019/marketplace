<?php

namespace marketplace\src\Traits\Relations;

use Illuminate\Database\Eloquent\Relations\HasMany;
use marketplace\src\Models\Category;
use marketplace\src\Models\Order;

trait UserRelationTrait
{
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
