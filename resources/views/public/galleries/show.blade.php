@extends('layouts.public')

@section('content')
    <!-- START SECTION BANNER -->
    @include('public.breadcrumbs', [
        $breadcrumbs = [
            route('public.galleries.index') => 'header-footer.gallery',
            route('public.galleries.show', [$gallery->id]) => $gallery->title,
        ],
        $pageTitle = $gallery->title
    ])
    <!-- END SECTION BANNER -->

    <!-- START SECTION GALLERY DETAIL -->
    <section class="small_pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 image-container masonry" id="lightgallery">
                    @foreach($gallery->images as $k => $image)
                        <a class='masonry-brick' href="/storage/{{$image->image}}">
                            <img src="/storage/{{$image->image}}" alt="image {{$k}}"/>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clearfix medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-2 mb-md-0">
                    <div class="heading_s2">
                        <h3>{{$gallery->title}}</h3>
                    </div>
                    <p class="text-justify">{{$gallery->desc}}</p>
                </div>

            </div>
        </div>
    </section>
    <!-- END SECTION GALLERY DETAIL -->

    <script type="text/javascript">
        $(function () {

            $('#lightgallery').lightGallery();
        })
    </script>
@endsection
