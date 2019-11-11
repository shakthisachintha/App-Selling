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
            <form method="POST" action="{{route('contactSave')}}"  class="form-horizontal">
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

@endsection