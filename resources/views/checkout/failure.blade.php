@include('layouts.header')

<div class="container text-center mt-5">
    <h1 class="text-danger">Payment Failed!</h1>
    <p>{{ $error }}</p>

    <!-- Display Failure GIF -->
    <img src="{{ asset('images/failure.gif') }}" alt="Failure GIF" class="img-fluid mb-4"
        style="width: 200px; height: auto;">

    <!-- Add spacing between the image and the button -->
    <div class="mt-2 mb-5">
        <!-- Button to retry payment -->
        {{-- <a href="{{ route('checkout.index') }}" class="btn btn-warning">Try Again</a> --}}
        <!-- Button to go back to cart -->
        <a href="{{ route('cart.index', ['id' => Auth()->user()->id]) }}" class="btn btn-success">Go to Cart</a>
    </div>
</div>

@include('layouts.footer')
