@extends('template.main')



@section('content')

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="display-4 card-title">Welcome To Appdue!</h2>
                    <p class="lead">Where Your Dream Android App Comes True</p>
                    <div class="pt-3 row">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-hover">
                                <div class="box bg-dark text-center">
                                    <h1 class="count font-light text-white">{{$total_users}}</h1>
                                    <h6 class="text-white">Total Users</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="count font-light text-white">{{$happy_customers}}</h1>
                                    <h6 class="text-white">Happy Customers</h6>
                                </div>
                            </div>
                        </div>
                         <!-- Column -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="count font-light text-white">{{$total_orders}}</h1>
                                    <h6 class="text-white">Total Orders</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-hover">
                                <div class="box bg-info text-center">
                                    <h1 class="count font-light text-white">{{$app_plans}}</h1>
                                    <h6 class="text-white">App Plans</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 ">
                        <div class="col">
                            <p class="display-5 text-center text-uppercase">Start Building your app now</p>
                            
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                    <img src="{{ URL::asset('assets/images/x.png')}}" style="width:40%" class="card-hover mx-auto text-center d-block img-fluid" alt="" srcset="">
                            </div>
                            <div class="col-2"></div>
                        </div>

                    <div class="row mt-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center"><a href="" class="w-100 btn btn-lg btn-outline-success"><i class=" fab fa-android"></i>&nbsp; Build My App &nbsp;<i class=" fab fa-android"></i></a></div>
                        <div class="col-md-4"></div>
                    </div>
                    
                </div>
            </div>
        </div>
</div>



@endsection