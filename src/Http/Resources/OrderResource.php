<?php

namespace marketplace\src\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'shipping_address' => $this->shipping_address,
            'user_id' => $this->user->name,
            'product' => ProductResource::collection($this->whenLoaded('product')),
        ];
    }
}
