<x-admin>
    @section('title', 'Edit Dustbin')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Dustbin</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.dustbins.update', $dustbin->dustbin_code) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="dustbin_code">Dustbin Code</label>
                            <input type="text" name="dustbin_code" class="form-control" id="dustbin_code" value="{{ $dustbin->dustbin_code }}" required>
                        </div>
                        <div class="form-group">
                            <label for="dustbin_type_id">Dustbin Type</label>
                            <select name="dustbin_type_id" class="form-control select2" id="dustbin_type_id" required>
                                @foreach($dustbinTypes as $type)
                                <option value="{{ $type->id }}" {{ $type->id == $dustbin->dustbin_type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="houses_id">House ID</label>
                            <select id="houses_id" name="houses_id" class="form-control select2" style="width: 100%;" required>
                                <option value="">Select House</option>
                                @foreach($houses as $house)
                                <option value="{{ $house->id }}" {{ $house->id == $dustbin->houses_id ? 'selected' : '' }}>{{ $house->house_owner_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="geo_coordinates">Geo Coordinates</label>
                            <input type="text" name="geo_coordinates" class="form-control" id="geo_coordinates" value="{{ $dustbin->geo_coordinates }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('js')
    <script>
        $(function() {
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
        });
    </script>
    @endsection
</x-admin>