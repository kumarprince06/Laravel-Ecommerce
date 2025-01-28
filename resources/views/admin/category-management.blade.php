<!-- Includes Header -->
@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<main id="main">
    <section class="inventory-revenue-charts mb-4">
        <div class="container-fluid inventory-page">
            <!-- Top Row with Heading and Add Button -->
            <div class="row g-3 justify-content-between mb-3">
                <div class="col-md-4">
                    <h5>Category Management</h5>
                </div>
            </div>


            <!-- Table with Categories -->
            {{-- <table class="w-100 table-responsive table-bordered text-center rounded">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <!-- View Button to Trigger View Modal -->
                                    <button class="btn btn-info fw-bold text-white view-btn"
                                        data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                        data-bs-toggle="modal" data-bs-target="#viewCategoryModal">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    @if (session('user.role') === 'admin')
                                        <!-- Edit Button to Trigger Edit Modal -->
                                        <button class="btn btn-warning fw-bold text-white edit-btn"
                                            data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                            data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <!-- Form for delete operation -->
                                        <form action="{{ route('category.delete', $category->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger fw-bold text-white" type="submit"
                                                onclick="return confirm('Are you sure you want to delete this category?');">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
        </div>
    </section>

    <section class="dash-overview mb-4">
        <div class="row g-4">
            <!-- Total Users -->
            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="{{ url('') }}" class="card bg-success text-white text-center p-3">
                    <h4>Add Category</h4>
                    <p></p>
                </a>
            </div>
            <!-- Total Products -->
            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="#" class="card bg-warning text-white text-center p-3">
                    <h4>View Categories</h4>
                    <p></p>
                </a>
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
