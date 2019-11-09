@extends('template.main')

@section('left_sidebar')
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
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('appreq')}}" aria-expanded="false"><i class="fas fa-plus"></i><span class="hide-menu">Create New App</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('apppurch')}}" aria-expanded="false"><i class="fas fa-shopping-basket"></i></i><span class="hide-menu">My App Purchases</span></a></li>
                                
                                
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('upcomming')}}" aria-expanded="false"><i class="fas fa-people-carry"></i><span class="hide-menu">Upcoming Apps</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('help')}}" aria-expanded="false"><i class="fas fa-question"></i><span class="hide-menu">Help</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('contact')}}" aria-expanded="false"><i class="far fa-envelope"></i><span class="hide-menu">Contact Us</span></a></li>
        
                                {{-- Admin Links --}}
                                
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('plans.index')}}" aria-expanded="false"><i class="fas fa-boxes"></i><span class="hide-menu">All Plans</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('plans.create')}}" aria-expanded="false"><i class="far fa-plus-square"></i><span class="hide-menu">Add Plan</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('orders')}}" aria-expanded="false"><i class="fas fa-inbox"></i><span class="hide-menu">Requests</span></a></li>
        
                                {{-- End Admin Links --}} 
                            </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
@endsection

@section('content')

<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Application {{$order->appName}} (#{{$order->orderId}})</h4>
                    </div>
                    <div class="card-body p-0">
                            <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">App Info</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Ads</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Download App</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="p-4">
                                                <div class="card">
                                                        <form class="form-horizontal">
                                                            <div class="card-body">
                                                                <h4 class="card-title">App Info</h4>
                                                                <div class="form-group row">
                                                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">App Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" readonly name="appname" value="{{$order->appName}}" class="form-control" id="fname" placeholder="App Name">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group row">
                                                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Package Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="{{$order->packageName}}" name="packagename" readonly class="form-control" id="lname" placeholder="Package Name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">App Version</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="{{$order->appVersion}}" readonly name="appversion" class="form-control" id="email1" placeholder="App Version">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Privacy Policy</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="privacy" value="{{$order->privacy}}" readonly class="form-control" id="cono1" placeholder="Privacy Policy">
                                                                    </div>
                                                                </div>
                                                
                                                            </div>
                                                           
                                                        </form>
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                        <div class="p-4">
                                                <div class="card">
                                                        <form class="form-horizontal">
                                                        
                                                            <div class="card-body">
                                                                <h4 class="card-title">Advertising Info</h4>
                                            
                                                                
                                                                        @if ($order->admobBanner)
                                                                        <div class="form-group row">
                                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Admob Banner</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" readonly value="{{$order->admobBanner}}" class="form-control" id="fname" name="admobbanner" placeholder="Admob Banner">
                                                                            </div>
                                                                        </div>
                                                                        @endif

                                                                        @if ($order->admobInter)
                                                                            <div class="form-group row">
                                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Admob Interstitial</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" readonly value="{{$order->admobInter}}" class="form-control" id="lname" name="admobinter" placeholder="Admob Interstitial">
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        
                                                                        @if ($order->admobNative)
                                                                            <div class="form-group row">
                                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Admob Native</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" readonly value="{{$order->admobInter}}" class="form-control" name="admobnative" id="lname" placeholder="Admob Native">
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        
                                                                        @if($order->facebookBanner)
                                                                            <div class="form-group row">
                                                                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Facebook Banner</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" readonly value="{{$order->facebookBanner}}" class="form-control" id="email1" placeholder="Facebook Banner">
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        @if($order->facebookInter)
                                                                            <div class="form-group row">
                                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Facebook Interstitial</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" readonly value="{{$order->facebookInter}}" class="form-control" id="cono1" placeholder="Facebook Interstitial">
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        @if($order->facebookNative)
                                                                            <div class="form-group row">
                                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Facebook Native</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" readonly value="{{$order->facebookNative}}" class="form-control" id="cono1" placeholder="Facebook Interstitial">
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        @if($order->facebookNativeBanner)
                                                                            <div class="form-group row">
                                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Facebook Native Banner</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" readonly value="{{$order->facebookNativeBanner}}" class="form-control" id="cono1" placeholder="Facebook Interstitial">
                                                                                </div>
                                                                            </div>
                                                                        @endif
    
                                                                </div>
                                                        </form>
                                                </div>
                                        </div>
                                    </div>
    
             
       
    
                                    <div class="tab-pane p-20" id="messages" role="tabpanel">
                                        <div class="p-4">
                                                <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="card-title">Get Your App</h3>
                                                                
                                                                    
                                                                </div>
                                                            </div>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                        <!-- Nav tabs -->
                        
                </div>
        </div>
        <div class="col-md-1"></div>
    </div>

@endsection