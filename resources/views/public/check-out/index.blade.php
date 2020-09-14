@extends('layouts.public')
<link rel="stylesheet" href="{{asset('css/checkout.css') }}?v1">

@section('content')
  <div id='checkout-wrapper'>
    <!-- START SECTION BANNER -->
    <section class="bg_light_yellow breadcrumb_section background_bg bg_fixed bg_size_contain" data-img-src="assets/images/breadcrumb_bg.png">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-sm-12 text-center">
                  <div class="page-title">
                    <h1>Checkout</h1>
                    </div>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->

    <!-- START SECTION SHOP DETAIL -->
    <section>
        <div class="container">
          <div class="row">
            @if(!Auth::guard('customer')->user())

              <div class="col-md-6">
                  <div class="toggle_info">
                      <span>@lang('checkout.label.already_have_account') <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">@lang('checkout.label.login_page')</a></span>
                    </div>
                    <div class="panel-collapse collapse login_form mb-3" id="loginform">
                        <div class="panel-body">
                            <form method="post" class="login" ref='form'>
                                <p>
                                  @lang('checkout.label.already_have_account_message')
                                </p>
                                <div class="form-group">
                                    <label>@lang('checkout.label.email') <span class="required">*</span></label>
                                    <input type="text" required class="form-control" name="username">
                                </div>
                                <div class="form-group">
                                    <label>@lang('checkout.label.password') <span class="required">*</span></label>
                                    <input class="form-control" required type="password" name="password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-block" name="login" value="Log in">@lang('checkout.label.login_btn')</button>
                                </div>
                                <div class="login_footer">
                                    <a href="#">@lang('checkout.label.forget_password')</a>
                                    <label>
                                        <input name="rememberme" type="checkbox" value="forever"> <span>@lang('checkout.label.remember_me')</span>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                  <div class="toggle_info">
                    <span>Have a coupon? <a href="#coupon" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                    </div>
                    <div class="panel-collapse collapse coupon_form mb-3" id="coupon">
                        <div class="panel-body">
                          <p>If you have a coupon code, please apply it below.</p>
                            <div class="coupon field_form input-group">
                                <input type="text" value="" class="form-control" placeholder="Enter Coupon Code..">
                                <div class="input-group-append">
                                    <button class="btn btn-default btn-sm" type="submit">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
              @else
                <div id='user-addresses' data-addresses='{{Auth::guard("customer")->user()->addresses->toJson()}}'></div>
              @endif
              
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="heading_s2">
                    <h5>@lang('checkout.label.billing_details')</h5>
                    </div>
                    <form id='checkout-form' method="post">
                      <div class="row">
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.first_name')<span class="required">*</span></label>
                              <input type="text" v-validate="'required'" class="form-control" name="billing.first_name" v-model='addresses.billing_address.first_name'>
                              <span v-show="errors.has('billing.first_name')" class="help error is-danger">@{{ errors.first('billing.first_name') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.last_name')<span class="required">*</span></label>
                              <input type="text" v-validate="'required'" class="form-control" name="billing.last_name" v-model='addresses.billing_address.last_name'>
                              <span v-show="errors.has('billing.last_name')" class="help error is-danger">@{{ errors.first('billing.last_name') }}</span>
                            </div>
                            <!-- <div class="form-group col-md-6">
                              <label>@lang('checkout.label.company_name')</label>
                              <input class="form-control" required v-validate="'required'" type="text" name="billing.company_name" v-model='addresses.billing_address.company_name'>
                              <span v-show="errors.has('billing.company_name')" class="help error is-danger">@{{ errors.first('billing.company_name') }}</span>
                            </div> -->
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.country')<span class="required">*</span></label>
                              <div class="custom_select">
                                <select v-validate="'required'" v-model='addresses.billing_address.country' name="billing.country">
                                  <option v-for='country in countries' :value='country.code'>
                                    @{{country.name}}
                                  </option>
                                </select>
                              </div>
                              <span v-show="errors.has('billing.country')" class="help error is-danger">@{{ errors.first('billing.country') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.address')<span class="required">*</span></label>
                              <input type="text" v-validate="'required'" v-model='addresses.billing_address.address1' class="form-control" name="billing.address1" required="">
                              <span v-show="errors.has('billing.address1')" class="help error is-danger">@{{ errors.first('billing.address1') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.city')<span class="required">*</span></label>
                              <input class="form-control" v-validate="'required'" v-model='addresses.billing_address.city' required type="text" name="billing.city">
                              <span v-show="errors.has('billing.city')" class="help error is-danger">@{{ errors.first('billing.city') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.state')</label>
                              <input class="form-control" v-validate="'required'" v-model='addresses.billing_address.state' required type="text" name="billing.state">
                              <span v-show="errors.has('billing.state')" class="help error is-danger">@{{ errors.first('billing.state') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.postcode')<span class="required">*</span></label>
                              <input class="form-control" v-validate="'required'" required type="text" name="billing.postcode" v-model='addresses.billing_address.postcode'>
                              <span v-show="errors.has('billing.postcode')" class="help error is-danger">@{{ errors.first('billing.postcode') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.phone')<span class="required">*</span></label>
                              <input class="form-control" v-validate="'required'" required v-model='addresses.billing_address.phone' type="text" name="billing.phone">
                              <span v-show="errors.has('billing.phone')" class="help error is-danger">@{{ errors.first('billing.phone') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.email')<span class="required">*</span></label>
                              <input class="form-control" v-validate="'required|email'" v-model='addresses.billing_address.email' required type="text" name="billing.email">
                              <span v-show="errors.has('billing.email')" class="help error is-danger">@{{ errors.first('billing.email') }}</span>
                              <span class="help error is-danger">@{{ renderErrors(backendErrors['billing.email']) }}</span>
                            </div>
                          <div class="form-group col-md-12">
                            <label>
                              <input name="createaccount" id="createaccount" v-model='createAccount' type="checkbox" value=""> <span> @lang('checkout.label.create_account')</span>
                            </label>
                          </div>
                          <div class="form-group col-md-6 create-account" v-if='createAccount'>
                            <label>@lang('checkout.label.password') <span class="required">*</span></label>
                            <input class="form-control" required type="password" placeholder="Password" name="password" v-model='createAccountPass'>
                          </div>
                          <div class="form-group col-md-12">
                            <label>
                              <input name="createaccount" v-model='use_for_shipping' id="differentaddress" type="checkbox" value=""> <span>@lang('checkout.label.ship_to_same_address')</span>
                            </label>
                          </div>
                        </div>
                        <div class="row different_address" v-if='!use_for_shipping'>
                          <div class="form-group col-md-6">
                              <label>@lang('checkout.label.first_name')<span class="required">*</span></label>
                              <input type="text" v-validate="'required'" class="form-control" name="shipping.first_name" v-model='addresses.shipping_address.first_name'>
                              <span v-show="errors.has('shipping.first_name')" class="help error is-danger">@{{ errors.first('shipping.first_name') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.last_name')<span class="required">*</span></label>
                              <input type="text" v-validate="'required'" class="form-control" name="shipping.last_name" v-model='addresses.shipping_address.last_name'>
                              <span v-show="errors.has('shipping.last_name')" class="help error is-danger">@{{ errors.first('shipping.last_name') }}</span>
                            </div>
                            <!-- <div class="form-group col-md-6">
                              <label>@lang('checkout.label.company_name')</label>
                              <input class="form-control" v-validate="'required'" type="text" name="shipping.company_name" v-model='addresses.shipping_address.company_name'>
                              <span v-show="errors.has('shipping.company_name')" class="help error is-danger">@{{ errors.first('shipping.company_name') }}</span>
                            </div> -->
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.country')<span class="required">*</span></label>
                              <div class="custom_select">
                                <select v-validate="'required'" v-model='addresses.shipping_address.country' name="shipping.country">
                                  <option v-for='country in countries' :value="country.code">
                                    @{{country.name}}
                                  </option>
                                </select>
                              </div>
                              <span v-show="errors.has('shipping.country')" class="help error is-danger">@{{ errors.first('shipping.country') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.address')<span class="required">*</span></label>
                              <input type="text" v-validate="'required'" v-model='addresses.shipping_address.address1' class="form-control" name="shipping.address1" required="">
                              <span v-show="errors.has('shipping.address1')" class="help error is-danger">@{{ errors.first('shipping.address1') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.city')<span class="required">*</span></label>
                              <input class="form-control" v-validate="'required'" v-model='addresses.shipping_address.city' required type="text" name="shipping.city">
                              <span v-show="errors.has('shipping.city')" class="help error is-danger">@{{ errors.first('shipping.city') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.state')</label>
                              <input class="form-control" v-validate="'required'" v-model='addresses.shipping_address.state' required type="text" name="shipping.state">
                              <span v-show="errors.has('shipping.state')" class="help error is-danger">@{{ errors.first('shipping.state') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.postcode')<span class="required">*</span></label>
                              <input class="form-control" v-validate="'required'" required type="text" name="shipping.postcode" v-model='addresses.shipping_address.postcode'>
                              <span v-show="errors.has('shipping.postcode')" class="help error is-danger">@{{ errors.first('shipping.postcode') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.phone')<span class="required">*</span></label>
                              <input class="form-control" v-validate="'required'" required v-model='addresses.shipping_address.phone' type="text" name="shipping.phone">
                              <span v-show="errors.has('shipping.phone')" class="help error is-danger">@{{ errors.first('shipping.phone') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.email')<span class="required">*</span></label>
                              <input class="form-control" v-validate="'required|email'" v-model='addresses.shipping_address.email' required type="text" name="shipping.email">
                              <span v-show="errors.has('shipping.email')" class="help error is-danger">@{{ errors.first('shipping.email') }}</span>
                            </div>
                        </div>
                        <!-- <div class="form-row">
                          <div class="form-group col-md-12">
                              <label>Order notes</label>
                                <textarea rows="5" class="form-control"></textarea>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="payment_method">
                  <div class='heading_s2'>
                    <h5>@lang('checkout.label.payment_method')</h5>
                  </div>
                  <div class="custome-radio" v-for='paymentMethod in payment_methods' @click='onPaymentMethodClick(paymentMethod.method)'>
                    <input class="form-check-input" required="" type="radio" :name="paymentMethod.method" :checked='payment_method == paymentMethod.method'>
                    <label class="form-check-label" :for="paymentMethod.method">@{{paymentMethod.method_title}}</label>
                    <p data-method="option3" class="payment-text" v-show="payment_method == paymentMethod.method">@{{paymentMethod.description}}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                  <div class="small_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="payment_method">
                  <div class='heading_s2'>
                    <h5>@lang('checkout.label.shipping_method')</h5>
                  </div>
                  <div class="custome-radio" v-for='shippingMethod in rates' @click='onShippingMethodClick(shippingMethod.code)'>
                    <input class="form-check-input" required="" type="radio" :name="shippingMethod.code" :checked='shipping_method == shippingMethod.code'>
                    <label class="form-check-label" :for="shippingMethod.code">@{{shippingMethod.carrier_title}}</label>
                    <p data-method="option3" class="payment-text" v-show="shipping_method == shippingMethod.code">@{{shippingMethod.description}}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                  <div class="small_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="heading_s2">
                  <h5>@lang('checkout.label.your_orders')</h5>
                </div>
                <div class="table-responsive order_table">

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="product-name">@lang('cart.label.title')</th>
                        <th class="product-price">@lang('cart.label.price')</th>
                        <th class="product-quantity">@lang('cart.label.quantity')</th>
                        <th class="product-subtotal">@lang('cart.label.total')</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class='product-row' v-for='item in cart.items'>
                        <td class="product-name" data-title="Product">
                          <a href="#">@{{item.name}}</a>
                        </td>
                        <td class="product-price" data-title="Price">@{{price_format(item.price)}}</td>
                        <td class="product-quantity" data-title="Quantity" >
                          @{{item.quantity}}
                        </td>
                        <td class="product-subtotal" data-title="Total">@{{price_format(item.total)}}</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td></td>
                        <th>@lang('checkout.label.sub_total')</th>
                        <td class="product-subtotal">@{{price_format(cart.sub_total)}}</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <th>@lang('checkout.label.shipping')</th>
                        <td>@{{price_format(shippingCalc())}}</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <th>@lang('checkout.label.total')</th>
                        <td class="product-subtotal">@{{price_format(total_sum)}}</td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                  <div class="small_divider clearfix"></div>
                </div>
            </div>
            <a href="#" @click.prevent='onSubmit' class="btn btn-default pull-right">@lang('checkout.label.order')</a>

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
              // company_name: '',
              first_name: '',
              last_name: '',
              email: '',
              address1: '',
              city: '',
              country: '',
              state: '',
              postcode: '',
              phone: '',
              email: ''
            },
            shipping_address: {
              // company_name: '',
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
            return parseFloat(number).toFixed(size) + ' ' + this.cart.base_currency_code
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
                that.addresses.billing_address.email = response.data.data.customer_email
                that.addresses.billing_address.first_name = response.data.data.customer_first_name
                that.addresses.billing_address.last_name = response.data.data.customer_last_name
              })
          },
          async onSubmit(){
            var that = this
            var preLoder = $("#preloader");

            try{
              let validForm = await that.$validator.validateAll()
              preLoder.show()
              if(validForm){
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
                  $.magnificPopup.open({
                    items: {
                      src: `<div id="success-popup"><div class="col-xl-8 col-md-12 col-sm-12 ml-xl-4 pl-5 "><h1>Thank you for your order!</h1> <p>We will email you, your order details and tracking information</p> <a href="/" class="product-button-success" style="text-decoration: none;">Continue Shopping</a></div></div>`,
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
            // {
            //   "billing" :  {
            //       "address1" : { "0" : "h23" },
            //       "use_for_shipping" : "true",
            //       "first_name" : "john",
            //       "last_name" : "doe",
            //       "email" : "john@webkul.com",
            //       "city" : "noida",
            //       "state"  :"DL",
            //       "postcode" : "110092",
            //       "country" : "IN",
            //       "phone" : "8802097347"
            //   },
            //   "shipping" : {
            //       "address1" : {
            //       "0" : ""
            //       }
            //   }
            // }
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
                  state: billingAddress.state,
                  country: billingAddress.country,
                  // company_name: billingAddress.company_name,
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
        }
      })
    </script>

@endpush