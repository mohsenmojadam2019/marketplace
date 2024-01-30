<?php

namespace marketplace\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use marketplace\src\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory,CategoryRelationTrait;

    protected $fillable = [
        'name'
    ];

    protected static function newFactory(): Factory
    {
        return CategoryFactory::new();
    }
}
