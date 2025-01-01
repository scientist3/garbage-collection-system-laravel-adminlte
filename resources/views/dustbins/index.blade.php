<x-admin>
    @section('title', 'Dustbins')
    <style>
        .dark-mode .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow {
            color: #fff;
        }
    </style>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ isset($dustbin) ? 'Edit Dustbin' : 'Create Dustbin' }}
                    </h3>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ isset($dustbin) ? route('admin.dustbins.update', $dustbin ) : route('admin.dustbins.store') }}" method="POST">
                        @csrf
                        @if(isset($dustbin))
                        @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="dustbin_code">Dustbin Code</label>
                            <input type="text" name="dustbin_code" class="form-control" id="dustbin_code" value="{{ old('dustbin_code', $dustbin->dustbin_code ?? $dustbin_code) }}" required>
                            <span id="dustbin_code_error" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="dustbin_type_id">Dustbin Type</label>
                            <select id="dustbin_type_id" name="dustbin_type_id" class="form-control select2" style="width: 100%;" required>
                                <option value="">Select Dustbin Type</option>
                                @foreach($dustbinTypes as $type)
                                <option value="{{ $type->id }}" {{ isset($dustbin) && $dustbin->dustbin_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="houses_id">Allocated To</label>
                            <select id="houses_id" name="houses_id" class="form-control select2" style="width: 100%;" required>
                                <option value="">Select House</option>
                                @foreach($houses as $house)
                                <option value="{{ $house->id }}" {{ isset($dustbin) && $dustbin->houses_id == $house->id ? 'selected' : '' }}>{{ $house->house_owner_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="geo_coordinates">Geo Coordinates</label>
                            <input type="text" name="geo_coordinates" class="form-control" id="geo_coordinates" value="{{ old('geo_coordinates', $dustbin->geo_coordinates ?? '') }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">{{ isset($dustbin) ? 'Update' : 'Create' }}</button>
                        @if(isset($dustbin))
                        <a href="{{ route('admin.dustbins.index') }}" class="btn btn-secondary">Cancel</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dustbins List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dustbinsTable">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>Dustbin Code</th>
                                <th>Dustbin Type</th>
                                <th>Allocated To</th>
                                <th>Geo Coordinates</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dustbins as $dustbin)
                            <tr>
                                <!-- <td>{{ $dustbin->id }}</td> -->
                                <td>{{ $dustbin->dustbin_code }}</td>
                                <td>{{ $dustbin->dustbintype->name }}</td>
                                <td>{{ $dustbin->house->house_owner_name }}</td>
                                <td>{{ $dustbin->geo_coordinates }}</td>
                                <!-- <td>{{ $dustbin->qrcode }}</td> -->
                                <td>
                                    <a href="{{ route('admin.dustbins.show', encrypt($dustbin->dustbin_code)) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.dustbins.edit', encrypt($dustbin->dustbin_code)) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.dustbins.destroy', $dustbin->dustbin_code) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
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
            // $('#dustbinsTable').DataTable({
            //     "paging": true,
            //     "searching": true,
            //     "ordering": true,
            //     "responsive": true,
            // });

            $('.select2').select2({
                theme: 'bootstrap4',
            });
            // focus on select2 search box
            $('.select2').on('select2:open', function() {
                let select2SearchBox = document.querySelector('.select2-container--open .select2-search__field');
                if (select2SearchBox) {
                    select2SearchBox.focus();
                }
            });
            $('#dustbin_code').on('blur', function() {
                var dustbinCode = $(this).val();
                if (dustbinCode) {
                    $.ajax({
                        url: '{{ route("admin.dustbins.check_dustbin_code") }}',
                        type: 'GET',
                        data: {
                            dustbin_code: dustbinCode
                        },
                        success: function(response) {
                            if (response.status === 'error') {
                                $('#dustbin_code_error').text(response.message);
                            } else {
                                $('#dustbin_code_error').text('');
                            }
                        }
                    });
                }
            });
        });
    </script>
    @endsection
</x-admin>