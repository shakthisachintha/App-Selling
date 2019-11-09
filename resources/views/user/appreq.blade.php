@extends('template.main')


@section('content')

<div class="container-fluid">
    <div class="row el-element-overlay">
        @foreach ($plans as $plan)
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"> <img src="{{$plan->icon}}" alt="user">
                        {{-- <div class="el-overlay">
                            <ul class="list-style-none el-info">
                            <li class="el-item"><a class="btn btn-sm  btn-primary-outline el-link" target="new" href="{{$plan->videoLink}}">Video</a></li>
                                <li class="el-item"><a class="btn btn-sm  btn-primary-outline el-link" target="new" href="{{$plan->prevLink}}">Preview</a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="el-card-content">
                        <h4 class="m-b-0">{{$plan->name}}</h4> <span class="text-muted">
                    <div class="row mt-1">
                        <div class="text-left ml-1 col-12">
                            <a class="btn btn-sm  btn-outline-primary pl-3 pr-3" target="new" href="{{$plan->videoLink}}">Video</a>
                            <a class="btn btn-sm  btn-outline-primary" target="new" href="{{$plan->prevLink}}">Preview</a>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="text-left ml-1 col-7">
                            <a href="{{route('makeapp',$plan->id)}}" class="btn btn-success"> Create New App </a>
                            
                        </div>
                        <div class="col-4">
                            <h4 class="pt-2 text-right text-dark">₹{{$plan->price}}</h4>
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