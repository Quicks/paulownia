@foreach(config('translatable.locales') as $locale)
    <div class="tab-pane fade" id="{{$locale}}2" role="tabpanel" aria-labelledby="{{$locale}}">
        <div class="form-group {{ $errors->has('file_atr['.$file->id.']['.$locale.'][title]') ? 'has-error' : ''}}">
            <label for="{{'file_atr['.$file->id.']['.$locale.'][title]'}}"
                   class="control-label">{{ 'File title ('.$locale.')' }}</label>
            <input @if($locale == 'ar') dir="rtl" @endif class="form-control" name="{{'file_atr['.$file->id.']['.$locale.'][title]'}}" type="text"
                   id="{{'file_atr['.$file->id.']['.$locale.'][title]'}}"
                   value="@isset($file->translate($locale)->title) {{$file->translate($locale)->title}} @endisset">
            {!! $errors->first('file_atr['.$file->id.']['.$locale.'][title]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('file_atr['.$file->id.']['.$locale.'][desc]') ? 'has-error' : ''}}">
            <label for="{{'file_atr['.$file->id.']['.$locale.'][desc]'}}"
                   class="control-label">{{ 'File description ('.$locale.')' }}</label>
            <textarea @if($locale == 'ar') dir="rtl" @endif class="form-control" rows="5" name="{{'file_atr['.$file->id.']['.$locale.'][desc]'}}"
                      type="textarea" id="{{'file_atr['.$file->id.']['.$locale.'][desc]'}}">
                @isset($file->translate($locale)->desc) {{$file->translate($locale)->desc}} @endisset
            </textarea>
            {!! $errors->first('file_atr['.$file->id.']['.$locale.'][desc]', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endforeach

@push('scripts')
    <script type="text/javascript">
        function deleteFile(fileId) {
            if (confirm('Confirm file delete?')) {
                var formFileDelHTML = '<form method="POST" action="{{url('/admin/file_del/')}}/' + fileId + '" accept-charset="UTF-8">{!! method_field('DELETE') . csrf_field() !!}</form>';

                $(formFileDelHTML).appendTo('body').submit();
            }
        };
    </script>
@endpush