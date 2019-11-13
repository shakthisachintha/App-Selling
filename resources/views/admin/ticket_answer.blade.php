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
                <h4 class="card-title">Answer Support Ticket</h4>
            </div>
            <form method="POST" action="{{route('answerticketsave')}}"  class="form-horizontal">
                @csrf
                <div class="card-body">   
                    <div class="form-group row">
                        <label for="fname" class="col-sm-2 control-label col-form-label">Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text"  readonly value="{{$ticket->name}}" class="form-control" id="fname" >
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-2 control-label col-form-label">Subject<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" value="{{$ticket->subject}}" class="form-control" id="cono1" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cono1" class="col-sm-2 control-label col-form-label">Message<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea rows="10" readonly class="form-control">{{$ticket->message}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cono1" class="col-sm-2 control-label col-form-label">Answer<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea rows="10" required name="answer" class="form-control">{{$ticket->answer}}</textarea>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{$ticket->id}}">

                </div>

                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit Answer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

@endsection

@section('scripts')


@if ($message = Session::get('success'))
<script src="{{URL::asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
<script>
    setTimeout(function(){toastr.success("{{$message}}");}, 2000);
    
</script>
@endif
@endsection