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
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="charts.html" aria-expanded="false"><i class="fas fa-play"></i><span class="hide-menu">All Aps</span></a></li>
                        <li class="sidebar-item"> <a class="active sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-code"></i><span class="hide-menu">My Apps</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{route('appreq')}}" class="active sidebar-link"><i class="fas fa-plus"></i><span class="hide-menu"> Create New App </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="fas fa-shopping-basket"></i><span class="hide-menu"> My App Purchases </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tables.html" aria-expanded="false"><i class="fas fa-people-carry"></i><span class="hide-menu">Upcoming Apps</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="fas fa-question"></i><span class="hide-menu">Help</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="far fa-envelope"></i><span class="hide-menu">Contact Us</span></a></li>

                        {{-- Admin Links --}}
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('plans.index')}}" aria-expanded="false"><i class="fas fa-boxes"></i><span class="hide-menu">All Plans</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('plans.create')}}" aria-expanded="false"><i class="far fa-plus-square"></i><span class="hide-menu">Add Plan</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="fas fa-inbox"></i><span class="hide-menu">Requests</span></a></li>

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
    <div class="col-md-2"></div>
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create New App</h4>
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
                                                            <h4 class="card-title">Personal Info</h4>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="fname" placeholder="First Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="lname" placeholder="Last Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                                                <div class="col-sm-9">
                                                                    <input type="password" class="form-control" id="lname" placeholder="Password Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Company</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="email1" placeholder="Company Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="cono1" placeholder="Contact No Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Message</label>
                                                                <div class="col-sm-9">
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border-top">
                                                            <div class="card-body">
                                                                <button type="button" class="btn btn-primary">Submit</button>
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
                                                            <h4 class="card-title">Personal Info</h4>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="fname" placeholder="First Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="lname" placeholder="Last Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                                                <div class="col-sm-9">
                                                                    <input type="password" class="form-control" id="lname" placeholder="Password Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Company</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="email1" placeholder="Company Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="cono1" placeholder="Contact No Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Message</label>
                                                                <div class="col-sm-9">
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border-top">
                                                            <div class="card-body">
                                                                <button type="button" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-20" id="messages" role="tabpanel">
                                    <div class="p-4">
                                            <div class="card">
                                                    <form class="form-horizontal">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Personal Info</h4>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="fname" placeholder="First Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="lname" placeholder="Last Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                                                <div class="col-sm-9">
                                                                    <input type="password" class="form-control" id="lname" placeholder="Password Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Company</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="email1" placeholder="Company Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="cono1" placeholder="Contact No Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Message</label>
                                                                <div class="col-sm-9">
                                                                    <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border-top">
                                                            <div class="card-body">
                                                                <button type="button" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                    </div>
                                </div>
                            </div>
                </div>
                    <!-- Nav tabs -->
                    
            </div>
    </div>
    <div class="col-md-2"></div>
</div>

@endsection