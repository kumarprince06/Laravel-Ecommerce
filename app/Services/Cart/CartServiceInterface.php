<?php

namespace App\Services\Cart;

interface CartServiceInterface
{
    // public function getAllCategories();

    public function getCartByUserId(int $userid);

    public function createCart(array $data);

    public function checkIfProductInCart($userId, $productId);

    // public function getUserCart($userId);

    // public function updateCart(int $id, array $data);

    public function deleteCartItem(int $cartItemId);

    // public function getAllCartPaginatedById($perPage, $userId);
}
