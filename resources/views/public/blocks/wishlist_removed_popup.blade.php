<div id="wishlist-removed-popup" class="white-popup mfp-hide">
  <div class='wishlist-added'>
    <div class='success-modal round-corners white-background text-center'>
      <div class='round-corners green-background title-wrapper'>
        <img src="/images/checkmark-square-2.png" alt="">
        @lang('checkout.label.wishlist_removed')
      </div>
      <div class='message'>
        @lang('wishlist.removed')
        <br>
        <div>  
          <a href="/{{$current_locale.'/products'}}" class="custom-page-tab active">@lang('checkout.label.continue_buy')</a>
        </div>
      </div>
    </div>
  </div>
</div>
