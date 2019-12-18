@push('css')
    <link rel="stylesheet" href="{{asset('css/breadcrumbs.css') }}?v2">
@endpush

<div class="row fon-text-title" >
    <div class="col-12 fon-text pb-2 pt-4">
        <a href='{{route('main')}}' class="fon-text">@lang('header-footer.main')</a>/
        @foreach($breadcrumbs as $route=>$name)
            <a href="{{$route}}" class="fon-text">@lang($name)</a>
            @if(!$loop->last) / @endif
        @endforeach
    </div>
</div>