<div class="row">
    @role('admin')
    <div class="col-lg-3 col-6 d-none">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $user }}</h3>
                <p>Total Users</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ route('admin.user.index') }}" class="small-box-footer">View <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6 d-none">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $category }}</h3>
                <p>Total Categories</p>
            </div>
            <div class="icon">
                <i class="fas fa-list-alt"></i>
            </div>
            <a href="{{ route('admin.category.index') }}" class="small-box-footer">View <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6 d-none">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $product }}</h3>
                <p>Total Products</p>
            </div>
            <div class="icon">
                <i class="fas fas fa-th"></i>
            </div>
            <a href="{{ route('admin.product.index') }}" class="small-box-footer">View <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    @endrole

    @role('admin|agency')
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $houseCount }}</h3>
                <p>Total House Hold Registered</p>
            </div>
            <div class="icon">
                <i class="fa fa-home"></i>
            </div>
            <a href="{{ route('admin.house.index') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $totalPickups }}</h3>
                <p>Total Collections</p>
            </div>
            <div class="icon">
                <i class="fas fas fa-file-pdf"></i>
            </div>
            <a href="{{ route('admin.collection.index') }}" class="small-box-footer">View <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $todaysPickup }}</h3>
                <p>Total Collection Today</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <!-- PIE CHART -->
        <div class="card card-white">
            <div class="card-header">
                <h3 class="card-title">Segregated/Non-Segregated</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button> -->
                </div>
            </div>
            <div class="card-body" style="background-color: white;">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;" data-segregated="2" data-non-segregated="4"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <!-- PIE CHART -->
        <div class="card card-white">
            <div class="card-header">
                <h3 class="card-title">Total Houses / Today Pickup</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button> -->
                </div>
            </div>
            <div class="card-body" style="background-color: white;">
                <canvas id="pieChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;" data-total-houses="{{ $houseCount ?? 0 }}" data-todays-pickup="{{ $todaysPickup ?? 0 }}"></canvas>
            </div>
        </div>
    </div>
    @section('js')
    <script>
        $(function() {
            var totalHouses = $('#pieChart1').data('total-houses');
            var totalPickups = $('#pieChart1').data('todays-pickup');

            var segregated = $('#pieChart').data('segregated');
            var nonSegregated = $('#pieChart').data('non-segregated');

            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieChartCanvas1 = $('#pieChart1').get(0).getContext('2d')

            var pieData = {
                labels: [
                    'Segregated',
                    'Non Segregated',
                ],
                datasets: [{
                    data: [segregated, nonSegregated],
                    backgroundColor: ['#00a65a', '#00c0ef'],
                }]
            }
            var pieData1 = {
                labels: [
                    'Total Houses',
                    'Today Pickup',
                ],
                datasets: [{
                    data: [totalHouses, totalPickups],
                    backgroundColor: ['#00a65a', '#00c0ef'],
                }]
            }

            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

            new Chart(pieChartCanvas1, {
                type: 'pie',
                data: pieData1,
                options: pieOptions
            })

        })
    </script>
    @endsection
    @endrole
</div>