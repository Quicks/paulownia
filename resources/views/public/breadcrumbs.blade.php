@push('css')
    <link rel="stylesheet" href="{{asset('css/breadcrumbs.css') }}?v1">
@endpush

<div class="row">
    <div class="col-12 fon-text pl-5 pt-4">
        <a href='{{route('main')}}' class="fon-text">@lang('header-footer.main')</a>/
        @foreach($breadcrumbs as $route=>$name)
            <a href="{{$route}}" class="fon-text">@lang($name)</a>
            @if(!$loop->last) / @endif
        @endforeach
    </div>
</div>