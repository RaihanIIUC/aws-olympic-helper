<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('helper.style')
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">


                    @include('helper.range')

                    <div class="card-body text-center">
                        <h5 class="card-title m-b-0">Table In our hand {{ $total }}</h5>
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
                                @foreach($sms as $s)
                                    <tr>
                                        <td>{{ $no_count++ }}</td>
                                        <td>{{ $s->message }}</td>
                                        <td>{{ $s->sourceAddress }}</td>
                                        <td>{{ $s->created_at }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="d-flex">
                            <div class="mx-auto">
                                {{ $sms->links("pagination::bootstrap-4") }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
