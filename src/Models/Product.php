<?php

namespace Shab\Marketplace\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Shab\Marketplace\Database\Factories\ProductFactory;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $fillable = ["title", "price", "description", "quantity", "is_available", "manufacturer","weight","dimensions","shipping_cost"];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useDisk('public')
            ->singleFile();
    }
    public function category():Category
    {
        return $this->belongsTo(Category::class);
    }

    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }
}
