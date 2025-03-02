<!-- Includes Header -->
@include('layouts.header')

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <!-- iPhone 15 Pro -->
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" heigh="408px" src="https://my-apple.com.ua/image/catalog/products/iphone/iphone-15-pro-15-pro-max/blue-titanium-1.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>iPhone 15 Pro</b></h1>
                            <h3 class="h2">Experience the Future of Innovation</h3>
                            <p>
                                The iPhone 15 Pro sets a new standard with the powerful A17 chip, stunning titanium design, and unparalleled camera technology.
                                Pre-order now and redefine your smartphone experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Motorola Edge 50 Pro -->
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="https://motorolain.vtexassets.com/arquivos/ids/159178/motorola-edge-50-pro-PDP-ecomm-render-color5-5-.png?v=638614765175970000" alt="">
                    </div>
                    <div class=" col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success"><b>Motorola Edge 50 Pro</b></h1>
                            <h3 class="h2">A Leap Forward in Performance</h3>
                            <p>
                                Discover seamless multitasking and pro-level photography with the Motorola Edge 50 Pro.
                                Featuring an edge-to-edge display and lightning-fast processing.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Samsung S24 -->
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="https://media.croma.com/image/upload/v1705640288/Croma%20Assets/Communication/Mobiles/Images/303838_oqpio4.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success"><b>Samsung Galaxy S24 Ultra</b></h1>
                            <h3 class="h2">Unmatched Clarity, Performance, and Style</h3>
                            <p>
                                The Samsung Galaxy S24 Ultra brings an exceptional user experience with its vibrant display, powerful hardware, and cutting-edge features.
                                Elevate your mobile journey today.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->

<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Categories of The Month</h1>
            <p>
                Explore our exclusive categories this month. From the latest gadgets to stylish accessories, find everything you need.
            </p>
        </div>
    </div>
    <div class="row">
        <!-- iPhones Category -->
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="https://w7.pngwing.com/pngs/756/144/png-transparent-iphone-12.png" class="rounded-circle img-fluid border category_img" alt="iPhones"></a>
            <h5 class="text-center mt-3 mb-3">Mobiles</h5>
            <p class="text-center">
                <a href="{{ url('/productController') }}" class="btn btn-success">Go Shop</a>
            </p>
        </div>

        <!-- Laptops Category -->
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="https://e7.pngegg.com/pngimages/273/1018/png-clipart-laptop-dell-laptop-electronics-computer-thumbnail.png" class="rounded-circle img-fluid border category_img" alt="Laptops"></a>
            <h5 class="text-center mt-3 mb-3">Laptops</h5>
            <p class="text-center">
                <a href="{{ url('/productController') }}" class="btn btn-success">Go Shop</a>
            </p>
        </div>

        <!-- Watches Category -->
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="https://e7.pngegg.com/pngimages/504/311/png-clipart-apple-watch-series-2-apple-watch-series-3-smartwatch-black-smart-watch-black-hair-digital-thumbnail.png" class="rounded-circle img-fluid border category_img" alt="Watches"></a>
            <h5 class="text-center mt-3 mb-3">Watches</h5>
            <p class="text-center">
                <a href="{{ url('/productController') }}" class="btn btn-success">Go Shop</a>
            </p>
        </div>
    </div>
</section>

<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Featured Products</h1>
                <p>
                    Check out our top picks for this month! Discover high-quality products, from the latest gadgets to stylish accessories.
                </p>
            </div>
        </div>
        <div class="row">
            <?php
            // Shuffle the products array to randomize order
            // $shuffledProducts = $data['products'];
            // shuffle($shuffledProducts);

            // Take only the first 3 products
            // $randomProducts = array_slice($shuffledProducts, 0, 3);
            ?>

            <?php //foreach ($randomProducts as $product): 
            ?>
            <div class="col-12 col-md-4 mb-4 bg-light rounded">
                <div class="card h-100">
                    <a href="{{ url('/productController/show/') }}">
                        <img src="{{ url('/public/images/products/' ) }} ?>"
                            class="card-img-top"
                            alt="">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">
                                ₹0.0
                            </li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">
                            Product Name
                        </a>
                        <p class="text-muted">Reviews (200)</p>
                    </div>
                </div>
            </div>
            <?php //endforeach; 
            ?>
        </div>

    </div>
</section>
<!-- End Featured Product -->


<!-- Includes Footer -->
@include('layouts.footer')