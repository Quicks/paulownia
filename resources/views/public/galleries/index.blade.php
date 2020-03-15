@extends('layouts.public')

@push('css')
    <link rel="stylesheet" href="{{asset('css/galleries.css') }}?v1">
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
                        route('public.galleries.index', $gallery->id) => html_entity_decode(substr(strip_tags($gallery->title), 0, 15)),
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
                @if($loop->iteration < 4)
                    <a class="nav-item nav-link pt-4 pb-3 px-0 @if($item->id == $gallery->id) active @endif" 
                        href="{{route('public.galleries.index', $item->id)}}" 
                        >
                        {{html_entity_decode(substr(strip_tags($item->title), 0, 15))}}
                    </a>
                @endif
            @empty
                <h3>@lang('Our gallery')</h3>
            @endforelse
        </div>
    </nav>

    <div class="col-12 mt-4 text-center">
        <p class="gallery-title">{{html_entity_decode(strip_tags($gallery->title))}}</p>
        <hr class="gallery-title-line">
    </div>
    
    <div class="pt-4 pl-5 pr-5 gallery-description-text">
        {!! $gallery->desc !!}
    </div>

    <div class="gg-container">
        <div class="gg-box" id="gallery-1">
            @foreach($gallery->images as $image)
                <img class="grid-img" src="{{asset('storage/'.$image->image)}}">
            @endforeach
        </div>
</div>

<script type="text/javascript">
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
</script>

@endsection
