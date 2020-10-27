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
      </div>
      @if(!empty($products))
        @foreach($products as $product)
          @include('public.products.product_card', ['product' => $product, 'customClasses' => 'col-lg-4'])
        @endforeach
      @endif
    @endif
  </div>
@endsection