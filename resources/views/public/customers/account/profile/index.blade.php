@extends('layouts.public')

@section('content')
    @include('public.breadcrumbs', [
        $breadcrumbs = [
        ],
        $pageTitle = 'header-footer.account'
    ])

<section>
	<div class="container">
        <div class="row">
        	<div class="col-12">
                <div class="tab-style1">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="all" aria-selected="true">@lang('profile.profile')</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">@lang('profile.address')</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="wishlist-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="false" data-href="/{{$current_locale}}/customer/account/wishlist">@lang('profile.favorite')</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false" data-href='/{{$current_locale}}/customer/account/orders'>@lang('profile.story')</a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false" data-href='/customer/account/reviews'>Reviews</a>
                      </li> -->
                    </ul>
                    <div class="tab-content shop_info_tab">
                      <div class="tab-pane fade active show login_form" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @include('public.customers.account.profile.edit')
                      </div>
                      <div class="tab-pane fade login_form" id="address" role="tabpanel" aria-labelledby="address-tab">
                          @include('public.customers.account.address.index', ['addresses' => auth()->guard('customer')->user()->addresses])
                      </div>
                      <div class="tab-pane fade login_form" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                      </div>
                      <div class="tab-pane fade login_form" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                      </div>
                      <!-- <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                      </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('a.nav-link').click(function(){
            let domId = $(this).attr('href')
            location.hash = domId
        })
        $('a.nav-link[data-href]').click(function(){
            let url = $(this).data('href')
            let domId = $(this).attr('href')
            $.ajax({
                url: url,
                success: function(data){
                   $(domId).html(data) 
                }
            })
        })
        if(location.hash){
            $('a.nav-link[href="' + location.hash + '"]').trigger('click')
        }
    })
</script>
@endpush