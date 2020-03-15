@extends('layouts.public')

@push('css')
    <link rel="stylesheet" href="{{asset('css/galleries.css') }}?v1">
@endpush

@section('content')

<div class="row position-relative">
    <div class="col-12 fon-for-title">
        <div class="row">
            <div class="col-xl-2 col-md-2 col-sm-0"></div>
            <div class="col-9 mt-5 pt-5 mb-5 pb-5">
                <div class="title-text mt-5 pt-5">@lang('about-paulownia.about-paulownia')</div>
                <div class="text-under-title">@lang('about-paulownia.text')
                </div>
                <div class="col-xl-1 col-md-1 col-sm-0"></div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 p-0 fon-for-galleries">
    <nav>
        <div class="nav nav-tabs justify-content-around">
            @forelse($galleries as $item)
                @if($loop->iteration < 4)
                    <a class="nav-item nav-link pt-4 pb-3 px-0 @if($item->id == $gallery->id) active @endif" 
                        href="{{route('public.galleries.show', $item->id)}}" 
                        >
                        {{ $item->name }}
                    </a>
                @endif
            @empty
                <h3>No galleries available</h3>
            @endforelse
        </div>
    </nav>

    <div class="col-12 mt-4 text-center">
        <p class="gallery-title">{{$gallery->title}}</p>
        <hr class="gallery-title-line">
    </div>
    
    <div class="pt-4 pl-5 pr-5 gallery-description-text">
        {!! $gallery->desc !!}
    </div>


</div>



 {{--    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card-header">Galleries</div>
                <div class="card-body">
                    <a href="{{ url('/') }}" title="Back">
                        <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back
                        </button>
                    </a>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th><th>Name</th><th>Active</th><th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galleries as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->active }}</td>
                                    <td>
                                        <a href="{{ url(App::getLocale() . '/galleries/' . $item->id)}}" title="View Galleries">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
