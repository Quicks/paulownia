<section>
    <div id="signup-form-wrapper" class='customer-signups-forms'>
    	<div class="row">
        	<div class="col-md-12 mb-4 mb-md-0 margin-auto round-corners custom-page-description">
                <div class='row profile-form-header'>
                    <div class='col-md-6'>
                        <a class='custom-page-tab active authorize-btn' href='/customer/login'>
                            @lang('profile.authorize')
                        </a>
                    </div>
                    <div class='col-md-6 d-flex'>
                        <a class='title profile-form-other-title' href=''>
                            @lang('profile.create_btn')
                        </a>
                    </div>
                </div>
            	<form method="POST" action="{{ route('customer.register.create') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class='col-md-6'>
                            
                            <div class="form-group">
                                <input type="text"
                                    class="form-control"
                                    v-model="user.first_name"
                                    v-validate="'required'"
                                    placeholder="{{ __('checkout.label.first_name') }}">
                                <span v-show="errors.has('first_name') || backendErrors['first_name']" 
                                    class="help error is-danger">@{{ errors.first('first_name') }} @{{ renderBackendErrors('first_name') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                    class="form-control"
                                    v-model="user.last_name"
                                    v-validate="'required'"
                                    placeholder="{{ __('checkout.label.last_name') }}">
                                <span v-show="errors.has('first_name') || backendErrors['last_name']" 
                                    class="help error is-danger">@{{ errors.first('last_name') }} @{{ renderBackendErrors('last_name') }}
                                </span>
                            </div>

                            <div class="form-group">
                                <input type="text"
                                    class="form-control"
                                    v-model="user.company_name"
                                    validate="'required'"
                                    placeholder="{{ __('checkout.label.company_name') }}">
                                <span v-show="errors.has('first_name') || backendErrors['company_name']" 
                                    class="help error is-danger">@{{ errors.first('company_name') }} @{{ renderBackendErrors('company_name') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                    class="form-control"
                                    v-model="user.id_number"
                                    v-validate="'required'"
                                    placeholder="{{ __('checkout.label.id_number') }}">
                                <span v-show="errors.has('first_name') || backendErrors['id_number']" 
                                    class="help error is-danger">@{{ errors.first('id_number') }} @{{ renderBackendErrors('id_number') }}
                                </span>
                            </div>
                    
                            <div class="form-group">
                                <input type="text"
                                    class="form-control"
                                    v-model="user.address1"
                                    v-validate="'required'"
                                    placeholder="{{ __('checkout.label.address') }}">
                                <span v-show="errors.has('first_name') || backendErrors['address1']" 
                                    class="help error is-danger">@{{ errors.first('address1') }} @{{ renderBackendErrors('address1') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <select v-validate="'required'" v-model="user.country" class='form-control'>
                                    <option disabled selected value="">@lang('checkout.label.country')</option>
                                    <option v-for='country in countries' :value="country.code">
                                        @{{country.name}}
                                    </option>
                                </select>
                                <span v-show="errors.has('first_name') || backendErrors['country']" 
                                    class="help error is-danger">@{{ errors.first('country') }} @{{ renderBackendErrors('country') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <input 
                                    type="text"
                                    class="form-control"
                                    v-model="user.postcode"
                                    v-validate="'required'"
                                    placeholder="{{__('checkout.label.postcode')}}"
                                    >
                                <span v-show="errors.has('first_name') || backendErrors['postcode']" 
                                    class="help error is-danger">@{{ errors.first('postcode') }} @{{ renderBackendErrors('postcode') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <input 
                                    type="text"
                                    class="form-control"
                                    v-model="user.state"
                                    v-validate="'required'"
                                    placeholder="{{__('checkout.label.state')}}"
                                    >
                                <span v-show="errors.has('first_name') || backendErrors['state']" 
                                    class="help error is-danger">@{{ errors.first('state') }} @{{ renderBackendErrors('state') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <input 
                                    type="text"
                                    class="form-control"
                                    v-model="user.city"
                                    v-validate="'required'"
                                    placeholder="{{__('checkout.label.city')}}"
                                    >
                                <span v-show="errors.has('first_name') || backendErrors['city']" 
                                    class="help error is-danger">@{{ errors.first('city') }} @{{ renderBackendErrors('city') }}
                                </span>
                            </div>
                            <div class='profile-text text-center'>
                                @lang('profile.profile_text1')
                                <a href='privacy-policy' class='green-color'>@lang('profile.privacy_policy')</a> 
                                @lang('profile.profile_text2') 
                                <a href='terms-conditions' class='green-color'>@lang('profile.terms_conditions')</a>.
                            </div>
                            <br>
                            <div class='profile-text text-center'>
                                @lang('profile.profile_text3')
                            </div>
                        </div>
                        <div class='col-md-6'>
                            
                            <div class="form-group">
                                <input type="phone"
                                    class="form-control"
                                    v-model="user.phone"
                                    v-validate="'required'"
                                    placeholder="{{ __('checkout.label.phone') }}">
                                <span v-show="errors.has('first_name') || backendErrors['phone']" 
                                    class="help error is-danger">@{{ errors.first('phone') }} @{{ renderBackendErrors('phone') }}
                                </span>
                            </div>

                            <div class="form-group">
                                <input type="email"
                                    class="form-control"
                                    v-model="user.email"
                                    v-validate="'required'"
                                    placeholder="{{ __('checkout.label.email') }}">
                                <span v-show="errors.has('first_name') || backendErrors['email']" 
                                    class="help error is-danger">@{{ errors.first('email') }} @{{ renderBackendErrors('email') }}
                                </span>
                            </div>

                            <div class="form-group">
                                <input type="password"
                                    class="form-control"
                                    v-model="user.password"
                                    v-validate="'required'"
                                    placeholder="{{ __('shop::app.customer.signup-form.password') }}">
                                <span v-show="errors.has('first_name') || backendErrors['password']" 
                                    class="help error is-danger">@{{ errors.first('password') }} @{{ renderBackendErrors('password') }}
                                </span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="custom-page-tab col-md-12 active" name="login" @click.prevent='onSubmit' value="Log in">@lang('profile.create_btn')</button>
                            </div>
                            <hr class='separator'>
                            <div class="form-group">
                                <button type="submit" class="custom-page-tab col-md-12 facebook" name="login" value="Log in">@lang('profile.create_facebook_btn')</button>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="custom-page-tab col-md-12 google" name="login" value="Log in">@lang('profile.create_google_btn')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        Vue.prototype.$http = axios;
        Vue.use(VeeValidate, {events: 'change|blur'});

        new Vue({
            el: '#signup-form-wrapper',
            data: {
                user: {
                    company_name: '',
                    first_name: '',
                    last_name: '',
                    email: '',
                    address1: '',
                    city: '',
                    country: '',
                    id_number: '',
                    state: '',
                    postcode: '',
                    phone: '',
                    password: '',
                    password_confirmation: ''
                },
                backendErrors: {},
                countries: @json(core()->countries()),
            },
            methods:{
                async onSubmit(){
                    this.user.password_confirmation = this.user.password
                    let response = await this.$http.post('/api/customer/register', this.user)
                        .catch(e => {
                            this.backendErrors = e.response.data.errors
                            window.scrollTo(0, $('#signup-form-wrapper').offset().top)
                        })
                    if(response && response.status == 200){
                        await this.$http.post('/api/customer/login', {email: this.user.email, password: this.user.password})
                        // $.magnificPopup.close()
                        location.reload()
                    }
                },
                renderBackendErrors(name){
                    var errors = this.backendErrors[name]
                    if(errors){
                        console.log(errors)
                        return errors[0]
                    }
                    return ""
                }
            }
        })
    })
</script>