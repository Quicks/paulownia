@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/faq.css') }}?v4">
        <link rel="stylesheet" href="{{asset('css/contacts.css') }}?v1">
    @endpush
    <style>
        .fon-text {
            padding-top: .5rem !important;
        }
    </style>

    <div class="fon-faq pb-5">

        <div
            class="col-12 top-fon">@include('public.breadcrumbs', $breadcrumbs = [route('public.faq.index') => 'header-footer.faq' ])</div>
        <div class="col-11 mx-auto">
            <div class="faq-text-list">@lang('header-footer.faq')</div>
            <ul class="nav nav-tabs justify-content-end" id="myTab" role="tablist">
                @foreach ($topics as $topic)
                    <li class="nav-item ">
                        <a class="nav-link" id="{{$topic->id}}-tab" data-toggle="tab" href="#home-{{$topic->id}}"
                           role="tab" aria-controls="home" aria-selected="true">{{$topic->text}}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach($topics as $topic)
                    <div class="tab-pane fade" id="home-{{$topic->id}}" role="tabpanel"
                         aria-labelledby="{{$topic->id}}-tab">
                        <div class="accordion" id="accordionExample">
                            @forelse($topic->faqs as $item)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <div class="row">
                                            <div class="col-11">{{$item->question}}</div>
                                            <div class="col-1">
                                                <button class="btn btn-link collapsed " type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapse{{$item->id}}" aria-expanded="false"
                                                        aria-controls="collapse{{$item->id}}">
                                                    <img data-src="/images/button-faq-down.png" class="lazyload "
                                                         id="img-text-{{$item->id}}" onClick="chg(id)">
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="collapse{{$item->id}}" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">{{html_entity_decode(strip_tags($item->answer))}}</div>
                                    </div>
                                </div>
                            @empty
                                <div>...</div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 p-0 mt-5">
            <div class="row ">
                <div class="title-for-contacts name-contacts col-xl-2 col-md-12 col-sm-12">@lang('contacts.write-to-us')
                    :
                </div>
                <div class="col-xl-2 col-md-12 col-sm-12 padding-1199 ">
                    <input placeholder="Your name" class="email-contacts ">
                </div>
                <div class="col-xl-2 col-md-12 col-sm-12 padding-1199 ">
                    <input placeholder="Email" class="email-contacts">
                </div>
                <div class="col-xl-4 col-md-12 col-sm-12 padding-1199 ">
                    <input placeholder="@lang('contacts.your-message')" class="messege-contacts">
                </div>
                <div class="col-xl-2 col-md-12 col-sm-12 text-center">
                    <button type="submit" class="button-contacts ">@lang('contacts.send')</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function chg(id) {
            if (document.getElementById(id).src.indexOf("/images/button-faq-down.png") > 0) {
                document.getElementById(id).src = "/images/button-faq-up.png"
            } else {
                document.getElementById(id).src = "/images/button-faq-down.png"
            }
        }
    </script>
@endsection
