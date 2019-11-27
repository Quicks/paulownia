@push('css')
    <link rel="stylesheet" href="{{ asset('css/advantages.css') }}?v2">
@endpush

<div class="advantages mt-5">
    <div class="row text-center mx-auto" style="max-width:1200px;">
        <div class="col-12 pb-4">
            <p class="advantages-title mt-5">Our advantages</p>
            <hr class="advantages-line">
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12 mx-auto" style="max-width: 170px">
            <img src="{{asset('images/diploma.svg')}}" class="pb-3">
            <p class="advantages-text">
                Certified seedlings
            </p>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12 mr-xl-3 mx-auto" style="max-width: 290px">
            <img src="{{asset('images/tracking.svg')}}" class="pb-2">
            <p class="advantages-text">
                Delivery to all European countries - 72 hours. Spain, Portugal - 24 hours
            </p>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-12 mx-auto" style="max-width: 300px">
            <img src="{{asset('images/consultation.svg')}}" class="pb-3">
            <p class="advantages-text">
                Individual approach to each client
            </p>
        </div>
    </div>
</div>