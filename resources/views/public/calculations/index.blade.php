@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/profitability-calculation.css')}}?v5">
        <link rel="stylesheet" href="{{ asset('css/main-calculate.css') }}?v11">
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
            font-size: 2.3rem;
            line-height: 1rem;
            right: 2%;
        }
        .selectric-items {
            background: linear-gradient(9.94deg, rgba(56, 53, 51, 0.5) -3.14%, rgba(106, 88, 67, 0) 167.62%);
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25);
            border-radius: 25px;
            width: 305px !important;
            margin-left: -2%;
        }
        .selectric-items li {
            color: white;
        }
        .selectric-items li.selected{
            color: white;
            background:transparent;
        }
        .selectric-items li:hover{
            color: black;
            background:transparent;
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
            background: linear-gradient(9.94deg, rgba(56, 53, 51, 0.8) -3.14%, rgba(106, 88, 67, 0) 167.62%);
            color: black;
        }

        @media screen and (max-width: 425px) and (min-width: 376px){
            .calc-select {
                width: 91.5%;
            }
        }
        @media screen and (max-width: 375px) and (min-width: 321px){
            .calc-select {
                width: 98%;
            }
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