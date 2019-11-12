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
                                                                    @if ($order->payment=="NO" || $order->paymentType=="HALF")
                                                                    <table class="w-100">
                                                                        <tr>
                                                                            <td valign="center" rowspan="2" style="font-size:1rem">
                                                                             Pay & Generate App
                                                                            </td>
                                                                            <td class="text-right">
                                                                               @if($order->paymentType=="HALF") <form method="POST" action="{{route('ahpayment')}}"> @else <form method="POST" action="{{route('hpayment')}}"> @endif
                                                                                     @csrf 
                                                                                     <input type="hidden" value="{{$orderId}}" name="orderId">
                                                                                     <input name="plan" value="{{$plan->id}}" type="hidden">
                                                                                     <input id="purchase-half-btn" type="submit" data-toggle="tooltip" data-placement="top" title="" data-original-title="The App Is Ready Pay The Rest & Download" class="btn btn-success" value="Make Half Payment">
                                                                                </form>
                                                                               
                                                                            </td>
                                                                            <td class="text-right">
                                                                                    @if($order->paymentType!="HALF")
                                                                                    <form method="POST" action="{{route('payment')}}">
                                                                                        @csrf 
                                                                                        <input type="hidden" value="{{$orderId}}" name="orderId">
                                                                                        <input name="plan" value="{{$plan->id}}" type="hidden">
                                                                                        <input id="purchase-full-btn" type="submit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Once The App Ready Is Just Donwload " class="btn btn-primary" value="Make Full Payment">
                                                                                   </form> 
                                                                                    @endif
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td class="h4 text-right pt-1">
                                                                                ₹ {{$plan->price}}
                                                                            </td>
                                                                            <td class="h4 text-right pt-1">
                                                                                @if ($order->paymentType!="HALF")
                                                                                    ₹ {{$plan->hprice}}
                                                                                @endif
                                                                            </td>
                                                                        </tr>
        
                                                                        <tr>
                                                                            @if($order->paymentType=="HALF")
                                                                            <td colspan="3" class="text-center">
                                                                                Pay The Due Amount & Get Your App
                                                                            </td>
                                                                            @else
                                                                            <td colspan="3" class="pt-2 text-center">
                                                                                You Haven't Paid For The Application. Make The Payment & Download The App.
                                                                            </td>
                                                                            @endif
                                                                        </tr>
                                                                    </table>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            @if($order->paymentType=="FULL")
                                                                <div class="row">
                                                                    <div class="col-sm-7">
                                                                        <p style="font-size:1rem" class="p-1">Not Satisfied With The App? No Worries, Regenerate App Again</p>
                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <form method="POST" action="{{route('regen')}}">
                                                                        @csrf
                                                                        <input type="hidden" name="order" value="{{$order->id}}">
                                                                        <input type="submit" @if($order->revision=="YES") disabled @endif value="Regenerate" class="@if($order->revision=="YES") disabled @endif btn btn-dark">
                                                                        </form>
                                                                        @if($order->revision=="YES")
                                                                        <p class="text-success"><small>Your App Is Being Regenerated<small></p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row mt-3 border-top">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-12 text-center control-label col-form-label">APK</label>
                                                                                    <div class="col-sm-12 text-left">
                                                                                        <a href="{{route('download',['apk',$order->id])}}" class="btn @if (!$order->apk) btn-outline-cyan disabled @endif btn-cyan w-100 btn-sm ">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-12 text-center control-label col-form-label">Source</label>
                                                                                    <div class="col-sm-12 text-left">
                                                                                        <a href="{{route('download',['source',$order->id])}}" class="btn @if (!$order->sourceCode) disabled btn-outline-cyan @endif w-100 btn-sm btn-cyan">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-12 text-center control-label col-form-label">Keystore</label>
                                                                                    <div class="col-sm-12 text-left">
                                                                                        <a href="{{route('download',['keystore',$order->id])}}" class="btn @if (!$order->keyStore) btn-outline-cyan disabled @endif w-100 btn-sm btn-cyan">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3 border-top pt-3">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 mx-auto">
                                                                        <div class="form-group row">
                                                                            <label for="fname" class="col-sm-5 control-label col-form-label">Admin Panel Link</label>
                                                                            <div class="col-sm-7">
                                                                                <input type="text" value="{{$order->adminLink}}" readonly class="form-control form-control-sm">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="fname" class="col-sm-5 control-label col-form-label">Username</label>
                                                                            <div class="col-sm-7">
                                                                                <input type="text" value="{{$order->username}}" readonly class="form-control form-control-sm">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="fname" class="col-sm-5 control-label col-form-label">Password</label>
                                                                            <div class="col-sm-7">
                                                                                <input type="text" value="{{$order->password}}" readonly class="form-control form-control-sm">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="fname" class="col-sm-5 control-label col-form-label">Custom Message</label>
                                                                            <div class="col-sm-7">
                                                                                <input type="text" value="{{$order->custommsg}}" readonly class="form-control form-control-sm">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="fname" class="col-sm-5 control-label col-form-label">Guide Video</label>
                                                                            <div class="col-sm-7">
                                                                                <input type="text" value="{{$order->guidevideo}}" readonly class="form-control form-control-sm">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 mx-auto text-center">
                                                                        <div class="p-5">
                                                                            <h5 class="text-center">Your App Is Ready To Download</h5>
                                                                            <div class="col-sm">
                                                                                <div class="card shadow">
                                                                                    <div class="box pt-3 bg-success text-center">
                                                                                        <p class="h1 text-white">00:00:00</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                                @elseif($order->paymentType=="HALF")
                                                                
                                                                <div class="row mt-3 border-top" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You Can Dowload Files After Completing The Payment">
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-12 text-center control-label col-form-label">APK</label>
                                                                                    <div class="col-sm-12 text-left">
                                                                                        <a href="#" class="btn disabled btn-outline-cyan w-100 btn-sm">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-12 text-center control-label col-form-label">Source</label>
                                                                                    <div class="col-sm-12 text-left">
                                                                                        <a href="#" class="btn disabled btn-outline-cyan w-100 btn-sm">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-12 text-center control-label col-form-label">Keystore</label>
                                                                                    <div class="col-sm-12 text-left">
                                                                                        <a href="#" class="btn btn-outline-cyan disabled w-100 btn-sm">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3 border-top pt-3">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 mx-auto" data-toggle="tooltip" data-placement="left" title="" data-original-title="These Will Be Available After Completing The Payment">
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
                                                                            <h5 class="text-center">Your App Is Ready</h5>
                                                                            <div class="col-sm">
                                                                                <div class="card shadow">
                                                                                    <div class="box pt-3 bg-warning text-center">
                                                                                        <p class="h1 text-white">00:00:00</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                            @else

                                                            <div class="row mt-3 border-top" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You Can Dowload Files After Completing The Payment">
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-12 text-center control-label col-form-label">APK</label>
                                                                                    <div class="col-sm-12 text-left">
                                                                                        <a href="#" class="btn disabled btn-outline-cyan w-100 btn-sm">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-12 text-center control-label col-form-label">Source</label>
                                                                                    <div class="col-sm-12 text-left">
                                                                                        <a href="#" class="btn disabled btn-outline-cyan w-100 btn-sm">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div class="form-group row">
                                                                                    <label for="fname" class="col-sm-12 text-center control-label col-form-label">Keystore</label>
                                                                                    <div class="col-sm-12 text-left">
                                                                                        <a href="#" class="btn btn-outline-cyan disabled w-100 btn-sm">Download &nbsp;<i class=" fas fa-download"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-3 border-top pt-3">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 mx-auto" data-toggle="tooltip" data-placement="left" title="" data-original-title="These Will Be Available After Completing The Payment">
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

                                                            @endif
        
                                                            
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