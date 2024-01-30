<?php

namespace marketplace\src\Test;

use Tests\TestCase;
use marketplace\src\Database\Factories\OrderFactory;
use marketplace\src\Http\Services\OrderService;
use marketplace\src\Http\Resources\OrderResource;

class OrderTest extends TestCase
{
    /** @test */
    public function testGetAllOrders()
    {
        $products = OrderFactory::new()->count(5)->create();

        $orderService = new OrderService();

        $orders = $orderService->getAllOrders();

        $this->assertCount(5, $orders, 'Failed to retrieve all orders.');
    }

    /** @test */
    public function testCreateOrder()
    {
        $orderData = OrderFactory::new()->create();

        $orderService = new OrderService();
        $order = $orderService->createOrder($orderData);

        $this->assertInstanceOf(Order::class, $order, 'Failed to create order.');
        $this->assertEquals($orderData['title'], $order->title, 'Failed to set correct title for the order.');
        $this->assertDatabaseHas('orders', ['title' => $orderData['title']], 'Failed to save order in the database.');
    }

    /** @test */
    public function testUpdateOrder()
    {
        $products = OrderFactory::new()->create();
        $updatedData = ['title' => 'Updated Order'];
        $orderService = new OrderService();

        $updatedOrder = $orderService->updateOrder($order, $updatedData);

        $this->assertEquals('Updated Order', $updatedOrder->title, 'Failed to update order title.');
        $this->assertDatabaseHas('orders', ['title' => 'Updated Order'], 'Failed to update order in the database.');
    }

    /** @test */
    public function testDeleteOrder()
    {
        $products = OrderFactory::new()->create();
        $orderService = new OrderService();

        $deleted = $orderService->deleteOrder($order);

        $this->assertTrue($deleted, 'Failed to delete order.');
        $this->assertDatabaseMissing('orders', ['id' => $order->id], 'Failed to remove order from database.');
    }
}
