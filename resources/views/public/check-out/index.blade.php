@extends('layouts.public')
<link rel="stylesheet" href="{{asset('css/checkout.css') }}?v1">
@section('content')
  @include('public.blocks.page_header', ['title' => __('products.checkout')])
  <div id='success-modal-wrapper'>
    <div class='success-modal round-corners white-background text-center'>
      <div class='round-corners green-background title-wrapper'>
        <img src="/images/checkmark-square-2.png" alt="">
        @lang('checkout.label.thank_for_order')
      </div>
      <div class='message'>
        @lang('checkout.label.order_message.1')<br>
        @lang('checkout.label.order_message.2')<br>
        <br>
        <div class='title'>
          @lang('checkout.label.order_message.3')
        </div>
        @lang('checkout.label.order_message.4')
        <div>
          <a href="#" class="custom-page-tab">@lang('checkout.label.my_orders')</a>
        </div>
        <div>
          
          <a href="/{{$current_locale.'/products'}}" class="custom-page-tab active">@lang('checkout.label.continue_buy')</a>
        </div>
      </div>
    </div>
  </div>
  
  <div id='checkout-wrapper' class='custom-page-description'>
    <section>
        <div class="container">
          <div class="row">
            @if(!Auth::guard('customer')->user())
              @else
                <div id='user-addresses' data-addresses='{{Auth::guard("customer")->user()->addresses->toJson()}}'></div>
              @endif
              
            </div>
            <div class="row">
            
              <div class="col-md-6 checkout-wrapper">
                  <div class="checkout-header row">
                    1. @lang('checkout.label.billing_details')
                  </div>
                  <form id='checkout-form' method="post">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="billing.full_name"
                          v-model='addresses.billing_address.full_name'
                          placeholder="{{__('checkout.label.first_name')}} {{__('checkout.label.last_name')}}"
                        >
                        <span v-show="errors.has('billing.first_name')" class="help error is-danger">@{{ errors.first('billing.first_name') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="billing.company_name"
                          v-model='addresses.billing_address.company_name'
                          placeholder="{{__('checkout.label.company_name')}}"
                        >
                        <span v-show="errors.has('billing.company_name')" class="help error is-danger">@{{ errors.first('billing.company_name') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="billing.id_number"
                          v-model='addresses.billing_address.id_number'
                          placeholder="{{__('checkout.label.id_number')}}"
                        >
                        <span v-show="errors.has('billing.id_number')" class="help error is-danger">@{{ errors.first('billing.id_number') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="billing.address1"
                          v-model='addresses.billing_address.address1'
                          placeholder="{{__('checkout.label.address')}}"
                        >
                        <span v-show="errors.has('billing.address1')" class="help error is-danger">@{{ errors.first('billing.address1') }}</span>
                      </div>
                      <div class="form-group col-md-7">
                        <div class="custom_select">
                          <select v-validate="'required'" v-model='addresses.billing_address.country' name="billing.country">
                            <option disabled selected value="">@lang('checkout.label.country')</option>
                            <option v-for='country in countries' :value="country.code">
                              @{{country.name}}
                            </option>
                          </select>
                        </div>
                        <span v-show="errors.has('billing.country')" class="help error is-danger">@{{ errors.first('billing.country') }}</span>
                      </div>
                      <div class="form-group col-md-5">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="billing.postcode"
                          v-model='addresses.billing_address.postcode'
                          placeholder="{{__('checkout.label.postcode')}}"
                        >
                        <span v-show="errors.has('billing.postcode')" class="help error is-danger">@{{ errors.first('billing.postcode') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="billing.city"
                          v-model='addresses.billing_address.city'
                          placeholder="{{__('checkout.label.city')}}"
                        >
                        <span v-show="errors.has('billing.city')" class="help error is-danger">@{{ errors.first('billing.city') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="billing.state"
                          v-model='addresses.billing_address.state'
                          placeholder="{{__('checkout.label.state')}}"
                        >
                        <span v-show="errors.has('billing.state')" class="help error is-danger">@{{ errors.first('billing.state') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="billing.phone"
                          v-model='addresses.billing_address.phone'
                          placeholder="{{__('checkout.label.phone')}}"
                        >
                        <span v-show="errors.has('billing.phone')" class="help error is-danger">@{{ errors.first('billing.phone') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <div class='address-toggle title' @click='switchDifferentaddress'>
                          +ОтПравить на другой адрес?
                        </div>
                      </div>
                    
                    </div>
                    <div class="row different_address" v-if='!use_for_shipping'>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="shipping.first_name"
                          v-model='addresses.shipping_address.first_name'
                          placeholder="{{__('checkout.label.first_name')}} {{__('checkout.label.last_name')}}" 
                        >
                        <span v-show="errors.has('shipping.first_name')" class="help error is-danger">@{{ errors.first('billing.first_name') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="shipping.address"
                          v-model='addresses.shipping_address.address' 
                          placeholder="{{__('checkout.label.address')}}"
                        >
                        <span v-show="errors.has('shipping.address')" class="help error is-danger">@{{ errors.first('billing.address') }}</span>
                      </div>
                      <div class="form-group col-md-7">
                        <div class="custom_select">
                          <select v-validate="'required'" v-model='addresses.shipping_address.country' name="shipping.country">
                            <option disabled selected value="">@lang('checkout.label.country')</option>
                            <option v-for='country in countries' :value="country.code">
                              @{{country.name}}
                            </option>
                          </select>
                        </div>
                        <span v-show="errors.has('shipping.country')" class="help error is-danger">@{{ errors.first('shipping.country') }}</span>
                      </div>
                      <div class="form-group col-md-5">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="shipping.postcode"
                          v-model='addresses.shipping_address.postcode'
                          placeholder="{{__('checkout.label.postcode')}}"
                        >
                        <span v-show="errors.has('shipping.postcode')" class="help error is-danger">@{{ errors.first('shipping.postcode') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="shipping.city"
                          v-model='addresses.shipping_address.city'
                          placeholder="{{__('checkout.label.city')}}"
                        >
                        <span v-show="errors.has('shipping.city')" class="help error is-danger">@{{ errors.first('shipping.city') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="shipping.state"
                          v-model='addresses.shipping_address.state'
                          placeholder="{{__('checkout.label.state')}}"
                        >
                        <span v-show="errors.has('shipping.state')" class="help error is-danger">@{{ errors.first('shipping.state') }}</span>
                      </div>
                      <div class="form-group col-md-12">
                        <input 
                          type="text"
                          v-validate="'required'"
                          class="form-control"
                          name="shipping.phone"
                          v-model='addresses.shipping_address.phone'
                          placeholder="{{__('checkout.label.phone')}}"
                        >
                        <span v-show="errors.has('shipping.phone')" class="help error is-danger">@{{ errors.first('shipping.phone') }}</span>
                      </div>
                    </div>
                    <div>
                      <label class="checkbox-container">
                        @lang('checkout.label.commercial_aggree')
                        <input class="form-check-input" v-validate="'required'" required="" type="checkbox" name="commercial_aggree" v-model='commercial_aggree'>
                        <span class="checkmark"></span>
                      </label>
                      <span v-show="errors.has('commercial_aggree')" class="help error is-danger">@{{ errors.first('commercial_aggree') }}</span>

                    </div>
                    <div class="shipping_method">
                      <div class='checkout-header row'>
                        2. @lang('checkout.label.shipping_method')
                      </div>
                      <div class="custome-radio" v-for='shippingMethod in rates' @click='onShippingMethodClick(shippingMethod.code)'>
                        <label class="checkbox-container">
                          @{{shippingMethod.carrier_title}}
                          <input class="form-check-input" required="" type="radio" :name="shippingMethod.code" :checked='shipping_method == shippingMethod.code'>
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div>
                      <div class='checkout-header row'>
                        3. @lang('checkout.label.payment_method')
                      </div>
                      <div class="custome-radio" v-for='paymentMethod in payment_methods' @click='onPaymentMethodClick(paymentMethod.method)'>
                        <label class="checkbox-container">
                          @{{paymentMethod.method_title}}
                          <input class="form-check-input" required="" type="radio" :name="paymentMethod.method" :checked='payment_method == paymentMethod.method'>
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                      
                    
                  </form>
                </div>
                <div class="col-md-6 order-wrapper gray-background">
                <div class='checkout-header row'>
                  @lang('checkout.label.your_orders')
                </div>
                <div class="">
                  <div class='row table-title'>
                    <div class='col-8 text-center product-row-title'>
                      @lang('checkout.label.title')
                    </div>
                    <div class='col-2 text-center product-row-title'>
                      @lang('checkout.label.quantity')
                    </div>
                    <div class='bakgraoundcol-2 text-center product-row-title'>
                      @lang('checkout.label.total')
                    </div>
                  </div>
                  <div class='product-row round-corners row white-background' v-for='item in cart.items'>
                    <div class='product-image col-3'>
                      <img class='round-corners' :src="getProductImage(item.product)"/>
                    </div>
                  
                    <div class='product-info col-5'>
                      <div class='product-title'>
                        @{{item.name}}
                      </div>

                      <div class='product-sku'>@lang('checkout.label.sku'): 
                        <span> @{{item.product.sku}} </span>
                      </div>
                      <div class='product-size green-color checkout-label'>@lang('checkout.label.size'): 
                        <span class='black-color'> @{{item.product.tree_size}} </span>
                      </div>
                      <div class='product-age green-color checkout-label'>@lang('checkout.label.age'): 
                        <span class='black-color'> @{{item.product.tree_age}} </span>
                      </div>
                    </div>
                    <div class='product-quantity content-centered col-2 text-center'>
                      @{{item.quantity}}
                    </div>

                    <div class='product-total content-centered col-2 text-center'>
                      @{{price_format(item.total)}}
                    </div>

                  </div>
                  <div class='cart-total row'>
                    <div class='col-md-6'>
                      <div class='promo-wrapper round-corners bordered content-centered'>
                        <div class='title'>
                          @lang('checkout.label.promo')
                        </div>

                        <input type="text" class='form-control' placeholder="{{__('checkout.label.input_promo')}}">
                      </div>
                    </div>
                    <div class='col-md-6 cart-info'>
                      <div class='cart-info-block'>
                        <div class='row'>
                          <div class='col-7'>
                            @lang('checkout.label.sub_total'): 
                          </div>
                          <div class='col-5'>
                            <span class='value'>@{{price_format(cart.sub_total)}}</span>
                          </div>
                        </div>
                      </div>
                      <div class='cart-info-block'>
                        <div class='row'>
                          <div class='col-7'>
                            @lang('checkout.label.iva'):
                          </div>
                          <div class='col-5'>
                            <span class='value'>@{{price_format(ivaCalc())}}</span>
                          </div>
                        </div>
                      </div>
                      <div class='cart-info-block'>
                        <div class='row'>
                          <div class='col-7'>
                            @lang('checkout.label.shipping'):
                          </div>
                          <div class='col-5'>
                            <span class='value'>@{{shippingCalc()}}</span>
                          </div>
                        </div>
                      </div>
                      <div class='cart-info-block total'>
                        <div class='row'>
                          <div class='col-7 black-color'>
                            @lang('checkout.label.total'):
                          </div>
                          <div class='col-5 '>
                            <span class='value black-color'>@{{price_format(total_sum)}}</span>
                          </div>
                        </div>
                      </div>
                      <div class='separator'></div>
                      <div class='commercial_terms'>
                        <label class="checkbox-container">
                          @lang('checkout.label.commercial_terms')
                          <input class="form-check-input" v-validate="'required'" required="" type="checkbox" name="commercial_terms" v-model='commercial_terms'>
                          <span class="checkmark"></span>
                        </label>
                        <span v-show="errors.has('commercial_terms')" class="help error is-danger">@{{ errors.first('commercial_terms') }}</span>
                      </div>
                    </div>  
                    
                    <div class='pd-10 order-notice'>
                      <textarea name="" placeholder="{{__('checkout.label.notice')}}" id="" v.model='customer_message' rows="5"></textarea>
                    </div>
                    <a href="#" @click.prevent='onSubmit' class="custom-page-tab active submit-btn">@lang('checkout.label.order')</a>

                    <div class='round-corners urgent-border pd-17 urgent-message'>
                      <div class='title text-left'>
                        ВНИМАНИЕ !!!
                      </div>
                      <div class='gray-color'>
                        Не производите оплату, до получения счет-проформы с окончательным расчетом стоимости доставки. После получения счета-проформы оплата должна быть произведена непосредственно на наш банковский счет, используя номер счета-проформы в качестве описания платежа. Как только общая сумма заказа поступит на счет Paulownia Professional S.L., мы приступим к немедленной отправке заказанного вами товара.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
              </div>
            <div class="row">
              <div class="col-12">
                <div class="small_divider clearfix"></div>
              </div>
            </div>
        </div>
    </section>
  </div>
  
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vee-validate/2.0.0-rc.26/vee-validate.min.js"></script>

    <script>
      Vue.prototype.$http = axios;
      Vue.use(VeeValidate, {events: 'change|blur'});

      new Vue({
        el: '#checkout-wrapper',
        data: {
          addresses:{
            billing_address: {
              company_name: '',
              first_name: '',
              full_name: '',
              last_name: 'not seted',
              email: 'email@email.com',
              address1: '',
              city: '',
              country: '',
              id_number: '',
              state: '',
              postcode: '',
              phone: '',
            },
            shipping_address: {
              company_name: '',
              full_name: '',
              first_name: '',
              last_name: '',
              email: '',
              address1: '',
              city: '',
              country: '',
              state: '',
              postcode: '',
              phone: ''
            }
          },
          customer_message: '',
          commercial_terms: false,
          commercial_aggree: false,
          backendErrors: {},
          countries: @json(core()->countries()),
          payment_methods: @json($paymentMethods),
          rates: @json($rates),
          createAccount: false,
          use_for_shipping: true,
          shipping_method: 'shippingToSpainPortugal',
          payment_method: 'cashondelivery',
          createAccountPass: '',
          coupon: '',
          cart: {
            items: []
          },
          user: {},
          
        },
        computed:{
          total_sum(){
            return parseInt(this.cart.grand_total) + parseInt(this.shippingCalc())
          }
        },
        async mounted(){
          await this.retrieveCustomerInfo()
          await this.retrieveCartInfo()
        },
        methods: {
          ivaCalc(){
            console.log(parseFloat(this.cart.grand_total))
            return parseFloat(this.cart.grand_total) / 10
          },
          getProductImage(product){
            if(product.images.length){
              return '/storage/' + product.images[0].medium_image_url
            }else{
              return product.base_image.small_image_url
            }
          },
          switchDifferentaddress(){
            this.use_for_shipping = !this.use_for_shipping
          },
          shippingCalc(){
            let shippingMethod = this.shipping_method
            let currentRate = this.rates.find(function(rate) { return rate.code == shippingMethod })
            if(currentRate){
              return currentRate.rates.map(function(rate) {return rate.base_price}).reduce(function(prev, next) {return prev + next})
            }else{
              return 0
            }
          },
          renderErrors(errors){
            if(Array.isArray(errors)){
              return errors.join(',')
            }else{
              return errors
            }
          },
          price_format(number, size=2){
            return parseFloat(number).toFixed(size)
          },
          retrieveCustomerInfo(){
            const addresses = document.querySelector('#user-addresses');
            if(addresses){
              this.addresses.billing_address = JSON.parse(addresses.dataset.addresses)[0]
            }
          },
          retrieveCartInfo(){
            var that = this
            this.$http.get('/api/checkout/cart')
              .then(function(response){
                that.cart = response.data.data
                if(response.data.data.customer_email){
                  that.addresses.billing_address.email = response.data.data.customer_email
                  that.addresses.billing_address.first_name = response.data.data.customer_first_name
                  that.addresses.billing_address.last_name = response.data.data.customer_last_name
                  that.addresses.billing_address.full_name = response.data.data.customer_first_name + ' ' +response.data.data.customer_last_name
                }
              })
          },
          async onSubmit(){
            var that = this
            var preLoder = $("#preloader");
            try{
              let validForm = await that.$validator.validateAll()
              if(validForm){
                preLoder.show()
                if(this.createAccount){
                  this.user = await this.$http.post('/api/customer/register', {
                    email: this.addresses.billing_address.email,
                    first_name: this.addresses.billing_address.first_name,
                    last_name: this.addresses.billing_address.last_name,
                    password: this.createAccountPass,
                    password_confirmation: this.createAccountPass
                  }).catch(e => {
                    Vue.set(that.backendErrors, 'billing.email', e.response.data.errors['email'])
                    $('input[name="billing.email"]')[0].scrollIntoView(true)
                    window.scrollTo(0, window.scrollY - 150)
                  })
                  if(!this.user){
                    return false
                  }
                }
                
                let addressResponse = await this.$http.post('/api/checkout/save-address', this.addressParams())
                if(addressResponse.errors){
                  this.errors.billing = addressResponse.errors
                }
                let shippingResponse = await this.$http.post('/api/checkout/save-shipping', {shipping_method: this.shipping_method})
                let paymentResponse = await this.$http.post('/api/checkout/save-payment', {payment:{ method: this.payment_method } })
                let saveOrderResponse = await this.$http.post('/api/checkout/save-order')
                if(this.payment_method == 'paypal_standard'){
                  location.href = saveOrderResponse.data.redirect_url
                }else{
                  let html = $('#success-modal-wrapper').html()

                  $.magnificPopup.open({
                    items: {
                      src: html,
                      type: 'inline'
                    },
                    callbacks: {
                      close: function() {
                        location.href = '/'
                      }
                    }
                  });
                }
                preLoder.hide()

                // location.href = '/'
              }else{
                const errorFieldName = this.$validator.errors.items[0].field;
                $('input[name="'+ errorFieldName + '"]')[0].scrollIntoView(true)
                window.scrollTo(0, window.scrollY - 150)
              }

            }catch(e){
              if(e.response.data.errors){
                preLoder.hide()

                this.$refs.form.setErrors(e.response.data.errors)
                let key = Object.keys(that.errors)[0];
                $('input[name="'+ key + '"]')[0].scrollIntoView(true)
                window.scrollTo(0, window.scrollY - 150)
              }
            }
          },

          addressParams(){
            var billingAddress = this.addresses.billing_address
            var shippingAddress = this.addresses.shipping_address
            // if(this.user.email){

            // }else {
              var res = {
                billing: {
                  address1:  [
                    billingAddress.address1
                  ],
                  use_for_shipping: billingAddress.use_for_shipping,
                  first_name: billingAddress.first_name,
                  last_name: billingAddress.last_name,
                  email: billingAddress.email,
                  phone: billingAddress.phone,
                  postcode: billingAddress.postcode,
                  id_number: billingAddress.id_number,
                  state: billingAddress.state,
                  country: billingAddress.country,
                  company_name: billingAddress.company_name,
                  city: billingAddress.city,
                },
                shipping: {
                  address1: ['']
                }
              }
              if(!billingAddress.use_for_shipping){

              }
              // res[]
              return res
            // }
            
          },
          onPaymentMethodClick(method){
            this.payment_method = method
          },
          onShippingMethodClick(code){
            this.shipping_method = code
          }
        },
        watch: {
          'addresses.billing_address.full_name': function(newValue, old){
            console.log(old)
            let splited = newValue.split(' ')
            this.addresses.billing_address.first_name = splited[0]
            this.addresses.billing_address.last_name = splited[1]
          }
        }
      })
    </script>

@endpush