@push('css')
    <link rel="stylesheet" href="{{ asset('css/main-slider.css') }}?v10">
    <link rel="stylesheet" href="{{ asset('css/vertical-slider.css')}}?v7">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css')}}?v7">
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

                            <div class="news-shadow">
                                <img  src="/images/slider-news-1.png" class="img-rad">
                                        <div class="news-box">
                                            <div class="title-text-news">Bred triple hybrid </div>
                                            <div class="text-news" >Manufactured, selected and ...
                                                <a href="#" class="news-read-more" >Read more</a>
                                            </div>
                                        </div>
                            </div>

                            <div class="news-shadow"  >
                                <img src="/images/slider-news-2.png" class="img-rad">
                                <div class="news-box">
                                    <div class="title-text-news">Bred triple hybrid </div>
                                    <div class="text-news">Manufactured, selected and ...
                                        <a href="#" class="news-read-more" >Read more</a>
                                    </div>
                                </div>
                            </div>

                            <div class="news-shadow " >
                                <img src="/images/slider-news-3.png" class="img-rad">
                                <div class="news-box">
                                    <div class="title-text-news">Bred triple hybrid </div>
                                    <div class="text-news">Manufactured, selected and ...
                                        <a href="#" class="news-read-more" >Read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="news-shadow" >
                                <img src="/images/slider-news-1.png" class="img-rad">
                                <div class="news-box" >
                                    <div class="title-text-news">Bred triple hybrid </div>
                                    <div class="text-news">Manufactured, selected and ...
                                        <a href="#" class="news-read-more" >Read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="news-shadow" >
                                <img src="/images/slider-news-1.png" class="img-rad">
                                <div class="news-box" >
                                    <div class="title-text-news">Bred triple hybrid </div>
                                    <div class="text-news">Manufactured, selected and ...
                                        <a href="#" class="news-read-more" >Read more</a>
                                    </div>
                                </div>
                            </div>
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

