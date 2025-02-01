<?php

namespace App\Services\OrderItem;

use App\Repositories\Interfaces\OrderItemRepositoryInterface;

class OrderItemService implements OrderItemServiceInterface

{
    protected $orderItemRepository;

    public function __construct(OrderItemRepositoryInterface $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }

    public function createOrderItem(object $orderItemData, int $orderId)
    {

        foreach ($orderItemData as $orderItem) {
            $orderItemData = [
                'order_id'   => $orderId,
                'product_id' => $orderItem->product_id,
                'quantity'   => $orderItem->quantity,
                'price'      => $orderItem->product->sale_price, // Ensure product relation is loaded
            ];

            $this->orderItemRepository->createOrderItem($orderItemData);
        }
    }
}
