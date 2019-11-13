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
                        <h3 class="card-title">Edit App Plan</h3>
                    </div>
                        <div class="card-body">
                                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('plans.update',$app->id)}}">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="form-group row">
                                        <label class="control-label col-form-label">Plan Name</label>
                                        <input class="@error('name') is-invalid @enderror form-control" value="{{$app->name}}" type="text" placeholder="App Plan Name" name="name">
                                        @error('name') <span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                
                                    <div class="form-group row">
                                        <label class="control-label col-form-label">App Icon Image</label>
                                        <input type="file" class="@error('icon') is-invalid @enderror form-control" accept="image/*" id="icon" placeholder="App Image Icon" name="icon">
                                        @error('icon') <span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="control-label col-form-label">Preview Link</label>
                                        <input class="@error('prevlink') is-invalid @enderror form-control" value="{{$app->prevLink}}" type="text" placeholder="Preview Link" name="prevlink">
                                        @error('prevlink') <span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="control-label col-form-label">Video Link</label>
                                        <input class="@error('videolink') is-invalid @enderror form-control" value="{{$app->videoLink}}" type="text" placeholder="Video Link" name="videolink">
                                        @error('videolink') <span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-form-label">App Category<span class="text-danger">*</span></label>
                                        <select required @error('cat') is-invalid @enderror value="{{old('cat')}}" multiple name="cat[]" class="form-control">
                                            @foreach ($cats as $cat)
                                                @if ($cat->id==$app->category_id)
                                                    <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                                                @else
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('cat') <span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                
                                    <div class="form-group row">
                                        <label class="control-label col-form-label">Price</label>
                                        <input class="@error('price') is-invalid @enderror form-control" value="{{$app->price}}" type="number" placeholder="Price" name="price">
                                        @error('price') <span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-form-label">Half Price<span class="text-danger">*</span></label>
                                        <input class="@error('hprice') is-invalid @enderror form-control" value="{{$app->hprice}}" type="number" placeholder="Half Price" name="hprice">
                                        @error('hprice') <span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-form-label">Position<span class="text-danger">*</span></label>
                                        <input class="@error('position') is-invalid @enderror form-control" value="{{$app->position}}" type="number" placeholder="Position" name="position">
                                        @error('position') <span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                    

                                    <div class="form-group row">
                                        
                                        <div class="col-sm-6 m-0 p-0">
                                            <input type="submit" value="Save" class="ml-0 btn btn-lg btn-primary">
                                        </div>
                                    </form>
                                        <div class="col-sm-6 text-right m-0 p-0">
                                            <form action="{{route('plans.destroy',$app->id)}}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input type="submit" value="Delete" class="ml-0 btn btn-lg btn-danger">
                                            </form>
                                        </div>
                                    </div>
                                    
                                                           
                                
                        </div>
                </div>
            </div>
            <div class="col-md-2"></div>
    </div>


    

@endsection