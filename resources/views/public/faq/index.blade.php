@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/faq.css') }}?v8">
        <link rel="stylesheet" href="{{asset('css/contacts.css') }}?v3">
    @endpush

    <style>
        .fon-text {
            padding-top: .5rem !important;
        }
    </style>

    <div class="fon-faq">

        <div class="col-12 top-fon pt-2">@include('public.breadcrumbs', $breadcrumbs = [route('public.faq.index') => 'header-footer.faq' ])</div>
        <div class="col-11 mx-auto">
            <div class="faq-text-list">@lang('header-footer.faq')</div>
            <ul class="nav nav-tabs justify-content-end" id="myTab" role="tablist">
                @foreach ($topics as $topic)
                    <li class="nav-item ">
                        <a class="nav-link" id="{{$topic->id}}-tab" data-toggle="tab" href="#home-{{$topic->id}}"
                           role="tab" aria-controls="home"
                           aria-selected="true">{{html_entity_decode(strip_tags($topic->text))}}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach($topics as $topic)
                    <div class="tab-pane fade" id="home-{{$topic->id}}" role="tabpanel"
                         aria-labelledby="{{$topic->id}}-tab">
                        <div class="accordion" id="accordionExample{{$topic->id}}">
                            @forelse($topic->faqs as $item)
                                <div class="card">
                                    <div class="card-header" id="heading{{$item->id}}">
                                        <div class="row">
                                            <div class="col-11">{{$item->question}}</div>
                                            <div class="col-1">
                                                <button class="btn btn-link collapsed btn-faq" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapse{{$item->id}}" aria-expanded="false"
                                                        aria-controls="collapse{{$item->id}}">
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="collapse{{$item->id}}" class="collapse"
                                         aria-labelledby="heading{{$item->id}}"
                                         data-parent="#accordionExample{{$topic->id}}">
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
        <div class="col-12 pb-5 pt-5 mt-5 ">
            @include('public.write-to-us')
        </div>
    </div>

@endsection
