<div class="row mt-3 mb-3 ml-2">
    <div class="col-xl-2 col-md-0 col-sm-0"></div>
    <div class="col-xl-6 col-md-12 col-sm-12 pl-4 p-0">

        <a  @if(url()->current() === route('public.paulownia.about')) class="text-href p-xl-3 p-md-3 p-sm-0 tyro "
            @else class="text-href p-xl-3 p-md-3 p-sm-0" @endif href="{{route('public.paulownia.about')}}">@lang('about-paulownia.about-paulownia')</a>

        <a  @if(url()->current() === route('public.paulownia.type')) class="text-href p-xl-3 p-md-3 p-sm-0 tyro "
            @else class="text-href p-xl-3 p-md-3 p-sm-0" @endif href="{{route('public.paulownia.type')}}">@lang('about-paulownia.types-of-paulownia')</a>

        <a  @if(url()->current() === route('public.paulownia.planting')) class="text-href p-xl-3 p-md-3 p-sm-0 tyro "
            @else class="text-href p-xl-3 p-md-3 p-sm-0" @endif href="{{route('public.paulownia.planting')}}">@lang('about-paulownia.plantation-creation')</a>

    </div>
    <div class="col-xl-4 col-md-0 col-sm-0"></div>
</div>


