@extends('layouts.public')

@push('css')
    <link rel="stylesheet" href="{{asset('css/galleries.css') }}?v2">
    <link rel="stylesheet" href="{{asset('css/grid-gallery.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('js/grid-gallery.js')}}"></script>
@endpush

@section('content')

<div class="row position-relative">
    <div class="col-12 fon-for-title">
        <div class="row">
            <div class="col-12 pt-2 gallery-breadcrumb">
                @include('public.breadcrumbs', $breadcrumbs = [
                        route('public.galleries.index', 0) => 'header-footer.gallery', 
                        $gallery ? route('public.galleries.index', $gallery->id) : route('public.galleries.index', 0) => 
                        $gallery ? html_entity_decode(substr(strip_tags($gallery->title), 0, 15)) : __('public-translations.No galleries available'),
                    ])
            </div>
            <div class="col-xl-2 col-md-2 col-sm-0"></div>
            <div class="col-9 mt-5 pt-5 mb-5 pb-5">
                <div class="title-text mt-5 pt-5">@lang('public-translations.Our gallery')</div>
                <div class="text-under-title"></div>
                <div class="col-xl-1 col-md-1 col-sm-0"></div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 p-0 fon-for-galleries">
    <nav>
        <div class="nav nav-tabs justify-content-around">
            @forelse($galleries as $item)
                @if($loop->iteration < 5)
                    <a class="nav-item nav-link pt-4 pb-3 px-0 @if($item->id == $gallery->id) active @endif" 
                        href="{{route('public.galleries.index', $item->id)}}" 
                        >
                        {{html_entity_decode(substr(strip_tags($item->title), 0, 15))}}
                    </a>
                @endif
                @if($loop->iteration == 5)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle pt-4 pb-3 px-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">@lang('public-translations.Other')</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item @if($item->id == $gallery->id) active @endif" 
                                    href="{{route('public.galleries.index', $item->id)}}" 
                                    >
                                    {{html_entity_decode(substr(strip_tags($item->title), 0, 15))}}
                                </a>
                @endif
                @if($loop->iteration > 5)
                                <a class="dropdown-item @if($item->id == $gallery->id) active @endif" 
                                    href="{{route('public.galleries.index', $item->id)}}" 
                                    >
                                    {{html_entity_decode(substr(strip_tags($item->title), 0, 15))}}
                                </a>
                @endif
                @if($loop->iteration >= 5 && $loop->last)
                        </div>
                    </li>
                @endif
            @empty
                <h3>@lang('public-translations.No galleries available')</h3>
            @endforelse
        </div>
    </nav>

    <div class="col-12 mt-4 text-center">
        <p class="gallery-title">{{$gallery ? html_entity_decode(strip_tags($gallery->title)) : __('public-translations.No galleries available')}}</p>
        <hr class="gallery-title-line">
    </div>
    
    <div class="pt-4 pl-5 pr-5 gallery-description-text">
        {!! $gallery ? $gallery->desc : "" !!}
    </div>

    <div class="gg-container">
        <div class="gg-box" id="gallery-1">
            @if($gallery)
                @forelse($gallery->images as $image)
                    <img class="grid-img" src="{{asset('storage/'.$image->image)}}">
                @empty
                @endforelse
            @endif
        </div>
    </div>
</div>

{{-- <script type="text/javascript">  //gridGallery customization
    $(document).ready(function() {
        gridGallery({
             selector: "#gallery-1", // gallery selector
             // darkMode: false, // enable dark mode
             // layout: "horizontal", // "square" or "horizontal"
             // gapLength: 25, // space between images
             // rowHeight: 180, // row height
             // columnWidth: 200 // column width
        });
    });
</script> --}}

@endsection
