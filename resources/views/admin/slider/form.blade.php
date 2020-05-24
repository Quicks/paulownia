<div class='col-md-10'>
    <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
        <div class="tab-pane fade active in" id="main-form" role="tabpanel" aria-labelledby="main-form">
            <div class="row">

                <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                    <label for="link" class="control-label col-sm-3">@lang('admin.slider.index.table.link')</label>
                    <input class="form-control col-sm-6" name="link" type="text" value="{{$slider->link}}" required>
                </div>
                <?php $channels = core()->getAllChannels() ?>
                <div class="control-group hidden" :class="[errors.has('channel_id') ? 'has-error' : '']">
                    <label for="channel_id">{{ __('admin::app.settings.sliders.channels') }}</label>
                    <select class="control" id="channel_id" name="channel_id" required>
                        @foreach ($channels as $channel)
                            <option value="{{ $channel->id }}" @if ($channel->id == old('channel_id')) selected @endif>
                                {{ __($channel->name) }}
                            </option>
                        @endforeach
                    </select>
                    <span class="control-error" v-if="errors.has('channel_id')">@{{ errors.first('channel_id') }}</span>
                </div>
                <div class='form-group'>
                    @include('admin.add-images.crop_image', ['image' => $slider->image])
                </div>
            </div>
        </div>
        @foreach(config('translatable.locales') as $locale)
            <div class="tab-pane fade" id={{$locale}} role="tabpanel"
                aria-labelledby={{$locale}}>
                <div class="border p-4 mb-4 bg-light rounded">
                    @include('admin.multi_lang_inputs.text_input', ['item' => $slider, 'itemProperty' => 'title', 'translate' => 'translate'])
                    @include('admin.multi_lang_inputs.text_area', ['item' => $slider, 'itemProperty' => 'text', 'translate' => 'translate'])
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
            <a href="{{ url('/admin/slider') }}" title="Back" class='btn btn-warning full-width mb-15'><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</a>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('js/translate.js') }}"></script>
@endpush