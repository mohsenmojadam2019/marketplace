<?php

namespace marketplace\src\Http\Resources;

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
            'category' => CategoryResource::collection($this->whenLoaded('category')),
            'images' => [
                'original' => $this->getFirstMediaUrl('images'),
                'thumb' => $this->getFirstMediaUrl('images', 'thumb'),
            ],
        ];
    }
}
