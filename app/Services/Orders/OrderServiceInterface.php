<?php

namespace App\Services\Orders;

use Illuminate\Http\Request;

interface OrderServiceInterface
{
    public function createOrder(int $addressId,  float $amount);
    public function createOrderFromCart(Request $request);
}
