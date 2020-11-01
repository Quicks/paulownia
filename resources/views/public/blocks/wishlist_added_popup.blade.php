<div id="wishlist-added-popup" class="white-popup mfp-hide">
  <div class='wishlist-added'>
    <div class='success-modal round-corners white-background text-center'>
      <div class='round-corners green-background title-wrapper'>
        <img src="/images/checkmark-square-2.png" alt="">
        @lang('checkout.label.wishlist_added')
      </div>
      <div class='message'>
        @lang('wishlist.added')
        <br>
        <div>  
          <a href="/{{$current_locale.'/products'}}" class="custom-page-tab active">@lang('checkout.label.continue_buy')</a>
        </div>
      </div>
    </div>
  </div>
</div>