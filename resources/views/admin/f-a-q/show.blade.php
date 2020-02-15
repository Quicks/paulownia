@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')
            @include('admin.aside-contents')

            <div class="col">
                <div class="card">
                    <div class="card-header">FAQ {{ $faq->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/f-a-q') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/f-a-q/' . $faq->id . '/edit') }}" title="Edit FAQ"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/faq' . '/' . $faq->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete FAQ" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $faq->id }}</td></tr>
                                    <tr><th>Topic</th><td>{{ $faq->content->text }}</td></tr>
                                    <tr><th> Question </th><td> {{ $faq->question }} </td></tr>
                                    <tr><th> Answer </th><td> {{ $faq->answer }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
