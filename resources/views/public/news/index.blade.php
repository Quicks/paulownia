@extends('layouts.public')

@section('content')
    <!-- START SECTION BANNER -->
    @include('public.breadcrumbs', [
        $breadcrumbs = [
            route('public.news.index') => 'header-footer.news',
        ],
        $pageTitle = 'Blog List Left Sidebar'
    ])
    <!-- END SECTION BANNER -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center justify-content-between pb-1 mb-4">
                        <div class="col-auto">
                            <div class="custom_select">
                                <select>
                                    <option value="default">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="date">Sort by newness</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-auto">
                            <span class="align-middle">Showing {{$allNews->count()}} of {{$allNews->total()}} results</span>
                        </div>
                    </div>
                    <div class="row shop_container grid_view">
                        <div class="row justify-content-center">

                            @foreach($allNews as $newsItem)
                                @include('public/news/card', ['newsItem' => $newsItem])
                            @endforeach
                        </div>
                    </div>
                    @include('public.blocks.pagination', ['paginator' => $allNews])
                </div>
                <div class="col-lg-3 order-lg-first mt-5 mt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="search_widget">
                                <form>
                                    <input required="" placeholder="Search..." type="text">
                                    <button type="submit" class="btn-submit" name="submit" value="Submit">
                                        <span class="ti-search"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">About Me</h5>
                            <div class="about_widget">
                                <a href="#"><img src="assets/images/about_author.jpg" alt="about_author"/></a>
                                <h5 class="about_author">Calvin William</h5>
                                <span class="author_email">info@yourmail.com</span>
                                <p>Lorem ipsum dolor sit amet elit adipiscing elit. Praesent id dolor dui dapibus gravida elit. </p>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Categories</h5>
                            <ul class="list_none widget_categories border_bottom_dash">
                                <li><a href="#"><span class="categories_name">Dried Products</span><span class="categories_num">(9)</span></a></li>
                                <li><a href="#"><span class="categories_name">Vegetables</span><span class="categories_num">(6)</span></a></li>
                                <li><a href="#"><span class="categories_name">Fruits Fresh</span><span class="categories_num">(4)</span></a></li>
                                <li><a href="#"><span class="categories_name">Juice</span><span class="categories_num">(7)</span></a></li>
                                <li><a href="#"><span class="categories_name">Fresh Meal</span><span class="categories_num">(12)</span></a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Recent Posts</h5>
                            <ul class="recent_post border_bottom_dash list_none">
                                <li>
                                    <div class="post_content">
                                        <div class="post_img">
                                            <a href="#"><img src="assets/images/letest_post1.jpg" alt="letest_post1"></a>
                                        </div>
                                        <div class="post_info">
                                            <h6><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h6>
                                            <p class="small m-0">April 14, 2018</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post_content">
                                        <div class="post_img">
                                            <a href="#"><img src="assets/images/letest_post2.jpg" alt="letest_post2"></a>
                                        </div>
                                        <div class="post_info">
                                            <h6><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h6>
                                            <p class="small m-0">April 14, 2018</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post_content">
                                        <div class="post_img">
                                            <a href="#"><img src="assets/images/letest_post3.jpg" alt="letest_post3"></a>
                                        </div>
                                        <div class="post_info">
                                            <h6><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h6>
                                            <p class="small m-0">April 14, 2018</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">tags</h5>
                            <div class="tags">
                                <a href="#">General</a>
                                <a href="#">Design</a>
                                <a href="#">jQuery</a>
                                <a href="#">Branding</a>
                                <a href="#">Modern</a>
                                <a href="#">Blog</a>
                                <a href="#">Quotes</a>
                                <a href="#">Advertisement</a>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Instagram Feeds</h5>
                            <ul class="list_none instafeed">
                                <li><a href="#"><img src="assets/images/insta_img1.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="assets/images/insta_img2.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="assets/images/insta_img3.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="assets/images/insta_img4.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="assets/images/insta_img5.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="assets/images/insta_img6.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="assets/images/insta_img7.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                                <li><a href="#"><img src="assets/images/insta_img8.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Follow Me</h5>
                            <ul class="list_none social_icons radius_social">
                                <li><a href="#" class="sc_facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="sc_twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="sc_google"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#" class="sc_instagram"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" class="sc_pinterest"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END SECTION NEWSLATTER -->
{{--    <section class="bg_light_green newslatter_wrap">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-6 col-md-8 text-center">--}}
{{--                    <div class="heading_s2 animation" data-animation="fadeInUp" data-animation-delay="0.02s">--}}
{{--                        <h2>Subscribe Our Newsletter</h2>--}}
{{--                    </div>--}}
{{--                    <p class="m-0 animation" data-animation="fadeInUp" data-animation-delay="0.03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>--}}
{{--                    <div class="small_divider"></div>--}}
{{--                    <div class="newsletter_form animation" data-animation="fadeInUp" data-animation-delay="0.04s">--}}
{{--                        <form>--}}
{{--                            <div class="rounded_input">--}}
{{--                                <input type="text" class="form-control" required="" placeholder="Enter your Email Address">--}}
{{--                            </div>--}}
{{--                            <button type="submit" title="Subscribe" class="btn btn-default" name="submit" value="Submit">subscribe</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="overlap_shape">--}}
{{--            <div class="ol_shape19">--}}
{{--                <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.5s">--}}
{{--                    <img data-parallax='{"y": 20, "smoothness": 20}' src="assets/images/shape34.png" alt="shape34"/>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="ol_shape20">--}}
{{--                <div class="animation" data-animation="fadeInRight" data-animation-delay="0.5s">--}}
{{--                    <img data-parallax='{"y": 20, "smoothness": 20}' src="assets/images/shape35.png" alt="shape35"/>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

@endsection