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
                    <h3 class="card-title">Edit FAQ</h3>
                </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('savefaq')}}">
                            @csrf
                            <input type="hidden" value="{{$faq->id}}" name="id">
                            <div class="form-group row">
                                <label class="control-label col-form-label"><span class="text-danger">*</span>Question</label>
                                <input  type="text" value="{{$faq->question}}" class="form-control" placeholder="Question" name="question">
                            </div>                    
                            <div class="form-group row">
                                <label class="control-label col-form-label"><span class="text-danger">*</span>Answer</label>
                                <input  type="text" class="form-control" value="{{$faq->answer}}" placeholder="Answer" name="answer">
                            </div>                    
                            <div class="form-group row">
                                <div class="col-sm-6 m-0 p-0">
                                        <input type="submit" value="Save" class="ml-0 btn mr-2 btn-lg btn-primary">
                                        <a href="{{route('delfaq',$faq->id)}}" class="ml-0  btn btn-lg btn-danger">Delete</a>
                                </div>    
                            </div>                       
                        </form>
                    </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

@endsection

