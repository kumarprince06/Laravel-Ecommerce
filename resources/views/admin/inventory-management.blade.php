<!-- Includes Header -->
@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<main id="main">
    <section class="inventory-revenue-charts mb-4">
        <div class="container-fluid inventory-page">
            <!-- Top Row with Heading and Add Button -->
            <div class="row g-3 justify-content-between mb-3">
                <div class="col-md-4">
                    <h5>Invenotry Management</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="dash-overview mb-4">
        <div class="row g-4">
            <!-- Total Users -->
            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="{{ route('admin.products.add') }}" class="card bg-success text-white text-center p-3">
                    <h4>Add Product</h4>
                    <p></p>
                </a>
            </div>
            <!-- Total Products -->
            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="{{ route('admin.products.index') }}" class="card bg-warning text-white text-center p-3">
                    <h4>View Products</h4>
                    <p></p>
                </a>
            </div>
        </div>
    </section>
</main>


@include('admin.layouts.footer')
