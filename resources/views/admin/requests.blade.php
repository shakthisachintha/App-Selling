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
                    <h4 class="card-title">App Request Orders <small class="text-success">(Payments Received)</small></h4>
                    
                    <div class="card">
                            <div class="comment-widgets scrollable ps-container ps-theme-default" data-ps-id="a2fc6c94-5b60-3326-a1af-1a1f10c83be6">

                                @foreach ($orders as $order)
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="../../assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">{{$order->user->name}}</h6>
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
                                <!-- Comment Row -->
                                
        
                                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                        </div>

                </div>
            </div>
        </div>
</div>

@endsection