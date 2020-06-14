<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label col-sm-3">{{ 'Name' }}</label>
    <input class="form-control col-sm-6" name="name" type="text" id="name" value="{{ isset($certificate->name) ? $certificate->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="control-label col-sm-3">@lang('admin.certificates.index.table.publish')</label>
    <div class='col-sm-6'>
        <input type="radio" 
                id="active-checkbox"
                data-on-color="primary"
                name="active"
                class="input-switch-alt "
                value="{{$certificate->active}}"
                checked=''
                data-size="medium"
                data-on-text="0"
                data-off-text="1">
    </div>
</div>
<div class="form-group {{ $errors->has('string1') ? 'has-error' : ''}}">
    <label for="string1" class="control-label col-sm-3">{{ 'String1' }}</label>
    <input class="form-control col-sm-6" name="string1" type="text" id="string1" value="{{ isset($certificate->string1) ? $certificate->string1 : ''}}" required>
    {!! $errors->first('string1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('string2') ? 'has-error' : ''}}">
    <label for="string2" class="control-label col-sm-3">{{ 'String2' }}</label>
    <input class="form-control col-sm-6" name="string2" type="text" id="string2" value="{{ isset($certificate->string2) ? $certificate->string2 : ''}}" required>
    {!! $errors->first('string2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('string3') ? 'has-error' : ''}}">
    <label for="string3" class="control-label col-sm-3">{{ 'String3' }}</label>
    <input class="form-control col-sm-6" name="string3" type="text" id="string3" value="{{ isset($certificate->string3) ? $certificate->string3 : ''}}" required>
    {!! $errors->first('string3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
    <label for="text" class="control-label col-sm-3">{{ 'Text' }}</label>
    <textarea class="form-control col-sm-6" rows="5" name="text" type="textarea" id="text" >{{ isset($certificate->text) ? $certificate->text : ''}}</textarea>
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label col-sm-3">{{ 'Date' }}</label>
    <input class="form-control col-sm-6 bsdatepicker" name="date" type="date" id="date" value="{{ isset($certificate->date) ? $certificate->date : ''}}" data-date-format='yyyy-mm-dd' required>
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
