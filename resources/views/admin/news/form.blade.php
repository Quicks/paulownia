<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
                <label for="active" class="control-label">{{ 'Active' }}</label>


                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="radio">
                                <label><input name="active" type="radio" value="1" {{ (isset($news) && 1 == $news->active) ? 'checked' : '' }}> Yes</label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="radio">
                                <label><input name="active" type="radio" value="0" @if (isset($news)) {{ (0 == $news->active) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
                            </div>
                            {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>





            </div>
        </div>
        <div class="col-sm">
            <div class="form-group {{ $errors->has('publish_date') ? 'has-error' : ''}}">
                <label for="publish_date" class="control-label">{{ 'Publish Date' }}</label>
                <input class="form-control" name="publish_date" type="date" id="publish_date" value="{{ isset($news->publish_date) ? $news->publish_date : ''}}" required>
                {!! $errors->first('publish_date', '<p class="help-block">:message</p>') !!}
            </div>

        </div>


    </div>
</div>



<div class="container">
    <div class="tab-content" id="nav-tabContent">
@foreach(config('translatable.locales') as $locale)

    <div class="tab-pane fade" id={{$locale}} role="tabpanel" aria-labelledby={{$locale}}>
        <div class="border p-4 mb-4 bg-light rounded">
            <div class="form-group {{ $errors->has($locale.'[title]') ? 'has-error' : ''}}">
                <label for="{{$locale.'[title]'}}" class="control-label">
                    {{ 'Title ('.$locale.')'}}
                </label>
                <input class="form-control" @if($locale == 'ar') dir="rtl" class="text-right" @endif
                name="{{$locale.'[title]'}}" type="text"
                       id="{{$locale.'[title]'}}"
                       value="{{ isset($news) && isset($news->translate($locale)->title) ? $news->translate($locale)->title : ''}}"
                >
                {!! $errors->first($locale.'[title]', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {{ $errors->has($locale.'[text]') ? 'has-error' : ''}}">
                <label for="{{$locale.'[text]'}}" class="control-label">{{ 'Text ('.$locale.')'}}</label>
                <textarea class="form-control" @if($locale == 'ar') dir="rtl" class="text-right" @endif
                name="{{$locale.'[text]'}}"
                          id="{{$locale.'[text]'}}" rows="3"
                >{{isset($news) && isset($news->translate($locale)->text) ? $news->translate($locale)->text : ''}}</textarea>
                {!! $errors->first($locale.'[text]', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>


@endforeach
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
