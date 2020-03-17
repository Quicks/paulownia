<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">
        @foreach($topics as $topic)
            <div class="radio form-group {{ $errors->has('content_id') ? 'has-error' : ''}}">
                <label for="content_id">
                    <input name="content_id" type="radio" value="{{$topic->id}}"
                    @if(!empty($faq->content_id) && $faq->content_id == $topic->id) checked @endif>
                    {{html_entity_decode(strip_tags($topic->text))}}
                </label>
                {!! $errors->first('content_id', '<p class="help-block">:message</p>') !!}
            </div>
        @endforeach
    </div>
    @foreach(config('translatable.locales') as $locale)
        <div class="tab-pane fade" id={{$locale}} role="tabpanel"
             aria-labelledby={{$locale}}>
            <div class="border p-4 mb-4 bg-light rounded">
                @include('admin.multi_lang_inputs.text_input', [
                        'item' => isset($faq) ? $faq : null, 'itemProperty' => 'question', 'translate' => 'translate'])

                @include('admin.multi_lang_inputs.text_area', [
                        'item' => isset($faq) ? $faq : null, 'itemProperty' => 'answer', 'translate' => 'translate'])

            </div>
            @if($locale == 'es')
                <div class="text-center">
                    <button id="translate" type="button" class="btn btn-warning mb-2">Translate from Spanish to rest of languages</button>
                </div>
            @endif
        </div>
    @endforeach
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@push('scripts')
    <script src="{{ asset('js/translate.js') }}"></script>
@endpush
