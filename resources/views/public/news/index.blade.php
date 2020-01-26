@extends('layouts.public')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/news-index.css') }}">
@endpush
@section('content')
    <div class="back-news row">
        @include('public.breadcrumbs', $breadcrumbs = [route('public.news.index') => 'header-footer.news' ])

        <div class="col-12 mt-5 newsFilter">
            <div class="d-inline p-2">
                <button class="downArrowBtn" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <span class="newsFilterText">Choose month</span>
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
                    <span class="newsFilterText">2019</span>
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
                    <span class="newsFilterText">Choose topic</span>
                    <i class="fa fa-angle-down downArrow" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">news</a>
                    <a class="dropdown-item" href="#">articles</a>
                    <a class="dropdown-item" href="#">treatises</a>
                </div>
            </div>
            <div>
                <hr>
            </div>

            <div class="col-12 mt-5 mb-5 mx-auto" id="post-data" style="max-width: 900px">
            @include('public.news.newsData')
            </div>
        </div>

        <div class="ajax-load" style="display:none">
            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading...</p>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
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
                    console.log(data);
                    if (data.html == "") {
                        $('.ajax-load').html("No more records found");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('server not responding...');
                });
        }
    </script>
@endpush
