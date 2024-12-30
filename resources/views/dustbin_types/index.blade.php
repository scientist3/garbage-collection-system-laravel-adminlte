<x-admin>
    @section('title', 'Dustbin Types')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Dustbin Type</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.dustbin_types.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <button type="submit" class="btn btn-success">Create</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dustbin Types List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dustbinTypesTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dustbinTypes as $dustbinType)
                            <tr>
                                <td>{{ $dustbinType->id }}</td>
                                <td>{{ $dustbinType->name }}</td>
                                <td>
                                    <!-- <a href="{{ route('admin.dustbin_types.show', $dustbinType->id) }}" class="btn btn-info btn-sm">View</a> -->
                                    <a href="{{ route('admin.dustbin_types.edit', $dustbinType->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.dustbin_types.destroy', $dustbinType->id) }}" method="POST" style="display:inline-block;">
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
            $('#dustbinTypesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "responsive": true,
            });
        });
    </script>
    @endsection
</x-admin>