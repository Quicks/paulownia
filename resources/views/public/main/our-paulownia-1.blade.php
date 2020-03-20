@push('css')
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/our-paulownia-1.css') }}?v9">
@endpush

@if(!empty($mainGallery))
    <div class="our-paulownia">
        <div class="our-paulownia-leaf">
            <img class="lazyload" data-src="{{asset('/images/our-paulownia-leaf.png')}}">
        </div>
        <div class="row mx-auto our-paulownia-content">
            <div class="col-12 text-center margin-320">
                <p class="our-paulownia-title">Our paulownia</p>
                <hr class="our-paulownia-line">
            </div>
            <div class="col-12">
                <div class="fotorama">
                    @foreach($mainGallery->images as $image)
                        <a href="{{asset('storage/'.$image->image)}}">
                            <img class="lazyload" data-src="{{asset('storage/'.$image->image)}}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

    <script>
        $(document).ready(function () {
            $('.fotorama').fotorama({
                width: '100%',
                height: 465,
                maxheight: 1325,
                nav: 'thumbs',
                fit: 'contain',
                clicktransition: "crossfade",
                loop:"true",
                arrows: "always",
                autoplay: "true",
                keyboard:'{"space": true, "home": true, "end": true, "up": true, "down": true}',
                swipe:true,
                thumbwidth: 410,
                thumbheight: 252,
                thumbmargin: 30,
                thumbfit: 'cover',
                thumbborderwidth: 0,
            });
        });
    </script>
@endpush