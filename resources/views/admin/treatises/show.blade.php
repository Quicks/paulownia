@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Treatise {{ $treatise->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/treatises') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
                        <a href="{{ url('/admin/treatises/' . $treatise->id . '/edit') }}" title="Edit Treatise">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                      aria-hidden="true"></i> Edit
                            </button>
                        </a>

                        <form method="POST" action="{{ url('admin/treatises' . '/' . $treatise->id) }}"
                              accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Treatise"
                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                                             aria-hidden="true"></i>
                                Delete
                            </button>
                        </form>
                        <br/>
                        <br/>
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="main-form" role="tabpanel"
                                 aria-labelledby="main-form">


                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $treatise->id }}</td>
                                        </tr>
                                        <tr>
                                            <th> Name</th>
                                            <td> {{ $treatise->name }} </td>
                                        </tr>
                                        <tr>
                                            <th> Active</th>
                                            <td> {{ $treatise->active }} </td>
                                        </tr>
                                        <tr>
                                            <th> Publish Date</th>
                                            <td> {{ $treatise->publish_date }} </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @foreach(config('translatable.locales') as $locale)

                                <div class="tab-pane fade" id={{$locale}} role="tabpanel"
                                     aria-labelledby={{$locale}}>


                                    <div class="container">
                                        <div class="row mt-3 bg-light rounded pt-3">
                                            @isset($treatise->translate($locale)->title)
                                                <div class="col-md-3"><h4><b>Title({{$locale}})</b></h4></div>
                                                <div class="col">
                                                    <h4 @if($locale == 'ar') dir="rtl"
                                                        class="text-right" @endif>
                                                        {{ $treatise->translate($locale)->title }}
                                                    </h4>
                                                </div>
                                            @endisset
                                            <div class="w-100"></div>
                                            <hr>
                                            @isset($treatise->translate($locale)->text)
                                                <div class="col-md-3"><h4><b>Text ({{$locale}})</b></h4></div>
                                                <div class="col">
                                                    <p @if($locale == 'ar') dir="rtl" class="text-right" @endif>
                                                        {!! $treatise->translate($locale)->text !!}
                                                    </p>
                                                </div>
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            @include('admin.langPanel')
        </div>
    </div>
@endsection