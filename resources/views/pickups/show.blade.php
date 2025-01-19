<x-admin>
    @section('title', 'Pickup Details')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pickup Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $pickup->id }}</td>
                        </tr>
                        <tr>
                            <th>Dustbin Code</th>
                            <td>{{ $pickup->dustbin_code }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $pickup->status }}</td>
                        </tr>
                        <tr>
                            <th>Pickup DateTime</th>
                            <td>{{ $pickup->pickup_datetime }}</td>
                        </tr>
                        <tr>
                            <th>Scanned By</th>
                            <td>{{ $pickup->scanned_by }}</td>
                        </tr>
                        <tr>
                            <th>Geo Coordinates</th>
                            <td>{{ $pickup->geo_coordinates }}</td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <td>{{ $pickup->remarks }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin>