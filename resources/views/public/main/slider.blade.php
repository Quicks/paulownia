@push('css')
    <link rel="stylesheet" href="{{ asset('css/main-slider.css') }}?v10">
    <link rel="stylesheet" href="{{ asset('css/vertical-slider.css')}}?v9">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css')}}?v8">
@endpush

@if(!empty($sliderData))

    <div class="style-for-main-slider">

        <div class="row app">

            <div class="col-9">

                <a href="#" class="slider-png1" ></a>
                <a href="#" class="slider-png2" ></a>
                <a href="#" class="slider-png3" ></a>

            </div>

                <div class="col-3">
                    <div class="vertical-carousel">
                        <section class="vertical slider ">
                            @foreach($allNews as $news)
                                <div class="news-shadow">
                                    <img
                                            @if(!empty($news->images[0]))
                                            data-src="{{asset('storage/'.$news->images[0]->thumbnail)}}"
                                            @else
                                            data-src="{{asset('/images/slider-news-1.png')}}"
                                            @endif
                                            class="img-rad lazyload">
                                    <div class="news-box">
                                        <div class="title-text-news">{{$news->title}}</div>
                                        <div class="text-news">{{substr(strip_tags($news->text), 0, 25)}}
                                            <a href="{{route('public.news.show', [mb_strtolower(class_basename($news)), $news->id])}}"
                                               class="news-read-more">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </section>
                    </div>
                </div>
        </div>

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" >
            <ol class="carousel-indicators slide-circle">
                @foreach ($sliderData as $key=>$value)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="@if($key==0)active @endif li-circle"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($sliderData as $key=>$value)
                    <div class="carousel-item @if($key === array_key_first($sliderData)) active @endif">
                        <img src="{{asset('storage/' . $value['path'])}}" class="d-block w-100 "  alt="{{$value['title']}}">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <div>{!! $value['content'] !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div> <img id="main-slider-line" src="/images/line-for-main-slider.png" ></div>
    </div>

@endif


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <script>
        $(document).ready(function () {

            $(".vertical").slick({
                vertical: true,
                verticalSwiping: true,
                slidesToShow: 3,
                autoplay: false,
                speed:500,
            });
        });
    </script>
@endpush

