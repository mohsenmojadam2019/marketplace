<?php

namespace marketplace\src\Test;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use marketplace\src\Enums\OrderEnum;
use marketplace\src\Notification\OrderNotification;
use Tests\TestCase;
use marketplace\src\Database\Factories\OrderFactory;
use marketplace\src\Http\Services\OrderService;

class OrderTest extends TestCase
{
    /** @test */
    public function testGetAllOrders()
    {
        OrderFactory::new()->count(5)->create();
        $orderService = new OrderService();

        $orders = $orderService->getAllOrders();

        $this->assertCount(5, $orders, 'Failed to retrieve all orders.');
    }

    /** @test */
    public function testCreateOrder()
    {
        $orderData = OrderFactory::new()->create()->toArray();

        $orderService = new OrderService();
        $orderService->createOrder($orderData);

        $this->assertDatabaseHas('orders', ['title' => $orderData['title']]);
    }


    /** @test */
    public function testUpdateOrder()
    {
        $order = OrderFactory::new()->create();

        $updatedData = [
            'title' => 'Updated Order',
            'delivery_type' => OrderEnum::Home_Delivery
        ];
        $orderService = new OrderService();

        $orderService->updateOrder($order, $updatedData);

        $this->assertDatabaseHas('orders', ['title' => 'Updated Order']);
    }

    /** @test */
    public function testDeleteOrder()
    {
        $order = OrderFactory::new()->create();
        $orderService = new OrderService();

        $deleted = $orderService->deleteOrder($order);

        $this->assertTrue($deleted);
        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
    }
}
