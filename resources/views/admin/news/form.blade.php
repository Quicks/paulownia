<a href="{{ url('/admin/news') }}" title="Back">
    <button class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
                                              aria-hidden="true"></i>
        Back
    </button>
</a>


<br>
<br>


<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="main-form" role="tabpanel"
         aria-labelledby="main-form">


        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="name" class="control-label">{{ 'Name' }}</label>
            <input class="form-control" name="name" type="text" id="name"
                   value="{{ isset($news->name) ? $news->name : ''}}" required>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>


        <div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
            <label for="active" class="control-label">{{ 'Active' }}</label>
            <div class="radio">
                <label><input name="active" type="radio"
                              value="1" {{ (isset($news) && 1 == $news->active) ? 'checked' : '' }}> Yes</label>
            </div>
            <div class="radio">
                <label><input name="active" type="radio"
                              value="0" @if (isset($news)) {{ (0 == $news->active) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
                    No</label>
            </div>
            {!! $errors->first('active', '<p class="help-block">:message</p>') !!}

        </div>


        <div class="form-group {{ $errors->has('publish_date') ? 'has-error' : ''}}">
            <label for="publish_date" class="control-label">{{ 'Publish Date' }}</label>
            <input class="form-control" name="publish_date" type="date" id="publish_date"
                   value="{{ isset($news->publish_date) ? $news->publish_date : ''}}" required>
            {!! $errors->first('publish_date', '<p class="help-block">:message</p>') !!}
        </div>


    </div>


    @foreach(config('translatable.locales') as $locale)

        <div class="tab-pane fade" id={{$locale}} role="tabpanel"
             aria-labelledby={{$locale}}>
            <div class="border p-4 mb-4 bg-light rounded part-form">
                <div class="form-group {{ $errors->has($locale.'[title]') ? 'has-error' : ''}}">
                    <label for="{{$locale.'[title]'}}" class="control-label">
                        {{ 'Title ('.$locale.')'}}
                    </label>
                    <input class="form-control valid" @if($locale == 'ar') dir="rtl" class="text-right" @endif
                    name="{{$locale.'[title]'}}" type="text"
                           id="{{$locale.'[title]'}}"
                           value="{{ isset($news) && isset($news->translate($locale)->title) ? $news->translate($locale)->title : ''}}"
                    >
                    {!! $errors->first($locale.'[title]', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="form-group {{ $errors->has($locale.'[text]') ? 'has-error' : ''}}">
                    <label for="{{$locale.'[text]'}}" class="control-label">{{ 'Text ('.$locale.')'}}</label>
                    <textarea class="form-control valid" @if($locale == 'ar') dir="rtl" class="text-right" @endif
                    name="{{$locale.'[text]'}}"
                              id="{{$locale.'[text]'}}" rows="3"
                    >{{isset($news) && isset($news->translate($locale)->text) ? $news->translate($locale)->text : ''}}</textarea>
                    {!! $errors->first($locale.'[text]', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


    @endforeach
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
