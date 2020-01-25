@extends('layouts.public')
@section('content')
    @include('public.breadcrumbs', $breadcrumbs = [route('public.news.index') => 'header-footer.news' ])
    @foreach($allNews as $news)
    <div>{{$news->name}}</div>
    @endforeach

    {{ $allNews->links() }}
@endsection
