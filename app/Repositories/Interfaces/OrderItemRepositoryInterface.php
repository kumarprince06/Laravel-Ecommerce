<?php

namespace App\Repositories\Interfaces;


interface OrderItemRepositoryInterface
{
    public function createOrderItem(array $orderItemData);
    public function getOrderItemsByOrderId(int $orderId): array;
    public function updateOrderItem(int $orderItemId, array $orderItemData);
}
