@extends('template.main')



@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <ul class="nav justify-content-center nav-pills mb-3" id="pills-tab" role="tablist">
                <?php $count=1?>
                @foreach ($cats as $cat)
                    <li class="nav-item">
                        <a class="nav-link @if($count==1) active @endif" id="pills-{{$cat->id}}-tab" data-toggle="pill" href="#pills-{{$cat->id}}" role="tab" aria-controls="pills-{{$cat->id}}" aria-selected="@if($count==1) true @else false @endif">{{$cat->name}}</a>
                        <?php $count=2?>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>    
</div>

<div class="row">
    <div class="col-12">
        <div class="tab-content" id="pills-tabContent">
            <?php $count=1?>
            @foreach ($cats as $cat)
                <div class="tab-pane fade @if($count==1) show active  @endif" id="pills-{{$cat->id}}" role="tabpanel" aria-labelledby="pills-{{$cat->id}}-tab">
                    {{-- {{$cat->name}} --}}
                    <?php
                    // $plans=App\App_Plans::where('category_id',$cat->id)->orderBy('position','asc')->get();
                    $plans=App\Category::find($cat->id)->appPlans;
                    ?>
                    <div class="container-fluid">
                        <div class="row el-element-overlay">
                            @foreach ($plans as $plan)
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1"> <img src="{{Storage::url($plan->icon)}}" alt="user">
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
                                            <div class="text-left ml-1 col-6">
                                                <a href="{{route('makeapp',$plan->id)}}" class="btn btn-success"> Create New App </a>

                                            </div>
                                            <div class="col-5">
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
                </div>
                <?php $count=2?>
            @endforeach
        </div>
    </div>
</div>






@endsection