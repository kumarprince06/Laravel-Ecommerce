<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Services\Cart\CartServiceInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    protected $cartService;
    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
    }

    public function create(Request $request)
    {

        // Retrieve data from the request
        $userId = $request->input('user_id');
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Default to 1 if not provided

        // Check if the product already exists in the cart for this user
        $existingCartItem = $this->cartService->checkIfProductInCart($userId, $productId);

        if ($existingCartItem) {
            // If product is already in the cart, return a message or handle accordingly
            return redirect()->route('products.show', ['id' => $productId])->with('error', 'Product is already in your cart!');
        }

        $data = [
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity
        ];

        // dd($data);

        $this->cartService->createCart($data);

        return redirect()->route('cart.index', ['id' => $userId])->with('success', 'Product added to your cart successfully!');
    }

    public function index($userId)
    {
        // Retrieve cart data using CartService
        $cartItems = $this->cartService->getCartByUserId($userId);
        return view('cart.index', compact('cartItems'));
    }

    /**
     * Handle deleting a cart item.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $cartItemId = $request->input('cart_item_id');
        // dd($cartItemId);
        // Call the service to delete the cart item
        $deleted = $this->cartService->deleteCartItem($cartItemId);

        if ($deleted) {
            return redirect()->route('cart.index', ['id' => auth()->user()->id])->with('success', 'Item removed from the cart.');
        }

        return redirect()->route('cart.index', ['id' => auth()->user()->id])->with('error', 'Item not found.');
    }
}
