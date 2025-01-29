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
                    {{-- <h5 class="mb-0">Add Product</h5> --}}
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
                            <form action="{{ route('admin.product.create') }}" method="post"
                                enctype="multipart/form-data" novalidate class="text-secondary fw-bolder fs-2">
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
                                            <span class="error text-danger mt-1"
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
                                        @error('brand')
                                            <span class="error text-danger mt-1"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Stock -->
                                <div class="mb-3 row align-items-center">
                                    <label for="stock" class="col-sm-3 col-form-label">Stock <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="number" name="stock" value="" id="brand"
                                            placeholder="Enter stock"
                                            class="form-control rounded @error('brand') is-invalid @enderror">
                                        @error('stock')
                                            <span class="error text-danger mt-1"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Base Price -->
                                <div class="mb-3 row align-items-center">
                                    <label for="base_price" class="col-sm-3 col-form-label">Base Price <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="number" name="base_price" value="" id="oPrice"
                                            placeholder="Enter base price"
                                            class="form-control rounded  @error('base_price') is-invalid @enderror">
                                        @error('base_price')
                                            <span class="error text-danger mt-1"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Sale Price -->
                                <div class="mb-3 row align-items-center">
                                    <label for="sale_price" class="col-sm-3 col-form-label">Sale Price <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="number" name="sale_price" value="" id="sPrice"
                                            placeholder="Enter sale price"
                                            class="form-control rounded @error('sale_price') is-invalid @enderror">
                                        @error('sale_price')
                                            <span class="error text-danger mt-1"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Product Type -->
                                <div class="mb-3 row align-items-center">
                                    <label for="type" class="col-sm-3 col-form-label">Product Type <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="type" id="type"
                                            class="form-control form-select rounded @error('type') is-invalid @enderror">
                                            <option value="">Select Type</option>
                                            <option value="Physical" {{ old('type') == 'Physical' ? 'selected' : '' }}>
                                                Physical</option>
                                            <option value="Digital" {{ old('type') == 'Digital' ? 'selected' : '' }}>
                                                Digital</option>
                                        </select>
                                        @error('type')
                                            <span class="error text-danger mt-1"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Category Selection -->
                                <div class="mb-3 row align-items-center">
                                    <label for="category_id" class="col-sm-3 col-form-label">Category <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="category_id" id="category"
                                            class="form-control form-select rounded @error('category_id') is-invalid @enderror">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="error text-danger mt-1"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="mb-3 row align-items-center">
                                    <label for="description" class="col-sm-3 col-form-label">Description <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="description" value="" id="description"
                                            placeholder="Enter description"
                                            class="form-control rounded @error('description') is-invalid @enderror">
                                        @error('description')
                                            <span class="error text-danger mt-1"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Image Upload -->
                                <div class="mb-3 row align-items-center">
                                    <label for="images" class="col-sm-3 col-form-label">Product Images <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="file" name="images[]" id="images" multiple
                                            accept="image/*"
                                            class="form-control rounded @error('images') is-invalid @enderror">
                                        @error('images')
                                            <span class="error text-danger mt-1"
                                                style="font-size: 0.9rem; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-2 text-center"
                                        name="submit">Submit</button>
                                </div>
                                {{-- <button type="submit" class="btn btn-success mt-2" name="submit">Submit</button> --}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>

@include('admin.layouts.footer')
