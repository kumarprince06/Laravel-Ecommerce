<!-- Includes Header -->
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<main id="main">
    <div class="container-fluid table-index">
        <div class="row g-3 justify-content-between mb-3">
            <div class="col-md-4">
                <h5>Dashboard</h5>
            </div>
        </div>

        <!-- Overview Section -->
        <section class="dash-overview mb-4">
            <div class="row g-4">
                <!-- Total Users -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="card bg-success text-white text-center p-3">
                        <h4>Total Users</h4>
                        <p></p>
                    </div>
                </div>
                <!-- Total Products -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="card bg-warning text-white text-center p-3">
                        <h4>Total Products</h4>
                        <p></p>
                    </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="card bg-info text-white text-center p-3">
                        <h4>Total Revenue</h4>
                        <p></p>

                    </div>
                </div>
            </div>
        </section>
    </div>
</main>


@include('admin.layouts.footer')
