@push('css')
    <link rel="stylesheet" href="{{asset('css/actions.css') }}">
    <link rel="stylesheet" href="{{asset('css/main-slider.css') }}">
    <link rel="stylesheet" href="{{asset('css/our-services.css') }}">
@endpush

<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/main-slider-1.jpg" class="d-block w-100" alt="1">
                <div class="carousel-caption d-none d-md-block text-left">
                    <div class="carousel-name-Paulownia">Paulownia</div>
                    <div class="carousel-professional">professional </div>
                    <div class="carousel-text">We produce certified seedlings of Paulownia. The range of application of Paulownia: wood, bio-fuel, perfumes, cosmeceuticals, fodder.</div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/main-slider-2.jpg" class="d-block w-100" alt="2">
                <div class="carousel-caption d-none d-md-block text-left">
                    <div class="carousel-name-Paulownia">Paulownia</div>
                    <div class="carousel-professional">professional </div>
                    <div class="carousel-text">We produce certified seedlings of Paulownia. The range of application of Paulownia: wood, bio-fuel, perfumes, cosmeceuticals, fodder.</div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/main-slider-3.jpg" class="d-block w-100" alt="3">
                <div class="carousel-caption d-none d-md-block text-left">
                    <div class="carousel-name-Paulownia">Paulownia</div>
                    <div class="carousel-professional">professional </div>
                    <div class="carousel-text">We produce certified seedlings of Paulownia. The range of application of Paulownia: wood, bio-fuel, perfumes, cosmeceuticals, fodder.</div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>






