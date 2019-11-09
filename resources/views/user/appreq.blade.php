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
                        <li class="sidebar-item"> <a class="active sidebar-link waves-effect waves-dark sidebar-link" href="{{route('allaps')}}" aria-expanded="false"><i class="fas fa-play"></i><span class="hide-menu">All Aps</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-code"></i><span class="hide-menu">My Apps</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{route('appreq')}}" class="sidebar-link"><i class="fas fa-plus"></i><span class="hide-menu"> Create New App </span></a></li>
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

<div class="container-fluid">
    <div class="row el-element-overlay">
        @foreach ($plans as $plan)
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"> <img src="{{$plan->icon}}" alt="user">
                        {{-- <div class="el-overlay">
                            <ul class="list-style-none el-info">
                            <li class="el-item"><a class="btn btn-sm  btn-primary-outline el-link" target="new" href="{{$plan->videoLink}}">Video</a></li>
                                <li class="el-item"><a class="btn btn-sm  btn-primary-outline el-link" target="new" href="{{$plan->prevLink}}">Preview</a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="el-card-content">
                        <h4 class="m-b-0">{{$plan->name}}</h4> <span class="text-muted">
                    <div class="row mt-1">
                        <div class="text-left ml-1 col-12">
                            <a class="btn btn-sm  btn-outline-primary pl-3 pr-3" target="new" href="{{$plan->videoLink}}">Video</a>
                            <a class="btn btn-sm  btn-outline-primary" target="new" href="{{$plan->prevLink}}">Preview</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="text-left ml-1 col-7">
                            <a href="{{route('makeapp',$plan->id)}}" class="btn btn-success"> Create New App </a>
                            
                        </div>
                        <div class="col-4">
                            <h4 class="pt-2 text-right text-dark">₹{{$plan->price}}</h4>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection