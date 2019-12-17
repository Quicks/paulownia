@extends('admin::layouts.content')

@section('page_title')
    Send Newsletter
@stop

@section('content')


    <div class="content">
        <form method="POST" action="{{ route('sendNewsLetter.send') }}" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                        Send Newsletter
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        Send to All Subscribers
                    </button>
                </div>
            </div>

            @csrf

            <div class="page-content">
                <div style="height:500px; background-color:grey;"></div>
            </div>
        </form>
    </div>
@stop