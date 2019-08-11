@foreach(config('translatable.locales') as $locale)
    <div class="tab-pane fade" id="{{$locale}}2" role="tabpanel" aria-labelledby="{{$locale}}">
        <div class="form-group {{ $errors->has('image_atr['.$image->id.']['.$locale.'][title]') ? 'has-error' : ''}}">
            <label for="{{'image_atr['.$image->id.']['.$locale.'][title]'}}"
                   class="control-label">{{ 'Image title ('.$locale.')' }}</label>
            <input class="form-control" name="{{'image_atr['.$image->id.']['.$locale.'][title]'}}" type="text"
                   id="{{'image_atr['.$image->id.']['.$locale.'][title]'}}"
                   value="@isset($image->translate($locale)->title) {{$image->translate($locale)->title}} @endisset">
            {!! $errors->first('image_atr['.$image->id.']['.$locale.'][title]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('image_atr['.$image->id.']['.$locale.'][desc]') ? 'has-error' : ''}}">
            <label for="{{'image_atr['.$image->id.']['.$locale.'][desc]'}}"
                   class="control-label">{{ 'Image description ('.$locale.')' }}</label>
            <textarea class="form-control" rows="5" name="{{'image_atr['.$image->id.']['.$locale.'][desc]'}}"
                      type="textarea"
                      id="{{'image_atr['.$image->id.']['.$locale.'][desc]'}}">
                @isset($image->translate($locale)->desc) {{$image->translate($locale)->desc}} @endisset
            </textarea>
            {!! $errors->first('image_atr['.$image->id.']['.$locale.'][desc]', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endforeach

@push('scripts')
    <script type="text/javascript">
        //delete image form creates here because otherwise it becomes nested in gallery form (html prohibits nested forms)
        function deleteImage(imageId) {
            if (confirm('Confirm image delete?')) {
                var formImgDelHTML = '<form method="POST" action="{{url('/admin/image_del/')}}/' + imageId + '" accept-charset="UTF-8">{!! method_field('DELETE') . csrf_field() !!}</form>';

                $(formImgDelHTML).appendTo('body').submit();
            }
        };
    </script>
@endpush