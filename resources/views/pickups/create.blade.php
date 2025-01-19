<x-admin>
    @section('title', 'Add New Pickup')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Pickup</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pickup.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="dustbin_code">Dustbin Code</label>
                            <input type="text" name="dustbin_code" id="dustbin_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Missed">Missed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="scanned_by">Scanned By</label>
                            <input type="text" name="scanned_by" id="scanned_by" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="geo_coordinates">Geo Coordinates</label>
                            <input type="text" name="geo_coordinates" id="geo_coordinates" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" id="remarks" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Pickup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>