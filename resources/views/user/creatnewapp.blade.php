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
                                                    <form method="POST" enctype="multipart/form-data" action="{{route('appinfo')}}" id="appInfoForm" class="form-horizontal">
                                                        @csrf
                                                        <input type="hidden" value="{{$orderId}}" name="orderId">
                                                        <input name="plan" value="{{$plan->id}}" type="hidden">
                                                        <div class="card-body">
                                                            <h4 class="card-title">App Info</h4>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">App Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="appname" required class="form-control" id="fname" placeholder="App Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">App Logo</label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" name="applogo" class="form-control" id="lname" placeholder="Last Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Package Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="packagename" required class="form-control" id="lname" placeholder="Package Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">App Version</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="appversion" required class="form-control" id="email1" placeholder="App Version">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Privacy Policy</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="privacy" required class="form-control" id="cono1" placeholder="Privacy Policy">
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                        <div class="border-top">
                                                            <div class="card-body">
                                                                <button type="submit" id="appinfo-save-btn" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                    <div class="p-4">
                                            <div class="card">
                                                    <form method="post" enctype="multipart/form-data" action="{{route('addinfo')}}" id="addInfoForm" class="form-horizontal">
                                                        @csrf
                                                        <input type="hidden" value="{{$orderId}}" name="orderId">
                                                        <input name="plan" value="{{$plan->id}}" type="hidden">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Advertising Info</h4>
                                                            <div class="form-group row mt-3">
                                                                    <label class="col-sm-3 text-right control-label col-form-label">Advertising Platforms</label>
                                                                    <div class="col-sm-9">
                                                                        <div class="form-group-row">
                                                                            <div class="col-sm-4">
                                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                                        <input type="checkbox" class="custom-control-input" id="switchAdmob">
                                                                                        <label class="custom-control-label" for="switchAdmob">Admob</label>
                                                                                    </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                                                        <input type="checkbox" class="custom-control-input" id="switchFacebook">
                                                                                        <label class="custom-control-label" for="switchFacebook">Facebook</label>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div style="display:none" id="admob">
                                                                    <div class="form-group row">
                                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Admob Banner</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" id="fname" name="admobbanner" placeholder="Admob Banner">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Admob Interstitial</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" id="lname" name="admobinter" placeholder="Admob Interstitial">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Admob Native</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="admobnative" id="lname" placeholder="Admob Native">
                                                                            </div>
                                                                        </div>
                                                            </div>

                                                            <div style="display:none" id="facebook">
                                                                    <div class="form-group row">
                                                                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Facebook Banner</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="fbbanner" class="form-control" id="email1" placeholder="Facebook Banner">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Facebook Interstitial</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="fbinter" class="form-control" id="cono1" placeholder="Facebook Interstitial">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Facebook Native</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" name="fbnative" class="form-control" id="cono1" placeholder="Facebook Native">
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Facebook Native Banner</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" name="fbnativebanner" id="cono1" placeholder="Facebook Native Banner">
                                                                                </div>
                                                                        </div>
                                                            </div>
                                                        </div>
                                                        <div class="border-top">
                                                            <div class="card-body">
                                                                <button id="add-save-btn" type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                    </div>
                                </div>

                                <script>
                                        $(document).ready(function () {

                                            $("#addInfoForm").submit(function (e) { 
                                                e.preventDefault();
                                                var form = $(this);
                                                var url = form.attr('action');

                                                $.ajax({
                                                    type: "POST",
                                                    url: url,
                                                    data:new FormData(this),
                                                    cache:false,
                                                    contentType: false,
                                                    processData: false, // serializes the form's elements.
                                                    success: function (data) {
                                                        console.log(data);
                                                        $("#add-save-btn").removeClass("btn-primary");
                                                        $("#add-save-btn").addClass("btn-success");
                                                        // $("#add-save-btn").attr("disabled","disabled");
                                                        $("#add-save-btn").text("Saved!");
                                                    },
                                                    error: function(data){
                                                        console.log("error");
                                                        console.log(data);
                                                    }
                               
                                                });
                                            });

                                            $("#appInfoForm").submit(function (e) { 
                                                e.preventDefault();
                                                var form = $(this);
                                                var url = form.attr('action');
                                                $.ajax({
                                                    type: "POST",
                                                    url: url,
                                                    data:new FormData(this),
                                                    cache:false,
                                                    contentType: false,
                                                    processData: false, // serializes the form's elements.
                                                    success: function (data) {
                                                        console.log(data);
                                                        $("#appinfo-save-btn").removeClass("btn-primary");
                                                        $("#appinfo-save-btn").addClass("btn-success");
                                                        // $("#appinfo-save-btn").attr("disabled","disabled");
                                                        $("#appinfo-save-btn").text("Saved!");
                                                        $("#purchase-btn").removeAttr("disabled");
                                                        $("#purchase-hint").fadeOut();
                                                    },
                                                    error: function(data){
                                                        console.log("error");
                                                        console.log(data);
                                                    }
                                                });
                                            });

                                            $('#switchAdmob').click(function(){
            
                                                if(this.checked == true) {
                                                     $("#admob").fadeIn();
                                                 } else {
                                                    $("#admob").fadeOut();
                                                }
                                            });
                                            $('#switchFacebook').click(function(){
                                   
                                                if(this.checked == true) {
                                                     $("#facebook").fadeIn();
                                                 } else {
                                                    $("#facebook").fadeOut();
                                                }
                                            });
                                        });
                                        
                                  
                                    </script>

                                <div class="tab-pane p-20" id="messages" role="tabpanel">
                                    <div class="p-4">
                                            <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="card-title">Get Your App</h3>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <h5 class="lead">Selected App Plan</h5>
                                                                    <div class="row ml-1 el-element-overlay">
                                                                        <div class="card">
                                                                            <div class="el-card-item">
                                                                                <div class="el-card-avatar el-overlay-1"> <img src="/{{$plan->icon}}" alt="user">
                                                                                    <div class="el-overlay">
                                                                                        <ul class="list-style-none el-info">
                                                                                        <li class="el-item"><a class="btn btn-sm  btn-primary-outline el-link" target="new" href="{{$plan->videoLink}}">Video</a></li>
                                                                                            <li class="el-item"><a class="btn btn-sm  btn-primary-outline el-link" target="new" href="{{$plan->prevLink}}">Preview</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="el-card-content">
                                                                                    <h4 class="m-b-0 text-left">{{$plan->name}}</h4>
                                                                                </div>
                                                                                <div class="row mt-1">
                                                                                    <div class="col">
                                                                                        <h4 class="pt-2 text-dark">₹{{$plan->price}}</h4>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                          
                                                                                        <form method="POST" action="{{route('payment')}}">
                                                                                             @csrf 
                                                                                             <input type="hidden" value="{{$orderId}}" name="orderId">
                                                                                             <input name="plan" value="{{$plan->id}}" type="hidden">
                                                                                             <input id="purchase-btn" type="submit" disabled class="btn btn-outline-success" value="Pay & Generate App"><BR>
                                                                                             <span id="purchase-hint"><small><span class="text-danger">*</span>Fill & Save App Info Details To Proceed To The Payment Section.</small></span>
                                                                                            </form>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                <div class="row mt-1">
                                                                                    <div class="col">
                                                                                        <small class="text-muted">You Will Receive APK,Source Code & Keystore After The Purchase.</small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>
                                                                
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
    <div class="col-md-2"></div>
</div>

@endsection