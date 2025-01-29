@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<main id="main">
    <section class="inventory-revenue-charts mb-4">
        <div class="container-fluid inventory-page">
            <!-- Top Row with Heading -->
            <div class="row g-3 justify-content-between mb-3">
                <div class="col-md-4 d-flex align-items-center">
                    <!-- Back Button -->
                    <button onclick="window.history.back();" class="btn btn-secondary me-3">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                    <h5 class="mb-0">Add Product</h5>
                </div>
            </div>
        </div>
        <section class="inventory-page mb-4">
            <!-- Card to contain the form -->
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <div class="container-fluid">
                                <div class="row justify-content-center ">
                                    <div class="col-md-12 text-center">
                                        <h5 class="mb-0">Add New Product</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Add Product Form -->
                            <form action="{{ route('admin.product.create') }}" method="post" enctype="multipart/form-data"
                                novalidate class="text-secondary fw-bolder fs-2">
                                @csrf

                                <!-- Product Name -->
                                <div class="mb-3 row align-items-center">
                                    <label for="name" class="col-sm-3 col-form-label">Product Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" value="" id="name"
                                            placeholder="Enter product name"
                                            class="form-control rounded @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="error text-danger"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Brand Name -->
                                <div class="mb-3 row align-items-center">
                                    <label for="brand" class="col-sm-3 col-form-label">Brand Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="brand" value="{{ old('brand') }}" id="brand"
                                            placeholder="Enter brand name"
                                            class="form-control rounded @error('brand') is-invalid @enderror">
                                    </div>
                                </div>
                                @error('brand')
                                    <span class="error text-danger"
                                        style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                @enderror

                                <!-- Stock -->
                                <div class="addproduct mb-3 d-flex align-items-center">
                                    <input type="number" name="stock" value="{{ old('stock') }}" id="stock"
                                        placeholder="Enter stock"
                                        class="form-control rounded @error('stock') is-invalid @enderror">
                                    <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                </div>
                                @error('stock')
                                    <span class="error text-danger"
                                        style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                @enderror

                                <!-- Base Price -->
                                <div class="addproduct mb-3 d-flex align-items-center">
                                    <input type="number" name="originalPrice" value="{{ old('originalPrice') }}"
                                        id="oPrice" placeholder="Enter base price"
                                        class="form-control rounded @error('originalPrice') is-invalid @enderror">
                                    <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                </div>
                                @error('originalPrice')
                                    <span class="error text-danger"
                                        style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                @enderror

                                <!-- Sale Price -->
                                <div class="addproduct mb-3 d-flex align-items-center">
                                    <input type="number" name="sellingPrice" value="{{ old('sellingPrice') }}"
                                        id="sPrice" placeholder="Enter sale price"
                                        class="form-control rounded @error('sellingPrice') is-invalid @enderror">
                                    <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                </div>
                                @error('sellingPrice')
                                    <span class="error text-danger"
                                        style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                @enderror

                                <!-- Product Type -->
                                <div class="addproduct mb-3 d-flex align-items-center">
                                    <select name="type" id="type"
                                        class="form-control rounded @error('type') is-invalid @enderror">
                                        <option value="">Select Type</option>
                                        <option value="Physical" {{ old('type') == 'Physical' ? 'selected' : '' }}>
                                            Physical</option>
                                        <option value="Digital" {{ old('type') == 'Digital' ? 'selected' : '' }}>
                                            Digital</option>
                                    </select>
                                    <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                </div>
                                @error('type')
                                    <span class="error text-danger"
                                        style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                @enderror

                                <!-- Category Selection -->
                                <div class="addproduct mb-3 d-flex align-items-center">
                                    <select name="category" id="category"
                                        class="form-control rounded @error('category') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                </div>
                                @error('category')
                                    <span class="error text-danger"
                                        style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                @enderror

                                <!-- Image Upload -->
                                <div class="addproduct mb-3 d-flex align-items-center">
                                    <input type="file" name="images[]" id="images" multiple accept="image/*"
                                        class="form-control rounded @error('images') is-invalid @enderror">
                                    <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                </div>
                                @error('images')
                                    <span class="error text-danger"
                                        style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                @enderror

                                <button type="submit" class="btn btn-success mt-2" name="submit">Submit</button>
                                <button type="reset" class="btn btn-warning mt-2">Reset</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>

        {{-- 
        <section class="vh-90 gradient-custom">
            <div class="container py-3 h-100">
                <div class="row d-flex justify-content-center align-items-center h-90">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-light text-white" style="border-radius: 1rem;">
                            <div class="card-body p-3 text-center">

                                <div class="mb-md-3 mt-md-2 pb-1">
                                    <h2 class="fw-bold mb-2 text-uppercase text-success">Add Product</h2>
                                    <p class="text-secondary mb-3">Please fill in the product details below:</p>

                                    <!-- Add Product Form -->
                                    <form action="{{ route('product.create') }}" method="post"
                                        enctype="multipart/form-data" novalidate class="text-secondary fw-bolder fs-2">
                                        @csrf

                                        <!-- Product Name -->
                                        <div class="addproduct mb-3 d-flex align-items-center">
                                            <input type="text" name="name" value="" id="name"
                                                placeholder="Enter product name"
                                                class="form-control rounded @error('name') is-invalid @enderror">
                                            <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                        </div>
                                        @error('name')
                                            <span class="error text-danger"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror

                                        <!-- Brand Name -->
                                        <div class="addproduct mb-3 d-flex align-items-center">
                                            <input type="text" name="brand" value="" id="brand"
                                                placeholder="Enter brand name"
                                                class="form-control rounded @error('brand') is-invalid @enderror">
                                            <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                        </div>
                                        @error('brand')
                                            <span class="error text-danger"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror

                                        <!-- Stock -->
                                        <div class="addproduct mb-3 d-flex align-items-center">
                                            <input type="number" name="stock" value="" id="stock"
                                                placeholder="Enter stock"
                                                class="form-control rounded @error('stock') is-invalid @enderror">
                                            <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                        </div>
                                        @error('stock')
                                            <span class="error text-danger"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror

                                        <!-- Base Price -->
                                        <div class="addproduct mb-3 d-flex align-items-center">
                                            <input type="number" name="originalPrice" value="" id="oPrice"
                                                placeholder="Enter base price"
                                                class="form-control rounded @error('originalPrice') is-invalid @enderror">
                                            <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                        </div>
                                        @error('originalPrice')
                                            <span class="error text-danger"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror

                                        <!-- Sale Price -->
                                        <div class="addproduct mb-3 d-flex align-items-center">
                                            <input type="number" name="sellingPrice" value="" id="sPrice"
                                                placeholder="Enter sale price"
                                                class="form-control rounded @error('sellingPrice') is-invalid @enderror">
                                            <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                        </div>
                                        @error('sellingPrice')
                                            <span class="error text-danger"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror

                                        <!-- Product Type -->
                                        <div class="addproduct mb-3 d-flex align-items-center">
                                            <select name="type" id="type"
                                                class="form-control rounded @error('type') is-invalid @enderror">
                                                <option value="">Select Type</option>
                                                <option value="Physical"
                                                    {{ old('type', $data['type'] ?? '') == 'Physical' ? 'selected' : '' }}>
                                                    Physical</option>
                                                <option value="Digital"
                                                    {{ old('type', $data['type'] ?? '') == 'Digital' ? 'selected' : '' }}>
                                                    Digital</option>
                                            </select>
                                            <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                        </div>
                                        @error('type')
                                            <span class="error text-danger"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror

                                        <!-- Category Selection -->
                                        <div class="addproduct mb-3 d-flex align-items-center">
                                            <select name="category" id="category"
                                                class="form-control rounded @error('category') is-invalid @enderror">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('category')
                                                <span class="error text-danger"
                                                    style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                            @enderror
                                            <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                        </div>
                                        @error('category')
                                            <span class="error text-danger"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror

                                        <!-- Image Upload -->
                                        <div class="addproduct mb-3 d-flex align-items-center">
                                            <input type="file" name="images[]" id="images" multiple
                                                accept="image/*"
                                                class="form-control rounded @error('images') is-invalid @enderror">
                                            <span class="text-danger fw-bold ms-2" style="font-size: 1rem;">*</span>
                                        </div>
                                        @error('images')
                                            <span class="error text-danger"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror

                                        <button type="submit" class="btn btn-success mt-2"
                                            name="submit">Submit</button>
                                        <button type="reset" class="btn btn-warning mt-2">Reset</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

</main>

@include('admin.layouts.footer')
