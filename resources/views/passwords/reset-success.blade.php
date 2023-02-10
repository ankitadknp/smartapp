<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('public/favicon.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('public/favicon.ico')}}" type="image/x-icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ Config::get('constants.TITLE') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a href="{{route("login")}}">
                        <img src="{{asset("public/assets/images/smart_logo.png")}}" alt="logo" class="img-fluid" style="height: 25px">
                    </a>

                    <a class="navbar-brand" href="#" style="margin-left:19px">
                    {{ Config::get('constants.TITLE') }}
                    </a>
                   
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">{{ __('Reset Password') }}</div>
                                <div class="card-body">
                                    <div class="alert">
                                        <label class="alert alert-success">Password reset successfully. Now you can login using new password</label>
                                        @if (Route::has('login'))
                                        <a class="btn btn-link" href="{{ route('login') }}">
                                        </a>
                                        @endif
                                    </div>
                                    <div class="d-block">
                                        <a href="{{route('login')}}" class="btn btn-primary" style="margin-left: 446px;background-color: #2a48a2;">
                                            Login
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>

