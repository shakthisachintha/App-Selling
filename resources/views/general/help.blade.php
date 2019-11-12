@extends('template.main')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        <h3 class="card-title text-center m-b-0">Frequently Asked Questions</h3>
                </div>
                
                <div class="comment-widgets scrollable ps-container ps-theme-default" data-ps-id="d4c2d6b5-8dac-bf69-4ff1-ad79f52453ee">
                    <!-- Comment Row -->
                    @foreach ($faqs as $faq)
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2"><img src="../../assets/images/users/faq.png" alt="user" width="50" class="rounded-circle"></div>
                            <div class="comment-text w-100">
                                <h5 style="font-weight:600">{{$faq->question}}</h5>
                                <span class="m-b-15 d-block">{{$faq->answer}}</span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">{{$faq->updated_at}}</span> 
                                </div>
                            </div>
                        </div>
                    @endforeach
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>    
</div>
@endsection