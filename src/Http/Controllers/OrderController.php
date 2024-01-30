<?php

namespace Shab\Marketplace\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getAllOrders();
        return OrderResource::collection($orders);
    }

    public function store(OrderRequest $request)
    {
        $data = $request->validated();
        $order = $this->orderRepository->createOrder($data);

        // You may want to send an email to the admin here

        return new OrderResource($order);
    }

    public function destroy($orderId)
    {
        $result = $this->orderRepository->deleteOrder($orderId);

        return response()->json(['success' => $result]);
    }
}
