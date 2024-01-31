<?php

namespace marketplace\src\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use marketplace\src\Enums\OrderEnum;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'delivery_type' => OrderEnum::from($this->delivery_type)->text(),
            'total_price' => $this->total_price,
            'user_name' => $this->user->name,
            'product' => new ProductResource($this->whenLoaded('product')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
