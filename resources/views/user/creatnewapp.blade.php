@extends('template.main')


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
                                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">App Name<span class="text-danger">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="appname" required class="form-control" id="fname" placeholder="App Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">App Logo<span class="text-danger">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" name="applogo" accept="image/*" required class="form-control" id="lname" placeholder="Last Name Here">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Package Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="packagename" class="form-control" id="lname" placeholder="com.appanem.yourname">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">App Version<span class="text-danger">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" name="appversion" value="1.0" required required class="form-control" id="email1" placeholder="App Version">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Privacy Policy</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="privacy" class="form-control" id="cono1" placeholder="Privacy Policy">
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
                                                                        <div class="form-group row">
                                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Interstitial Ad After Click</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="admobinteraftrclck" id="lname" placeholder="Interstitial Ad After Click">
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
                                                                        <div class="form-group row">
                                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Interstitial Ad After Click</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="fbintraftclck" id="lname" placeholder="Interstitial Ad After Click">
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
                                                        $("#add-save-btn").attr("disabled","disabled");
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
                                                        $("#appinfo-save-btn").attr("disabled","disabled");
                                                        $("#appinfo-save-btn").text("Saved!");
                                                        $("#purchase-full-btn").removeAttr("disabled");
                                                        $("#purchase-half-btn").removeAttr("disabled");
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
                                    <div class="pl-2 pr-2 pb-4 pt-2">
                                        <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h3 class="card-title">Get Your App</h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table class="w-100">
                                                                <tr>
                                                                    <td valign="center" rowspan="2" style="font-size:1rem">
                                                                     Pay & Generate App
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <form method="POST" action="{{route('hpayment')}}">
                                                                             @csrf 
                                                                             <input type="hidden" value="{{$orderId}}" name="orderId">
                                                                             <input name="plan" value="{{$plan->id}}" type="hidden">
                                                                             <input id="purchase-half-btn" type="submit" disabled data-toggle="tooltip" data-placement="top" title="" data-original-title="Once The App Is Ready Pay The Rest & Download" class="btn btn-success" value="Make Half Payment">
                                                                        </form>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <form method="POST" action="{{route('payment')}}">
                                                                             @csrf 
                                                                             <input type="hidden" value="{{$orderId}}" name="orderId">
                                                                             <input name="plan" value="{{$plan->id}}" type="hidden">
                                                                             <input id="purchase-full-btn" type="submit" disabled data-toggle="tooltip" data-placement="top" title="" data-original-title="Once The App Ready Is Just Donwload " class="btn btn-primary" value="Make Full Payment">
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td class="h4 text-right pt-1">
                                                                        ₹ {{$plan->price}}
                                                                    </td>
                                                                    <td class="h4 text-right pt-1">
                                                                        ₹ {{$plan->hprice}}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    
                                                                    <td colspan="3" class="text-center">
                                                                        <span id="purchase-hint"><small><span class="text-danger">*</span>Fill & Save App Info Details To Enable To Payment Section.</small></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3 border-top" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You Can Dowload Files After The Payment">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group row">
                                                                        <label for="fname" class="col-sm-12 text-center control-label col-form-label">APK</label>
                                                                        <div class="col-sm-12 text-left">
                                                                            <a href="#" class="btn disabled w-100 btn-sm btn-outline-cyan">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group row">
                                                                        <label for="fname" class="col-sm-12 text-center control-label col-form-label">Source</label>
                                                                        <div class="col-sm-12 text-left">
                                                                            <a href="#" class="btn disabled w-100 btn-sm btn-outline-cyan">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group row">
                                                                        <label for="fname" class="col-sm-12 text-center control-label col-form-label">Keystore</label>
                                                                        <div class="col-sm-12 text-left">
                                                                            <a href="#" class="btn disabled w-100 btn-sm btn-outline-cyan">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3 border-top pt-3">
                                                        <div class="col-xs-6 col-sm-6 col-md-6 mx-auto" data-toggle="tooltip" data-placement="left" title="" data-original-title="These Will Be Available After The Payment">
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-5 control-label col-form-label">Admin Panel Link</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" readonly class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-5 control-label col-form-label">Username</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" readonly class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-5 control-label col-form-label">Password</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" readonly class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-5 control-label col-form-label">Custom Message</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" readonly class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="fname" class="col-sm-5 control-label col-form-label">Guide Video</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" readonly class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-6 col-md-6 mx-auto text-center">
                                                            <div class="p-5">
                                                                <h5 class="text-center">Your App Will Be Ready</h5>
                                                                <div class="col-sm">
                                                                    <div class="card shadow">
                                                                        <div class="box pt-3 bg-dark text-center">
                                                                            <p class="h1 text-white">02:00:00</p>
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