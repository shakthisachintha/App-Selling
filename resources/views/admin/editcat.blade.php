@extends('template.main')

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        {{ $message }}
                </div>
                @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>
                    <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('catupdate')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$cat->id}}">
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Category Name<span class="text-danger">*</span></label>
                                    <input  type="text" value="{{$cat->name}}" required class="form-control" placeholder="Category Name" name="name">
                                </div>
            
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Category Icon</label>
                                    <input type="file" class="form-control" accept="image/*" id="icon" placeholder="Category Icon" name="icon">
                                </div>
                            
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Category Position<span class="text-danger">*</span></label>
                                    <input type="number" autocomplete="off" value="{{$cat->position}}" class="form-control" min="0" required value="1"  name="position">
                                </div>
        
                                <div class="form-group row">
                                    <input type="submit" value="Save" class="ml-0 btn btn-lg btn-primary">
                                    @if($cat->name!="General Apps")
                                    <a href="{{route('catdel',$cat->id)}}" class="btn btn-danger">Delete</a>
                                    @endif
                                </div>                         
                            </form>
                    </div>
            </div>
            
        </div>
        <div class="col-md-2"></div>
    </div>    

@endsection
