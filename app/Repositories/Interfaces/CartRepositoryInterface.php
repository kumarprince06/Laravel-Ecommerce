<?php

namespace App\Repositories\Interfaces;

interface CartRepositoryInterface
{
    public function createCart(array $data);
    public function findProductInCart($userId, $productId);
    public function getCartByUserId($userId);

    public function deleteCartItem($id);
}
