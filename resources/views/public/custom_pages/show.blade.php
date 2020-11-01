@extends('layouts.public')

@section('content')
  <div class='container custom-page-container'>
    @include('public.blocks.page_header', ['title' => empty($custom_page->page_title) ? $custom_page->title : $custom_page->page_title])
    <div class='custom-page-tabs'>
      @if($custom_page->parent_id)
        @if(!$custom_page->parent->allSiblings()->isEmpty())
          <div class='parent-siblings'>
            @foreach($custom_page->parent->allSiblings() as $sibling)
              <div class='custom-page-tab {{$sibling->id == $custom_page->parent_id ? "active" : ""}}'>
                <a href='{{$sibling->link}}'>
                  {!!$sibling->title!!}
                </a>
              </div>
            @endforeach
          </div>
          @if(!empty($custom_page->children))
            <div class='siblings'>
              @foreach($custom_page->children as $child)
                <div class='custom-page-tab'>
                  <a href='{{$child->link}}'>
                    {!!$child->title!!}
                  </a>
                </div>
              @endforeach
            </div>
          @endif
        @endif
      @endif
      @if(!$custom_page->allSiblings()->isEmpty())
        <div class='{{!empty($custom_page->children) ? "parent-siblings" : "siblings"}}'>
          @foreach($custom_page->allSiblings() as $sibling)
            <div class='custom-page-tab {{$sibling->id == $custom_page->id ? "active" : ""}}'>
              <a href='{{$sibling->link}}'>
                {!!$sibling->title!!}
              </a>
            </div>
          @endforeach
        </div>
        @if(!empty($custom_page->children))
          <div class='siblings'>
            @foreach($custom_page->children as $child)
              <div class='custom-page-tab'>
                <a href='{{$child->link}}'>
                  {!!$child->title!!}
                </a>
              </div>
            @endforeach
          </div>
        @endif
      @endif
    </div>
    @if(!empty(trim($custom_page->description)))
      <div class='custom-page-description'>
        {!!$custom_page->description!!}
        @if($custom_page->sort)
          <div class='products-list' data-sort-id='{{$custom_page->sort}}'></div>
        @endif
        <div class='text-center shop-btn-wrapper'>
          <a href="" class='custom-page-tab active shop-btn'>
            В магазин
          </a>
        </div>
      </div>
    @endif
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function(){
      var productPath = "{{route('public.products.index')}}"
      $('.custom-page-container .shop-btn').attr('href', productPath)
    })
    var productBlock = $('.products-list').get()
    if(productBlock.length){
      var sortId = $(productBlock).data('sort-id')
      $.ajax({
        url: '/products/by_filter',
        data: {
          filter: {
            sort_id: sortId
          }
        },success: function(response){
          $(productBlock).html(response)
        }
      })
    }
  </script>
@endpush