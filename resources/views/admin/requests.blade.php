@extends('template.main')

@section('content')

<div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-dark text-center">
                    <h1 class="count font-light text-white">{{$total_orders}}</h1>
                    <h6 class="text-white">Total Orders</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="count font-light text-white">{{$this_month}}</h1>
                    <h6 class="text-white">Orders This Month</h6>
                </div>
            </div>
        </div>
         <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="count font-light text-white">{{$new_orders}}</h1>
                    <h6 class="text-white">Awaiting Deliveries<small>(New Orders)</small></h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">₹ <span class="count">{{$total}}</span></h1>
                    <h6 class="text-white">Totoal Earning</h6>
                </div>
            </div>
        </div>
</div>

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Orders Awaiting Deliveries <small class="text-success">(Payments Received)</small></h4>
                    
                    {{-- New Orders --}}
                    <div class="card">
                        <div class="comment-widgets scrollable ps-container ps-theme-default" data-ps-id="a2fc6c94-5b60-3326-a1af-1a1f10c83be6">
                            @foreach ($norders as $order)
                            <div class="d-flex flex-row border-top comment-row m-t-0">
                                <div class="p-2"><img src="{{\Storage::url($order->appLogo)}}" alt="user" width="70" height="70" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">{{$order->user->name}}</h6>
                                    @if ($order->paymentType=="FULL")
                                        <span class="badge badge-success">Full Payment</span>
                                    @else
                                        <span class="badge badge-primary">Half Payment</span>
                                    @endif 
                                    <span class="m-b-15 d-block">App Name : {{$order->appName}} &nbsp;|&nbsp; App Price : ₹{{$order->amount}} &nbsp;|&nbsp; App Version : {{$order->appVersion}} &nbsp;|&nbsp; App Plan : {{$order->appPlan->name}}</span>
                                    <div class="mt-2 comment-footer">
                                    <span class="text-muted float-right">{{$order->created_at}}</span> 
                                        <a onclick="window.open('{{route('viewreq',$order->id)}}','popUpWindow','height=700,width=1024,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" class="btn btn-cyan btn-sm">Edit</a>
                                        <a onclick="window.open('{{route('viewreq',$order->id)}}','popUpWindow','height=700,width=1024,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" class="btn btn-success btn-sm">Deliver</a>
                                        <a href="{{route('delorder',$order->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Revisions --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Revision Requested Apps<small class="text-success">(Payments Completed)</small></h4>
                    {{-- New Orders --}}
                    <div class="card">
                        <div class="comment-widgets scrollable ps-container ps-theme-default" data-ps-id="a2fc6c94-5b60-3326-a1af-1a1f10c83be6">
                            @foreach ($revisions as $order)
                            <div class="d-flex flex-row border-top comment-row m-t-0">
                                <div class="p-2"><img src="{{\Storage::url($order->appLogo)}}" alt="user" width="70" height="70" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">{{$order->user->name}}</h6>
                                    <span class="badge badge-warning">Regenerate</span>
                                    <span class="m-b-15 d-block">App Name : {{$order->appName}} &nbsp;|&nbsp; App Price : ₹{{$order->amount}} &nbsp;|&nbsp; App Version : {{$order->appVersion}}</span>
                                    <div class="mt-2 comment-footer">
                                    <span class="text-muted float-right">{{$order->created_at}}</span> 
                                        <a onclick="window.open('{{route('viewreq',$order->id)}}','popUpWindow','height=700,width=1024,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" class="btn btn-cyan btn-sm">Edit</a>
                                        <a onclick="window.open('{{route('viewreq',$order->id)}}','popUpWindow','height=700,width=1024,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" class="btn btn-success btn-sm">Deliver</a>
                                        <a href="{{route('delorder',$order->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- All Orders --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Requests</h4>
                    <div class="table-responsive">
                        <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <table id="zero_config" class="text-center table dataTable" role="grid" aria-describedby="zero_config_info">
                            <thead>
                                <tr role="row">
                                    <th tabindex="0" aria-controls="zero_config">Icon</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" >App Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" >Customer(ID)</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" >Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" >Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero_config" >Action</th>
                            </thead>
                            <tbody>
                                @foreach ($arequests as $app)
                                    <tr>
                                        <td class="mx-auto text-center"><img src="{{\Storage::url($app->appLogo)}}" class="rounded-circle text-center" style="height:45px;width:45px" alt=""></td>
                                        <td>{{$app->appName}}</td>
                                        <td>{{$app->user->name}} ({{$app->user->id}})</td>
                                        <td>{{$app->amount}}</td>
                                        <td>
                                            @if ($app->paymentType=="HALF")
                                                <span class="badge badge-warning">Half Payment</span>
                                            @else
                                                <span class="badge badge-success">Full Payment</span>
                                            @endif
                                            @if($app->revision=="YES")
                                                <span class="badge badge-info">In Revision</span>
                                            @else
                                                @if ($app->delivered=="YES")
                                                    <span class="badge badge-dark">Delivered</span>
                                                @endif
                                            @endif
                                            @if ($app->delivered=="NO")
                                                <span class="badge badge-danger">Not Delivered</span>
                                            @endif

                                        </td>
                                        <td>
                                            <button onclick="window.open('{{route('vieworder',$app->id)}}','popUpWindow','height=700,width=1024,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" class="btn btn-sm btn-outline-primary">View</button>
                                            <a href="{{route('delorder',$app->id)}}" class="btn btn-sm btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Icon</th>
                                    <th>App Name</th>
                                    <th>Customer(ID)</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
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
                { "orderable": false, "targets": [0,5] }
            ]
        });
</script>
@endsection