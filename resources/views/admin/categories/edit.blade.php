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
                    <h5 class="mb-0">Edit Category</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="dash-overview mb-4">
        <div class="row g-4">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Update Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" name="name" class="form-control" id="categoryName"
                                    value="{{ $category->name }}" required>
                                @error('name')
                                    <small class="text-danger fw-normal mt-2 d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                <button type="submit" class="btn btn-success">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('admin.layouts.footer')
