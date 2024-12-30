<x-admin>
    @section('title', 'Houses')
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Houses List</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.house.create') }}" class="btn btn-success btn-sm">Add Household</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="housesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>House Owner Name</th>
                                <th>Village</th>
                                <th>Phone No</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($households as $household)
                            <tr>
                                <td>{{ $household->id }}</td>
                                <td>{{ $household->house_owner_name }}</td>
                                <td>{{ $household->village }}</td>
                                <td>{{ $household->phone_no }}</td>
                                <td>
                                    <a href="{{ route('admin.house.show', $household->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.house.edit', $household->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.house.destroy', $household->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
            $('#housesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "responsive": true,
            });
        });
    </script>
    @endsection
</x-admin>