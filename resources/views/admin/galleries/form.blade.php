<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($gallery->name) ? $gallery->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="control-label">{{ 'Active' }}</label>
    <div class="radio">
    <label><input name="active" type="radio" value="1" {{ (isset($gallery) && 1 == $gallery->active) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="active" type="radio" value="0" @if (isset($gallery)) {{ (0 == $gallery->active) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>

@foreach(config('translatable.locales') as $locale)
    <div class="form-group {{ $errors->has($locale.'[title]') ? 'has-error' : ''}}">
        <label for="{{$locale.'[title]'}}" class="control-label">{{ 'Galery title ('.$locale.')' }}</label>
        <input class="form-control" name="{{$locale.'[title]'}}" type="text" id="{{$locale.'[title]'}}" 
            value="{{ isset($gallery) && isset($gallery->translate($locale)->title) ? $gallery->translate($locale)->title : ''}}">
        {!! $errors->first($locale.'[title]', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has($locale.'[desc]') ? 'has-error' : ''}}">
        <label for="{{$locale.'[desc]'}}" class="control-label">{{ 'Galery description ('.$locale.')' }}</label>
        <textarea class="form-control" rows="5" name="{{$locale.'[desc]'}}" type="textarea" id="{{$locale.'[desc]'}}" >
            {{ isset($gallery) && isset($gallery->translate($locale)->desc) ? $gallery->translate($locale)->desc : ''}}
        </textarea>
        {!! $errors->first($locale.'[desc]', '<p class="help-block">:message</p>') !!}
    </div>
@endforeach

    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        <label for="image" class="control-label">Image</label>
         <input class="form-control" name="image" type="file" id="image" value="">

        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>

@foreach(config('translatable.locales') as $locale)
    <div class="form-group {{ $errors->has('image_atr['.$locale.'][title]') ? 'has-error' : ''}}">
        <label for="{{'image_atr['.$locale.'][title]'}}" class="control-label">{{ 'Image title ('.$locale.')' }}</label>
        <input class="form-control" name="{{'image_atr['.$locale.'][title]'}}" type="text" id="{{'image_atr['.$locale.'][title]'}}" 
            value="">
        {!! $errors->first('image_atr['.$locale.'][title]', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('image_atr['.$locale.'][desc]') ? 'has-error' : ''}}">
        <label for="{{'image_atr['.$locale.'][desc]'}}" class="control-label">{{ 'Image description ('.$locale.')' }}</label>
        <textarea class="form-control" rows="5" name="{{'image_atr['.$locale.'][desc]'}}" type="textarea" id="{{'image_atr['.$locale.'][desc]'}}" >
            
        </textarea>
        {!! $errors->first('image_atr['.$locale.'][desc]', '<p class="help-block">:message</p>') !!}
    </div>
@endforeach


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
