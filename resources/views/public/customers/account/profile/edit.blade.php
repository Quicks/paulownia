<div class="account-content">
    <div class="account-layout">

        <form method="POST" action="{{ route('customer.profile.edit') }}">
            {{ csrf_field() }}
            @csrf
            <div class="form-group">
                <label>@lang('profile.fname')<span class="required">*</span></label>
                <input type="text" required class="form-control" name="first_name" value="{{ old('first_name') ?? $customer->first_name }}" />
            </div>
            <div class="form-group">
                <label>@lang('profile.lname')<span class="required">*</span></label>
                <input class="form-control" required type="text" name="last_name" value="{{ old('last_name') ?? $customer->last_name }}">
            </div>
            <div class="form-group">
                <label>@lang('profile.gender')<span class="required">*</span></label>
                <select name="gender" class="form-control">
                    <option value=""  @if ($customer->gender == "") selected @endif></option>
                    <option value="Other"  @if ($customer->gender == "Other") selected @endif>Other</option>
                    <option value="Male"  @if ($customer->gender == "Male") selected @endif>Male</option>
                    <option value="Female" @if ($customer->gender == "Female") selected @endif>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label>@lang('profile.dob')<span class="required">*</span></label>
                <input class="form-control" required type="date" name="date_of_birth" value="{{ old('date_of_birth') ?? $customer->date_of_birth }}">
            </div>
            <div class="form-group">
                <label>Email<span class="required">*</span></label>
                <input class="form-control" required type="text" name="email" value="{{ old('email') ?? $customer->email }}">
            </div>
            <!-- <div class="control-group" :class="[errors.has('oldpassword') ? 'has-error' : '']">
                <label for="password">{{ __('shop::app.customer.account.profile.opassword') }}</label>
                <input type="password" class="control" name="oldpassword" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.opassword') }}&quot;" v-validate="'min:6'">
                <span class="control-error" v-if="errors.has('oldpassword')">@{{ errors.first('oldpassword') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                <label for="password">{{ __('shop::app.customer.account.profile.password') }}</label>

                <input type="password" id="password" class="control" name="password" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.password') }}&quot;" v-validate="'min:6'">
                <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                <label for="password">{{ __('shop::app.customer.account.profile.cpassword') }}</label>

                <input type="password" id="password_confirmation" class="control" name="password_confirmation" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.cpassword') }}&quot;" v-validate="'min:6|confirmed:password'">
                <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
            </div> -->
            <div class="form-group">
                <input class="btn btn-default btn-sm" type="submit" value="{{ __('profile.upd-profile') }}">
            </div>
            
        </form>
    </div>

</div>
