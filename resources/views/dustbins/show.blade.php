<x-admin>
    @section('title', 'Dustbin Details')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Dustbin Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.dustbins.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Dustbin Code</th>
                            <td>{{ $dustbin->dustbin_code }}</td>
                        </tr>
                        <tr>
                            <th>Dustbin Type ID</th>
                            <td>{{ $dustbin->dustbinType->name }}</td>
                        </tr>
                        <tr>
                            <th>House ID</th>
                            <td>{{ $dustbin->house->house_owner_name }}</td>
                        </tr>
                        <tr>
                            <th>Geo Coordinates</th>
                            <td>{{ $dustbin->geo_coordinates }}</td>
                        </tr>
                        <tr>
                            <th>QR Code</th>
                            <td>{{$dustbin->qrcode}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin>