@include('layouts.header')

<div class="container py-1">

    <!-- Success and Error Alerts -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-5 text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-5 text-center" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="mt-5">Cart List</h1>
    @if ($cartItems->isEmpty())
        <div class="text-center py-2 border rounded mb-5">
            <img class="img-fluid w-25" src="{{ asset('images/empty-cart.gif') }}" alt="empty cart logo">
            <p class="text-dark fw-bold">Your cart is currently empty. Start shopping now!</p>
            <a href="{{ route('products.index') }}">
                <button class="btn btn-primary mb-2">See What’s Trending</button>
            </a>
        </div>
    @else
        @php
            $subtotal = 0;
            $deliveryCharge = 0;
        @endphp
        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8">
                @foreach ($cartItems as $item)
                    @php
                        $subtotal += $item->product->sale_price * $item->quantity;
                    @endphp
                    <hr />
                    <div class="cart-item py-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <img src="{{ $item->product->images->isNotEmpty() ? asset('storage/' . $item->product->images->first()->name) : asset('images/default-product.jpg') }}"
                                        alt="{{ $item->product->name }}" class="img-fluid w-50 h-50"
                                        id="main-product-image">
                                    <div class="mx-3">
                                        <h5>{{ $item->product->name }}</h5>
                                        <p>Brand: {{ $item->product->brand }}</p>
                                        <h5>₹ {{ $item->product->sale_price }}</h5>
                                        <small class="badge bg-success">In Stock</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-between">
                                <div>
                                    {{-- <form action="{{ route('cart.index', $item->product_id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-secondary btn-sm">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </form>
                                    <span>{{ $item->quantity }}</span>
                                    <form action="{{ route('cart.index', $item->product_id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-secondary btn-sm">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </form> --}}
                                </div>
                                <form action="{{ route('cart.delete') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm" aria-label="Remove">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <hr>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                @if ($subtotal >= 500)
                    @php $deliveryCharge = 99; @endphp
                @endif
                <div class="bg-light rounded-3 p-4 sticky-top mt-4">
                    <h6 class="mb-4">Order Summary</h6>
                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span><strong>₹ {{ $subtotal }}</strong></span>
                    </div>
                    <hr />
                    @if ($subtotal <= 500)
                        <div class="d-flex justify-content-between">
                            <span>Delivery Charge</span>
                            <span><strong>₹ {{ $deliveryCharge }}</strong></span>
                        </div>
                        <hr />
                    @else
                        <div class="d-flex justify-content-between">
                            <span>Delivery Charge</span>
                            <span><strong>₹ 0</strong></span>
                        </div>
                        <hr />
                    @endif
                    <div class="d-flex justify-content-between">
                        <span>Total</span>
                        <span><strong>₹ {{ $subtotal + $deliveryCharge }}</strong></span>
                    </div>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <button class="btn btn-success w-100 mt-4">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

@include('layouts.footer')
