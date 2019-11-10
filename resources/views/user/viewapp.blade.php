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
                                                    <form method="post" enctype="multipart/form-data" action="{{route('appinfo2')}}" class="form-horizontal">
                                                            @csrf
                                                            <input type="hidden" value="{{$order->id}}" name="orderId">
                                            
                                                            <div class="card-body">
                                                                <h4 class="card-title">App Info</h4>
                                                                <div class="form-group row">
                                                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">App Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text"  name="appname" value="{{$order->appName}}" class="form-control" id="fname" placeholder="App Name">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group row">
                                                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Package Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="{{$order->packageName}}" name="packagename"  class="form-control" id="lname" placeholder="Package Name">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group row">
                                                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">App Logo</label>
                                                                    <div class="col-sm-9 text-left">
                                                                        <a target="new" href="{{\Storage::url($order->appLogo)}}" class="btn btn-sm btn-dark">View</a> 
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Change Image</label>
                                                                    <div class="col-sm-9 text-left">
                                                                        <input type="file" name="applogo">
                                                                    </div>
                                                                </div>
                                                    
                                                                <div class="form-group row">
                                                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">App Version</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" value="{{$order->appVersion}}"  name="appversion" class="form-control" id="email1" placeholder="App Version">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Privacy Policy</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="privacy" value="{{$order->privacy}}"  class="form-control" id="cono1" placeholder="Privacy Policy">
                                                                    </div>

                                                                    <input type="submit" value="Save" class="btn btn-primary">
                                                                </div>
                                                
                                                            </div>
                                                           
                                                        </form>
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                        <div class="p-4">
                                                <div class="card">
                                                        <form action="{{route('addinfo2')}}"  method="POST" class="form-horizontal">
                                                            @csrf
                                                            <input type="hidden" value="{{$order->id}}" name="orderId">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Advertising Info</h4>
                                            
                                                                
                                                                        
                                                                        <div class="form-group row">
                                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Admob Banner</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text"  value="{{$order->admobBanner}}" name="admobbanner" class="form-control" id="fname" name="admobbanner" placeholder="Admob Banner">
                                                                            </div>
                                                                        </div>
                                                                        

                                                                        
                                                                            <div class="form-group row">
                                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Admob Interstitial</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"  value="{{$order->admobInter}}" name="admobinter" class="form-control" id="lname" name="admobinter" placeholder="Admob Interstitial">
                                                                                </div>
                                                                            </div>
                                                                        
                                                                        
                                                                       
                                                                            <div class="form-group row">
                                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Admob Native</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"  value="{{$order->admobNative}}" name="admobnative" class="form-control" name="admobnative" id="lname" placeholder="Admob Native">
                                                                                </div>
                                                                            </div>
                                                                       
                                                                            <div class="form-group row">
                                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Admob Interstitial Ad After Click</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" value="{{$order->admobintraftclck}}" class="form-control" name="admobinteraftrclck" id="lname" placeholder="Interstitial Ad After Click">
                                                                                </div>
                                                                            </div>
                                                                        
                                                                       
                                                                            <div class="form-group row">
                                                                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Facebook Banner</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"  value="{{$order->facebookBanner}}" name="fbbanner" class="form-control" id="email1" placeholder="Facebook Banner">
                                                                                </div>
                                                                            </div>
                                                                        

                                                                        
                                                                            <div class="form-group row">
                                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Facebook Interstitial</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"  value="{{$order->facebookInter}}" name="fbinter" class="form-control" id="cono1" placeholder="Facebook Interstitial">
                                                                                </div>
                                                                            </div>
                                                                        

                                                                        
                                                                            <div class="form-group row">
                                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Facebook Native</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"  value="{{$order->facebookNative}}" name="fbnative" class="form-control" id="cono1" placeholder="Facebook Interstitial">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Interstitial Ad After Click</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" value="{{$order->fbintraftclck}}" class="form-control" name="fbintraftclck" id="lname" placeholder="Interstitial Ad After Click">
                                                                                </div>
                                                                            </div>
                                                                      

                                                                       
                                                                            <div class="form-group row">
                                                                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Facebook Native Banner</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text"  value="{{$order->facebookNativeBanner}}" name="fbnativebanner" class="form-control" id="cono1" placeholder="Facebook Interstitial">
                                                                                </div>
                                                                                
                                                                                <input type="submit" value="Save" class="btn btn-primary">
                                                                            </div>
                                                                            

    
                                                                </div>
                                                        </form>
                                                </div>
                                        </div>
                                    </div>
    
             
       
    
                                    <div class="tab-pane p-20" id="messages" role="tabpanel">
                                        <div class="p-4">
                                                <div class="card">
                                                            <div class="card-body">
                                                                <h3 class="card-title">Get Your App</h3>
                                                                
                                                                <div class="row">
                                                                    <div class="col">
                                                                            <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">APK</label>
                                                                                    <div class="col-sm-5 text-left">
                                                                                        <a href="{{route('download',['apk',$order->id])}}" class="btn @if (!$order->apk) disabled @endif btn-sm btn-outline-cyan">Download</a>
                                                                                    </div>
                                                                                </div>
            
                                                                                <div class="form-group row">
                                                                                        <label for="fname" class="col-sm-3 control-label col-form-label">Source Code</label>
                                                                                        <div class="col-sm-5 text-left">
                                                                                            <a href="{{route('download',['source',$order->id])}}" class="btn @if (!$order->sourceCode) disabled @endif btn-sm btn-outline-cyan">Download</a>
                                                                                        </div>
                                                                                </div>
            
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Keystore</label>
                                                                                    <div class="col-sm-5">
                                                                                        <a href="{{route('download',['keystore',$order->id])}}" class="btn @if (!$order->keyStore) disabled @endif btn-sm btn-outline-cyan">Download</a>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Admin Panel Link</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" readonly value="{{$order->adminLink}}" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Username</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" readonly value="{{$order->username}}" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Password</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" readonly value="{{$order->password}}" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Custom Message</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" readonly value="{{$order->custommsg}}" class="form-control">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Guide Video</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" readonly value="{{$order->guidevideo}}" class="form-control">
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
        <div class="col-md-1"></div>
    </div>

@endsection