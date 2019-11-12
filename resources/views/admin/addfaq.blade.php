@extends('template.main')


@section('content')

<div class="container">
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
                    <h3 class="card-title">Add New FAQ</h3>
                </div>
                    <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{route('createfaq')}}">
                                @csrf
                                <div class="form-group row">
                                    <label class="control-label col-form-label"><span class="text-danger">*</span>Question</label>
                                    <input  type="text" class="form-control" placeholder="Question" name="question">
                                </div>                    
                                <div class="form-group row">
                                    <label class="control-label col-form-label"><span class="text-danger">*</span>Answer</label>
                                    <input  type="text" class="form-control" placeholder="Answer" name="answer">
                                </div>                    
                                <div class="form-group row">
                                    <input type="submit" value="Save" class="ml-0 btn btn-lg btn-primary">
                                </div>                       
                            </form>
                    </div>
            </div>

                <div class="table-responsive">
                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                <table id="zero_config" class="text-center table dataTable" role="grid" aria-describedby="zero_config_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="zero_config">Question</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config">Answer</th>                                
                                <th class="sorting" tabindex="0" aria-controls="zero_config">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{$faq->question}}</td>
                                    <td>{{$faq->answer}}</td>
                                    <td>
                                        <a href="{{route('editfaq',$faq->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Question</th>
                                <th>Name</th>
                                <th>Action</th>
                                
                            </tr>
                        </tfoot>
                    </table>
                </div>

        </div>
        <div class="col-md-1"></div>
    </div>
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