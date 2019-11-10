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
                    <h3 class="card-title">Add New Category</h3>
                </div>
                    <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('catsave')}}">
                                @csrf
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Category Name</label>
                                    <input  type="text" class="form-control" placeholder="Category Name" name="name">
                                    
                                </div>
            
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Category Icon</label>
                                    <input type="file" class="form-control" accept="image/*" id="icon" placeholder="Category Icon" name="icon">
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