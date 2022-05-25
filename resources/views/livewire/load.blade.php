<div>
    <form action="{{ route('download') }}" method="POST" class="row">
        @csrf

        <div class="col-md-6">
            <div class="form-group">
                <label for="input_from">From</label>
                <input type="date" class="form-control" name="start" id="input_from" placeholder="Start Date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="input_to">To</label>
                <input type="date" class="form-control" name="end" id="input_to" placeholder="End Date">
            </div>
        </div>

        <div class="col-md-12  d-flex justify-content-center">
            <button type="submit" class="btn btn-info">Download</button>
        </div>
    </form>
</div>
