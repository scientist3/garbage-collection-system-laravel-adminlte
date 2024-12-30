<x-admin>
    @section('title', 'Household Details')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Household Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.house.index') }}" class="btn btn-info btn-sm">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <p><strong>State:</strong> {{ $house->state }}</p>
                    <p><strong>District:</strong> {{ $house->district }}</p>
                    <p><strong>Tensil:</strong> {{ $house->tensil }}</p>
                    <p><strong>Panchayat:</strong> {{ $house->panchayat }}</p>
                    <p><strong>Ward:</strong> {{ $house->ward }}</p>
                    <p><strong>Village:</strong> {{ $house->village }}</p>
                    <p><strong>House Owner Name:</strong> {{ $house->house_owner_name }}</p>
                    <p><strong>Parentage:</strong> {{ $house->parentage }}</p>
                    <p><strong>Phone No:</strong> {{ $house->phone_no }}</p>
                    <p><strong>Location:</strong> {{ $house->location }}</p>
                    <p><strong>Wet Garbage QR:</strong> {!! $house->wet_garbage_qr !!}</p>
                    <p><strong>Dry Garbage QR:</strong> {!! $house->dry_garbage_qr !!}</p>
                </div>
            </div>
        </div>
    </div>
</x-admin>