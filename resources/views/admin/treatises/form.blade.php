<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($treatise->name) ? $treatise->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="control-label">{{ 'Active' }}</label>
    <div class="radio">
    <label><input name="active" type="radio" value="1" {{ (isset($treatise) && 1 == $treatise->active) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="active" type="radio" value="0" @if (isset($treatise)) {{ (0 == $treatise->active) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>

@foreach(config('translatable.locales') as $locale)
    <div class="border p-4 mb-4 bg-light rounded part-form">
        <div class="form-group {{ $errors->has($locale.'[title]') ? 'has-error' : ''}}">
            <label for="{{$locale.'[title]'}}" class="control-label">
                {{ 'Title ('.$locale.')'}}
            </label>
            <input class="form-control valid" @if($locale == 'ar') dir="rtl" class="text-right" @endif
            name="{{$locale.'[title]'}}" type="text"
                   id="{{$locale.'[title]'}}"
                   value="{{ isset($treatise) && isset($treatise->translate($locale)->title) ? $treatise->translate($locale)->title : ''}}"
            >
            {!! $errors->first($locale.'[title]', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has($locale.'[text]') ? 'has-error' : ''}}">
            <label for="{{$locale.'[text]'}}" class="control-label">{{ 'Text ('.$locale.')'}}</label>
            <textarea class="form-control valid" @if($locale == 'ar') dir="rtl" class="text-right" @endif
            name="{{$locale.'[text]'}}"
                      id="{{$locale.'[text]'}}" rows="3"
            >{{isset($treatise) && isset($treatise->translate($locale)->text) ? $treatise->translate($locale)->text : ''}}</textarea>
            {!! $errors->first($locale.'[text]', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endforeach

<div class="form-group {{ $errors->has('publish_date') ? 'has-error' : ''}}">
    <label for="publish_date" class="control-label">{{ 'Publish Date' }}</label>
    <input class="form-control" name="publish_date" type="date" id="publish_date" value="{{ isset($treatise->publish_date) ? $treatise->publish_date : ''}}">
    {!! $errors->first('publish_date', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

{{--@push('scripts')--}}
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('form').on('submit', function (event) {--}}
                {{--validForm();--}}
            {{--});--}}

            {{--function validForm() {--}}
                {{--var isOneLanguagefilled = false;--}}
                {{--$(".part-form").each(function() {--}}
                    {{--var empty = $(this).find(".valid").filter(function() {--}}
                        {{--return $(this).val().trim() === "";--}}
                    {{--});--}}
                    {{--if (!empty.length) {--}}
                        {{--isOneLanguagefilled = true;--}}
                        {{--return false;--}}
                    {{--}--}}
                {{--});--}}
                {{--if (!isOneLanguagefilled) {--}}
                    {{--event.preventDefault();--}}
                    {{--alert('All fields must be filled in at least one language!');--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}
{{--@endpush--}}
