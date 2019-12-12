@push('css')
    <link rel="stylesheet" href="{{asset('css/ticker.css') }}">
@endpush
<div class="row ticker-back">
    <div class="col-12">
        <marquee class="ticker-text">{{$ticker}}</marquee>
    </div>
</div>