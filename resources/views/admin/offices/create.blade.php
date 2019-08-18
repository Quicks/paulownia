@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Office</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/offices') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/offices') }}" accept-charset="UTF-8" class="form-horizontal validForm" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.offices.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
            @include('admin.langPanel')
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin-form-validator.js') }}"></script>
@endpush
