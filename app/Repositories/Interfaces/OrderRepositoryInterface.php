<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    public function createOrder(array $orderData);
    public function getOrderById(int $orderId);
    public function updateOrder(int $orderId, array $orderData);
}
