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
                <div class="col-md-12 image-container" id="lightgallery">
                    @foreach($gallery->images as $k => $image)
                        <a href="/storage/{{$image->image}}">
                            <img src="/storage/{{$image->thumbnail}}" alt="image {{$k}}"/>
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
                <div class="col-lg-8 col-md-7 mb-2 mb-md-0">
                    <div class="heading_s2">
                        <h3>{{$gallery->title}}</h3>
                    </div>
                    <p>{{$gallery->desc}}</p>
                </div>

            </div>
        </div>
    </section>
    <!-- END SECTION GALLERY DETAIL -->

    <script type="text/javascript">
        $(function () {
        //     $('.image-container').empty().justifiedImages({
        //         images : photos,
        //         rowHeight: 200,
        //         maxRowHeight: 400,
        //         thumbnailPath: function(photo, width, height){
        //             var purl = photo.url_s;
        //             if( photo.url_n && (width > photo.width_s * 1.2 || height > photo.height_s * 1.2) ) purl = photo.url_n;
        //             if( photo.url_m && (width > photo.width_n * 1.2 || height > photo.height_n * 1.2) ) purl = photo.url_m;
        //             if( photo.url_z && (width > photo.width_m * 1.2 || height > photo.height_m * 1.2) ) purl = photo.url_z;
        //             if( photo.url_l && (width > photo.width_z * 1.2 || height > photo.height_z * 1.2) ) purl = photo.url_l;
        //             return purl;
        //         },
        //         getSize: function(photo){
        //             return {width: photo.width_s, height: photo.height_s};
        //         },
        //         margin: 1
        //     });

            $('#lightgallery').lightGallery();
        })
    </script>
@endsection
