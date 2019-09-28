@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.home.page-title') }}
@endsection

@section('content-wrapper')
    <div style="overflow:hidden">
        <div style="display:inline-block;">
            <a href={{route('public.news.index') . '?locale=' . App::getLocale()}}>News</a>
        </div>
        <div style="display:inline-block;">
            <a href={{route('public.articles.index') . '?locale=' . App::getLocale()}}>Articles</a>
        </div>
        <div style="display:inline-block;">
            <a href="{{route('public.galleries.index') . '?locale=' . App::getLocale()}}">Galleries</a>
        </div>
        <div style="display:inline-block;">
            <a href="{{route('public.treatises.index') . '?locale=' . App::getLocale()}}">Treatises</a>
        </div>
        <div style="display:inline-block;">
            <a href="{{route('public.partners.index') . '?locale=' . App::getLocale()}}">Partners</a>
        </div>
    </div>

    {!! view_render_event('bagisto.shop.home.content.before') !!}

    {!! DbView::make(core()->getCurrentChannel())->field('home_page_content')->with(['sliderData' => $sliderData])->render() !!}

    {{ view_render_event('bagisto.shop.home.content.after') }}

@endsection
