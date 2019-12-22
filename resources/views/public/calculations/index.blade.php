@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/profitability-calculation.css')}}">
    @endpush

    <style>
        .selectric-wrapper {
            position: relative;
            cursor: pointer;
        }

        .selectric-responsive {
            width: 100%;
        }

        .selectric {
            background:transparent;
            position: relative;
            overflow: hidden;
            font-weight: bold;
            font-size: 20px;
            line-height: 38px;
            letter-spacing: 0.05em;
            color: black;
            max-width: 294px;
        }

        .selectric .label {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            font-weight: bold;
            font-size: 20px;
            line-height: 38px;
            letter-spacing: 0.05em;
            color: black;
            padding-left: 10px;
            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: 1px solid black;

        }

        .selectric .button {
            display: block;
            position: absolute;
            right: 10px;
            top: 5px;
            color:black;
            -moz-transform: rotate(90deg); /* Для Firefox */
            -ms-transform: rotate(90deg); /* Для IE */
            -webkit-transform: rotate(90deg); /* Для Safari, Chrome, iOS */
            -o-transform: rotate(90deg); /* Для Opera */
            transform: rotate(90deg);
            font-weight:lighter;
            font-size: 58px;
        }

        .selectric-open {
            z-index: 9999;
        }

        .selectric-open .selectric {
            border-color: #c4c4c4;
        }

        .selectric-open .selectric-items {
            display: block;
        }

        .selectric-disabled {
            display: none;
            cursor: default;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .selectric-hide-select {
            position: relative;
            overflow: hidden;
            width: 0;
            height: 0;
        }

        .selectric-hide-select select {
            position: absolute;
            left: -100%;
        }

        .selectric-hide-select.selectric-is-native {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 10;
        }

        .selectric-hide-select.selectric-is-native select {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            border: none;
            z-index: 1;
            box-sizing: border-box;
            opacity: 0;
        }

        .selectric-input {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 1px !important;
            height: 1px !important;
            outline: none !important;
            border: none !important;
            *font: 0/0 a !important;
            background: none !important;
        }
        /* Items box */
        .selectric-items {
            display: none;
            position: absolute;
            background: linear-gradient(9.94deg, #261F18 -3.14%, rgba(106, 88, 67, 0) 167.62%);
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25);
            border-radius: 25px;
            padding-top: 70px;
            padding-left: 10px;
            padding-right: 10px;
            margin-top: -50px;
            z-index: -1;
        }

        .selectric-items .selectric-scroll {
            height: 100%;
            overflow: auto;
        }

        .selectric-above .selectric-items {
            top: auto;
            bottom: 100%;
        }

        .selectric-items ul, .selectric-items li {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .selectric-items li {
            font-size: 18px;
            line-height: 38px;
            letter-spacing: 0.05em;
            color: black;
            display: block;
            cursor: pointer;
        }

        .selectric-items li.selected {
            background: #E0E0E0;
            color: #444;
        }
        .selectric-items li:hover {
            background: #D5D5D5;
            color: #444;
        }

        .selectric-items .disabled {
            display: none;
        }


        @media screen and (min-width: 1200px) and (max-width: 1500px) {
            .calc-width {
                max-width:1200px !important;
            }
        }
        .calculate-title {
            font-weight: bold;
            font-size: 48px;
            line-height: 38px;
            color: #8CBD02;
        }
        .calc-width {
            max-width:1400px;
        }
        .calc-title-line {
            background: #8CBD02;
            width: 273px;
            height: 3px;
            border-radius: 25px;
        }
        .button-calc {
            border: none;
            background: transparent;
        }
        .button-calc:active,.button-calc:focus {
            outline: none;
        }
        .button-calc::-moz-focus-inner {
            border: 0;
        }
        .calc-select  {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: transparent;
            font-weight: bold;
            font-size: 20px;
            line-height: 38px;
            letter-spacing: 0.05em;
            color: black;
            width: 100%;
            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: 1px solid black;

        }
        .calc-select:active, .calc-select:hover, .calc-select:focus {
            outline: 0;
            outline-offset: 0;
        }
        .calc-number::-moz-placeholder{
            color: black;
            opacity:1;
        }
        .calc-number::-webkit-input-placeholder{
            color: black;
            opacity:1;
        }
        .modal-content-calc {
            background: #2B2723;
            font-size: 14px;
            line-height: 38px;
            letter-spacing: 0.05em;
            color: black;
        }
        .button-calc:hover {
            -webkit-filter: drop-shadow(-2px -2px 20px #8CBD02);
            filter: drop-shadow(-2px -2px 20px #8CBD02);
        }
    </style>
    <div class="container-fluid">

        <div class="row fon-profitability-calculation">

            <div class="col-12 mb-5 line-for-calc">
                @include('public.breadcrumbs', $breadcrumbs = [route('public.calculations.index') => 'header-footer.profitability calculation' ])</div>

            <div class="col-12 pl-5 pr-5 text-profitability-calculation ">
                You can calculate the profitability of your plantation using our income calculation system,
                for this you need to fill out the form below by choosing one of the paulownia types.
                You can calculate the profitability of your plantation using our income calculation system, for this you need to fill
                out the form below by choosing one of the paulownia types. You can calculate the profitability of your plantation using our income
                calculation system, for this you need to fill out the form below by choosing one of the paulownia types. You can calculate the profitability
                of your plantation using our income calculation system, for this you need to fill out the form below by choosing one of the paulownia types.
            </div>

            <div class="col-12 mt-5 "> @include('public.main.calculate')</div>

            <div class="col-12 mt-5 mb-5 title-profitability-calculation text-center">Height and diameter</div>

            <div class="col-12 text-left text-for-name-table-calc pl-5 pb-3"> Ze pro</div>
            <img src="/images/ze-pro-calc.png" class="justify-content-center mx-auto p-5 " style="max-width: 100%">
            <div class="col-12 text-left text-for-name-table-calc pl-5 pb-3 pt-3"> Turbo pro</div>
            <img src="/images/ze-pro-calc.png" class="justify-content-center mx-auto p-5" style="max-width: 100%">
            <div class="col-12 text-left text-for-name-table-calc pl-5 pb-3 pt-3" > Elongata</div>
            <img src="/images/turbo-pro-calc.png" class="justify-content-center mx-auto p-5" style="max-width: 100%">
            <div class="col-12 text-left text-for-name-table-calc pl-5 pb-3 pt-3" > Shan Tong</div>
            <img src="/images/shatong-calc.png" class="justify-content-center mx-auto p-5" style="max-width: 100%">

        </div>
    </div>


@endsection