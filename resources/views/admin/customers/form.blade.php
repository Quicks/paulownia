<div class='col-md-11'>

    <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
        <div class="tab-pane fade active in" id="main-form" role="tabpanel" aria-labelledby="main-form">
            <div class="row">
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                    <label for="first_name" class="control-label col-sm-3">@lang('admin.customers.index.table.first_name')</label>
                    <input class="form-control col-sm-6" name="first_name" type="text" id="first_name" value="{{ isset($customer->first_name) ? $customer->first_name : ''}}" required>
                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                    <label for="last_name" class="control-label col-sm-3">@lang('admin.customers.index.table.last_name')</label>
                    <input class="form-control col-sm-6" name="last_name" type="text" id="last_name" value="{{ isset($customer->last_name) ? $customer->last_name : ''}}" required>
                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email" class="control-label col-sm-3">@lang('admin.partners.index.table.email')</label>
                    <input class="form-control col-sm-6" name="email" type="email" id="email" value="{{ isset($customer->email) ? $customer->email : ''}}" required>
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group">
                    <label for="gender" class="control-label col-sm-3">@lang('admin.customers.index.table.gender')</label>
                    <select class="form-control col-sm-6" name="gender" id="gender" required>
                        <option value="Male" {{ $customer->gender == 'Male' ? 'selected' : ''}}>Male</option>
                        <option value="Female" {{ $customer->gender == 'Female' ? 'selected' : ''}}>Female</option>
                        <option value="Other" {{ $customer->gender == 'Other' ? 'selected' : ''}}>Other</option>
                    </select>
                </div>
                <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                    <label for="status" class="control-label col-sm-3">@lang('admin.customers.index.table.status')</label>
                    <div class='col-sm-6'>
                        <input type="radio"
                               id="active-checkbox"
                               data-on-color="primary"
                               name="status"
                               class="input-switch-alt "
                               value="{{$customer->status}}"
                               checked=''
                               data-size="medium"
                               data-on-text="0"
                               data-off-text="1">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : ''}}">
                    <label for="date_of_birth" class="control-label col-sm-3">@lang('admin.customers.index.table.date_of_birth')</label>
                    <input class="form-control bsdatepicker col-sm-6" name="date_of_birth" type="text" id="date_of_birth"
                        value="{{ isset($customer->date_of_birth) ? $customer->date_of_birth : ''}}" data-date-format='yyyy-mm-dd' required>
                    {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                    <label for="phone" class="control-label col-sm-3">@lang('admin.partners.index.table.phone')</label>
                    <input class="form-control col-sm-6" name="phone" type="tel" id="phone" value="{{ isset($customer->phone) ? $customer->phone : ''}}" >
                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
        </div>

    </div>
</div>
<div class='col-md-1'>
    <div class='form-sidebar'>
        <div>
            <button class="btn btn-success full-width mb-15" type="submit">@lang('admin.btns.save')</button>
        </div>
        <div>
            <a href="{{ url('/admin/customers') }}" title="Back" class='btn btn-warning full-width mb-15'><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</a>
        </div>
    </div>
</div>