<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="name" class="control-label">{{ 'Name' }}</label>
            <input class="form-control" name="name" type="text" readonly
                   id="name" value="{{ isset($content->name) ? $content->name : ''}}" required>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    @foreach(config('translatable.locales') as $locale)
        <div class="tab-pane fade" id={{$locale}} role="tabpanel"
             aria-labelledby={{$locale}}>
            <div class="border p-4 mb-4 bg-light rounded">
                @include('admin.multi_lang_inputs.text_area', [
                            'item' => isset($content) ? $content : null, 'itemProperty' => 'text', 'translate' => 'translate'])
            </div>
            @if($locale == 'es')
                <div class="text-center">
                    <button id="translate" type="button" class="btn btn-warning mb-2">Translate from Spanish to rest of
                        languages
                    </button>
                </div>
            @endif
        </div>
    @endforeach
</div>


<div class="form-group text-right">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@push('scripts')
    <script src="{{ asset('js/translate.js') }}"></script>
@endpush
