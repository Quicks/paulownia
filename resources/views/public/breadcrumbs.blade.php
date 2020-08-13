<!-- START SECTION BANNER -->
<section class="bg_light_yellow breadcrumb_section background_bg bg_fixed bg_size_contain" data-img-src="assets/images/breadcrumb_bg.png">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-12 text-center">
            	<div class="page-title">
            		<h1>@lang($pageTitle)</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('main')}}">@lang('header-footer.home')</a></li>
                        @foreach($breadcrumbs as $route => $name)
                            @if(!$loop->last)
                                <li class="breadcrumb-item"><a href="{{$route}}">@lang($name)</a></li>
                            @else
                                <li class="breadcrumb-item active" aria-current="page">@lang($name)</li>
                            @endif
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->
