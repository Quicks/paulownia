@push('css')
    <link rel="stylesheet" href="{{ asset('css/advantages.css') }}?v5">
@endpush

<div class="advantages mt-5">
    <div class="row text-center mx-auto advantages-width">
        <div class="col-12 pb-4">
            <p class="advantages-title mt-5">Our advantages</p>
            <hr class="advantages-line">
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12 mx-auto" style="max-width: 170px">
            <img data-src="{{asset('images/medal.svg')}}" class="pb-3 lazyload">
            <p class="advantages-text">
                Certified seedlings
            </p>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12 mr-xl-3 mx-auto" style="max-width: 290px">
            <img data-src="{{asset('images/delivery.svg')}}" class="pb-2 lazyload">
            <p class="advantages-text">
                Delivery to all European countries - 72 hours. Spain, Portugal - 24 hours
            </p>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12 mx-auto" style="max-width: 300px">
            <img data-src="{{asset('images/consult.svg')}}" class="pb-3 lazyload">
            <p class="advantages-text">
                Individual approach to each client
            </p>
        </div>
    </div>
</div>