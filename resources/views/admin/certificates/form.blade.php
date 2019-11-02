<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($certificate->name) ? $certificate->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode == 'edit')
    <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
        <label for="active" class="control-label">{{ 'Active' }}</label>
        <div class="radio">
            <label><input name="active" type="radio" value="1" {{ (isset($certificate) && 1 == $certificate->active) ? 'checked' : '' }}> Yes</label>
        </div>
        <div class="radio">
            <label><input name="active" type="radio" value="0" @if (isset($certificate)) {{ (0 == $certificate->active) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
        </div>
        {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
    </div>
@endif
<div class="form-group {{ $errors->has('string1') ? 'has-error' : ''}}">
    <label for="string1" class="control-label">{{ 'String1' }}</label>
    <input class="form-control" name="string1" type="text" id="string1" value="{{ isset($certificate->string1) ? $certificate->string1 : ''}}" required>
    {!! $errors->first('string1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('string2') ? 'has-error' : ''}}">
    <label for="string2" class="control-label">{{ 'String2' }}</label>
    <input class="form-control" name="string2" type="text" id="string2" value="{{ isset($certificate->string2) ? $certificate->string2 : ''}}" required>
    {!! $errors->first('string2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('string3') ? 'has-error' : ''}}">
    <label for="string3" class="control-label">{{ 'String3' }}</label>
    <input class="form-control" name="string3" type="text" id="string3" value="{{ isset($certificate->string3) ? $certificate->string3 : ''}}" required>
    {!! $errors->first('string3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
    <label for="text" class="control-label">{{ 'Text' }}</label>
    <textarea class="form-control" rows="5" name="text" type="textarea" id="text" >{{ isset($certificate->text) ? $certificate->text : ''}}</textarea>
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($certificate->date) ? $certificate->date : ''}}" required>
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
