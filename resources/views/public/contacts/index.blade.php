@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/contacts.css') }}">
    @endpush

    <div class="row m-0 fon-for-contacts">

        <div class="col-12 line-for-contacts ">@include('public.breadcrumbs', $breadcrumbs = [route('public.contacts.index') => 'header-footer.contacts' ])</div>

        <div class="row m-0">

            <div class="col-xl-5 col-md-12 col-sm-12 pl-5 pr-0 pt-5 ">
                <div class="title-for-contacts mb-5">Spain</div>
                <div class="text-for-contacts mb-5 ">Our company has settled in Spain, the province of Aragon, whose production area is 2 hectares, which allows us to produce more than half a million seedlings per year. We offer an individual approach to each client, a large selection of advanced varieties.</div>
                <div class="title-for-contacts mb-5">PAULOWNIA PROFFESIONAL S.L.</div>
                <div class="text-for-contacts">Phone : +34 642 787 555 </div>
                <div class="text-for-contacts">Email: info@paulownia.pro </div>
                <div class="text-for-contacts mb-3">Viber: +34 642 787 555</div>
                <div class="text-for-contacts">Camino Estanca S/N Apartado </div>
                <div class="text-for-contacts">№ 50 Alcañiz  </div>
                <div class="text-for-contacts">(Teruel) 44600</div>
                <div class="text-for-contacts mb-5">España</div>

                <div class="title-for-contacts mb-5">  Ukraine, LLC «OUR GREEN COUNTRY»</div>
                <div class="text-for-contacts">Phone: +38 057 72 02 171 </div>
                <div class="text-for-contacts">Email: OGC.LLC.PRO@gmail.com </div>
                <div class="text-for-contacts mb-3">Viber: +38 057 72 02 171</div>
                <div class="text-for-contacts">61013, c.Harkiv, </div>
                <div class="text-for-contacts">st.Shevchenko 24,</div>
                <div class="text-for-contacts mb-5">Code ЄДРПОУ 43224463</div>

            </div>


            <div class="col-xl-7 col-md-12 col-sm-12 pl-5 pt-5 pb-5">
                <img data-src="{{asset('/images/map-with-Archi.png')}}" class="lazyload map-with-Archi">
            </div>

        </div>
                    <div class="col-xl-12 col-md-12 col-sm-4 pl-5 m-0">

                        <span class="title-for-contacts ">Write to us:</span>
                        <input placeholder="Your name" class="email-contacts">
                        <input placeholder="Email" class="email-contacts ">
                        <input placeholder="Your message" class="email-contacts ">

                        <button type="submit" class="button-contacts ">Send</button>

                     </div>
    </div>




@endsection