<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">

        <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
            <label for="file" class="control-label">File</label>
            <input class="form-control" name="file" type="file" id="file" value="">

            {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    @foreach(config('translatable.locales') as $locale)
        <div class="tab-pane fade" id="{{$locale}}4" role="tabpanel" aria-labelledby="{{$locale}}">
            <div class="form-group {{ $errors->has('file_atr['.$locale.'][title]') ? 'has-error' : ''}}">
                <label for="{{'file_atr['.$locale.'][title]'}}" class="control-label">{{ 'File title ('.$locale.')' }}</label>
                <input class="form-control" name="{{'file_atr['.$locale.'][title]'}}" type="text" id="{{'file_atr['.$locale.'][title]'}}" value="">
                {!! $errors->first('file_atr['.$locale.'][title]', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('file_atr['.$locale.'][desc]') ? 'has-error' : ''}}">
                <label for="{{'file_atr['.$locale.'][desc]'}}" class="control-label">{{ 'File description ('.$locale.')' }}</label>
                <textarea class="form-control" rows="5" name="{{'file_atr['.$locale.'][desc]'}}" type="textarea" id="{{'file_atr['.$locale.'][desc]'}}" >

                </textarea>
                {!! $errors->first('file_atr['.$locale.'][desc]', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    @endforeach
</div>
