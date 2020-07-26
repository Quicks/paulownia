@extends('layouts.public')

@section('content')
    <!-- START SECTION BANNER -->
    @include('public.breadcrumbs', [
        $breadcrumbs = [
            route('public.news.index') => 'header-footer.news',
            route('public.news.show') => $news->title,

        ],
        $pageTitle = $news->title
    ])
    <!-- END SECTION BANNER -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_post">
                        <div class="blog_img">
                            <a href="#">
                                @if(isset($news->images()->first()->image1200))
                                    <img src="/storage/{{$news->images()->first()->image1200}}" alt="blog_small_img2">
                                @else
                                    <img src="/images/product_img1.jpg" alt="product_img1"/>
                                @endif
                            </a>
                        </div>
                        <div class="single_post_content">
                            <div class="blog_text">
                                <h2 class="blog_title">{{$news->title}}</h2>
                                <ul class="list_none blog_meta">
                                    <li><a href="javascript:void(0);"><i class="far fa-calendar"></i>{{date('F j, Y', strtotime($news->publish_date))}}</a></li>
                                    {{--                                    <li><a href="#"><i class="far fa-user"></i>by <span class="text_default">admin</span></a></li>--}}
                                    <li><a href="#comments"><i class="far fa-comments"></i>{{count($news->comments)}} {{ __('news.comment')}}</a></li>
                                </ul>
                                <p>{{$news->text}}</p>
                                <div class="border-top border-bottom blog_post_footer">
                                    <div class="row justify-content-end align-items-center">
{{--                                        <div class="col-md-8 mb-3 mb-md-0">--}}
{{--                                            <div class="tags">--}}
{{--                                                <a href="#">General</a>--}}
{{--                                                <a href="#">Design</a>--}}
{{--                                                <a href="#">jQuery</a>--}}
{{--                                                <a href="#">Branding</a>--}}
{{--                                                <a href="#">Modern</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-md-4 text-md-right">
                                            <div class="share">
                                                <ul class="list_none social_icons">
                                                    <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                    <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                    <li><a href="#" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
{{--                                                    <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>--}}
                                                    <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post_navigation">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    @if (isset($previous))
                                        <a href="{{route('public.news.show', [mb_strtolower(class_basename($previous)), $previous->id])}}">
                                            <div class="d-flex align-items-center">
                                                <i class="ion-ios-arrow-thin-left mr-2"></i>
                                                <div>
                                                    <span>{{ __('news.previous_post')}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-auto">
                                    @if (isset($next))
                                        <a href="{{route('public.news.show', [mb_strtolower(class_basename($next)), $next->id])}}">
                                            <div class="d-flex align-items-center flex-row-reverse text-right">
                                                <i class="ion-ios-arrow-thin-right ml-2"></i>
                                                <div>
                                                    <span>{{ __('news.next_post')}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="comment-area" id="comments">
                            <div class="posts-title">
                                <h5>({{count($news->comments)}}) {{ __('comments.comment')}}</h5>
                            </div>
                            @if($news->parentComments)
                                @include('public.comments.index', ['comments' => $news->parentComments])
                            @endif
                            <div class="posts-title">
                                <h5>{{ __('comments.write_a_comment')}}</h5>
                            </div>
                            @include('public.comments.form', [
                                'commentable_id' => $news->id,
                                'commentable_type' => get_class($news),
                                'parent_id' => 0,
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BLOG -->

@endsection