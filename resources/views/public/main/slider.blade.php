<!-- START SECTION BANNER -->
<section class="plant-slider-container">
    <h6>PAULOWNIA PROFESSIONAL®</h6>
    <h1>{{__('products.plant-label')}}</h1>
    <div class="row mt-5">
        <div class="col-12">
            <div class="d-flex justify-content-center align-items-center plant-slider-wrap">
                <div class="arrow-up">
                    <svg width="21" height="59" viewBox="0 0 21 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.667 0.886658L0 29.8387L18.667 58.7906L21 55.1723L4.66593 29.8387L21 4.50502L18.667 0.886658Z" fill="#5B9600"/>
                    </svg>
                </div>
                <div class="plant-slider"></div>
                <div class="arrow-down">
                    <svg width="21" height="59" viewBox="0 0 21 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.33297 58.7906L21 29.8387L2.33297 0.886658L0 4.50501L16.3341 29.8387L0 55.1723L2.33297 58.7906Z" fill="#5B9600"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <a
                href=""
                class="p-0 mx-0 mt-1 custom-page-tab active submit-btn"
            >{{ __('products.shop-btn')}}</a>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.plant-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                autoplay: false,
                centerMode: false,
                arrows: true,
                prevArrow: $('.plant-slider-wrap .arrow-down'),
                nextArrow: $('.plant-slider-wrap .arrow-up'),
                focusOnSelect: true,
                customPaging: function (slider, i) { 
                    return '<div class="dot"></div>';
                },
                dotsClass: 'plant-slider-dot-container'
            });
        })

        $.ajax({
            url: '/products/by_filter',
            data: {
                filters: {
                    price: {
                        from: 0,
                        to: 10000000,
                    }
                },
                limit: 100,
            },success: function(response){
                $.parseHTML(response).map(function(element, index) {
                    if(index % 2 === 0) {
                        $('.plant-slider').slick('slickAdd', `<div class="slide-initial">${element.outerHTML}</div>`);
                    }
                });
            }
        })
    </script>
@endpush
