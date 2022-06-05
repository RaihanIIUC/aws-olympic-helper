<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('helper.style')
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-info" href="{{ url("/") }}">Back to Home</a>

                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title m-b-0">Table In SearchByDate</h5>
                    </div>


                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">sourceAddress</th>
                                    <th scope="col">Created at</th>


                                </tr>
                            </thead>
                            <tbody class="customtable">
                                @forelse($foundSms as $s)
                                    <tr>
                                        <td>{{ $s->id }}</td>
                                        <td>{{ $s->message }}</td>
                                        <td>{{ $s->sourceAddress }}</td>
                                        <td>{{ $s->created_at }}</td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="text-center">No data found</td>


                                    </tr>

                                @endforelse

                            </tbody>
                        </table>

                        <div class="d-flex">
                            <div class="mx-auto">
                                {{ $foundSms->links("pagination::bootstrap-4") }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
