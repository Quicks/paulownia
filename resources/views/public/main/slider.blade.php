@push('css')
    <link rel="stylesheet" href="{{asset('css/main-slider.css') }}">
@endpush

@if(!empty($sliderData))
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($sliderData as $key=>$value)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="@if($key==0)active @endif"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($sliderData as $key=>$value)
                    <div class="carousel-item @if($key === array_key_first($sliderData)) active @endif">
                        <img src="{{asset('storage/' . $value['path'])}}" class="d-block w-100" alt="{{$value['title']}}">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <div>{!! $value['content'] !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endif
