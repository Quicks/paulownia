@extends('layouts.public')

@section('content')
  <div class='container custom-page-container'>
    @include('public.blocks.page_header', ['title' => $custom_page->title])
    
    @if(!$custom_page->allSiblings()->isEmpty())
      <div class='custom-page-tabs'>
        @foreach($custom_page->allSiblings() as $sibling)
          <div class='custom-page-tab'>
            <a href='{{$sibling->link}}'>
              {!!$sibling->title!!}
            </a>
          </div>
        @endforeach
        <div class='custom-page-tab active'>
            <a href='{{$custom_page->link}}'>
              {!!$custom_page->title!!}
            </a>
          </div>
      </div>
    @endif
    @if(!empty(trim($custom_page->description)))
      <div class='custom-page-description'>
        <div class='custom-page-description_title'>
          {!!$custom_page->title!!}
        </div>
        {!!$custom_page->description!!}
      </div>
    @endif
  </div>
@endsection