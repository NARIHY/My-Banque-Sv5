<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$publiciter->titre}}</title>
    <link href="{{asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        /* body {
            background-color: rgb(143, 143, 143);
            padding: 20px;
        }
        .card {
            width: 100%;
            background-color: white;
        } */
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-title text-center">
                <h3>
                    {{$publiciter->titre}}
                </h3>
            </div>
            <div class="card-body">
                @if (!empty($publiciter->media))
                    <div class="row mb-3">
                        <div class="col md-6">
                            <p style="text-align: justify">
                                {{$publiciter->description_publicite}}
                            </p>
                        </div>
                        @php
                            $img = '/storage/'. $publiciter->media;
                        @endphp
                        <div class="col md-6">
                            <img src="data:image/jpg;base64, {{base64_encode($img)}}" alt="media" class="media">
                        </div>
                    </div>
                @else
                    <p style="text-align: justify">
                        {{$publiciter->description_publicite}}
                    </p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
