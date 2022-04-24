<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        body {
            background-color: #673AB7;
            font-family: 'Calibri', sans-serif !important
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
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

                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody class="customtable">
                                @foreach($sms as $s)
                                <tr>
                                    <td>{{ $s->id }}</td>
                                    <td>{{ $s->message}}</td>
                                    <td>{{ $s->sourceAddress}}</td>

                                    <th> <label class="customcheckbox"> <input type="checkbox" class="listCheckbox">
                                            <span class="checkmark"></span> </label> </th>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $sms->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>