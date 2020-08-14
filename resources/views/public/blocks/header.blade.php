<!-- START HEADER -->
<header class="header_wrap dark_skin main_menu_uppercase">
	<div class="top-header bg_gray">
				<div class="container">
						<div class="row align-items-center">
								<div class="col-md-7">
									<ul class="contact_detail border_list list_none text-center text-md-left">
												<li><a href="#"><i class="ti-mobile"></i> <span>+123 456 7890</span></a></li>
												<li><a href="#"><i class="ti-email"></i> <span>info@yourmail.com</span></a></li>
										</ul>
								</div>
								<div class="col-md-5">
										<ul class="header_list border_list list_none header_dropdown text-center text-md-right">
												<li>
														{{$current_locale}}
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																@foreach(config('translatable.locales') as $locale)
																		<a class="dropdown-item"
																				@if(App::getLocale() != Request::segment(1))
																						href="{{url($locale. '/' . Request::path())}}"
																				@else
																						href="{{Request::root() .'/'. $locale . substr(Request::path(), 2)}}"
																				@endif
																		>
																				{{$locale}}
																		</a>
																@endforeach
														</div>
												</li>
												<li class="dropdown">
													<a class="dropdown-toggle" href="#" data-toggle="dropdown">My Account</a>
													<div class="dropdown-menu shadow dropdown-menu-right">
														<ul>
																<li><a class="dropdown-item" href="my-account.html">My account</a></li>
																<li><a class="dropdown-item" href="wishlist.html">Wishlist</a></li>
																<li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
														</ul>
													</div>
												</li>
										</ul>
								</div>
						</div>
				</div>
		</div>
		<div class="container">
				<nav class="navbar navbar-expand-lg">
						<a class="navbar-brand" href="/">
								<!-- <img class="logo_light" src="/images/logo_white.png" alt="logo" /> -->
								<img class="logo_dark" src="/images/logo-sm.png" alt="logo" />
								<!-- <img class="logo_default" src="/images/logo_dark.png" alt="logo" /> -->
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
						<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
				<ul class="navbar-nav">
										@foreach($menus as $menu)
												@if(count($menu->children))
														<li class="dropdown">
																<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ $menu->title }}</a>
																<div class="dropdown-menu">
																		<ul>
																				@foreach($menu->children as $menu_child)
																						@if(count($menu_child->children))
																								<li class="dropdown">
																										<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ $menu_child->title }}</a>
																										<div class="dropdown-menu">
																												<ul>
																														@foreach($menu_child->children as $sub_child)
																														<li>
																																<a class="dropdown-item nav-link nav_item"
																																		href="/{{$current_locale.'/'.$sub_child->link}}">
																																		{{$sub_child->title}}
																																</a>
																														</li>
																														@endforeach
																												</ul>
																										</div>
																								</li>
																						@else
																								<li>
																										<a class="dropdown-item nav-link nav_item" href="/{{$current_locale.'/'.$menu_child->link}}">{{$menu_child->title}}</a>
																								</li>
																						@endif
																				@endforeach
																		</ul>
																</div>
														</li>
												@else
												<li>
														<a class="nav-link {{Request::getPathInfo() == $menu->link ? 'active' : ''}}" href="/{{$current_locale.$menu->link}}">{{$menu->title}}</a>
												</li>
												@endif
										@endforeach
								</ul>
						</div>
						<ul class="navbar-nav attr-nav align-items-center">
								<li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="ion-ios-search-strong"></i></a>
										<div class="search-overlay">
												<div class="search_wrap">
														<form>
																<div class="rounded_input">
																	<input type="text" placeholder="Search" class="form-control" id="search_input">
																</div>
																<button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
														</form>
												</div>
										</div>
								</li>
								<li class="dropdown cart_wrap">
									<a class="nav-link" href="#" data-toggle="dropdown">
										<i class="ion-bag"></i>
										<span class="cart_count">
												@if(Webkul\Checkout\Facades\Cart::getCart())
														{{Webkul\Checkout\Facades\Cart::getCart()->items_count}}
												@endif
										</span>
									</a>
									<div class="cart_box dropdown-menu dropdown-menu-right" id='cart-header-preview'>
										@include('public.cart.cart_preview')
									</div>
								</li>
						</ul>
				</nav>
		</div>
</header>
<!-- END HEADER -->
