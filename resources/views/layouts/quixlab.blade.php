<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title . ' | ' . env('APP_NAME')}}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="{{asset('quixlab/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('quixlab/icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

</head>

<body class="dark">
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <div class="nav-header" style="background-color: #FF9859;">
            <div class="brand-logo">
                <a href="/home">
                    <b class="logo-abbr">
                        <h3 class="text-white">
                            KIP
                        </h3>
                    </b>
                    <span class="logo-compact">
                        <h3 class="text-white">
                            Kuta Indah Persada
                        </h3>
                    </span>
                    <span class="brand-title">
                        <h3 class="text-white" style="margin-top: -12px;">
                            Kuta Indah Persada
                        </h3>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                   class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard"
                               aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                                <span><i class="fa fa-user"></i> {{Auth::user()->name}} |
                                    {{Auth::user()->getRole->deskripsi}}</span> <i
                                   class="fa fa-angle-down"
                                   aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn faster dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()"><i class="fa fa-address-card"></i> Profil</a>
                                        </li>
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"><i
                                                   class="fa fa-sign-out"></i> Logout</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @if (Auth::user()->user_role_id == 1)
        @include('layouts._nav_admin')

        @elseif(Auth::user()->user_role_id == 2)
        @include('layouts._nav_drafter')

        @elseif(Auth::user()->user_role_id == 3)
        @include('layouts._nav_drafter')

        @elseif(Auth::user()->user_role_id == 4)
        @include('layouts._nav_drafter')

        @elseif(Auth::user()->user_role_id == 5)
        @include('layouts._nav_drafter')

        @endif
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->

            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('quixlab/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('quixlab/js/custom.min.js')}}"></script>
    <script src="{{asset('quixlab/js/settings.js')}}"></script>
    <script src="{{asset('quixlab/js/gleek.js')}}"></script>
    {{-- <script src="{{asset('quixlab/js/styleSwitcher.js')}}"></script> --}}

</body>

</html>