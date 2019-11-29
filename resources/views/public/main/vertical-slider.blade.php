@push('css')
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
@endpush


<style type="text/css">

    .slider {
        width: 80%;
        margin: 100px auto;
    }

    .slick-slide {
        margin: 0 20px;
    }

    .slick-slide img {
        width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }


    .slick-slide {
        transition: all ease-in-out .3s;
        opacity: .2;
    }

    .slick-active {
        opacity: .5;
    }

    .slick-current {
        opacity: 1;
    }
</style>



<div style="width: 545px;height: 556px;">
    <section class="vertical slider">
        <div>
            <img src="/images/slider-news-1.png">
            <p>khkshgkhgkxhg</p>
            <p>khkshgkhgkxhg</p>

        </div>
        <div>
            <img src="/images/slider-news-2.png">
            <p>khkshgkhgkxhg</p>
            <p>khkshgkhgkxhg</p>
        </div>
        <div>
            <img src="/images/slider-news-3.png">
            <p>khkshgkhgkxhg</p>
            <p>khkshgkhgkxhg</p>
        </div>
        <div>
            <img src="/images/slider-news-1.png">
            <p>khkshgkhgkxhg</p>
            <p>khkshgkhgkxhg</p>
        </div>
        <div>
            <img src="/images/slider-news-1.png">
            <p>khkshgkhgkxhg</p>
            <p>khkshgkhgkxhg</p>
        </div>
        {{--<div>--}}
            {{--<img src="http://placehold.it/350x100?text=6">--}}
        {{--</div>--}}
        {{--<div>--}}
            {{--<img src="http://placehold.it/350x100?text=7">--}}
        {{--</div>--}}
        {{--<div>--}}
            {{--<img src="http://placehold.it/350x100?text=8">--}}
        {{--</div>--}}
        {{--<div>--}}
            {{--<img src="http://placehold.it/350x100?text=9">--}}
        {{--</div>--}}
        {{--<div>--}}
            {{--<img src="http://placehold.it/350x100?text=10">--}}
        {{--</div>--}}
    </section>
</div>

@push('scripts')
    <script>
        $(document).ready(function ()
        {
            $(".vertical").slick({
                vertical: true,
                verticalSwiping: true,
                slidesToShow: 3,
                autoplay: true,
            });
        });
    </script>
@endpush