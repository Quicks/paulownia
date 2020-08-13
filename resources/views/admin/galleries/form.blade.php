
<div class='col-md-11'>

    <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
        <div class="tab-pane fade active in" id="main-form" role="tabpanel" aria-labelledby="main-form">
            <div class="row">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name" class="control-label col-sm-3">@lang('admin.common.name')</label>
                    <input class="form-control col-sm-6" name="name" type="text" id="name" value="{{ isset($gallery->name) ? $gallery->name : ''}}" required>
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                    <label for="active" class="control-label col-sm-3">@lang('admin.common.active')</label>
                    <div class='col-sm-6'>
                        <input type="radio" 
                                id="active-checkbox"
                                data-on-color="primary"
                                name="active"
                                class="input-switch-alt "
                                value="{{$gallery->active}}"
                                checked=''
                                data-size="medium"
                                data-on-text="0"
                                data-off-text="1">
                    </div>
                </div>
                <div class='form-group'>
                    @if($formMode == 'create')
                        <label for="name" class="control-label col-sm-3">@lang('admin.form.file_choose')</label>
                        <div class="fileinput fileinput-new col-sm-6" data-provides="fileinput">
                            <span class="btn btn-primary btn-file">
                                <span class="fileinput-new">@lang('admin.form.file_choose')</span>
                                <span class="fileinput-exists">@lang('admin.form.file_change')</span>
                                <input class="form-control" name="images[]" accept="image/*" multiple='true' type="file" id="image-input" value="" >
                            </span>
                            <span class="fileinput-filename"></span>
                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                        </div>
                    @else
                        @include('admin.add-images.cropper', ['images' => $gallery->images])
                    @endif
                </div>
            </div>

        </div>
        @foreach(config('translatable.locales') as $locale)
            <div class="tab-pane fade" id={{$locale}} role="tabpanel"
                aria-labelledby={{$locale}}>
                <div class="border p-4 mb-4 bg-light rounded">
                    @include('admin.multi_lang_inputs.text_input', [
                            'item' => isset($gallery) ? $gallery : null, 'itemProperty' => 'title', 'translate' => 'translate'])

                    @include('admin.multi_lang_inputs.text_area', [
                            'item' => isset($gallery) ? $gallery : null, 'itemProperty' => 'desc', 'itemName' => 'Description', 'translate' => 'translate'])

                    @include('admin.multi_lang_inputs.text_input', [
                            'item' => isset($gallery) ? $gallery : null, 'itemProperty' => 'keywords', 'translate' => 'translate',
                            'placeholder' => 'set comma (,) after each word'])
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class='col-md-1'>
    <div class='form-sidebar'>
        @include('admin.langPanel')
        <div>
            <button class="btn btn-success full-width mb-15" type="submit">@lang('admin.btns.save')</button>
        </div>
        <div>
            <a href="{{ url('/admin/galleries') }}" title="Back" class='btn btn-warning full-width mb-15'><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</a>
        </div>
    </div>
</div>
@push('scripts')
   <script src="{{ asset('js/translate.js') }}"></script>
@endpush