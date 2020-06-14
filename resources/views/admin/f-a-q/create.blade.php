@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
             
            @include('admin.aside-contents')

            <div class="col">
                <div class="card">
                    <div class="card-header">Create New Question</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/f-a-q') }}" title="Back"><button class="btn btn-warning btn-sm">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/f-a-q') }}" accept-charset="UTF-8"
                              class="form-horizontal validForm" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.f-a-q.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
            @include('admin.langPanel')
        </div>
    </div>
@endsection

