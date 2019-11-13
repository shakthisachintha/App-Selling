@extends('template.main')

@section('content')

    

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        {{ $message }}
                </div>
                @endif
            <div class="card">
                 
                <div class="card-header">
                    <h3 class="card-title">Add New Upcomming App</h3>
                </div>
                    <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('saveup')}}">
                                @csrf
                                <div class="form-group row">
                                    <label class="control-label col-form-label">App Name<span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" placeholder="App Name" name="name">
                                </div>
            
                                <div class="form-group row">
                                    <label class="control-label col-form-label">App Icon Image</label>
                                    <input type="file" class="form-control" accept="image/*" id="icon" name="icon">
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Preview Link<span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" placeholder="Preview Link" name="prevlink">
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Video Link<span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" placeholder="Video Link" name="videolink">                                   
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-form-label">Price<span class="text-danger">*</span></label>
                                    <input class="form-control" required type="number" placeholder="Price" name="price">
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-form-label">Half Price<span class="text-danger">*</span></label>
                                    <input class="form-control" required type="number" placeholder="Half Price" name="hprice">
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-form-label">Position<span class="text-danger">*</span></label>
                                    <input class="form-control" required type="number" placeholder="Position" name="position">
                                </div>
        
                                <div class="form-group row">
                                    <input type="submit" value="Save" class="ml-0 btn btn-lg btn-primary">
                                </div>            
                            </form>
                    </div>
            </div>

                <div class="card">
                    <div class="card-header">
                            <h3 class="card-title">All Upcomming Apps</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <table id="zero_config" class="text-center table dataTable" role="grid" aria-describedby="zero_config_info">
                                <thead>
                                    <tr role="row">
                                        <th tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" >Icon</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" >Name</th>                           
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" >Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" >Half Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" >Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($apps as $app)
                                        <tr>
                                            <td class="mx-auto text-center">
                                                <img src="{{\Storage::url($app->icon)}}" class="rounded-circle text-center" style="height:35px;width:35px" alt="">
                                            </td>
                                            <td>{{$app->name}}</td>
                                            <td>₹ {{$app->price}}</td>
                                            <td>₹ {{$app->hprice}}</td>
                                            <td><a href="{{route('editup',$app->id)}}" class="btn btn-sm btn-warning">Edit</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Icon</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Price</th>
                                        <th rowspan="1" colspan="1">Half Price</th>
                                        <th rowspan="1" colspan="1">Action</th>
                                        
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        </div>
                        </div>
        
                    </div>
                </div>
        </div>
        <div class="col-md-1"></div>
    </div>    

@endsection

@section('scripts')
<script>
        $('#zero_config').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": [0,4] }
            ]
        });
</script>

@if ($message = Session::get('success'))
<script src="{{URL::asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
<script>
    setTimeout(function(){toastr.success("{{$message}}");}, 2000);
    
</script>
@endif
@endsection