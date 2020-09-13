<div class='col-md-10'>

    <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
        <div class="tab-pane fade active in" id="main-form" role="tabpanel" aria-labelledby="main-form">
            <div class="row">

                <div class="form-group {{ $errors->has('publish_date') ? 'has-error' : ''}}">
                    <label for="publish_date" class="control-label col-sm-3">@lang('admin.news.index.table.publish_date')</label>
                    <input class="form-control bsdatepicker col-sm-6" name="publish_date" type="text" id="publish_date"
                        value="{{ isset($news->publish_date) ? $news->publish_date : ''}}" data-date-format='yyyy-mm-dd' required>
                    {!! $errors->first('publish_date', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                    <label for="active" class="control-label col-sm-3">@lang('admin.news.index.table.publish')</label>
                    <div class='col-sm-6'>
                        <input type="radio"
                                id="active-checkbox"
                                data-on-color="primary"
                                name="active"
                                class="input-switch-alt "
                                value="{{$news->active}}"
                                checked=''
                                data-size="medium"
                                data-on-text="0"
                                data-off-text="1">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('video') ? 'has-error' : ''}}">
                    <label for="name" class="control-label col-sm-3">@lang('admin.news.index.table.video')</label>
                    <input class="form-control col-sm-6" name="video" type="url" id="video"
                        value="{{ isset($news->video) ? $news->video : ''}}">
                    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
                </div>

                <div class='form-group'>
                    @include('admin.add-images.cropper', ['images' => $news->images])
                </div>
            </div>

        </div>
        @foreach(config('translatable.locales') as $locale)
            <div class="tab-pane fade" id={{$locale}} role="tabpanel"
                aria-labelledby={{$locale}}>
                <div class="border p-4 mb-4 bg-light rounded">
                    @include('admin.multi_lang_inputs.text_input', [
                            'item' => isset($news) ? $news : null, 'itemProperty' => 'title', 'translate' => 'translate'])

                    @include('admin.multi_lang_inputs.text_area', [
                            'item' => isset($news) ? $news : null, 'itemProperty' => 'text', 'translate' => 'translate'])

                    @include('admin.multi_lang_inputs.text_input', [
                            'item' => isset($news) ? $news : null, 'itemProperty' => 'keywords', 'translate' => 'translate',
                            'placeholder' => 'set comma (,) after each word'])
                </div>
                @if($locale == 'es')
                    <div class="text-center">
                        <button id="translate" type="button" class="btn btn-warning mb-2">
                            @lang('admin.form.translate_to_other')
                        </button>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
<div class='col-md-2'>
    <div class='form-sidebar'>
        @include('admin.langPanel')
        <div>
            <button class="btn btn-success full-width mb-15" type="submit">@lang('admin.btns.save')</button>
        </div>
        <div>
            <a href="{{ url('/admin/news') }}" title="Back" class='btn btn-warning full-width mb-15'><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</a>
        </div>
    </div>
</div>
@push('scripts')
   <script src="{{ asset('js/translate.js') }}"></script>
@endpush