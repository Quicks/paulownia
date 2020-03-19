@push('css')
    <link  href="{{ asset('css/stackedCards.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/our-paulownia-2.css') }}?v1">
@endpush

@if(!empty($mainGallery))
    <div class="our-paulownia">
        <img src="{{asset('images/Main-ourPaulownia-background.png')}}" class="our-paulownia-bg-pic">
        <div class="our-paulownia-leaf">
            <img class="lazyload" data-src="{{asset('/images/our-paulownia-leaf.png')}}">
        </div>
        <div class="row mx-auto our-paulownia-content">
            <div class="col-12 text-center">
                <p class="our-paulownia-title">Our paulownia</p>
                <hr class="our-paulownia-line">
            </div>
            <div class="col-12 mt-3">
                <div class="stacked-cards">
                    <ul>
                        @foreach($mainGallery->images as $image)
                            <li>
                                <div>
                                    <img class="lazyload" data-src="{{asset('storage/'.$image->image)}}">
                                </div>
                            </li>
                            {{-- <a href="{{asset('storage/'.$image->image)}}">
                                <img class="lazyload" data-src="{{asset('storage/'.$image->image)}}">
                            </a> --}}
                            @if($loop->iteration == 5) @break @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

@push('scripts')
    <script src="{{ asset('js/stackedCards.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        var stackedCardSlide = new stackedCards({ selector: '.stacked-cards' });
        stackedCardSlide.init();
    });
    </script>
@endpush