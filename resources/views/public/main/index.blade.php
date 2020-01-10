@extends('layouts.public')
@section('content')
    @include('public.main.slider')
    @include('public.main.slider-sale-about-us')
    @include('public.main.our-products')
    @include('public.main.advantages')
    @include('public.main.services')
    @include('public.main.grades')
    @include('public.main.our-paulownia')
    @include('public.main.map')
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function () {

    function isElementInViewport(elem) {
        var elementTop = $(elem).offset().top;
        var elementBottom = elementTop + $(elem).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    function checkAnimation() {
        var elem = $('.animated');
        elem.each(function(idx) {
            if (isElementInViewport(elem[idx])) {
                $(elem[idx]).addClass('start');
            } else {
                $(elem[idx]).removeClass('start');
            }
        })
    }

    checkAnimation();

    $(window).scroll(function(){
        checkAnimation();
    });
});
</script>>
@endpush