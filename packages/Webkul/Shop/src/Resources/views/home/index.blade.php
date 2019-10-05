@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.home.page-title') }}
@endsection

@section('content-wrapper')
    <div style="overflow:hidden">
        <div style="display:inline-block;">
            <a href={{App::getLocale() . '/news'}}>News</a>
        </div>
        <div style="display:inline-block;">
            <a href={{App::getLocale() . '/articles'}}>Articles</a>
        </div>
        <div style="display:inline-block;">
            <a href="{{App::getLocale() . '/galleries'}}">Galleries</a>
        </div>
        <div style="display:inline-block;">
            <a href="{{App::getLocale() . '/treatises'}}">Treatises</a>
        </div>
        <div style="display:inline-block;">
            <a href="{{App::getLocale() . '/partners'}}">Partners</a>
        </div>
    </div>

    {!! view_render_event('bagisto.shop.home.content.before') !!}

    {!! DbView::make(core()->getCurrentChannel())->field('home_page_content')->with(['sliderData' => $sliderData])->render() !!}

    {{ view_render_event('bagisto.shop.home.content.after') }}

@endsection
