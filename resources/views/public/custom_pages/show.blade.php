@extends('layouts.public')

@section('content')
  <div class='container custom-page-container'>
    <div class='custom-page-copyright'>
      PAULOWNIA PROFESSIONAL®
      
    </div>
    <div class='custom-page-title'>
      <span>
        {!!$custom_page->title!!}
      </span>
    </div>
    @if(!$custom_page->allSiblings()->isEmpty())
      <div class='custom-page-tabs'>
        @foreach($custom_page->allSiblings() as $sibling)
          <div class='custom-page-tab'>
            <a href='{{$sibling->link}}'>
              {!!$sibling->title!!}
            </a>
          </div>
        @endforeach
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