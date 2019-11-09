@extends('template.main')

@section('content')

    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
    	<button type="button" class="close" data-dismiss="alert">×</button>	
            {{ $message }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New App Plan</h3>
                </div>
                    <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('plans.store')}}">
                                @csrf
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Plan Name</label>
                                    <input class="@error('name') is-invalid @enderror form-control" value="{{old('name')}}" type="text" placeholder="App Plan Name" name="name">
                                    @error('name') <span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
            
                                <div class="form-group row">
                                    <label class="control-label col-form-label">App Icon Image</label>
                                    <input type="file" class="@error('icon') is-invalid @enderror form-control" id="icon" placeholder="App Image Icon" name="icon">
                                    @error('icon') <span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Preview Link</label>
                                    <input class="@error('prevlink') is-invalid @enderror form-control" value="{{old('prevlink')}}" type="text" placeholder="Preview Link" name="prevlink">
                                    @error('prevlink') <span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Video Link</label>
                                    <input class="@error('videolink') is-invalid @enderror form-control" value="{{old('videolink')}}" type="text" placeholder="Video Link" name="videolink">
                                    @error('videolink') <span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
            
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Price</label>
                                    <input class="@error('price') is-invalid @enderror form-control" value="{{old('price')}}" type="text" placeholder="Price" name="price">
                                    @error('price') <span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
        
                                <div class="form-group row">
                                    <input type="submit" value="Save" class="ml-0 btn btn-lg btn-primary">
                                </div>
                                
                                                       
                            </form>
                    </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>    

@endsection