<section class="profitability-container">
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
</section>