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
                                    <label class="control-label col-form-label">Category Name<span class="text-danger">*</span></label>
                                    <input  type="text" required class="form-control" placeholder="Category Name" name="name">
                                </div>
            
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Category Icon</label>
                                    <input type="file" class="form-control" accept="image/*" id="icon" placeholder="Category Icon" name="icon">
                                </div>
                            
                                <div class="form-group row">
                                    <label class="control-label col-form-label">Category Position<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" min="0" required value="1"  name="position">
                                </div>
        
                                <div class="form-group row">
                                    <input type="submit" value="Save" class="ml-0 btn btn-lg btn-primary">
                                </div>                         
                            </form>
                    </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Categories</h5>
                        <div class="table-responsive">
                            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <table id="zero_config" class="text-center table dataTable" role="grid" aria-describedby="zero_config_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="zero_config">Category</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config">Position</th>                                
                                        <th class="sorting" tabindex="0" aria-controls="zero_config">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($cats as $cat)
                                        <tr>
                                            <td>{{$cat->name}}</td>
                                            <td>{{$cat->position}}</td>
                                            <td>
                                                <a href="{{route('catedit',$cat->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Category</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>    

@endsection

@section('scripts')
<script>
        $('#zero_config').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": [2] }
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