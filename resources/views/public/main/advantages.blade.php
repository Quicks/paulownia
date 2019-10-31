@push('css')
    <link rel="stylesheet" href="{{ asset('css/advantages.css') }}">
@endpush

<div class="row text-center mx-auto" style="max-width:1200px;">
    <div class="col-12 pb-4">
        <p class="advantages-title">Our advantages</p>
    </div>
    <div class="col-xl-4 col-md-4 col-sm-12">
        <img src="{{asset('images/diploma.svg')}}" class="pb-3">
        <p class="advantages-text">
            Certified seedlings
        </p>
    </div>
    <div class="col-xl-4 col-md-4 col-sm-12 mx-auto" style="max-width: 291px">
        <img src="{{asset('images/tracking.svg')}}" class="pb-2">
        <p class="advantages-text">
            Delivery to all European countries - 72 hours. Spain, Portugal - 24 hours
        </p>
    </div>
    <div class="col-xl-4 col-md-4 col-sm-12 mx-auto" style="max-width: 304px">
        <img src="{{asset('images/consultation.svg')}}" class="pb-3">
        <p class="advantages-text">
            Individual approach to each client
        </p>
    </div>
</div>