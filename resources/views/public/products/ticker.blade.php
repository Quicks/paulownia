@push('css')
    <link rel="stylesheet" href="{{asset('css/ticker.css') }}">
@endpush
@if(!empty($ticker->translate()->text))
    <div class="row ticker-back">
        <div class="col-12">
            <marquee class="ticker-text">{!! $ticker->translate()->text !!}</marquee>
        </div>
    </div>
@endif