<?php

namespace App\Services\Orders;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\OrderItemRepositoryInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Repositories\Interfaces\AddressRepositoryInterface;
use App\Services\Orders\OrderServiceInterface;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderService implements OrderServiceInterface
{
    protected $orderRepository;
    protected $orderItemRepository;
    protected $transactionRepository;
    protected $addressRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        OrderItemRepositoryInterface $orderItemRepository,
        TransactionRepositoryInterface $transactionRepository,
        AddressRepositoryInterface $addressRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->transactionRepository = $transactionRepository;
        $this->addressRepository = $addressRepository;
    }

    public function createOrder(int $addressId, float $amount)
    {

        $orderData = [
            'user_id' => Auth()->user()->id,
            'address_id' => $addressId,
            'total_amount' => $amount / 100,
        ];
        return $this->orderRepository->createOrder($orderData);
    }

    public function createOrderFromCart(Request $request)
    {
        // Create order from the cart and payment logic
        // ...
    }
}
