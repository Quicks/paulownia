
<div class='col-md-11'>

    <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
        <div class="tab-pane fade active in" id="main-form" role="tabpanel" aria-labelledby="main-form">
            <div class="row">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name" class="control-label col-sm-3">{{ 'Name' }}</label>
                    <input class="form-control col-sm-6" name="name" type="text" id="name" value="{{ isset($gallery->name) ? $gallery->name : ''}}" required>
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                    <label for="active" class="control-label col-sm-3">@lang('admin.gallery.index.table.publish')</label>
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

                    @include('admin.add-images.cropper', ['images' => $gallery->images])
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