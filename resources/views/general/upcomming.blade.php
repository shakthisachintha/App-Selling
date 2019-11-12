@extends('template.main')


@section('content')
<div class="container-fluid">
    <div class="row">
            <h4 class="h3 ml-2">Upcomming Apps</h4>
    </div>
        <div class="row mt-3 el-element-overlay">
            
                @foreach ($plans as $plan)
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img src="{{Storage::url($plan->icon)}}" alt="user">
                            </div>
                            <div class="el-card-content">
                                <h4 class="m-b-0">{{$plan->name}}</h4> <span class="text-muted">
                            <div class="row mt-1">
                                <div class="text-left ml-1 col-sm-6">
                                    <a class="btn btn-sm  btn-outline-primary pl-3 pr-3" target="new" href="{{$plan->videoLink}}">Video</a>
                                    <a class="btn btn-sm  btn-outline-primary" target="new" href="{{$plan->prevLink}}">Preview</a>
                                </div>
                                <div class="col-sm-5">
                                    <h5 class="pt-2 text-right text-dark">₹{{$plan->hprice}}-{{$plan->price}}</h5>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
</div>
@endsection