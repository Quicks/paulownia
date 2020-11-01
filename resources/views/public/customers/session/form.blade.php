<section>
    <div id="login-form-wrapper" class='customer-signups-forms'>
    	<div class="row">
        	<div class="mb-4 mb-md-0 margin-auto round-corners custom-page-description">
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
                        
                        <div class='col-md-12'>
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
                                <button type="submit" class="custom-page-tab col-md-12 active" name="login" @click.prevent='onSubmit' value="Log in">@lang('profile.login_btn')</button>
                            </div>
                            <hr class='separator'>
                            <div class="form-group">
                                <button type="submit" class="custom-page-tab col-md-12 facebook" name="login" value="Log in">@lang('profile.login_facebook_btn')</button>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="custom-page-tab col-md-12 google" name="login" value="Log in">@lang('profile.login_google_btn')</button>
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
            el: '#login-form-wrapper',
            data: {
                user: {
                    email: '',
                    password: '',
                },
                backendErrors: {},
            },
            methods:{
                async onSubmit(){                    
                    var response = await this.$http.post('/api/customer/login', this.user)
                        .catch(e => {
                            this.backendErrors = e.response.data.errors
                            window.scrollTo(0, $('#login-form-wrapper').offset().top)
                        })
                    if(response && response.status == 200){
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
