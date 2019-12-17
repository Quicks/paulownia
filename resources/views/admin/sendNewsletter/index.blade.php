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
                <div class="control-group" :class="[errors.has('subject') ? 'has-error' : '']">
                    <label for="title">Subject</label>
                    <input type="text" class="control" name="subject" v-validate="'required'" value="{{ old('subject') }}" required>
                    <span class="control-error" v-if="errors.has('email')"> @{{ errors.first('subject') }}</span>
                </div>
                <div class="control-group" class="[errors.has('text') ? 'has-error' : '']">
                    <label for="text">Message</label>
                    <textarea v-validate="'required'" class="control" id="text" name="text" required>{{ old('text') }}</textarea>
                    <span class="control-error" v-if="errors.has('text')"> @{{ errors.first('text') }}</span>
                </div>
            </div>
        </form>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/tinymce.js') }}"></script>
@endpush