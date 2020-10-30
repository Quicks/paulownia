@extends('layouts.public')
@section('content')
@include('public.blocks.page_header', ['title' => __('header-footer.news')])
    <div class='custom-page-tabs'>
        <div class='parent-siblings'>
            <div class='custom-page-tab active'>
                <a href=''>
                    @lang('header-footer.news')
                </a>
            </div>
            <div class='custom-page-tab active'>
                <a href=''>
                    @lang('header-footer.news')
                </a>
            </div>
            <div class='custom-page-tab active'>
                <a href=''>
                    @lang('header-footer.news')
                </a>
            </div>
        </div>
    </div>
    <div class='custom-page-description'>
        <div class='news-search-wrapper'>
            <!-- <img src="/images/search.png" alt="search icon" class='search-icon'> -->
            <div class='col-md-7 search-input-wrapper'>
                <form action="">
                    <input class='form-control search-input' name='search' type='search' placeholder='Search' value="{{request()->search}}">
                </form>
            </div>
        </div>
        <section>
            <div class="row">
                @foreach($allNews as $newsItem)
                    @include('public.news.card', ['newsItem' => $newsItem])
                @endforeach            
            </div>
            <div class="row">
                <div class="col-12 mt-3 mt-lg-4">
                    {{ $allNews->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>                    
        </section>
    </div>
@endsection