<?php

namespace marketplace\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use marketplace\src\Database\Factories\OrderFactory;
use marketplace\src\Observers\OrderObserver;
use marketplace\src\Traits\Relations\OrderRelationTrait;

class Order extends Model
{
    use HasFactory, OrderRelationTrait;

    protected $fillable = ["title", "price", "product_id", "quantity", "user_id", "delivery_type", "total_price"];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory(): Factory
    {
        return OrderFactory::new();
    }

    protected static function booted()
    {
        static::observe(OrderObserver::class);
    }
}
