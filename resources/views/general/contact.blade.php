@extends('template.main')
<?php
$user = \Auth::user();
?>

@section('content')

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Submit a Support Ticket</h4>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{route('contactSave')}}"  class="form-horizontal">
                @csrf
                <div class="card-body">   
                    <div class="form-group row">
                        <label for="fname" class="col-sm-2 control-label col-form-label">Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" required name="name" value="{{$user->name}}" class="form-control" id="fname" >
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-2 control-label col-form-label">Subject<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cono1" required name="subject">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cono1" class="col-sm-2 control-label col-form-label">Attachments</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="file1" name="attach">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cono1" class="col-sm-2 control-label col-form-label">Message<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea rows="10" name="message" required minlength="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
@if (!$tickets->isEmpty())
<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Answered Tickets</h5>
                </div>
                <div class="card-body">
                            <div class="comment-widgets scrollable ps-container ps-theme-default" data-ps-id="d4c2d6b5-8dac-bf69-4ff1-ad79f52453ee">
                                <!-- Comment Row -->
                                @foreach ($tickets as $ticket)
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2"><img src="../../assets/images/users/support.png" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h5 style="font-weight:600">Question : {{$ticket->message}}</h5>
                                            <span class="m-b-15 d-block">Answer : {{$ticket->answer}}</span>
                                            <div class="comment-footer">
                                                <span class="text-muted float-right">Answered On {{$ticket->updated_at}}</span> 
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endif


@endsection

@section('scripts')


@if ($message = Session::get('success'))
<script src="{{URL::asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
<script>
    setTimeout(function(){toastr.success("{{$message}}");}, 1500);
    
</script>
@endif
@endsection