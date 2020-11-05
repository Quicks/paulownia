<div class="profitability-container">
	<div class="top-slider"></div>	
</div>
<div class="top-ellipse-wrap">
	<div class="row">
		<div class="col-11">
			<div class="ellipse-container">
				<img src="{{ asset('images/logo_paulownia_prof.svg') }}" alt="paulownia">
				<p class="text-white">{{__('profitability-calculation.deal-tag')}}</p>
			</div>
		</div>
		<div class="col-1 social-btn-container-row">
			<div class="social-btn-container">
				<a class="social-btn-wrap">
					<img src="{{ asset('images/soc_facebook.svg') }}" alt="insta">
				</a>
				<a class="social-btn-wrap">
					<img src="{{ asset('images/soc_youtube.svg') }}" alt="insta">
				</a>
				<a class="social-btn-wrap">
					<img src="{{ asset('images/soc_insta.svg') }}" alt="insta">
				</a>
			</div>
		</div>
	</div>
	<div class="row mt-2">
	   	<div class="col-11">
	   		<div class="btn-prof-container">
		        <a class="p-0 mx-0 mt-1 custom-page-tab active submit-btn">{{ __('contacts.write-to-us')}}</a>
		        <a class="p-0 mx-0 mt-1 custom-page-tab active submit-btn">{{ __('profitability-calculation.sale-plant')}}</a>
		        <a class="p-0 mx-0 mt-1 custom-page-tab active submit-btn">{{ __('contacts.write-to-us')}}</a>
		    </div>
	    </div>
   </div>
   <div class="row prof-form-container">
	   @include('public.profitability_calculation._form_main', ['sorts' => []])
	</div>
</div>

@push('scripts')
    <script>
        $(document).ready(function(){
        	$('.main-background').addClass('main-to-bottom');

            $('.top-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
				autoplaySpeed: 5000,
                centerMode: false,
                arrows: false,
                customPaging: function (slider, i) { 
                    return '<div class="dot"></div>';
                },
                dotsClass: 'top-slider-dot-container'
            });
        })

        $.ajax({
            url: 'top-slider',
            success: function(response){
                response.slides.map(function(element, index) {
                    $('.top-slider').slick('slickAdd', `<div class="top-slide-initial"><img src="storage/${element.image.image}" alt="${element.image.imageable_type}"></div>`);
                });
            }
        })
    </script>
@endpush
