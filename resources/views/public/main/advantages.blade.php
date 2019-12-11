@push('css')
    <link rel="stylesheet" href="{{ asset('css/advantages.css') }}?v6">
@endpush

<div class="advantages">
    <div class="row text-center mx-auto advantages-width">
        <div class="col-12 pb-4">
            <p class="advantages-title mt-5">Our advantages</p>
            <hr class="advantages-line">
        </div>
        <div class="col mx-auto" style="max-width: 160px">
            <img data-src="{{asset('images/adv-sales.png')}}" class="pb-3 lazyload">
            <p class="advantages-text">
                More than 10 years in the market
            </p>
        </div>
        <div class="col mx-auto" style="max-width: 177px">
            <img data-src="{{asset('images/adv-certificate.png')}}" class="pb-3 lazyload">
            <p class="advantages-text">
                Certified seedlings
            </p>
        </div>
        <div class="col mx-auto" style="max-width: 280px">
            <img data-src="{{asset('images/adv-box.png')}}" class="pb-2 lazyload">
            <p class="advantages-text">
                Delivery to all European countries - 72 hours. Spain, Portugal - 24 hours
            </p>
        </div>
        <div class="col mx-auto" style="max-width: 230px">
            <img data-src="{{asset('images/adv-conversation.png')}}" class="pb-3 lazyload">
            <p class="advantages-text">
                Individual approach to each client
            </p>
        </div>
        <div class="col mx-auto" style="max-width: 140px">
            <img data-src="{{asset('images/adv-team.png')}}" class="pb-3 lazyload">
            <p class="advantages-text">
                Over 1000 customers
            </p>
        </div>
    </div>
</div>