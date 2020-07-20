<div class="col-lg-4 col-md-6">
  <div class="blog_post blog_style1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.05s">
      <div class="blog_img">
<!--          --><?php //$imagesCount = count($newsItem->images()->get()); ?>
              <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}">
                  @if(isset($newsItem->images()->first()->image230))
                      <img src="/storage/{{$newsItem->images()->first()->image230}}" alt="blog_small_img2">
                  @else
                      <img src="/images/product_img1.jpg" alt="product_img1"/>
                  @endif
              </a>

{{--          @if($imagesCount > 1)--}}
{{--              <div class="carousel_slide1 owl-carousel owl-theme" data-autoplay="true" data-autoheight="true" data-loop="true" data-nav="true" data-dots="false" data-autoplay-timeout="3000">--}}
{{--                  @foreach($newsItem->images()->get() as $img)--}}
{{--                      <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}">--}}
{{--                          <img src="/storage/{{$newsItem->images->first()->image230}}" alt="blog_img4">--}}
{{--                      </a>--}}
{{--                  @endforeach--}}
{{--              </div>--}}
{{--          @else--}}
{{--              <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}">--}}
{{--                  @if($imagesCount == 1)--}}
{{--                      <img src="/storage/{{$newsItem->images->first()->image230}}" alt="blog_small_img2">--}}

{{--                  @else--}}
{{--                      <img src="/images/product_img1.jpg" alt="product_img1"/>--}}
{{--                  @endif--}}
{{--              </a>--}}
{{--          @endif--}}

        </div>
        <div class="blog_content">
            <h6 class="blog_title"><a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}">{{substr($newsItem->title, 0, 100)}}</a></h6>
            <ul class="list_none blog_meta">
                <li><a href="javascript:void(0);"><i class="far fa-calendar"></i>{{date('F j, Y', strtotime($newsItem->publish_date))}}</a></li>
                <li>
                    <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}#comments"><i class="far fa-comments"></i>
                        {{count($newsItem->comments)}} {{ __('news.comment')}}
                    </a>
                </li>
            </ul>
            <p>{!! substr($newsItem->text, 0, 200) !!}</p>
            <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}" class="blog_link">{{ __('news.more')}}<i class="ion-ios-arrow-right"></i></a>
        </div>
    </div>
</div>