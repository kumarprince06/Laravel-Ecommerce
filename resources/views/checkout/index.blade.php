     <div class="container text-center mt-5">
        <h1 class="text-success">Payment Successful!</h1>
        <p>Thank you for your order. Your payment has been processed successfully.</p>
        
        <!-- Display GIF -->
        <img src="{{ asset('images/success.gif') }}" alt="Success GIF" class="img-fluid mb-4" style="width: 200px; height: auto;">
        
        <!-- Button to redirect to the order page -->
        <a href="{{ route('order.index') }}" class="btn btn-primary">Go to Your Orders</a>
    </div>