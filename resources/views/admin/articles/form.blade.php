<div class='col-md-11'>

    <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
        <div class="tab-pane fade active in" id="main-form" role="tabpanel" aria-labelledby="main-form">
            <div class="row">
                
                <div class="form-group {{ $errors->has('publish_date') ? 'has-error' : ''}}">
                    <label for="publish_date" class="control-label col-sm-3">@lang('admin.article.index.table.publish_date')</label>
                    <input class="form-control bsdatepicker col-sm-6" name="publish_date" type="text" id="publish_date"
                        value="{{ isset($article->publish_date) ? $article->publish_date : ''}}" data-date-format='yyyy-mm-dd' required>
                    {!! $errors->first('publish_date', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                    <label for="active" class="control-label col-sm-3">@lang('admin.article.index.table.publish')</label>
                    <div class='col-sm-6'>
                        <input type="radio" 
                                id="active-checkbox"
                                data-on-color="primary"
                                name="active"
                                class="input-switch-alt "
                                value="{{$article->active}}"
                                checked=''
                                data-size="medium"
                                data-on-text="0"
                                data-off-text="1">
                    </div>
                </div>
                <div class='form-group'>

                    @include('admin.add-images.cropper', ['images' => $article->images])
                    <!-- @if($formMode === 'edit')
                        <label for="images" class="control-label col-sm-3">@lang('admin.article.index.table.images')</label>
                        <div class='images col-sm-6'>
                            @foreach ($article->images as $image)
                                <div class='image-editor-wrapper'>
                                    <img src="/storage/{{$image->image}}" class='img-responsive'/>
                                    <div class="image-editor-panel">
                                        <a class='edit-img-btn' href="{{ url('/admin/image_crop/' . $image->id) }}" title="Crop Image">
                                            <i class="glyph-icon tooltip-button icon-edit" title="" data-original-title="@lang('admin.btns.crop')"></i>
                                        </a>
                                        <a class="btn btn-sm delete-img-btn" title="Delete image" onclick="deleteImage({{$image->id}});" >
                                            <i class="glyph-icon tooltip-button icon-trash" title="" data-original-title="@lang('admin.btns.delete_image')"></i>
                                        </a>
                                    </div>
                                </div>
                                @include ('admin.add-images.edit_image_form')
                                <hr>
                            @endforeach
                        </div>
                        
                    @endif -->
                </div>
            </div>

        </div>
        @foreach(config('translatable.locales') as $locale)
            <div class="tab-pane fade" id={{$locale}} role="tabpanel"
                aria-labelledby={{$locale}}>
                <div class="border p-4 mb-4 bg-light rounded">
                    @include('admin.multi_lang_inputs.text_input', [
                            'item' => isset($article) ? $article : null, 'itemProperty' => 'title', 'translate' => 'translate'])

                    @include('admin.multi_lang_inputs.text_area', [
                            'item' => isset($article) ? $article : null, 'itemProperty' => 'text', 'translate' => 'translate'])

                    @include('admin.multi_lang_inputs.text_input', [
                            'item' => isset($article) ? $article : null, 'itemProperty' => 'keywords', 'translate' => 'translate',
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
<div class='col-md-1'>
    <div class='form-sidebar'>
        @include('admin.langPanel')
        <div>
            <button class="btn btn-success full-width mb-15" type="submit">@lang('admin.btns.save')</button>
        </div>
        <div>
            <a href="{{ url('/admin/articles') }}" title="Back" class='btn btn-warning full-width mb-15'><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</a>
        </div>
    </div>
</div>
@push('scripts')
   <script src="{{ asset('js/translate.js') }}"></script>
@endpush