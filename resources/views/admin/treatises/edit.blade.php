@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit Treatise #{{ $treatise->id }}</div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-10">

                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    <form method="POST" action="{{ url('/admin/treatises/' . $treatise->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" id="validForm">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}

                                        @include ('admin.treatises.form', ['formMode' => 'edit'])

                                    </form>
                                </div>
                                @include('admin.langPanel')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/tinymce.js') }}"></script>
    @include ('layouts.admin_form_validator')
@endpush