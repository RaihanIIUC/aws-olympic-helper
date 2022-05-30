<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- @include('helper.Style') --}}
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

                    @include('helper.tableIndex')


                </div>
            </div>
        </div>
    </div>
</body>

</html>
