<?php

namespace App\Services\OrderItem;

use Illuminate\Http\Request;

interface OrderItemServiceInterface
{
    public function createOrderItem(object $orderItemData, int $orderId);
}
