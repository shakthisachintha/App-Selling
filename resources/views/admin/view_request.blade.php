@extends('template.main')


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
                                                                <h3 class="card-title">Deliver App</h3>
                                                                <form action="{{route('response')}}" enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="order" value="{{$order->id}}">
                                                                <div class="row">
                                                                    <div class="col">
                                                                            <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">APK</label>
                                                                                    <div class="col-sm-5 text-left">
                                                                                        <input type="file" name="apk" class="form-control">
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="form-group row">
                                                                                        <label for="fname" class="col-sm-3 control-label col-form-label">Source Code</label>
                                                                                        <div class="col-sm-5 text-left">
                                                                                            <input type="file" name="source" class="form-control">
                                                                                        </div>
                                                                                </div>
            
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Keystore</label>
                                                                                    <div class="col-sm-5">
                                                                                            <input type="file" name="keystore" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Admin Panel Link</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="adminlink" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Username</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="username" autocomplete="false" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Password</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="password" autocomplete="false" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Custom Message</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="custommessage" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Guide Video</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="guidevideo" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <input type="submit" class="btn btn-success" value="Deliver">
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
        <div class="col-md-1"></div>
    </div>

@endsection