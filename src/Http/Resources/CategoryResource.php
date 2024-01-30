<?php

namespace Shab\Marketplace\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
            'parent_id' => $this->parent_id,
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
