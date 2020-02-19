@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/profitability-calculation.css')}}?v3">
        <link rel="stylesheet" href="{{ asset('css/main-calculate.css') }}?v6">
    @endpush

    <style>
        .selectric {
            color: black;
        }
        .selectric .label {
            color: black;
            border-bottom: 1px solid black;
        }
        .selectric .button {
            color:black;
        }
        .selectric-items li {
            color: black;
        }
        .selectric-items li.selected{
            color: #444;
        }
        .selectric-items li:hover {
            color: #444;
        }
        .calc-select {
            color: black;
            border-bottom: 1px solid black;
        }
        .calc-number::-moz-placeholder{
            color: black;
        }
        .calc-number::-webkit-input-placeholder{
            color: black;
        }
        .modal-content-calc {
            background: #2B2723;
            color: black;
        }
    </style>

        <div class="row fon-profitability-calculation">

            <div class="col-12 pb-5 line-for-calc">
                @include('public.breadcrumbs', $breadcrumbs = [route('public.calculations.index') => 'header-footer.profitability calculation' ])</div>

            <div class="col-12 pl-5 pr-5 text-profitability-calculation ">
                @lang('profitability-calculation.text').
            </div>

            <div class="col-12 mt-5">@include('public.main.calculate')</div>

            <div class="col-12 mt-5 mb-5 title-profitability-calculation text-center">
                @lang('profitability-calculation.parametrs')
                <hr class="calc-title-line">
            </div>

            <div class="col-12 text-left ">
                <a href="{{route('public.paulownia.type')}}" class="text-for-name-table-calc pl-5 pb-3">Ze pro</a>
            </div>
            <img data-src="{{asset('/images/ze-pro-calc.svg')}}"  class="justify-content-center mx-auto p-5 lazyload" style="max-width: 100%">

            <div class="col-12 text-left ">
                <a href="{{route('public.paulownia.type')}}" class="text-for-name-table-calc pl-5 pb-3"> Turbo pro</a>
            </div>
            <img data-src="{{asset('/images/turbo-pro-calc.svg')}}" class="justify-content-center mx-auto p-5 lazyload" style="max-width: 100%">

            <div class="col-12 text-left " >
                <a href="{{route('public.paulownia.type')}}" class="text-for-name-table-calc pl-5 pb-3">Elongata</a>
            </div>

            <img data-src="{{asset('/images/elongata-calc.svg')}}" class="justify-content-center mx-auto p-5 lazyload" style="max-width: 100%">

            <div class="col-12 text-left " >
                <a href="{{route('public.paulownia.type')}}" class="text-for-name-table-calc pl-5 pb-3">Shan Tong</a>
            </div>

            <img data-src="{{asset('/images/shatong-calc.svg')}}" class="justify-content-center mx-auto p-5 lazyload" style="max-width: 100%">

        </div>


@endsection