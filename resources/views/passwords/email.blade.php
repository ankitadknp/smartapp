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
              <div class="card-header"><h4>Forgot Password</h4></div>
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin-bottom: 0px">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
              @endif
              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST" action="{{route('password.email')}}">
                @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus placeholder="Email">

                    <div class="d-block">
                        <div class="float-right">
                            <a href="{{route('login')}}" class="text-small">
                                Login
                            </a>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Forgot Password
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