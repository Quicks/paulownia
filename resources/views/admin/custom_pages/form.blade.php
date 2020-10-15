<div class='col-md-10'>

    <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
        <div class="tab-pane fade active in" id="main-form" role="tabpanel" aria-labelledby="main-form">
            <div class="row">

                <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                    <label for="link" class="control-label col-sm-3">@lang('admin.menu.index.link')</label>
                    <input class="form-control col-sm-6" name="link" type="text" id="link"
                        value="{{ isset($custom_page->link) ? $custom_page->link : old('link')}}" required>
                    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
                </div>
                
                <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                    <label for="parent_id" class="control-label col-sm-3">@lang('admin.custom_pages.index.table.parent_link')</label>
                    <select class="form-control col-sm-6" name="parent_id" type="text" id="parent_id"
                        value="{{ isset($custom_page->parent_id) ? $custom_page->parent_id : ''}}">
                        <option>Выберите родителя</option>
                        @foreach($possibleParents as $possible_parent)
                            @if($possible_parent->id == $custom_page->parent_id)
                                <option selected='selected' value="{{$possible_parent->id}}">{{$possible_parent->link}}</option>
                            @else
                                <option value="{{$possible_parent->id}}">{{$possible_parent->link}}</option>
                            @endif
                        @endforeach
                    </select>
                    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>
        @foreach(config('translatable.locales') as $locale)
            <div class="tab-pane fade" id={{$locale}} role="tabpanel" aria-labelledby={{$locale}}>
                <div class="border p-4 mb-4 bg-light rounded">
                    @include('admin.multi_lang_inputs.text_input', [
                            'item' => isset($custom_page) ? $custom_page : null, 'itemProperty' => 'title', 'translate' => 'translate'])

                    @include('admin.multi_lang_inputs.text_area', [
                            'item' => isset($custom_page) ? $custom_page : null, 'itemProperty' => 'description', 'translate' => 'translate'])

                    @include('admin.multi_lang_inputs.text_input', [
                            'item' => isset($custom_page) ? $custom_page : null, 'itemProperty' => 'keywords', 'translate' => 'translate',
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
            <a href="{{ url('/admin/custom_pages') }}" title="Back" class='btn btn-warning full-width mb-15'><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</a>
        </div>
    </div>
</div>
@push('scripts')
   <script src="{{ asset('js/translate.js') }}"></script>
@endpush

