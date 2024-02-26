<?php

namespace marketplace\src\Http\Controllers;

use Illuminate\Http\Request;
use marketplace\src\Http\Resources\OrderResource;
use marketplace\src\Models\Order;
use marketplace\src\Http\Requests\OrderRequest;
use marketplace\src\Http\Requests\OrderListRequest;
use marketplace\src\Notification\OrderNotification;
use Symfony\Component\HttpFoundation\Response;
use marketplace\src\Http\Services\OrderService;


class OrderController extends Controller
{

    public function __construct(protected OrderService $orderService)
    {
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();
        return response(OrderResource::collection($orders));
    }

    public function show(Order $order)
    {
        return response(OrderResource::make($order));
    }

    public function store(OrderRequest $request)
    {
        $validatedData = $request->validated();
        $order = $this->orderService->createOrder($validatedData);
        return response(OrderResource::make($order), Response::HTTP_CREATED);
    }

    public function update(OrderRequest $request, Order $order)
    {
        $validatedData = $request->validated();
        $this->orderService->updateOrder($order, $validatedData);
        return response(OrderResource::make($order), Response::HTTP_OK);
    }

    public function destroy(Order $order)
    {
        if ($this->orderService->deleteOrder($order)) {
            return response()->json(['message' => 'Order deleted successfully'], Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Failed to delete order'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
