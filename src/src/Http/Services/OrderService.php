<?php

namespace marketplace\src\Http\Services;

use marketplace\src\Enums\OrderEnum;

class OrderService
{
    const DELIVERY_COST = 100000;

    public function getAllOrders()
    {
        return Order::paginate(10);
    }

    public function getOrder(Order $order)
    {
        return $order;
    }

    public function createOrder(array $data)
    {
        $order = Order::create($data);

        if ($data['delivery_type'] === OrderEnum::Home_Delivery) {
            $order->update(['total_price' => $order->total_price + self::DELIVERY_COST]);
        }

        return $order;
    }

    public function updateOrder(Order $order, array $data)
    {
        $order->update($data);
        return $order;
    }

    public function deleteOrder(Order $order)
    {
        return $order->delete();
    }
}
