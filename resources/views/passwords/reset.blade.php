<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Forgot Password &mdash; Smart Citizen App</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset("public/assets/modules/bootstrap/css/bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{asset("public/assets/modules/fontawesome/css/all.min.css")}}">

  <!-- CSS Libraries -->

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
                            <img src="{{asset("public/assets/images/smart_logo.png")}}" alt="logo" width="150" >
                        </div>
                        <div class="card card-primary">
                            <div class="card-header"><h4>{{ __('Reset Password') }}</h4></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-8">
                                            <div class="input-group" id="show_hide_password">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                <div class="input-group-addon rpassword_eye">
                                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                </div>
                                            </div>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-8">
                                            <div class="input-group" id="show_hide_cpassword">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                <div class="input-group-addon cpassword_eye">
                                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Reset Password') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
