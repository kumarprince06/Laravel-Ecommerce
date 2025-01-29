<!-- Includes Header -->
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
                    <h5 class="mb-0">Add Category</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="dash-overview mb-4">
        <div class="row g-4">
            <!-- Add Category Form -->
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Add New Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" name="name" class="form-control" id="categoryName"
                                    placeholder="Enter category name">
                                @error('name')
                                    <small class="text-danger fw-normal mt-2 text-start d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                <button type="submit" class="btn btn-success">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<!-- Modal for Viewing Category -->
{{-- <div class="modal fade" id="viewCategoryModal" tabindex="-1" aria-labelledby="viewCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="viewCategoryModalLabel">Category Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="viewCategoryId" class="form-label fw-bold">Category ID</label>
                        <input type="text" id="viewCategoryId" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="viewCategoryName" class="form-label fw-bold">Category Name</label>
                        <input type="text" id="viewCategoryName" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}

<!-- Modal for Adding New Category -->
{{-- <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="categoryName"
                                placeholder="Enter category name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

<!-- Modal for Editing Category -->
{{-- <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editCategoryForm" action="{{ route('category.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editCategoryName" class="form-label">Category Name</label>
                            <input type="hidden" name="id" id="editCategoryId">
                            <input type="text" name="name" class="form-control" id="editCategoryName"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}


@include('admin.layouts.footer')
