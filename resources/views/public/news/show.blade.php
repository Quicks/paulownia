@extends('layouts.public')
@section('content')
@include('public.blocks.page_header', ['title' => __('header-footer.news')])
    <div class='custom-page-description'>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="single_post">
                            <div class="blog_img">
                                @if(isset($news->images()->first()->image230))
                                    <img src="/storage/{{$news->images()->first()->image230}}" alt="blog_small_img2">
                                @else
                                    <img src="/images/product_img1.jpg" alt="product_img1"/>
                                @endif
                            </div>
                            <div class="single_post_content">
                                <div class="blog_text">
                                    <h2 class="blog_title">{{$news->title}}</h2>
                                    <ul class="list_none blog_meta">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="far fa-calendar"></i>
                                                {{date('F j, Y', strtotime($news->publish_date))}}
                                            </a>
                                        </li>
                                    </ul>
                                    <p>{!!$news->text!!}</p>
                                    <div class='blog_images'>
                                        @if(isset($news->images()->first()->image1200))
                                            @foreach($news->images as $image)
                                                <img src="/storage/{{$image->image1200}}" alt="blog_small_img2">
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')

<script>
    $(document).ready(function(){
        if($('.blog_images img').get().length > 2){
            $('.blog_images').slick({
                centerMode: true,
                dots: true,
                lazyLoad: 'ondemand',
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 3,
                responsive: [
                    {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                    }
                ]
                });
                
        }
    })
</script>
@endpush