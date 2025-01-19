<x-admin>
    @section('title', 'Pickup Records')
    <!-- <div class="p-3 mb-3">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="p-4 sm:p-8 bg-{{Auth::user()->mode}} shadow sm:rounded-lg mb-3">
                    <div class="max-w-xl">
                        <div class="mb-3">
                            <label for="dustbin_code">Dustbin Code</label>
                            <input type="text" id="dustbin_code" class="form-control" value="{{ $dustbin->dustbin_code }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pickup Entry</h3>
                    <div class="card-tools">
                        <a href="{{ route('pickup.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul></ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('pickup.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="dustbin_code" value="{{ $dustbin->dustbin_code }}">
                        <input type="hidden" name="scanned_by" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <input type="hidden" name="geo_coordinates" id="geo_coordinates">
                        <div class="form-group">
                            <label for="geo_coordinates">Current Geo-coordinates: </label>
                            <span id="geo_coordinates_display"></span>
                        </div>
                        <div class="form-group">
                            <label for="dustbin_code">Dustbin Code: </label>
                            <span id="dustbin_code">{{ $dustbin->dustbin_code }}</span>
                        </div>
                        <div class="form-group">
                            <label for="house_owner_name">House Owner Name: </label>
                            <span id="house_owner_name">{{ $dustbin->house->house_owner_name }}</span>
                        </div>
                        <div class="form-group">
                            <label for="village">Village: </label>
                            <span id="village">{{ $dustbin->house->village }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Phone No: </label>
                            <span id="phone_no">{{ $dustbin->house->phone_no }}</span>
                        </div>
                        <div class="form-group">
                            <label for="segregation">Segregation</label>
                            <div class="col-sm-6">
                                <!-- radio -->
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="segregated" name="segregation_option" value="segregated" onclick="toggleSegregationOptions()">
                                        <label for="segregated" class="custom-control-label">Segregated</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="non_segregated" name="segregation_option" value="non_segregated" onclick="toggleSegregationOptions()">
                                        <label for="non_segregated" class="custom-control-label">Non-Segregated</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="segregation_options" style="display: none;">
                            <label for="segregation_types">Segregation Types</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="segregation_types[]" id="dry" value="dry">
                                            <label for="dry" class="custom-control-label">Dry</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="segregation_types[]" id="wet" value="wet">
                                            <label for="wet" class="custom-control-label">Wet</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="google_maps_url">Google Maps URL: </label>
                            <a id="google_maps_url" href="#" target="_blank">Open in Google Maps</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('js')
    <script>
        $(document).ready(function() {
            function toggleSegregationOptions() {
                const segregated = $('#segregated').is(':checked');
                const segregationOptions = $('#segregation_options');

                if (segregated) {
                    segregationOptions.show();
                } else {
                    segregationOptions.hide();
                    // Clear the checkboxes if non-segregated is selected
                    $('#dry').prop('checked', false);
                    $('#wet').prop('checked', false);
                }
            }

            $('input[name="segregation_option"]').on('change', function() {
                toggleSegregationOptions();
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    $('#latitude').val(latitude);
                    $('#longitude').val(longitude);
                    $('#geo_coordinates').val(latitude + ',' + longitude);
                    $('#geo_coordinates_display').text(latitude + ', ' + longitude);

                    // Create Google Maps URL
                    var googleMapsUrl = 'https://www.google.com/maps?q=' + latitude + ',' + longitude;
                    $('#google_maps_url').attr('href', googleMapsUrl);
                }, function(error) {
                    if (error.code === error.PERMISSION_DENIED) {
                        alert("Please enable location services in your browser settings and allow location access.");
                    } else {
                        alert("Error Code = " + error.code + " - " + error.message);
                    }
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }

        });
        // $(document).ready(function() {
        //     $('input[name="segregation_option"]').on('change', function() {
        //         var segregation_option = $('input[name="segregation_option"]:checked').val();
        //         var segregation_options = $('#segregation_options');
        //         if (segregation_option == 'segregated') {
        //             segregation_options.show();
        //         } else {
        //             segregation_options.hide();
        //             // Clear the checkboxes if non-segregated is selected
        //             $('#dry').prop('checked', false);
        //             $('#wet').prop('checked', false);
        //         }
        //     });

        //     try {
        //         if (navigator.geolocation) {
        //             navigator.geolocation.getCurrentPosition(function(position) {
        //                 $('#latitude').val(position.coords.latitude);
        //                 $('#longitude').val(position.coords.longitude);
        //             }, function(error) {
        //                 if (error.code === error.PERMISSION_DENIED) {
        //                     alert("Please enable location services in your browser settings and allow location access.");
        //                 } else {
        //                     console.error("Error Code = " + error.code + " - " + error.message);
        //                 }
        //             });
        //         } else {
        //             console.error("Geolocation is not supported by this browser.");
        //         }
        //     } catch (error) {
        //         console.error(error);
        //     }
        // });
    </script>
    @endsection

</x-admin>
