<div class="col-lg-12 border border-dark my-4">
    <h2 class="mb-5 text-center">(Date Range) To Pull data </h2>
    <form action="{{ route('query') }}" method="POST" class="row">
        @csrf

        <div class="col-md-6">
            <div class="form-group">
                <label for="input_from">From</label>
                <input type="date" class="form-control" name="start_at" id="input_from" placeholder="Start Date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="input_to">To</label>
                <input type="date" class="form-control" name="end_at" id="input_to" placeholder="End Date">
            </div>
        </div>

        <div class="col-md-12  d-flex justify-content-center my-3">
            <button type="submit" class="btn btn-info">Search</button>
        </div>
    </form>
</div>
