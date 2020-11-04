<!-- START SECTION BLOG -->
<div class="main-news-container">
    <h6>PAULOWNIA PROFESSIONAL®</h6>
    <h1>{{__('news.news')}}</h1>
    <div class="main-news-wrap mt-4">
      <div class="row">
          @foreach($news as $item)
              @include('public.news.card', ['newsItem' => $item])
          @endforeach
      </div>
      <div class="row mt-5">
          <div class="col-12 d-flex justify-content-center">
              <a
                  href=""
                  class="p-0 mx-0 mt-1 custom-page-tab active submit-btn"
              >{{ __('news.news_btn')}}</a>
          </div>
      </div>
    </div>
</div>
<!-- END SECTION BLOG -->
