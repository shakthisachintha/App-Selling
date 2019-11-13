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
                    <h3 class="card-title">Edit Upcomming App</h3>
                </div>
                    <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('updateup')}}">
                                @csrf
                                
                                <input type="hidden" value="{{$app->id}}" name="id" required>

                                <div class="form-group row">
                                    <label class="control-label col-form-label">App Name<span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{$app->name}}" required type="text" placeholder="App Name" name="name">
                                    
                                </div>
            
                                <div class="form-group row">
                                    <label class="control-label col-form-label">App Icon Image</label>
                                    <input type="file" class="form-control" accept="image/*" id="icon" name="icon">
                               
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Preview Link<span class="text-danger">*</span></label>
                                    <input class="form-control" required value="{{$app->prevLink}}" type="text" placeholder="Preview Link" name="prevlink">
                              
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Video Link<span class="text-danger">*</span></label>
                                    <input class="form-control" required value="{{$app->videoLink}}" type="text" placeholder="Video Link" name="videolink">
                            
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-form-label">Price<span class="text-danger">*</span></label>
                                    <input class="form-control" required value="{{$app->price}}" type="number" placeholder="Price" name="price">
  
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-form-label">Half Price<span class="text-danger">*</span></label>
                                    <input class="form-control" required value="{{$app->hprice}}" type="number" placeholder="Half Price" name="hprice">
                               
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-form-label">Position<span class="text-danger">*</span></label>
                                    <input class="form-control" required value="{{$app->position}}" type="number" placeholder="Half Price" name="position">
                                </div>
        
                                <div class="form-group row">
                                    <input type="submit" value="Save" class="ml-0 mr-2 btn btn-lg btn-primary">
                                    <a href="{{route('deleteup',$app->id)}}" class="btn btn-lg btn-danger">Delete</a>
                                </div>
                                
                                                       
                            </form>
                    </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>    

@endsection