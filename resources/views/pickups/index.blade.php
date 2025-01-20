<x-admin>
    @section('title', 'Pickup Records')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pickup Records</h3>
                    <div class="card-tools">
                        <!-- <a href="{ { route('pickup.create') }}" class="btn btn-primary">Add New Pickup</a> -->
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>House Owner</th>
                                <!-- <th>Dustbin Code</th> -->
                                <th>Segregated</th>
                                <th>Dustbins</th>
                                <th>Pickup DateTime</th>
                                <th>Scanned By</th>
                                <th>Geo Coordinates</th>
                                <!-- <th>Status</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pickups as $pickup)
                            <!-- {{$pickup}} -->
                            <tr>
                                <td>{{ $pickup->id }}</td>
                                <td>{{ $pickup->dustbin->house->house_owner_name }}</td>
                                <!-- <td>{ { $pickup->dustbin_code }}</td> -->
                                <td>{{ $pickup->segregation_option }}</td>
                                <!-- <td>{ { $pickup->segregation_types }}</td> -->
                                <td>
                                    @if($pickup->segregation_types)
                                    {{ implode(', ', $pickup->segregation_types) }}
                                    @endif
                                </td>
                                <td>{{ $pickup->pickup_datetime }}</td>
                                <td>{{ $pickup->scannedBy->name }}</td>
                                <td>{{ $pickup->geo_coordinates }}</td>
                                <!-- <td>{{ $pickup->status }}</td> -->
                                <td>
                                    <a href="{{ route('pickup.show', $pickup->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('pickup.edit', $pickup->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pickup.destroy', $pickup->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @section('js')
    <script>
        $(function() {
            $('.dataTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "responsive": true
            });
        });
    </script>
    @endsection
</x-admin>