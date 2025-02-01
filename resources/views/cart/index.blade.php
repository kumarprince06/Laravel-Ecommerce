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
                                        alt="{{ $item->product->name }}" class="img-fluid w-50 h-50">
                                    <div class="mx-3">
                                        <h5>{{ $item->product->name }}</h5>
                                        <p>Brand: {{ $item->product->brand }}</p>
                                        <h5>₹ {{ number_format($item->product->sale_price, 2) }}</h5>
                                        <small class="badge bg-success">In Stock</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-between">
                                <!-- Quantity Update Form -->
                                <div class="d-flex align-items-center">
                                    {{-- <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}"
                                            class="btn btn-outline-secondary btn-sm"
                                            {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </form>
                                    <span class="mx-2">{{ $item->quantity }}</span>
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}"
                                            class="btn btn-outline-secondary btn-sm">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </form> --}}
                                </div>
                                <!-- Remove Item -->
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

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}


            <!-- Order Summary -->
            <div class="col-lg-4">
                @php
                    $deliveryCharge = $subtotal >= 500 ? 0 : 99;
                @endphp
                <div class="bg-light rounded-3 p-4 sticky-top mt-4">
                    <h6 class="mb-4">Order Summary</h6>
                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span><strong>₹ {{ number_format($subtotal, 2) }}</strong></span>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between">
                        <span>Delivery Charge</span>
                        <span><strong>₹ {{ number_format($deliveryCharge, 2) }}</strong></span>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between">
                        <span>Total</span>
                        <span><strong>₹ {{ number_format($subtotal + $deliveryCharge, 2) }}</strong></span>
                    </div>
                    <!-- Address Form -->
                    {{-- <h6 class="mt-4">Shipping Address</h6> --}}
                    <form action="{{ route('checkout.index') }}" method="POST">
                        @csrf

                        <div class="mb-1 mt-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- <div class="mb-1">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-control" value="{{ old('state') }}">
                            @error('state')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ old('country') }}">
                            @error('country')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Zip Code</label>
                            <input type="text" name="zip" class="form-control" value="{{ old('zip') }}">
                            @error('zip')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        <button class="btn btn-success w-100 mt-3">Proceed to Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

@include('layouts.footer')
