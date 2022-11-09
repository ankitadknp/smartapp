<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <link rel="shortcut icon" href="{{asset('public/favicon.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('public/favicon.ico')}}" type="image/x-icon">
        <title>Login &mdash; Smart Citizen App</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{asset("public/assets/modules/bootstrap/css/bootstrap.min.css")}}">
        <link rel="stylesheet" href="{{asset("public/assets/modules/fontawesome/css/all.min.css")}}">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{asset("public/assets/modules/bootstrap-social/bootstrap-social.css")}}">

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{asset("public/assets/css/style.css")}}">
        <link rel="stylesheet" href="{{asset("public/assets/css/components.css")}}">
        <link rel="stylesheet" href="{{asset("public/css/style.css")}}">
    </head>
    <body>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="login-brand">
                                <img src="{{asset("public/assets/images/smart_logo.png")}}" alt="logo" width="150">
                            </div>
                            <div class="card card-primary">
                                <div class="card-header title"><h3>Login</h3></div>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul style="margin-bottom: 0px">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="card-body">
                                    <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="" autocomplete="off">
                                        @csrf
                                        <input type="email" name="email" style="display: none;">
                                        <input type="password" name="password" style="display:none">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="text" class="form-control" name="email" value="" tabindex="1" required autocomplete="off" autofocus placeholder="Email">
                                            <div class="invalid-feedback">
                                                Please fill in your email
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input class="form-control" type="password" name="password" id="password" value="" autocomplete="off" required placeholder="Password">
                                                <div class="input-group-addon password_eye">
                                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                </div>
                                            </div>

                                            <div class="d-block">
                                                <div class="float-right">
                                                    <a href="{{route('password.request')}}" class="text-small">
                                                        Forgot Password?
                                                    </a>
                                                </div>
                                            </div>
                                          
                                            <div class="invalid-feedback">
                                                please fill in your password
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="simple-footer">
                                Copyright &copy; {{date("Y")}} 
                                <div class="bullet"></div> Powered By <a href="https://www.knp-tech.com/">KNP Technologies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- General JS Scripts -->
        <script src="{{asset("public/assets/modules/jquery.min.js")}}"></script>
        <script src="{{asset("public/assets/modules/popper.js")}}"></script>
        <script src="{{asset("public/assets/modules/tooltip.js")}}"></script>
        <script src="{{asset("public/assets/modules/bootstrap/js/bootstrap.min.js")}}"></script>
        <script src="{{asset("public/assets/modules/nicescroll/jquery.nicescroll.min.js")}}"></script>
        <script src="{{asset("public/assets/modules/moment.min.js")}}"></script>
        <script src="{{asset("public/assets/js/stisla.js")}}"></script>

        <!-- Template JS File -->
        <script src="{{asset("public/assets/js/scripts.js")}}"></script>
        <script src="{{asset("public/assets/js/custom.js")}}"></script>
        <script src="{{asset("public/js/scripts.js")}}"></script>
    </body>
</html>