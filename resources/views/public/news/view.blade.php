@extends('layouts.public')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/news-show.css') }}?v2">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.10/plyr.css" />
@endpush
@section('content')
    <style>
        .fon-text {
            color: #ffffff;
        }

        .fon-text:hover {
            color: #ffffff;
            text-decoration: none;
        }
    </style>
    <div class="row m-0 position-relative">

        <div class="col-12 p-0 background-title">
            @include('public.breadcrumbs', $breadcrumbs = [route('public.news.index') => 'header-footer.news',
                route('public.news.show', [mb_strtolower(class_basename($news)), $news->id]) => $news->title])

            <div class="row mx-auto" style="max-width: 800px">
                <div class="col-lg-2 col-sm-4 news-title-position">
                    <span class="news-title-show">{{date("d.m", strtotime($news->publish_date))}} </span>
                </div>
                <div class="col-lg-10 col-sm-8 news-title-position">
                    <span class="news-title-show">{{($news->title)}}</span>
                </div>
            </div>
            <img data-src="{{asset("/images/show-news-wave.png")}}" class="lazyload news-wave position-absolute">

        </div>

        <div class="col-12 background-main">
            <div class="row">
                @if(!empty($news->video))
                    <div class="col-12 d-flex justify-content-center mb-5">
                        <div class="container">
                            <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{substr($news->video, 30)}}"></div>
                        </div>
                    </div>
                @endif
                <div class="col-12 news-text-show mb-5">{!! $news->text  !!}</div>
                @if(!empty($news->files))
                    @foreach($news->files as $file)
                        <div class="col-12 mb-3">
                            <a href="{{asset('storage/'.$file->file)}}" target="_blank">
                                <button class="news-file-button-show"> {{basename($file->file)}}</button>
                            </a>
                        </div>
                    @endforeach
                @endif
                @if(!empty ($news->images))
                    <div class="col-12 mb-5">
                        <div class="news-show-slick">
                            @foreach ($news->images as $image)
                                <div class="d-flex justify-content-center">
                                    <img data-src="{{asset('storage/'.$image->image)}}" class="imgs-news lazyload">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.plyr.io/3.5.10/plyr.polyfilled.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <script>
        $('.news-show-slick').slick({
            arrows: false,
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });

        const player = new Plyr('#player', {});
        window.player = player;
    </script>
@endpush