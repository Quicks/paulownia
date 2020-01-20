@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/contacts.css') }}?v2">
    @endpush

    <div class="row m-0 fon-for-contacts position-relative">

        <div class="col-12 line-for-contacts ">@include('public.breadcrumbs', $breadcrumbs = [route('public.contacts.index') => 'header-footer.contacts' ])</div>

        <div class="position-absolute leaf-for-contacts"><img class="lazyload"
                                                              data-src="{{asset('/images/leaf-for-contacts.png')}}"
                                                              style="max-width: 100%"></div>

        <div class="row m-0 position-relative">

            <div class="col-md-5 col-sm-12 pl-xl-5 pl-md-3 pl-sm-2 pr-xl-0 pr-md-1 pr-sm-1 pt-5 ">

                <div class="title-for-contacts mb-3">@lang('contacts.spain')</div>
                <div class="text-for-contacts mb-3">@lang('contacts.text').</div>
                <div class="title-for-contacts mb-3">PAULOWNIA PROFFESIONAL S.L.</div>
                <div class="text-for-contacts">Phone : +34 642 787 555</div>
                <div class="text-for-contacts">Email: info@paulownia.pro</div>
                <div class="text-for-contacts mb-2">Viber: +34 642 787 555</div>
                <div class="text-for-contacts">Camino Estanca S/N Apartado</div>
                <div class="text-for-contacts">№ 50 Alcañiz</div>
                <div class="text-for-contacts">(Teruel) 44600</div>
                <div class="text-for-contacts mb-3">España</div>

                <div class="title-for-contacts mb-3"> Ukraine, LLC «OUR GREEN COUNTRY»</div>
                <div class="text-for-contacts">Phone: +38 057 72 02 171</div>
                <div class="text-for-contacts">Email: OGC.LLC.PRO@gmail.com</div>
                <div class="text-for-contacts mb-2">Viber: +38 057 72 02 171</div>
                <div class="text-for-contacts">61013, c.Harkiv,</div>
                <div class="text-for-contacts">st.Shevchenko 24,</div>
                <div class="text-for-contacts mb-3">Code ЄДРПОУ 43224463</div>

            </div>

            <div class="col-md-7 col-sm-12 pl-xl-5 pl-md-5 pl-sm-4 pt-5 pb-5">
                <div style="position: sticky; top:0">
                    <img data-src="{{asset('/images/map-with-Archi.png')}}" class="lazyload map-with-Archi">
                    <img data-src="{{asset('/images/pointMap.svg')}}" class="lazyload map-point">
                    <img data-src="{{asset('/images/Artur.png')}}" class="lazyload map-director">
                    <img data-src="{{asset('/images/pointMapMain.svg')}}" class="lazyload map-point-main">
                </div>
            </div>

        </div>
        <div class="col-xl-12 col-md-12 col-sm-4 pl-5 mx-auto pb-5">

            <span class="title-for-contacts name-contacts">@lang('contacts.write-to-us'):</span>
            <input placeholder="Your name" class="email-contacts ">
            <input placeholder="Email" class="email-contacts">
            <input placeholder="@lang('contacts.your-message')" class="email-contacts messege-contacts">
            <button type="submit" class="button-contacts ">@lang('contacts.send')</button>

        </div>
    </div>

@endsection