@push('css')
    <link rel="stylesheet" href="{{asset('css/main-slider.css') }}">
    <link rel="stylesheet" href="{{asset('css/12.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">

@endpush

@if(!empty($sliderData))
    <div class="bd-example" style="position: relative">

        <div class="row mw-100">
            <div class="col">
                <a href="#" class="slider-png1"></a>
                <a href="#" class="slider-png2"></a>
                <a href="#" class="slider-png3"></a>

                <div class="vertical-carousel">

                    <style type="text/css">

                        .slider {
                            width: 80%;
                            margin: 25px auto;
                        }

                        .slick-slide {
                            margin: 10px;
                        }

                        .slick-slide img {
                            width: 100%;
                        }

                        .slick-prev:before,
                        .slick-next:before {
                            color: black;
                        }
                    </style>

                    <div style="width:345px;height:586px;float:right">
                        <section class="vertical slider">
                            <div class="news-shadow">
                                <img  src="/images/slider-news-1.png" class="img-rad">
                                <p>khkshgkhgkxhg</p>
                                <p>khkshgkhgkxhg</p>

                            </div>
                            <div class="news-shadow">
                                <img src="/images/slider-news-2.png" class="img-rad">
                                <p>khkshgkhgkxhg</p>
                                <p>khkshgkhgkxhg</p>
                            </div>
                            <div class="news-shadow">
                                <img src="/images/slider-news-3.png" class="img-rad">
                                <p>khkshgkhgkxhg</p>
                                <p>khkshgkhgkxhg</p>
                            </div>
                            <div class="news-shadow">
                                <img src="/images/slider-news-1.png" class="img-rad">
                                <p>khkshgkhgkxhg</p>
                                <p>khkshgkhgkxhg</p>
                            </div>
                            <div class="news-shadow">
                                <img src="/images/slider-news-1.png" class="img-rad">
                                <p>khkshgkhgkxhg</p>
                                <p>khkshgkhgkxhg</p>
                            </div>
                        </section>
                    </div>

                </div>
            </div>

        </div>


        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators slide-circle">
                @foreach ($sliderData as $key=>$value)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="@if($key==0)active @endif li-circle"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($sliderData as $key=>$value)
                    <div class="carousel-item @if($key === array_key_first($sliderData)) active @endif">
                        <img src="{{asset('storage/' . $value['path'])}}" class="d-block w-100" alt="{{$value['title']}}">
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
    <script>
        $(document).ready(function () {
            $(".vertical").slick({
                vertical: true,
                verticalSwiping: true,
                slidesToShow: 3,
                opasity: 0
                // autoplay: true,
            });
        });
    </script>
@endpush

