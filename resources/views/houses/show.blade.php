<x-admin>
    @section('title', 'Household Details')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-widget widget-user shadow-lg">
                <!-- Header with Background Image -->
                <div class="widget-user-header text-white" style="background: url('{{ asset('admin/dist/img/photo1.png')}}') center center;">
                    <h3 class="widget-user-username text-right">{{ $house->house_owner_name }}</h3>
                    <h5 class="widget-user-desc text-right">Household Owner</h5>
                    <h5 class="widget-user-desc text-right">{{ $house->phone_no }}</h5>
                </div>

                <!-- Profile Image -->
                <div class="widget-user-image">
                    <img class="img-circle" src="{{ Auth::user()->avatar != null ? Auth::user()->avatar : asset('admin/dist/img/user2-160x160.jpg') }}" alt="Owner Avatar">
                </div>
                <!-- Card Footer with Details -->
                <div class="card-footer">
                    <div class="row">
                        <!-- State -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ ucfirst($house->state->name) }}</h5>
                                <span class="description-text">STATE</span>
                            </div>
                        </div>
                        <!-- City -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ ucfirst($house->city->name) }}</h5>
                                <span class="description-text">CITY</span>
                            </div>
                        </div>
                        <!-- District -->
                        <div class="col-sm-4 ">
                            <div class="description-block">
                                <h5 class="description-header">{{ ucfirst($house->district->name) }}</h5>
                                <span class="description-text">DISTRICT</span>
                            </div>
                        </div>

                        <!-- </div> -->
                        <!-- Additional Rows -->
                        <!-- <div class="row mt-3"> -->
                        <!-- Tehsil -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ ucfirst($house->tehsil->name) }}</h5>
                                <span class="description-text">TEHSIL</span>
                            </div>
                        </div>

                        <!-- Panchayat -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ ucfirst($house->panchayat->name) }}</h5>
                                <span class="description-text">PANCHAYAT</span>
                            </div>
                        </div>
                        <!-- Ward -->
                        <div class="col-sm-4 ">
                            <div class="description-block">
                                <h5 class="description-header">{{ ucfirst($house->ward->name) }}</h5>
                                <span class="description-text">WARD</span>
                            </div>
                        </div>

                        <!-- Village -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $house->village }}</h5>
                                <span class="description-text">VILLAGE</span>
                            </div>
                        </div>
                        <!-- Location -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $house->location }}</h5>
                                <span class="description-text">LOCATION</span>
                            </div>
                        </div>
                    </div>
                    <!-- QR Codes -->
                    <div class="row mt-3">
                        @foreach($house->dustbins as $index => $dustbin)
                        <div class="col-sm-6 {{ $index % 2 == 0 ? 'border-right' : '' }}">
                            <div class="description-block">
                                <h5 class="description-header pb-4">{{ $dustbin->dustbinType->name}} Garbage QR</h5>
                                <div>{!! $dustbin->qrcode !!}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Css section -->
    @section('css')
    <style>
        .widget-user .widget-user-header {
            height: 200px;
        }
    </style>
    @endsection
</x-admin>