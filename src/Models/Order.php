<?php

namespace Shab\Marketplace\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Shab\Marketplace\Database\Factories\OrderFactory;


class Order extends Model
{
    use HasFactory;

    protected $fillable = ["title", "price", "product_id", "quantity", "shipping_address", "user_id","delivery_option","total_price"];

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
}
