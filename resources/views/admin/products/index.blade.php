@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<main id="main">
    <section class="inventory-revenue-charts mb-4">
        <div class="container-fluid inventory-page">
            <!-- Top Row with Back and Add Category Buttons -->
            <div class="row g-3 mb-3">
                <div class="col-md-4 d-flex align-items-center">
                    <!-- Back Button -->
                    <button onclick="window.history.back();" class="btn btn-secondary me-3">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                </div>
                <!-- Add Category Button (Aligned to the Right) -->
                <div class="col-md-8 d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.products.add') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                </div>
            </div>

            <!-- Second Row with Heading -->
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <h5 class="mb-0">Product List</h5>
                </div>
            </div>
        </div>
    </section>


    <div class="mx-auto w-100 text-center mt-3 mb-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>



    <!-- Category Table with Pagination -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-dark">
                        <th>#</th>
                        {{-- <th>Image</th> --}}
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Stock</th>
                        <th>Base Price</th>
                        <th>Sale Price</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($products->count() > 0)
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $products->firstItem() + $index }}</td>
                                {{-- <td>
                                    <img src="{{ asset('storage/' . $product->images->first()->name) }}"
                                        alt="{{ $product->name }}" width="50">
                                </td> --}}
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>₹ {{ number_format($product->base_price, 2) }}</td>
                                <td>₹ {{ number_format($product->sale_price, 2) }}</td>
                                <td>{{ $product->type }}</td>
                                <td>{{ optional($product->category)->name }}</td>
                                <td>
                                    <a href="{{ route('admin.products.show', ['id' => $product->id]) }}"
                                        class="btn btn-sm btn-primary">View</a>
                                    {{-- <a href="{{ route('/', $product->id) }}" class="btn btn-sm btn-primary">Edit</a> --}}
                                    {{-- <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" class="text-center text-muted">No products available</td>
                        </tr>
                    @endif
                </tbody>
            </table>


            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</main>

@include('admin.layouts.footer')
