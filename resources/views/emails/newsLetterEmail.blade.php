@component('shop::emails.layouts.master')

    <div>
        <div style="text-align: center;">
            <a href="{{ config('app.url') }}">
                <img src="{{ asset('images/logo.png') }}">
            </a>
        </div>

        <div  style="font-size:16px; color:#242424; font-weight:600; margin-top: 60px; margin-bottom: 15px">
            {{$data['subject']}}
        </div>

        <div>
            {!!$data['text']!!}
        </div>

        <div  style="margin-top: 40px; text-align: center">
            <a href="{{ route('shop.unsubscribe', $data['token']) }}" style="font-size: 10px;
            color: #FFFFFF; text-align: center; background: #0031F0; padding: 5px 10px;text-decoration: none;">Unsubscribe</a>
        </div>
    </div>

@endcomponent