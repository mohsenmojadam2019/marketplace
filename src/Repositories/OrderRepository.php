<?php
namespace marketplace\src\Repositories;

use marketplace\src\Contracts\OrderInterface;
use marketplace\src\Eloquent\Repository;
use marketplace\src\Models\Order;
use marketplace\src\Repositories\Interfaces\HelloRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderInterface
{
    public function __construct(Order $order)
    {
        parent::__construct($order);
    }

    public function getAllOrders()
    {
        return Order::all();
    }

    public function createOrder($data)
    {
        return Order::create($data);
    }

    public function deleteOrder($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->delete();

        return true;
    }
}
