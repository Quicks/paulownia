@extends('layouts.public')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/news-index.css') }}?v2">
@endpush
@section('content')
    <div class="back-news row">
        @include('public.breadcrumbs', $breadcrumbs = [route('public.news.index') => 'header-footer.news' ])

        <div class="col-12 mt-5 newsFilter">
            <div class="d-inline p-2">
                <button class="downArrowBtn" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <span class="newsFilterText">@lang('news.months')</span>
                    <i class="fa fa-angle-down downArrow" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu">
                    @foreach($months as $month)
                        <a class="dropdown-item" href="#">{{$month}}</a>
                    @endforeach
                </div>
            </div>
            <div class="d-inline p-2">
                <button class="downArrowBtn" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <span class="newsFilterText">{{date("Y")}}</span>
                    <i class="fa fa-angle-down downArrow" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu">
                    @foreach($years as $year)
                        <a class="dropdown-item" href="#">{{$year}}</a>
                    @endforeach
                </div>
            </div>
            <div class="d-inline p-2">
                <button class="downArrowBtn" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <span class="newsFilterText">@lang('news.topic')</span>
                    <i class="fa fa-angle-down downArrow" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">@lang('news.news')</a>
                    <a class="dropdown-item" href="#">@lang('news.articles')</a>
                    <a class="dropdown-item" href="#">@lang('news.treatises')</a>
                </div>
            </div>
            <div>
                <hr>
            </div>

            <div class="col-12 mt-5 mb-5 mx-auto" id="post-data" style="max-width: 900px">
                @include('public.news.newsData')
            </div>
        </div>

        <div class="ajax-load d-flex justify-content-center" style="display:none">
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
                url: '?page=' + page,
                type: "get",
                beforeSend: function () {
                    $('.ajax-load').show();
                },
                cache: false
            })
                .done(function (data) {
                    if (data.html == "") {
                        $('.ajax-load').html("This is all news");
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
