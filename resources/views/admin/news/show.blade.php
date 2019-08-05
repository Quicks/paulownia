{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="row">--}}
            {{--@include('admin.sidebar')--}}

            {{--<div class="col-md-10">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header">News {{ $news->id }}</div>--}}
                    {{--<div class="card-body">--}}

                        {{--<div class="row">--}}
                        {{--<div class="col-md-10">--}}
                        {{--<a href="{{ url('/admin/news') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>--}}
                        {{--<a href="{{ url('/admin/news/' . $news->id . '/edit') }}" title="Edit News"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}

                        {{--<form method="POST" action="{{ url('admin/news' . '/' . $news->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                            {{--{{ method_field('DELETE') }}--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<button type="submit" class="btn btn-danger btn-sm" title="Delete News" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                        {{--</form>--}}
                        {{--<br/>--}}
                        {{--<br/>--}}

                        {{--<div class="table-responsive">--}}
                            {{--<table class="table">--}}
                                {{--<tbody>--}}
                                    {{--<tr>--}}
                                        {{--<th>ID</th><td>{{ $news->id }}</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr><th> Name </th><td> {{ $news->name }} </td></tr>--}}
                                    {{--<tr><th> Active </th><td> {{ $news->active }} </td></tr>--}}
                                    {{--<tr><th> Publish Date </th><td> {{ $news->publish_date }} </td></tr>--}}


                                {{--<div class="container-fluid">--}}


                                {{--</div>--}}


                                {{--<div class="tab-content" id="nav-tabContent">--}}
                                        {{--@foreach(config('translatable.locales') as $locale)--}}

                                            {{--<div class="tab-pane fade @if ($loop->first)show active @endif" id={{$locale}} role="tabpanel"--}}
                                                 {{--aria-labelledby={{$locale}}>--}}

                                                    {{--<tbody class="bg-light">--}}
                                                        {{--@isset($news->translate($locale)->title)--}}
                                                            {{--<tr>--}}
                                                                {{--<th> Title ({{$locale}}) </th>--}}
                                                                {{--<td @if($locale == 'ar') dir="rtl" class="text-right" @endif>--}}
                                                                    {{--{{ $news->translate($locale)->title }}--}}
                                                                {{--</td>--}}
                                                            {{--</tr>--}}
                                                        {{--@endisset--}}
                                                        {{--@isset($news->translate($locale)->text)--}}
                                                            {{--<tr>--}}
                                                                {{--<th> Text ({{$locale}}) </th>--}}
                                                                {{--<td @if($locale == 'ar') dir="rtl" class="text-right" @endif>--}}
                                                                    {{--{{!! $news->translate($locale)->text !!}}--}}
                                                                {{--</td>--}}
                                                            {{--</tr>--}}
                                                        {{--@endisset--}}
                                                    {{--</tbody>--}}
                                                    {{--<tr class="m-4 p-4"><td></td><td></td></tr>--}}

                                            {{--</div>--}}
                                     {{--@endforeach--}}
                                    {{--</div>--}}


                                        {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                            {{--@include('admin.langPanel')--}}


                    {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}








@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">News {{ $news->id }}</div>
                    <div class="card-body">







                        <a href="{{ url('/admin/news') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/news/' . $news->id . '/edit') }}" title="Edit News"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/news' . '/' . $news->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete News" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>

                        <br/>
                        <br/>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">


                                <label for="v-pills-tab">Main</label>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Show</a>
                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Hide</a>
                        </div>







                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"></div>

                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $news->id }}</td>
                                </tr>
                                <tr><th> Name </th><td> {{ $news->name }} </td></tr>
                                <tr><th> Active </th><td> {{ $news->active }} </td></tr>
                                <tr><th> Publish Date </th><td> {{ $news->publish_date }} </td></tr>
                                <tr><th>  </th><td> </td></tr>
                                    </tbody>
                            </table>
                        </div>
                        </div>

                        </div>




                        <div class="tab-content" id="nav-tabContent">

                        @foreach(config('translatable.locales') as $locale)

                            <div class="tab-pane fade @if ($loop->first)show active @endif" id={{$locale}} role="tabpanel"
                                 aria-labelledby={{$locale}}>


                                     <tr><th>
                                        @isset($news->translate($locale)->title)

                                            <h3><b>Title</b>  ({{$locale}}) </h3>
                                            <h4 @if($locale == 'ar') dir="rtl" class="text-right" @endif>
                                                {{ $news->translate($locale)->title }}
                                            </h4>
                                        @endisset
                                     </th><td>

                                     <tr><th>
                                        @isset($news->translate($locale)->text)

                                            <h3> <b>Text ({{$locale}})</b>  </h3>
                                            <p @if($locale == 'ar') dir="rtl" class="text-right" @endif>
                                                {{!! $news->translate($locale)->text !!}}
                                            </p>

                                        @endisset
                                    </th><td>

                            </div>

                        @endforeach

                        </div>
                    </div>

                    </div>
                </div>


            @include('admin.langPanel')


@endsection






