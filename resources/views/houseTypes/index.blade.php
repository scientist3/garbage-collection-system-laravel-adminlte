<x-admin>
    @section('title', 'House Types')
    <div class="row">
        <!-- Create or Edit Form -->
        <div class="col-md-3">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ isset($houseType) ? 'Edit House Type' : 'Create House Type' }}
                    </h3>
                </div>
                <div class="card-body">
                    <form
                        class="needs-validation"
                        novalidate
                        action="{{ isset($houseType) ? route('admin.house_type.update', $houseType) : route('admin.house_type.store') }}"
                        method="POST">
                        @csrf
                        @if(isset($houseType))
                        @method('PUT')
                        @endif

                        <div class="form-group mt-3">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="name"
                                value="{{ old('name', $houseType->name ?? '') }}"
                                required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($houseType) ? 'Update' : 'Create' }}
                            </button>
                            @if(isset($houseType))
                            <a href="{{ route('admin.house_type.index') }}" class="btn btn-secondary">Cancel</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- List of House Types -->
        <div class="col-md-9">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">House Types List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($houseTypes as $houseType)
                            <tr>
                                <td>{{ $houseType->id }}</td>
                                <td>{{ $houseType->name }}</td>
                                <td>
                                    <a
                                        href="{{ route('admin.house_type.edit', $houseType) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form
                                        action="{{ route('admin.house_type.destroy', $houseType) }}"
                                        method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this House Type?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Add Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $houseTypes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('js')
    <script>
        $(function() {
            $('.dataTable').DataTable();
        });
    </script>
    @endsection
</x-admin>