<x-admin>
    @section('title', 'Create Household')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Household</h3>
                    <div class="card-tools">
                        <a href="{{ route('houses.index') }}" class="btn btn-info btn-sm">Back</a>
                    </div>
                </div>
                <form action="{{ route('houses.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" required>
                        </div>
                        <div class="form-group">
                            <label for="district">District</label>
                            <input type="text" class="form-control" id="district" name="district" required>
                        </div>
                        <div class="form-group">
                            <label for="tensil">Tensil</label>
                            <input type="text" class="form-control" id="tensil" name="tensil" required>
                        </div>
                        <div class="form-group">
                            <label for="panchayat">Panchayat</label>
                            <input type="text" class="form-control" id="panchayat" name="panchayat" required>
                        </div>
                        <div class="form-group">
                            <label for="ward">Ward</label>
                            <input type="text" class="form-control" id="ward" name="ward" required>
                        </div>
                        <div class="form-group">
                            <label for="village">Village</label>
                            <input type="text" class="form-control" id="village" name="village" required>
                        </div>
                        <div class="form-group">
                            <label for="house_owner_name">House Owner Name</label>
                            <input type="text" class="form-control" id="house_owner_name" name="house_owner_name" required>
                        </div>
                        <div class="form-group">
                            <label for="parentage">Parentage</label>
                            <input type="text" class="form-control" id="parentage" name="parentage" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Phone No</label>
                            <input type="text" class="form-control" id="phone_no" name="phone_no" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
