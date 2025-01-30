@include('layouts.header')

<section class="product-details-section mt-5">
    <div class="container-fluid">
        <!-- Top Row with Back Button -->

        @if (session('error'))
            <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Product Details -->
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <!-- Product Image Gallery -->
                <div id="product-gallery" class="mb-2">
                    <div class="main-image d-flex justify-content-center align-items-center">
                        <img src="{{ $product->images->isNotEmpty() ? asset('storage/' . $product->images->first()->name) : asset('images/default-product.jpg') }}"
                            alt="{{ $product->name }}" class="img-fluid w-50 h-50" id="main-product-image">
                    </div>

                    <div class="thumbnails mt-2 d-flex justify-content-center align-items-center">
                        @if ($product->images->isNotEmpty())
                            @foreach ($product->images as $image)
                                <div class="thumbnail" style="margin-right: 10px;">
                                    <img src="{{ asset('storage/' . $image->name) }}" alt="{{ $product->name }}"
                                        class="img-thumbnail"
                                        style="cursor: pointer; width: 80px; height: 80px; object-fit: cover;"
                                        onclick="changeImage('{{ asset('storage/' . $image->name) }}')">
                                </div>
                            @endforeach
                        @else
                            <div class="thumbnail" style="margin-right: 10px;">
                                <img src="{{ asset('images/default-product.jpg') }}" alt="No Image Available"
                                    class="img-thumbnail"
                                    style="cursor: pointer; width: 80px; height: 80px; object-fit: cover;"
                                    onclick="changeImage('{{ asset('images/default-product.jpg') }}')">
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="col-lg-7 col-md-6">
                <!-- Product Info -->
                <div class="product-info">
                    <h3 class="product-name">{{ $product->name }}</h3>
                    <p class="brand">Brand: <strong>{{ $product->brand }}</strong></p>
                    <div class="rating mb-2">
                        <span class="text-warning">
                            <!-- Example: Show 4 stars -->
                            @for ($i = 0; $i < 4; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @for ($i = 0; $i < 1; $i++)
                                <i class="fas fa-star-half-alt"></i>
                            @endfor
                        </span>
                        <span>(4.5/5)</span>
                    </div>
                    <div class="price-section mb-3">
                        <p class="price">₹{{ $product->sale_price }}</p>
                        <p class="original-price text-muted"><del>₹{{ $product->base_price }}</del></p>
                    </div>

                    <div class="add-to-cart-section mb-3">
                        <form action="{{ route('cart.add') }}" method="POST" style="display:inline;">
                            @csrf
                            <!-- Hidden input fields for user_id and quantity -->
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="number" name="quantity" value="1" min="1"
                                class="form-control mt-2 mb-2" style="width: 60px; display:inline;">

                            <div class="product-availability mb-3">
                                @if ($product->stock > 0)
                                    <span class="badge bg-success">In Stock</span>
                                @else
                                    <span class="badge bg-danger">Out of Stock</span>
                                @endif
                            </div>
                            <button class="btn btn-success btn-lg w-100">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>

                    </div>
                    <!-- Product Description -->
                    <div class="product-description mt-4">
                        <h5>Description</h5>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>


        </div>
</section>
</main>

@include('admin.layouts.footer')

<script>
    // Function to change the main product image based on the thumbnail clicked
    function changeImage(imageUrl) {
        document.getElementById('main-product-image').src = imageUrl;
    }
</script>

@include('layouts.footer')
