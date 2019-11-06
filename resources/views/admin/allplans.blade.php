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
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-code"></i><span class="hide-menu">My Apps</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i class="fas fa-plus"></i><span class="hide-menu"> Create New App </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="fas fa-shopping-basket"></i><span class="hide-menu"> My App Purchases </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tables.html" aria-expanded="false"><i class="fas fa-people-carry"></i><span class="hide-menu">Upcoming Apps</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="fas fa-question"></i><span class="hide-menu">Help</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="far fa-envelope"></i><span class="hide-menu">Contact Us</span></a></li>

                        {{-- Admin Links --}}
                        
                        <li class="sidebar-item"> <a class="active sidebar-link waves-effect waves-dark sidebar-link" href="{{route('plans.index')}}" aria-expanded="false"><i class="fas fa-boxes"></i><span class="hide-menu">All Plans</span></a></li>
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
    <div class="col">

            
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    {{ $message }}
            </div>
            @endif

        <div class="card">
            <div class="card-header">
                    <h3 class="card-title">All Application Plans</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                <table id="zero_config" class="text-center table dataTable" role="grid" aria-describedby="zero_config_info">
                        <thead>
                            <tr role="row">
                                <th tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 176.2px;">Icon</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 281px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 129.8px;">Action</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 60.2px;">Price</th>
                        </thead>
                        <tbody>
                            @foreach ($apps as $app)
                                <tr>
                                    <td class="mx-auto text-center"><img src="{{$app->icon}}" class="rounded-circle text-center" style="height:45px;width:45px" alt=""></td>
                                    <td>{{$app->name}}</td>
                                    <td>
                                        <form action="{{route('plans.edit',$app->id)}}" method="GET">
                                            @csrf
                                            {{-- {{ method_field('get') }} --}}
                                            <input type="submit" value="Edit" class="d-inline-block btn btn-sm btn-warning">
                                        </form>
                                    </td>
                                    <td>₹ {{$app->price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Icon</th>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Action</th>
                                <th rowspan="1" colspan="1">Price</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
        $('#zero_config').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": [0,2] }
            ]
        });
</script>

@if ($message = Session::get('success'))
<script src="{{URL::asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
<script>
    setTimeout(function(){toastr.success("{{$message}}", 'Application Plan Delete');}, 2000);
    
</script>
@endif



@endsection
