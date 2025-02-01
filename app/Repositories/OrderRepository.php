<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function createOrder(array $orderData)
    {
        return Order::create($orderData);
    }

    public function getOrderById(int $orderId)
    {
        return Order::findOrFail($orderId);
    }

    public function updateOrder(int $orderId, array $orderData)
    {
        $order = Order::findOrFail($orderId);
        $order->update($orderData);
        return $order;
    }
}
