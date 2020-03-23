@push('css')
    <link  href="{{ asset('css/stackedCards.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/our-paulownia-2.css') }}?v1">
@endpush

@if($mainGallery->count())
    <div class="our-paulownia">
        <img data-src="{{asset('images/Main-ourPaulownia-background.png')}}" class="our-paulownia-bg-pic lazyload">
        <div class="our-paulownia-leaf">
            <img class="lazyload" data-src="{{asset('/images/our-paulownia-leaf.png')}}">
        </div>
        <div class="row mx-auto our-paulownia-content">
            <div class="col-12 text-center my-xl-5 my-lg-3 my-md-1 my-sm-0">
                <p class="our-paulownia-title">Our paulownia</p>
                <hr class="our-paulownia-line">
            </div>
            <div class="col-12 mt-3">
                <div class="stacked-cards">
                    <ul>
                        @foreach($mainGallery as $gallery)
                            @if($gallery->images->count())
                                <li>
                                    <div>
                                        <a href="{{route('public.galleries.index', $gallery->id)}}">
                                            <img class="lazyload" data-src="{{asset('storage/'.$gallery->images->random()->image)}}">
                                        </a>
                                    </div>
                                </li>
                            @endif
                            @if($loop->iteration == 5) @break @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/stackedCards.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                var stackedCardSlide = new stackedCards({ selector: '.stacked-cards' });
                stackedCardSlide.init();

                var cards = $('.stacked-cards li');
                var currentCard = -1;
                var direction = 1;
                if(cards.length > 1) {
                    setInterval(scrollToNextCard, 3000, cards);
                }
                function scrollToNextCard (cards) {
                    if(currentCard + direction < cards.length && currentCard + direction >= 0){
                        cards[currentCard+direction].click();
                    } else {
                        direction*=-1;
                        cards[currentCard+direction].click();
                    }
                    currentCard = currentCard + direction;
                }
            });
        </script>
    @endpush
@endif