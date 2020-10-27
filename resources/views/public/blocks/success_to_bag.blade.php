<div id='success-put-to-bag-modal-wrapper'>
  <div class='success-modal round-corners white-background text-center'>
    <div class='round-corners green-background title-wrapper'>
      <img src="/images/checkmark-square-2.png" alt="">
      @lang('checkout.label.product_added')
    </div>
    <div class='message'>
      @lang('checkout.label.success_put_bag')<br>
      <br>
      <div>  
        <a href="/{{$current_locale.'/products'}}" class="custom-page-tab active">@lang('checkout.label.continue_buy')</a>
      </div>
    </div>
  </div>
</div>