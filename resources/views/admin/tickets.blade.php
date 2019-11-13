@extends('template.main')


@section('content')

<div class="container-fluid">
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
                                <h4 class="card-title">All Support Tickets</h4>
                        </div>
                    <div class="card-body">
                        
                        
                            <div class="table-responsive">
                                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <table id="zero_config" class="text-center table dataTable" role="grid" aria-describedby="zero_config_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="zero_config">Sender</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config">Subject</th>                                
                                            <th class="sorting" tabindex="0" aria-controls="zero_config">Message</th>                                
                                            <th class="sorting" tabindex="0" aria-controls="zero_config">Attachments</th>                                
                                            <th class="sorting" tabindex="0" aria-controls="zero_config">Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                            <tr>
                                                <td>{{$ticket->name}}</td>
                                                <td>{{$ticket->subject}}</td>
                                                <td>{{$ticket->message}}</td>
                                                <td><a target="new" href="{{\Storage::url($ticket->attach)}}" class="btn btn-sm btn-dark">View</a></td>
                                                <td>
                                                    <a href="{{route('answerticket',$ticket->id)}}" class="btn btn-sm btn-warning">Answer</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config">Sender</th>
                                            <th class="sorting" tabindex="0" aria-controls="zero_config">Subject</th>                                
                                            <th class="sorting" tabindex="0" aria-controls="zero_config">Message</th>                                
                                            <th class="sorting" tabindex="0" aria-controls="zero_config">Attachments</th>                                
                                            <th class="sorting" tabindex="0" aria-controls="zero_config">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                    </div>
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
                { "orderable": false, "targets": [3,4] }
            ]
        });
</script>

@if ($message = Session::get('success'))
<script src="{{URL::asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
<script>
    setTimeout(function(){toastr.success("{{$message}}");}, 1500);
    
</script>
@endif
@endsection