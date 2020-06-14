<div class='col-md-11'>

    <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
        <div class="tab-pane fade active in" id="main-form" role="tabpanel" aria-labelledby="main-form">
            <div class="row">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name" class="control-label col-sm-3">@lang('admin.partners.index.table.name')</label>
                    <input class="form-control col-sm-6" name="name" type="text" id="name" value="{{ isset($partner->name) ? $partner->name : ''}}" required>
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('postcode') ? 'has-error' : ''}}">
                    <label for="postcode" class="control-label col-sm-3">@lang('admin.partners.index.table.postcode')</label>
                    <input class="form-control col-sm-6" name="postcode" type="text" id="postcode" value="{{ isset($partner->postcode) ? $partner->postcode : ''}}" >
                    {!! $errors->first('postcode', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                    <label for="phone" class="control-label col-sm-3">@lang('admin.partners.index.table.phone')</label>
                    <input class="form-control col-sm-6" name="phone" type="tel" id="phone" value="{{ isset($partner->phone) ? $partner->phone : ''}}" >
                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email" class="control-label col-sm-3">@lang('admin.partners.index.table.email')</label>
                    <input class="form-control col-sm-6" name="email" type="email" id="email" value="{{ isset($partner->email) ? $partner->email : ''}}" required>
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('website') ? 'has-error' : ''}}">
                    <label for="website" class="control-label col-sm-3">@lang('admin.partners.index.table.website')</label>
                    <input class="form-control col-sm-6" name="website" type="url" id="website" value="{{ isset($partner->website) ? $partner->website : ''}}" >
                    {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
                </div>
                <div class='form-group'>
                    @include('admin.add-images.cropper', ['images' => $partner->images])
                </div>
            </div>
        </div>
        @foreach(config('translatable.locales') as $locale)
            <div class="tab-pane fade" id={{$locale}} role="tabpanel"
                aria-labelledby={{$locale}}>
                <div class="border p-4 mb-4 bg-light rounded">
                    @include('admin.multi_lang_inputs.text_input', [
                            'item' => isset($partner) ? $partner : null, 'itemProperty' => 'title', 'translate' => 'translate'])
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class='col-md-1'>
    <div class='form-sidebar'>
        <div>
            <button class="btn btn-success full-width mb-15" type="submit">@lang('admin.btns.save')</button>
        </div>
        <div>
            <a href="{{ url('/admin/partners') }}" title="Back" class='btn btn-warning full-width mb-15'><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</a>
        </div>
    </div>
</div>
@push('scripts')
   <script src="{{ asset('js/translate.js') }}"></script>
@endpush