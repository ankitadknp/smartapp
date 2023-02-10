<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

        <!-- CSRF Token -->
        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title') &mdash; {{ Config::get('constants.TITLE') }}</title>

        <link rel="shortcut icon" href="{{asset('public/favicon.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('public/favicon.ico')}}" type="image/x-icon">


        <link rel="stylesheet" href="{{asset('public/assets/modules/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/assets/modules/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/assets/modules/ionicons/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/assets/modules/izitoast/css/iziToast.min.css')}}">
        <link rel="stylesheet" href="{{asset("public/assets/modules/select2/dist/css/select2.min.css")}}">

        <!--pages css file-->
        @yield('addcss')

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{asset("public/assets/css/style.css")}}">
        <link rel="stylesheet" href="{{asset("public/assets/css/components.css")}}">
        <style>
            .pull-left{
                float: left;
            }
            .pull-right{
                float: right;
            }
            .clearfix{
                clear: both;
            }

        </style>
        <script type="text/javascript">
            var google_map_api_key = "{{env('GOOGLE_MAP_API_KEY')}}";
        </script>
    </head>
    <body>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar">
                    <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                            <li>
                                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none">
                                    <i class="fas fa-search"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="search-element" style="display: none;">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown dropdown-list-toggle notification-list" style="display:none">
                            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
                                <i class="far fa-bell"></i>
                            </a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="dropdown-header">Notifications</div>
                                <div class="dropdown-list-content dropdown-list-icons dropdown-list-notification"></div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                
                                <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->first_name}}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('edit_profile',Auth::user()->id)}}" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <a href="{{route('change_password',Auth::user()->id)}}" class="dropdown-item has-icon">
                                    <i class="fas fa-unlock"></i> Change Password
                                </a>                                
                                <div class="dropdown-divider"></div>
                                <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                @yield('sidebar')

                @yield('content')

                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright &copy; {{date("Y")}} 
                        <div class="bullet"></div> Powered By <a href="https://www.knp-tech.com/">KNP Technologies</a>
                    </div>
                    <div class="footer-right">
                    </div>
                </footer>
            </div>
        </div>

        <!-- General JS Scripts -->
        <script type="text/javascript" src="{{asset("public/assets/modules/jquery.min.js")}}"></script>
        <script type="text/javascript" src="{{asset("public/assets/modules/jquery.validate.min.js")}}"></script>
        <script src="{{asset("public/assets/modules/popper.js")}}"></script>
        <script src="{{asset("public/assets/modules/tooltip.js")}}"></script>
        <script src="{{asset("public/assets/modules/bootstrap/js/bootstrap.min.js")}}"></script>
        <script src="{{asset("public/assets/modules/nicescroll/jquery.nicescroll.min.js")}}"></script>
        <script src="{{asset("public/assets/modules/moment.min.js")}}"></script>
        <script src="{{asset("public/assets/js/stisla.js")}}"></script>
        <script src="{{asset("public/assets/modules/izitoast/js/iziToast.min.js")}}"></script>
        <script src="{{asset("public/assets/modules/sweetalert/sweetalert.min.js")}}"></script>

        <script src="{{asset("public/assets/modules/jquery-validation/jquery.validate.min.js")}}"></script>
        <script src="{{asset("public/assets/modules/jquery-validation/additional-methods.min.js")}}"></script>
        <script src="{{asset("public/assets/modules/select2/dist/js/select2.full.min.js")}}"></script>
        <!--convert utc time stemp to local time-->
        <script src="{{asset("public/assets/js/local-time.js")}}"></script>
        @if (session('success'))
        <script type="text/javascript">
            iziToast.success({
                message: '{{ session("success") }}',
                position: 'topRight'
            });
        </script>
        @endif

        @if (session('error'))
        <script type="text/javascript">
            iziToast.error({
                message: '{{ session("error") }}',
                position: 'topRight'
            });
        </script>
        @endif

        <script type="text/javascript">
            var todayDate = new Date();
            var timestamp = -todayDate.getTimezoneOffset() * 60;

            jQuery.ajaxSetup({
                beforeSend: function (xhr, data) {
                    console.log("timestamp =" + timestamp);
                    data.data += '&timestamp=' + timestamp;
                },
                complete: function ()
                {
                }
            });
        </script>


        <!-- Page Specific JS File -->
        @yield('addjs')

        <!-- Template JS File -->
        <script src="{{asset("public/assets/js/scripts.js")}}"></script>
        <script src="{{asset("public/assets/js/custom.js")}}"></script>



        <script type="text/javascript">
            var reminder_url = "";

            function strip(html) {
                var tmp = document.createElement("DIV");
                tmp.innerHTML = html;
                var str = tmp.textContent || tmp.innerText || "";
                return str.trim();
            }

            $(".convertDateTime").each(function () {
                var timestemp = parseInt($(this).text());
                var date = formatDateLocal("{{config('constants.JS_DATE_TIME_FORMAT')}}", timestemp * 1000, false);
                $(this).text(date);
            });
            
            $(".convertDate").each(function () {
                var timestemp = parseInt($(this).text());
                var date = formatDateLocal("{{config('constants.JS_DATE_FORMAT')}}", timestemp * 1000, false);
                $(this).text(date);
            });
            
            $(".convertTime").each(function () {
                var timestemp = parseInt($(this).text());
                var date = formatDateLocal("{{config('constants.JS_TIME_FORMAT')}}", timestemp * 1000, false);
                $(this).text(date);
            });

            jQuery(document).ready(function () {

                jQuery.validator.addMethod('filesize', function (value, element, param) {
                    return this.optional(element) || (element.files[0].size <= param)
                }, 'File size must be less than 2 MB');

                jQuery.ajaxSetup({
                    beforeSend: function (xhr, data) {
                        data.data += '&_token=' + $('meta[name="csrf-token"]').attr('content') + '&timestamp=' + timestamp;
                    },
                    complete: function ()
                    {
                    }
                });
            });
        </script> 
    </body>
</html>
