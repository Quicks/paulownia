<!-- START SECTION BLOG -->
<div class="main-news-container">
    <h6>PAULOWNIA PROFESSIONAL®</h6>
    <h1>{{__('news.news')}}</h1>
    <div>
      <div class="row">
          {{-- @foreach($allNews as $newsItem)
              @include('public.news.card', ['newsItem' => $newsItem])
          @endforeach --}}
      </div>
      <div class="row">
          <div class="col-12 mt-3 mt-lg-4">
              {{-- {{ $allNews->links('vendor.pagination.bootstrap-4') }} --}}
          </div>
      </div>                    
    </div>
</div>
<!-- END SECTION BLOG -->
