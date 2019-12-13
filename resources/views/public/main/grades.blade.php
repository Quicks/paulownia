@push('css')
    <link rel="stylesheet" href="{{ asset('css/grades.css') }}?v4">
@endpush

<div class="grades-back">
    @include('public.main.calculate')
    <div class="row text-center mx-auto pt-xl-5 grades-width">
        <div class="col-12 mb-5">
            <p class="grades-title">Paulownia grades produced by us </p>
            <hr class="grades-line">
        </div>
        <div class="col-xl-6 col-sm-12 mx-auto grades-item mr-5 pb-3 mb-sm-4">
            <div class="row">
                <div class="col-xl-8 col-sm-12 grades-imgs">
                    <img class="grades-img-size lazyload" data-src="{{asset('/images/turbo-booklet.jpg')}}">
                </div>
                <div class="col-xl-4 col-sm-12">
                    <p class="grades-item-title">Paulownia Turbo Pro ®</p>
                    <p class="grades-item-text text-left"> Ultrafast growth,temperatu re, resistant, adaptive, medi um / wide, cup,
                        productive,high quality, light, wood, estéril um / wide,
                        cup, productive,high quality, light, wood, ...</p>
                    <p class="text-left">
                        <a target="_blank" href="#" class="grades-item-link">Read more</a>
                    </p>
                    <div class="grades-stamp">
                        <img class="lazyload" data-src="{{asset('/images/stamp-turbopro.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-12 mx-auto grades-item pb-3 mb-sm-4">
            <div class="row">
                <div class="col-xl-8 col-sm-12 grades-imgs">
                    <img class="grades-img-size lazyload" data-src="{{asset('/images/ze-booklet.jpg')}}">
                </div>
                <div class="col-xl-4 col-sm-12">
                    <p class="grades-item-title">Paulownia Ze Pro ®</p>
                    <p class="grades-item-text text-left">Ultrafast growth,temperatu re, resistant, adaptive, medi um /
                        wide, cup, productive,high quality, light, wood, estéril um /
                        wide, cup, productive,high quality, light, wood, ...</p>
                    <p class="text-left">
                        <a target="_blank" href="#" class="grades-item-link">Read more</a>
                    </p>
                    <div class="grades-stamp">
                        <img class="lazyload" data-src="{{asset('/images/stamp-zepro.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
