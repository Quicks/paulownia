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
              <div class="col-md-6">
                  <div class="toggle_info">
                      <span>@lang('checkout.label.already_have_account') <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">@lang('checkout.label.login_page')</a></span>
                    </div>
                    <div class="panel-collapse collapse login_form mb-3" id="loginform">
                        <div class="panel-body">
                            <form method="post" class="login">
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
                <div class="col-md-6">
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
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="heading_s2">
                    <h5>@lang('checkout.label.billing_details')</h5>
                    </div>
                    <form method="post">
                      <div class="row">
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.first_name')<span class="required">*</span></label>
                              <input type="text" required class="form-control" name="fname" v-model='addresses.billing_address.first_name'>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.last_name')<span class="required">*</span></label>
                              <input type="text" required class="form-control" name="lname" v-model='addresses.billing_address.last_name'>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.company_name')</label>
                              <input class="form-control" required type="text" name="cname" v-model='addresses.billing_address.company_name'>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.country')<span class="required">*</span></label>
                              <div class="custom_select">
                                <select v-model='addresses.billing_address.country'>
                                  <option v-for='country in countries' value='country.code'>
                                    @{{country.name}}
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.address')<span class="required">*</span></label>
                              <input type="text" v-model='addresses.billing_address.street_address' class="form-control" name="billing_address" required="">
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.city')<span class="required">*</span></label>
                              <input class="form-control" v-model='addresses.billing_address.city' required type="text" name="city">
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.state')</label>
                              <input class="form-control" v-model='addresses.billing_address.state' required type="text" name="state">
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.postcode')<span class="required">*</span></label>
                              <input class="form-control" required type="text" name="zipcode" v-model='addresses.billing_address.zip'>
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.phone')<span class="required">*</span></label>
                              <input class="form-control" required v-model='addresses.billing_address.phone' type="text" name="phone">
                            </div>
                            <div class="form-group col-md-6">
                              <label>@lang('checkout.label.email')<span class="required">*</span></label>
                              <input class="form-control" v-model='addresses.billing_address.email' required type="text" name="email">
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
                                <input type="text" required class="form-control" name="fname" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('checkout.label.last_name')<span class="required">*</span></label>
                                <input type="text" required class="form-control" name="lname" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('checkout.label.company_name')</label>
                                <input class="form-control" required type="text" name="cname">
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('checkout.label.country')<span class="required">*</span></label>
                                <div class="custom_select">
                                    <select>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('checkout.label.address')<span class="required">*</span></label>
                                <input type="text" value="" class="form-control" name="billing_address" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('checkout.label.city')<span class="required">*</span></label>
                                <input class="form-control" required type="text" name="city">
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('checkout.label.country')</label>
                                <input class="form-control" required type="text" name="state">
                            </div>
                            <div class="form-group col-md-6">
                                <label>@lang('checkout.label.postcode')<span class="required">*</span></label>
                                <input class="form-control" required type="text" name="zipcode">
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
                    <input class="form-check-input" required="" type="radio" name="payment_option" :checked='payment_method == paymentMethod.method'>
                    <label class="form-check-label" for="exampleRadios3">@{{paymentMethod.method_title}}</label>
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
                  <div class="custome-radio" v-for='shippingMethod in shipping_methods' @click='onShippingMethodClick(shippingMethod.code)'>
                    <input class="form-check-input" required="" type="radio" name="payment_option" :checked='shipping_method == shippingMethod.code'>
                    <label class="form-check-label" for="exampleRadios3">@{{shippingMethod.title}}</label>
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
                        <td>@{{shippingCalc()}}</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <th>@lang('checkout.label.total')</th>
                        <td class="product-subtotal">@{{price_format(cart.grand_total)}}</td>
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
<!-- END SECTION SHOP DETAIL -->
    <!-- <checkout></checkout> -->
  </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vee-validate/2.0.0-rc.26/vee-validate.min.js"></script>

    <script>
      Vue.prototype.$http = axios;

      new Vue({
        el: '#checkout-wrapper',
        data: {
          addresses:{
            billing_address: {
              company_name: '',
              first_name: '',
              last_name: '',
              email: '',
              street_address: '',
              city: '',
              country: '',
              state: '',
              zip: '',
              phone: '',
              email: ''
            },
            shipping_address: {
              company_name: '',
              first_name: '',
              last_name: '',
              email: '',
              street_address: '',
              city: '',
              country: '',
              state: '',
              zip: '',
              phone: ''
            }
          },
          countries: @json(core()->countries()),
          payment_methods: @json($paymentMethods),
          shipping_methods: @json($shippingMethods),
          createAccount: false,
          use_for_shipping: true,
          shipping_method: 'flatrate',
          payment_method: 'cashondelivery',
          createAccountPass: '',
          coupon: '',
          cart: {
            items: []
          },
          user: {}
        },
        mounted(){
          this.retrieveCartInfo()
        },
        methods: {
          shippingCalc(){
            return 42
          },
          price_format(number, size=2){
            return parseFloat(number).toFixed(size) + ' ' + this.cart.base_currency_code
          },
          retrieveCartInfo(){
            var that = this
            this.$http.get('/api/checkout/cart')
              .then(function(response){
                that.cart = response.data.data
              })
          },
          async onSubmit(){
            var that = this
            if(this.createAccount){
              this.user = await this.$http.post('/api/customer/register', {
                email: this.addresses.billing_address.email,
                first_name: this.addresses.billing_address.first_name,
                last_name: this.addresses.billing_address.last_name,
                password: this.createAccountPass,
                password_confirmation: this.createAccountPass
              })
            }
            await this.$http.post('/api/checkout/save-address', this.addressParams())
            await this.$http.post('/api/checkout/save-shipping', {shipping_method: this.shipping_method})
            await this.$http.post('/api/checkout/save-payment', {payment:{ method: this.payment_method } })
            await this.$http.post('/api/checkout/save-order')
            location.href = '/'

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
                    billingAddress.street_address
                  ],
                  use_for_shipping: billingAddress.use_for_shipping,
                  first_name: billingAddress.first_name,
                  last_name: billingAddress.last_name,
                  email: billingAddress.email,
                  phone: billingAddress.phone,
                  postcode: billingAddress.zip,
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
        }
      })
    </script>

@endpush