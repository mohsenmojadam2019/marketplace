<?php

namespace marketplace\src\Contracts;

use marketplace\src\Models\Order;

interface OrderInterface
{
    /**
     * Get all orders.
     *
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function getAllOrders();

    /**
     * Get the specified order.
     *
     * @param \marketplace\src\Models\Order $order
     * @return \marketplace\src\Models\Order
     */
    public function getOrder(Order $order);

    /**
     * Store a newly created order.
     *
     * @param array $data
     * @return \marketplace\src\Models\Order
     */
    public function createOrder(array $data);

    /**
     * Update the specified order.
     *
     * @param \marketplace\src\Models\Order $order
     * @param array $data
     * @return \marketplace\src\Models\Order
     */
    public function updateOrder(Order $order, array $data);

    /**
     * Delete the specified order.
     *
     * @param \marketplace\src\Models\Order $order
     * @return bool
     */
    public function deleteOrder(Order $order);
}