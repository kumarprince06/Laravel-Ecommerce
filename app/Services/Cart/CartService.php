<?php

namespace App\Services\Cart;

use App\Services\Cart\CartServiceInterface;
use App\Repositories\Interfaces\CartRepositoryInterface;

class CartService implements CartServiceInterface
{

    protected $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function createCart(array $data)
    {
        $this->cartRepository->createCart($data);
    }

    /**
     * Check if the product is already in the user's cart.
     */
    public function checkIfProductInCart($userId, $productId)
    {
        // Use the repository to find the product in the user's cart
        return $this->cartRepository->findProductInCart($userId, $productId);
    }

    public function getCartByUserId(int $userId)
    {
        return $this->cartRepository->getCartByUserId($userId);
    }

    /**
     * Delete the cart item by ID.
     *
     * @param int $cartItemId
     * @return bool
     */
    public function deleteCartItem($cartItemId)
    {
        return $this->cartRepository->deleteCartItem($cartItemId);
    }

    public function deleteCartByUserId($id)
    {
        return $this->cartRepository->deleteCartByUserId($id);
    }
}
