@extends('layouts.public')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/news-index.css') }}?v3">
@endpush
@section('content')

    <style>
        .fon-text-title {
            line-height: .2rem;
        }
        @media screen and (max-width:425px){

            .fon-text-title {
                padding-left:0;
            }
        }
    </style>

    <div class="back-news row">

        <div class="col-12 line-for-news"> @include('public.breadcrumbs', $breadcrumbs = [route('public.news.index') => 'header-footer.news' ])</div>

        <div class="col-12 mt-5 newsFilter">
            <div class="d-inline p-2">
                <button class="downArrowBtn" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <span class="newsFilterText">
                         @if(\Request::get('month')) {{\Request::get('month')}} @else @lang('news.months') @endif
                    </span>
                    <i class="fa fa-angle-down downArrow" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu">
                    @foreach($months as $month)
                        <a class="dropdown-item" href="{{request()->fullUrlWithQuery(['month' => $month])}}">
                            {{$month}}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="d-inline p-2">
                <button class="downArrowBtn" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <span class="newsFilterText">
                        @if(\Request::get('year')) {{\Request::get('year')}} @else {{date("Y")}} @endif
                    </span>
                    <i class="fa fa-angle-down downArrow" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu">
                    @foreach($years as $year)
                        <a class="dropdown-item" href="{{request()->fullUrlWithQuery(['year' => $year])}}">{{$year}}</a>
                    @endforeach
                </div>
            </div>
            <div class="d-inline p-2">
                <button class="downArrowBtn" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <span class="newsFilterText">
                         @if(\Request::get('topic')) {{\Request::get('topic')}} @else @lang('news.topic') @endif
                    </span>
                    <i class="fa fa-angle-down downArrow" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{request()->fullUrlWithQuery(['topic' => 'news'])}}">@lang('news.news')</a>
                    <a class="dropdown-item" href="{{request()->fullUrlWithQuery(['topic' => 'articles'])}}">@lang('news.articles')</a>
                    <a class="dropdown-item" href="{{request()->fullUrlWithQuery(['topic' => 'treatises'])}}">@lang('news.treatises')</a>
                </div>
            </div>
            <div>
                <hr>
            </div>

            <div class="col-12 mt-5 mb-5 mx-auto" id="post-data" style="max-width: 900px">
                @include('public.news.newsData')
            </div>
        </div>

        <div class="ajax-load mx-auto" style="display: none">
            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">@lang('news.loading') ... </p>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        var page = 1;
        let wait = false;
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= ($(document).height() - $('.footer').height())*0.9 && wait == false) {
                page++;
                loadMoreData(page);
                wait = true;
            }
        });

        function loadMoreData(page) {
            $.ajax({
                url: window.location.href,
                type: "get",
                beforeSend: function () {
                    $('.ajax-load').show();
                },
                cache: false,
                data: {'page': page}
            })
                .done(function (data) {
                    if (data.html == "") {
                        $('.ajax-load').html("");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);
                    wait = false;
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('server not responding...');
                });
        }
    </script>
@endpush
