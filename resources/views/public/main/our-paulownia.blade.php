@push('css')
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/our-paulownia.css') }}">
@endpush


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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.fotorama').fotorama({
                width: '100%',
                height: '100%',
                maxheight: 1325,
                nav: 'thumbs',
                fit: 'contain',
                clicktransition: "crossfade",
                loop:"true",
                autoplay: "true",
                keyboard:'{"space": true, "home": true, "end": true, "up": true, "down": true}',
                swipe:true,
                thumbwidth: 350,
                thumbheight: 150,
                thumbmargin: 40,
                thumbfit: 'none',
                thumbborderwidth: 0

            });
        });
    </script>
@endpush