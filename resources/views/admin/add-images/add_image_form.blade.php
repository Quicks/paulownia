<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">

        <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
            <label for="image" class="control-label">Image</label>
             <input class="form-control" name="image" type="file" id="image" value="">

            {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    @foreach(config('translatable.locales') as $locale)
        <div class="tab-pane fade" id="{{$locale}}2" role="tabpanel" aria-labelledby="{{$locale}}">
            <div class="form-group {{ $errors->has('image_atr['.$locale.'][title]') ? 'has-error' : ''}}">
                <label for="{{'image_atr['.$locale.'][title]'}}" class="control-label">{{ 'Image title ('.$locale.')' }}</label>
                <input class="form-control" name="{{'image_atr['.$locale.'][title]'}}" type="text" id="{{'image_atr['.$locale.'][title]'}}" value="">
                {!! $errors->first('image_atr['.$locale.'][title]', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('image_atr['.$locale.'][desc]') ? 'has-error' : ''}}">
                <label for="{{'image_atr['.$locale.'][desc]'}}" class="control-label">{{ 'Image description ('.$locale.')' }}</label>
                <textarea class="form-control" rows="5" name="{{'image_atr['.$locale.'][desc]'}}" type="textarea" id="{{'image_atr['.$locale.'][desc]'}}" >

                </textarea>
                {!! $errors->first('image_atr['.$locale.'][desc]', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    @endforeach
</div>
