<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .nav-height {
                height: 9vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                background-color: #2f74e2;
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                background-color: #2f74e2;
                position: absolute;
                left: 10px;
                top:18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #top-bar{
                background-color: #2f74e2;
                font-size: 25px;
            }
        </style>
    </head>
    <body>
        <div id="top-bar" class="flex-center position-ref nav-height">
                <div class="top-left"><img src="{{asset('images/logoncc1.png')}}" alt="logo ncc"></div>
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ route('data.index') }}" style="color:#fff" style="font-size: 50px">Home</a>
                            <a href="{{ route('register') }}" style="color:#fff">Create a new admin account</a>
                        @else
                            <a href="{{ route('login') }}">Login as admin</a>
                        @endauth
                    </div>
                @endif
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" align="center">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="flex-center position-ref full-height" style="background-color">
            <div class="content">
                <div class="title m-b-md text-dark">
                    Reservasi PC NCC
                </div>

                <div class="row">
                    <div class="col">
                        <a href="{{route('data.create') }}" class="img"><img src="{{asset('images/img-komputer2.png')}}" alt="img-komputer"></a>
                        <a href="{{route('data.create') }}" class="btn btn-primary btn-block">Input Data Peminjaman PC</a> 
                    </div>
                    <div class="col">
                        <a href="{{route('data.upload')}}" class="img"><img src="{{asset('images/img-upload.png')}}" alt="img-upload"></a>                        
                        <a href="{{route('data.upload')}}" class="btn btn-primary btn-block">Upload File Berkas</a> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
