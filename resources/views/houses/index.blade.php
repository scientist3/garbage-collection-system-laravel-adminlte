<x-admin>
    @section('title', isset($house) ? 'Edit Household' : 'Create Household')
    <div class="row ">
        <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ isset($house) ? route('admin.house.update', $house->id) : route('admin.house.store') }}" method="POST">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ isset($house) ? 'Edit Household' : 'Create Household' }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    @csrf
                    @if (isset($house))
                    @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="house_type_id">House Type</label>
                                <select class="form-control select2" id="house_type_id" name="house_type_id" required>
                                    <option value="">Select house type</option>
                                    @foreach($house_types as $house_type)
                                    <option value="{{ $house_type->id }}"
                                        {{ old('house_type_id', $house->house_type_id ?? '') == $house_type->id ? 'selected' : '' }}>
                                        {{ $house_type->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="state_id">State</label>
                                <select class="form-control select2" id="state_id" data-old-value="{{$house->state_id??''}}" name="state_id" required>
                                    <option value="">Select state</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->id }}"
                                        {{ old('state_id', $house->state_id ?? '') == $state->id ? 'selected' : '' }}>
                                        {{ $state->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="city_id">City</label>
                                <select class="form-control select2" id="city_id" data-old-value="{{$house->city_id??''}}" name="city_id" required>
                                    <option value="">Please select state first</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="district_id">District</label>
                                <select class="form-control select2" id="district_id" data-old-value="{{$house->district_id??''}}" name="district_id" required>
                                    <option value="">Please select city first</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="tehsil_id">Tensil</label>
                                <select class="form-control select2" id="tehsil_id" data-old-value="{{$house->tehsil_id??''}}" name="tehsil_id" required>
                                    <option value="">Please select district first</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="panchayat_id">Panchayat</label>
                                <select class="form-control select2" id="panchayat_id" data-old-value="{{$house->panchayat_id??''}}" name="panchayat_id" required>
                                    <option value="">Please select tehsil first</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ward_id">Ward</label>
                                <select class="form-control select2" id="ward_id" data-old-value="{{$house->ward_id??''}}" name="ward_id" required>
                                    <option value="">Please select panchayat first</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="village">Village</label>
                                <input type="text" class="form-control" id="village" name="village" value="{{ old('village', $house->village ?? '') }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="house_owner_name">House Owner Name</label>
                                <input type="text" class="form-control" id="house_owner_name" name="house_owner_name" value="{{ old('house_owner_name', $house->house_owner_name ?? '') }}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="parentage">Parentage</label>
                                <input type="text" class="form-control" id="parentage" name="parentage" value="{{ old('parentage', $house->parentage ?? '') }}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="phone_no">Phone No</label>
                                <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no', $house->phone_no ?? '') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $house->location ?? '') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="account_status">Account Status</label>
                                <select class="form-control" id="account_status" name="account_status" required>
                                    <option value="">Select account status</option>
                                    <option value="active" {{ old('account_status', $house->account_status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('account_status', $house->account_status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">{{ isset($house) ? 'Update' : 'Save' }}</button>
                        @if(isset($house))
                        <a href="{{ route('admin.house.index') }}" class="btn btn-secondary">Cancel</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- List  -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Houses List</h3>
                <div class="card-tools">
                    <!-- <a href="{{ route('admin.house.create') }}" class="btn btn-success btn-sm">Add Household</a> -->
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
                            <th>State</th>
                            <th>City</th>
                            <th>District</th>
                            <th>Tehsil</th>
                            <th>Panchayat</th>
                            <th>Ward</th>
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
                            <td>{{ ucfirst( $household->state->name ) }}</td>
                            <td>{{ ucfirst( $household->city->name ) }}</td>
                            <td>{{ $household->district->name }}</td>
                            <td>{{ $household->tehsil->name }}</td>
                            <td>{{ $household->panchayat->name }}</td>
                            <td>{{ $household->ward->name }}</td>
                            <td>
                                <a href="{{ route('admin.house.show', encrypt($household->id)) }}" class="btn btn-info btn-xs">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.house.edit', encrypt($household->id)) }}" class="btn btn-warning btn-xs">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.house.destroy', encrypt($household->id)) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this household?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs">
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
            $('#housesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "responsive": true
            });

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

            // When the state is changed fetch cities
            $('#state_id').change(function() {
                let stateId = $(this).val();
                $('#city_id').empty().append('<option value="">Select City</option>');

                if (stateId) {
                    $.ajax({
                        url: `/api/cities/${stateId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(cities) {
                            $.each(cities, function(key, city) {
                                let selected = city.id == $('#city_id').data('old-value') ? 'selected' : '';
                                $('#city_id').append('<option value="' + city.id + '" ' + selected + '>' + city.name + '</option>');
                            });
                            if ($('#city_id').data('old-value')) {
                                $('#city_id').trigger('change');
                            }
                        },
                        error: function() {
                            alert('Failed to fetch cities. Please try again.');
                        }
                    });
                }
            });
            // if state is selected then trigger change event to fetch cities
            if ($('#state_id').data('old-value')) {
                $('#state_id').trigger('change');
            }

            // when City is changed fetch districts
            $('#city_id').change(function() {
                let cityId = $(this).val();
                $('#district_id').empty().append('<option value="">Select District</option>');

                if (cityId) {
                    $.ajax({
                        url: `/api/districts/${cityId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(districts) {
                            $.each(districts, function(key, district) {
                                let selected = district.id == $('#district_id').data('old-value') ? 'selected' : '';
                                $('#district_id').append('<option value="' + district.id + '" ' + selected + '>' + district.name + '</option>');
                            });
                            if ($('#district_id').data('old-value')) {
                                $('#district_id').trigger('change');
                            }
                        },
                        error: function() {
                            alert('Failed to fetch districts. Please try again.');
                        }
                    });
                }
            });

            // when District is changed fetch tensils
            $('#district_id').change(function() {
                let districtId = $(this).val();
                $('#tehsil_id').empty().append('<option value="">Select Tensil</option>');

                if (districtId) {
                    $.ajax({
                        url: `/api/tehsils/${districtId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(tehsils) {
                            $.each(tehsils, function(key, tehsil) {
                                let selected = tehsil.id == $('#tehsil_id').data('old-value') ? 'selected' : '';
                                $('#tehsil_id').append('<option value="' + tehsil.id + '" ' + selected + '>' + tehsil.name + '</option>');
                                // $('#tehsil_id').append('<option value="' + tensil.id + '">' + tensil.name + '</option>');
                            });
                            if ($('#tehsil_id').data('old-value')) {
                                $('#tehsil_id').trigger('change');
                            }
                        },
                        error: function() {
                            alert('Failed to fetch tensils. Please try again.');
                        }
                    });
                }
            });

            // when Tensil is changed fetch panchayats
            $('#tehsil_id').change(function() {
                let tensilId = $(this).val();
                $('#panchayat_id').empty().append('<option value="">Select Panchayat</option>');

                if (tensilId) {
                    $.ajax({
                        url: `/api/panchayats/${tensilId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(panchayats) {
                            $.each(panchayats, function(key, panchayat) {
                                let selected = panchayat.id == $('#panchayat_id').data('old-value') ? 'selected' : '';
                                $('#panchayat_id').append('<option value="' + panchayat.id + '" ' + selected + '>' + panchayat.name + '</option>');
                                //$('#panchayat_id').append('<option value="' + panchayat.id + '">' + panchayat.name + '</option>');
                            });
                            if ($('#panchayat_id').data('old-value')) {
                                $('#panchayat_id').trigger('change');
                            }
                        },
                        error: function() {
                            alert('Failed to fetch panchayats. Please try again.');
                        }
                    });
                }
            });

            // when Panchayat is changed fetch wards
            $('#panchayat_id').change(function() {
                let panchayatId = $(this).val();
                $('#ward_id').empty().append('<option value="">Select Ward</option>');

                if (panchayatId) {
                    $.ajax({
                        url: `/api/wards/${panchayatId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(wards) {
                            $.each(wards, function(key, ward) {
                                let selected = ward.id == $('#ward_id').data('old-value') ? 'selected' : '';
                                $('#ward_id').append('<option value="' + ward.id + '" ' + selected + '>' + ward.name + '</option>');
                                //$('#ward_id').append('<option value="' + ward.id + '">' + ward.name + '</option>');
                            });
                        },
                        error: function() {
                            alert('Failed to fetch wards. Please try again.');
                        }
                    });
                }
            });

        });
    </script>
    @endsection
</x-admin>