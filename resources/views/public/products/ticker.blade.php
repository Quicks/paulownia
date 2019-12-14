@push('css')
    <link rel="stylesheet" href="{{asset('css/ticker.css') }}">
@endpush
@if(!empty($ticker->text))
    <div class="row ticker-back">
        <div class="col-12">
            <marquee class="ticker-text" @if(App::getLocale() == 'ar') direction="right" @endif>
                {!! $ticker->text !!}
            </marquee>
        </div>
    </div>
@endif