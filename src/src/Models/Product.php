<?php

namespace marketplace\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use marketplace\src\Database\Factories\ProductFactory;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use marketplace\src\Traits\Relations\ProductRelationTrait;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;
    use ProductRelationTrait;

    protected $fillable = ["title", "price", "description", "quantity", "is_available", "shipping_cost"];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useDisk('public')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200);
    }

    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }
}
