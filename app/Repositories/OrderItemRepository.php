<?php

namespace App\Repositories;

use App\Models\OrderItem;
use App\Repositories\Interfaces\OrderItemRepositoryInterface;

class OrderItemRepository implements OrderItemRepositoryInterface
{
    public function createOrderItem(array $orderItemData)
    {
        return OrderItem::create($orderItemData);
    }

    public function getOrderItemsByOrderId(int $orderId): array
    {
        return OrderItem::where('order_id', $orderId)->get()->toArray();
    }

    public function updateOrderItem(int $orderItemId, array $orderItemData)
    {
        $orderItem = OrderItem::findOrFail($orderItemId);
        $orderItem->update($orderItemData);
        return $orderItem;
    }
}
