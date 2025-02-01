@include('layouts.header')

<div class="container text-center mt-5">
    <h1 class="text-success">Payment Successful!</h1>
    <p>{{ $message }}</p>

    <!-- Display GIF -->
    <img src="{{ asset('images/success.gif') }}" alt="Success GIF" class="img-fluid mb-4"
        style="width: 200px; height: auto;">

    <!-- Add spacing between the image and the button -->
    <div class="mt-2 mb-5">
        <!-- Button to redirect to the order page -->
        <a href="{{ route('checkout.index') }}" class="btn btn-primary">Go to Your Orders</a>
    </div>
</div>

@include('layouts.footer')
