<?php

namespace marketplace\src\Http\Services;

use Illuminate\Support\Facades\DB;
use marketplace\src\Enums\OrderEnum;
use marketplace\src\Models\Order;

class OrderService
{
    const DELIVERY_COST = 1000;

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
        $data = $this->checkHomeDelivery($data);
        return Order::create($data);
    }

    public function updateOrder(Order $order, array $data)
    {
        $data = $this->checkHomeDelivery($data);

        return $order->update($data);
    }

    public function deleteOrder(Order $order)

    {
        return $order->delete();
    }

    public function checkHomeDelivery(array $data): array
    {
        if ($data['delivery_type'] == OrderEnum::Home_Delivery->value) {
            $data['total_price'] = $data['total_price'] + self::DELIVERY_COST;
        }
        return $data;
    }
}
