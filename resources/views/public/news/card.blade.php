<div class="col-lg-4 col-md-6">
  <div class="blog_post blog_style1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
    <div class="blog_img">
      <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}">
          <img src="/storage/{{$newsItem->images->first()->image}}" alt="blog_small_img1">
      </a>
      <div class="blog_date style1">
        
        <h4>{{date('d', strtotime($newsItem->publish_date))}}</h4>
        <span>{{date('F', strtotime($newsItem->publish_date))}}</span>
      </div>
    </div>
    <div class="blog_content">
      <h6 class="blog_title"><a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}">{{$newsItem->title}}</a></h6>
      <ul class="list_none blog_meta">
        <li><a href="#"><i class="far fa-user"></i>by <span class="text_default">admin</span></a></li>
        <li><a href="#"><i class="far fa-comments"></i>4 Comment</a></li>
      </ul>
      <p>{{substr($newsItem->title, 0, 100)}}</p>
      <a href="{{route('public.news.show', [mb_strtolower(class_basename($newsItem)), $newsItem->id])}}" class="blog_link">Read More <i class="ion-ios-arrow-right"></i></a>
    </div>
  </div>
</div>