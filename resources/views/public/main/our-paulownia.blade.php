@push('css')
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/our-paulownia.css') }}">
@endpush

@if(!empty($mainGallery))
    <div class="our-paulownia">
        <div class="our-paulownia-leaf">
            <img src="{{asset('/images/our-paulownia-leaf.png')}}">
        </div>
        <div class="row mx-auto our-paulownia-content">
            <div class="col-12 text-center">
                <p class="our-paulownia-title">Our paulownia</p>
                <hr class="our-paulownia-line">
            </div>
            <div class="col-12">
                <div class="fotorama">
                    @foreach($mainGallery->images as $image)
                        <a href="{{asset('storage/'.$image->image)}}">
                            <img src="{{asset('storage/'.$image->image)}}">
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
                thumbwidth: 553,
                thumbheight: 392,
                thumbmargin: 30,
                thumbfit: 'cover',
                thumbborderwidth: 0,
                // transition:'dissolve'

            });
        });
    </script>
@endpush