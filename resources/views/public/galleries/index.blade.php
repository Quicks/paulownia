@extends('layouts.public')

@section('content')
    <!-- START SECTION BANNER -->
    @include('public.breadcrumbs', [
        $breadcrumbs = [
            route('public.galleries.index') => 'header-footer.gallery',
        ],
        $pageTitle = 'header-footer.gallery'
    ])
    <!-- END SECTION BANNER -->

    <!-- START SECTION GALLERY -->
    <section class="pb_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="grid_container gutter_medium work_col4">
                        <li class="grid-sizer"></li>
                        @foreach($galleries as $gallery)
                            @include('public.galleries.card', ['gallery' => $gallery])
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION GALLERY -->
@endsection