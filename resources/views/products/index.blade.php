@include('layouts.header')

<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <h1 class="h2 pb-4">Categories</h1>
            <ul class="list-unstyled templatemo-accordion">
                <!-- Electronics Category -->
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Electronics
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul class="collapse show list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">Mobiles</a></li>
                        <li><a class="text-decoration-none" href="#">Laptops</a></li>
                        <li><a class="text-decoration-none" href="#">Tablets</a></li>
                        <li><a class="text-decoration-none" href="#">Watches</a></li>
                    </ul>
                </li>

                <!-- Brands Category -->
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Brands
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">Apple</a></li>
                        <li><a class="text-decoration-none" href="#">Samsung</a></li>
                        <li><a class="text-decoration-none" href="#">Motorola</a></li>
                        <li><a class="text-decoration-none" href="#">Realme</a></li>
                        <li><a class="text-decoration-none" href="#">Redmi</a></li>
                        <li><a class="text-decoration-none" href="#">Vivo</a></li>
                        <li><a class="text-decoration-none" href="#">Oppo</a></li>
                        <li><a class="text-decoration-none" href="#">Oneplus</a></li>
                    </ul>
                </li>

                <!-- Accessories Category -->
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Accessories
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseThree" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">Headphones</a></li>
                        <li><a class="text-decoration-none" href="#">Chargers</a></li>
                        <li><a class="text-decoration-none" href="#">Power Banks</a></li>
                        <li><a class="text-decoration-none" href="#">Phone Cases</a></li>
                    </ul>
                </li>

                <!-- New Arrivals Category -->
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        New Arrivals
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseFour" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">New Mobiles</a></li>
                        <li><a class="text-decoration-none" href="#">New Laptops</a></li>
                        <li><a class="text-decoration-none" href="#">New Watches</a></li>
                    </ul>
                </li>

                <!-- Sale Category -->
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Sale
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseFive" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="#">Mobiles</a></li>
                        <li><a class="text-decoration-none" href="#">Laptops</a></li>
                        <li><a class="text-decoration-none" href="#">Accessories</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">Digital</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none" href="#">Physical</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control">
                            <option>Featured</option>
                            <option>A to Z</option>
                            <option>Low to High</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded">
                            <div class="card rounded">
                                <img class="card-img rounded-0 img-fluid"
                                    src="{{ asset('storage/' . $product->images->first()->name) }}" alt="Product Image"
                                    height="100" width="100">
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a class="btn btn-success text-white mt-2"
                                                href="{{ route('products.show', $product->id) }}">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </li>

                                        {{-- @if (session('sessionData')['role'] == 'admin')
                                            <li>
                                                <a class="btn btn-success text-white mt-2"
                                                    href="{{ route('products.edit', $product->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger text-white mt-2" type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this product?');">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </li> --}}
                                        @if ($product->stock > 0)
                                            <li>
                                                <form action="{{ route('wishlist.add', $product->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    <button class="btn btn-success text-white mt-2"><i
                                                            class="far fa-heart"></i></button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('cart.add') }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    <!-- Hidden input fields for user_id and quantity -->
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product->id }}">
                                                    <input type="hidden" name="user_id"
                                                        value="{{ auth()->user()->id }}">
                                                    <input type="number" hidden name="quantity" value="1"
                                                        min="1" class="form-control mt-2"
                                                        style="width: 60px; display:inline;">

                                                    <!-- Cart button -->
                                                    <button class="btn btn-success text-white mt-2">
                                                        <i class="fas fa-cart-plus"></i>
                                                    </button>
                                                </form>

                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="card-body">
                                {{-- <a href="{{ route('products.show', $product->id) }}"
                                    class="h3 text-decoration-none">{{ $product->name }}</a> --}}
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="pt-2">
                                        <span
                                            class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span
                                            class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span
                                            class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>

                                <!-- Price Details -->
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted"><del>₹
                                            {{ number_format($product->base_price, 2) }}</del></span>
                                    <span class="text-success h4">₹
                                        {{ number_format($product->sale_price, 2) }}</span>
                                </div>

                                <!-- Discount and Stock Info -->
                                <div class="d-flex justify-content-between mt-2">
                                    <!-- Discount with red background -->
                                    <span class="badge bg-danger text-white">
                                        {{ round((($product->base_price - $product->sale_price) / $product->base_price) * 100) }}%
                                        Off
                                    </span>

                                    <!-- Stock with green background -->
                                    @php
                                        if ($product->stock >= 15) {
                                            $badgeClass = 'bg-success';
                                            $badgeText = $product->stock;
                                        } elseif ($product->stock >= 5) {
                                            $badgeClass = 'bg-danger';
                                            $badgeText = 'Only ' . $product->stock . ' items left';
                                        } else {
                                            $badgeClass = 'bg-danger';
                                            $badgeText = 'Out of stock';
                                        }
                                    @endphp
                                    <span class="badge {{ $badgeClass }} text-white">{{ $badgeText }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
