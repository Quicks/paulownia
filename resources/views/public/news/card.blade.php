<div class="col-md-3">
    <div class="blog_post blog_style1 animation" data-animation="fadeInUp" data-animation-delay="0.05s">
        
        <div class="blog_img round-corners">
                @if(!empty($newsItem->images))
                    <div class="carousel_slide1 owl-carousel owl-theme" data-autoplay="false" data-autoheight="true" data-loop="true" data-nav="true" data-dots="false" data-autoplay-timeout="3000">
                        @foreach($newsItem->images()->get() as $img)
                            <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}" class='round-corners'>
                                <img src="/storage/{{$img->image230}}" alt="blog_img4">
                            </a>
                        @endforeach
                    </div>
                @else
                    <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}" class='round-corners'>
                      @if($imagesCount == 1)
                          <img src="/storage/{{$newsItem->images->first()->image230}}" alt="blog_small_img2"/>
                      @else
                          <img src="/images/product_img1.jpg" alt="product_img1"/>
                      @endif
                    </a>
                @endif

        </div>
        <div class="blog_content">
            <h6 class="blog_title">
                <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}" class='title'>
                    {{substr($newsItem->title, 0, 100)}}
                </a>
            </h6>
            <ul class="list_none blog_meta">
                <li>
                    <a href="javascript:void(0);">{{date('F j Y', strtotime($newsItem->publish_date))}}</a>
                </li>
                <!-- <li>
                    <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}#comments"><i class="far fa-comments"></i>
                        {{count($newsItem->comments)}} {{ __('news.comment')}}
                    </a>
                </li> -->
            </ul>
            <div class='blog_short_desc'>
                {!! substr(strip_tags($newsItem->text), 0, 300) !!}
                <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}" class="blog_link">
                    ...{{ __('news.more')}}
                </a>
            </div>
            
        </div>
    </div>
</div>