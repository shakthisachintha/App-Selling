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

<div class="container-fluid">
   <div class="row">
       <div class="col-md-1"></div>
       <div class="col-md-10">
            <div class="card">
                    <div class="card-header">
                            <h3 class="card-title">All Applications</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <table id="zero_config" class="text-center table dataTable" role="grid" aria-describedby="zero_config_info">
                                <thead>
                                    <tr role="row">
                                        <th tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Icon</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Action</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Status</th>
                                </thead>
                                <tbody>
                                    @foreach ($apps as $app)
                                        <tr>
                                            <td class="mx-auto text-center"><img src="{{\Storage::url($app->appLogo)}}" class="rounded-circle text-center" style="height:45px;width:45px" alt=""></td>
                                            <td>{{$app->appName}}</td>
                                            <td>
                                                <a onclick="window.open('{{route('vieworder',$app->id)}}','popUpWindow','height=700,width=1024,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" class="btn btn-sm btn-primary">View</a>
                                                @if($app->delivered=="YES")
                                                <a href="{{route('vieworder',$app->id)}}" class="btn btn-sm btn-success">Download</a>
                                                @endif
                                                <a href="{{route('delorder',$app->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                            <td>
                                                @if ($app->payment=="YES")
                                                    <span class="badge badge-success">Purchased</span>
                                                @else
                                                <span class="badge badge-danger">Not Purchased</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Icon</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Action</th>
                                        <th rowspan="1" colspan="1">Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        </div>
                        </div>
        
                    </div>
                </div>
       </div>
       <div class="col-md-1"></div>
   </div>
</div>

@endsection