<?php 
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('assets/images/favicon.png')}}">
    <title>App Management Platform</title>

    <link href="{{ URL::asset('assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/style.min.css')}}" rel="stylesheet">

    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/extra-libs/multicheck/multicheck.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">
  
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../../assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" />
                            
                        </span>
                      
                    </a>
                  
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                      
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mr-2 text-white">{{$user->name}}</span><img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i>Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                    <button style="cursor:pointer" class="dropdown-item" type="submit"><i class="fa fa-power-off m-r-5 m-l-5"></i>Logout</button>
                                </form>
                            
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        @yield('left_sidebar')
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            
                @yield('content')
            
            </div>
            
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

            <footer class="footer text-center">
                All Rights Reserved by App Management System. 
            </footer>
           
        </div>
       
    </div>
   
    <script src="{{URL::asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <script src="{{URL::asset('dist/js/waves.js')}}"></script>
    <script src="{{URL::asset('dist/js/sidebarmenu.js')}}"></script>
    <script src="{{URL::asset('dist/js/custom.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{URL::asset('assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{URL::asset('assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{URL::asset('assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{URL::asset('assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{URL::asset('dist/js/pages/chart/chart-page-init.js')}}"></script>

    <script src="{{URL::asset('assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{URL::asset('assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{URL::asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>

    @yield('scripts')

</body>

</html>