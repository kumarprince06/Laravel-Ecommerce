<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Services\Address\AddressServiceInterface;
use App\Services\Cart\CartServiceInterface;
use App\Services\OrderItem\OrderItemServiceInterface;
use App\Services\Orders\OrderServiceInterface;
use App\Services\Transaction\TransactionServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Session;
use Stripe\Checkout\Session as StripeSession;

class StripePaymentController extends Controller
{

    protected $cartService;
    protected $addressService;
    protected $orderService;
    protected $transactionService;
    protected $orderItemService;

    public function __construct(
        CartServiceInterface $cartService,
        AddressServiceInterface $addressService,
        OrderServiceInterface $orderService,
        OrderItemServiceInterface $orderItemService,
        TransactionServiceInterface $transactionService

    ) {
        $this->addressService = $addressService;
        $this->cartService = $cartService;
        $this->orderService = $orderService;
        $this->transactionService = $transactionService;
        $this->orderItemService = $orderItemService;
    }

    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Retrieve cart items with the product relationship loaded
        $cart = $this->cartService->getCartByUserId(Auth()->user()->id)->load('product.images');

        // dd($cart);


        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty!');
        }

        // dd($request->all());
        // Validate address details
        $phone = $request->validate([
            'phone'  => 'required|numeric|min:10',
        ]);


        $phone = $request->only(['phone',]);


        // Format cart items for Stripe
        $lineItems = array_map(function ($item) {
            // dd($item); // Debugging each item
            $imageUrl = !empty($item['product']['images']) && count($item['product']['images']) > 0
                ? asset('storage/' . $item['product']['images'][0]['name'])  // Accessing the first image's 'name' field
                : asset('images/default-product.jpg');  // Default image if no product images exist

            return [
                'price_data' => [
                    'currency'     => 'inr',
                    'product_data' => [
                        'name' => $item['product']['name'], // Access product's name from the array
                        // 'images' => [$imageUrl],
                    ],
                    // 'image' => $imageUrl,
                    'unit_amount'  => $item['product']['sale_price'] * 100, // Access sale price from the array and convert to cents
                ],
                'quantity' => $item['quantity'], // Cart quantity
            ];
        }, $cart->toArray()); // Convert Eloquent Collection to array


        try {
            // Create Stripe checkout session
            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items'           => $lineItems,
                'mode'                 => 'payment',
                'customer_email'       => Auth()->user()->email,
                'metadata'             => [
                    'name'    => Auth()->user()->name, // Pass customer name in metadata
                    'phone'   => $phone['phone'], // Pass customer phone in metadata
                ],
                'shipping_address_collection' => true,
                'billing_address_collection' => 'required', // Collect billing address
                'shipping_address_collection' => [
                    'allowed_countries' => ['IN'], // Define allowed shipping countries (you can change this)
                ],
                'success_url'          => route('checkout.success'),
                'cancel_url'           => route('checkout.cancel'),
            ]);

            // Store session ID to track payment status
            session()->put('stripe_session_id', $session->id);

            return redirect($session->url);
        } catch (\Exception $e) {
            return back()->with('error', 'Stripe Error: ' . $e->getMessage());
        }
    }

    public function success()
    {

        // Ensure Stripe API key is set
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Check if Stripe session ID exists in session
        if (!session()->has('stripe_session_id')) {
            return redirect()->route('cart.index')->with('error', 'Invalid payment session.');
        }

        $sessionId = session()->get('stripe_session_id');
        $sessionData = StripeSession::retrieve($sessionId);

        // dd($sessionData);

        $recipientAddress = $this->addressService->createAddress($sessionData->shipping_details, $sessionData->metadata->phone);

        // dd($recipientAddress);

        $order = $this->orderService->createOrder($recipientAddress->id, $sessionData->amount_total);

        // dd($order);

        // Retrieve cart items with the product relationship loaded
        $cart = $this->cartService->getCartByUserId(Auth()->user()->id)->load('product.images');

        $this->orderItemService->createOrderItem($cart, $order->id);

        $this->transactionService->createTransaction($sessionData, $order->id);


        //  Delete all cart items for the user
        $this->cartService->deleteCartByUserId(Auth()->user()->id);


        // Clear cart after successful payment
        session()->forget(['cart', 'stripe_session_id']);

        return view('checkout.success')->with('message', 'Payment Successful! Thank you for your order.');
    }

    public function cancel()
    {
        return redirect()->route('cart.index')->with('error', 'Payment Cancelled!');
    }
}
