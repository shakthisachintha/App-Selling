<?php 
use Illuminate\Support\Facades\Auth;
use App\Order;
$user = Auth::user();

$new_reqs=Order::where('responded','NO')->where('payment','YES')->count();
$responded=Order::where('delivered','YES')->where('viewed','NO')->where('user_id',$user->id)->count();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Apdue Is an Online Android Application Building Service.Easily Develop Your Dream Mobile Application.">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('assets/images/favicon.png')}}">
    <title>Apdue Android App Builder</title>
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <link href="{{ URL::asset('assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/style.min.css')}}" rel="stylesheet">

    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/extra-libs/multicheck/multicheck.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">
  
</head>

<body>
        <script>
                $(document).ready(function () {
                    $('.count').each(function () {
                    $(this).prop('Counter',0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 4000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
                });
                
            </script>

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
                    <a class="navbar-brand" href="{{url('/')}}">
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
        
        
        

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                        <ul id="sidebarnav" class="p-t-30">
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('home')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('allaps')}}" aria-expanded="false"><i class="fas fa-play"></i><span class="hide-menu">All Aps</span></a></li>
                                <li class="sidebar-item @yield('active')"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('appreq')}}" aria-expanded="false"><i class="fas fa-plus"></i><span class="hide-menu">Create New App</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('apppurch')}}" aria-expanded="false"><i class="fas fa-shopping-basket"></i></i><span class="hide-menu">My App Purchases</span>@if($responded>0)<span class="badge badge-pill badge-success">{{$responded}}</span>@endif</a></li>
                                
                                
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('upcomming')}}" aria-expanded="false"><i class="fas fa-people-carry"></i><span class="hide-menu">Upcoming Apps</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('help')}}" aria-expanded="false"><i class="fas fa-question"></i><span class="hide-menu">Help</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('contact')}}" aria-expanded="false"><i class="far fa-envelope"></i><span class="hide-menu">Contact Us</span></a></li>
        
                                {{-- Admin Links --}}
                                @if ($user->email=='admin@apdue.com')
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('plans.index')}}" aria-expanded="false"><i class="fas fa-boxes"></i><span class="hide-menu">All Plans</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('plans.create')}}" aria-expanded="false"><i class="far fa-plus-square"></i><span class="hide-menu">Add Plan</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('addcat')}}" aria-expanded="false"><i class="fas fa-list-ol"></i><span class="hide-menu">Add Category</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('orders')}}" aria-expanded="false"><i class="fas fa-inbox"></i><span class="hide-menu">Requests</span>@if($new_reqs>0)<span class="badge badge-pill badge-success">{{$new_reqs}}</span>@endif</a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('allusers')}}" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">All Users</span></a></li>
                                @endif
                                {{-- End Admin Links --}} 
                            </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->




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

            <footer class="mx-auto footer text-center">
                All Rights Reserved by Apdue App Management System. 
            </footer>
           
        </div>
       
    </div>
   
    {{-- <script src="{{URL::asset('assets/libs/jquery/dist/jquery.min.js')}}"></script> --}}
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
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
    <script src="//code.tidio.co/cx0bxjichqelfzbvk15vgga4derbcazq.js"></script>
    @yield('scripts')

</body>

</html>