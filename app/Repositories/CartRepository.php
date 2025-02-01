<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Repositories\Interfaces\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface
{
    public function createCart(array $data)
    {
        return Cart::create($data);
    }

    /**
     * Find a product in the user's cart.
     */
    public function findProductInCart($userId, $productId)
    {
        return Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
    }

    public function getCartByUserId($userId)
    {
        // Retrieve all cart items for a user
        return Cart::where('user_id', $userId)->with('product')->get();
    }

    /**
     * Find a cart item by ID.
     *
     * @param int $id
     * @return Cart|null
     */
    public function findCartItemById($id)
    {
        return Cart::find($id);
    }

    /**
     * Delete a cart item.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCartItem($id)
    {
        $cartItem = $this->findCartItemById($id);

        if ($cartItem) {
            return $cartItem->delete();
        }

        return false;
    }

    public function deleteCartByUserId($id)
    {
        return Cart::where('user_id', $id)->delete();
    }
}
