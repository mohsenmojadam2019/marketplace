<?php

namespace Shab\Marketplace\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'is_available' => $this->is_available,
            'manufacturer' => $this->manufacturer,
            'weight' => $this->weight,
            'dimensions' => $this->dimensions,
            'shipping_cost' => $this->shipping_cost,
            'category' => CategoryResource::collection($this->whenLoaded('category')),
            'images' => $this->getMediaUrls(),
        ];
    }
}
