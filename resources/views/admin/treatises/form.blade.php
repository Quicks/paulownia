<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="main-form" role="tabpanel"
         aria-labelledby="main-form">
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
        <div class="form-group {{ $errors->has('publish_date') ? 'has-error' : ''}}">
            <label for="publish_date" class="control-label">{{ 'Publish Date' }}</label>
            <input class="form-control" name="publish_date" type="date" id="publish_date" value="{{ isset($treatise->publish_date) ? $treatise->publish_date : ''}}" required>
            {!! $errors->first('publish_date', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    @foreach(config('translatable.locales') as $locale)
        <div class="tab-pane fade" id={{$locale}} role="tabpanel"
             aria-labelledby={{$locale}}>
                <div class="border p-4 mb-4 bg-light rounded">
                    <div class="form-group {{ $errors->has($locale.'[title]') ? 'has-error' : ''}}">
                        <label for="{{$locale.'[title]'}}" class="control-label">
                            {{ 'Title ('.$locale.')'}}
                        </label>
                        <input class="form-control" @if($locale == 'ar') dir="rtl" class="text-right" @endif
                        name="{{$locale.'[title]'}}" type="text"
                               id="{{$locale.'[title]'}}"
                               value="{{ isset($treatise) && isset($treatise->translate($locale)->title) ? $treatise->translate($locale)->title : ''}}"
                        >
                        {!! $errors->first($locale.'[title]', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has($locale.'[text]') ? 'has-error' : ''}}">
                        <label for="{{$locale.'[text]'}}" class="control-label">{{ 'Text ('.$locale.')'}}</label>
                        <textarea class="form-control" @if($locale == 'ar') dir="rtl" class="text-right" @endif
                        name="{{$locale.'[text]'}}"
                                  id="{{$locale.'[text]'}}" rows="3"
                        >{{isset($treatise) && isset($treatise->translate($locale)->text) ? $treatise->translate($locale)->text : ''}}</textarea>
                        {!! $errors->first($locale.'[text]', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group {{ $errors->has($locale.'[keywords]') ? 'has-error' : ''}}">
                        <label for="{{$locale.'[keywords]'}}" class="control-label">
                            {{ 'Keywords ('.$locale.').      '}}
                            <small>Set comma (,) after each word</small>
                        </label>
                        <input class="form-control" @if($locale == 'ar') dir="rtl" class="text-right" @endif
                        name="{{$locale.'[keywords]'}}" type="text"
                               id="{{$locale.'[keywords]'}}"
                               placeholder="Set comma (,) after each word" 
                               value="{{ isset($treatise) && isset($treatise->translate($locale)->keywords) ? $treatise->translate($locale)->keywords : ''}}"
                        >
                         {!! $errors->first($locale.'[keywords]', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
        </div>
    @endforeach

    @includeWhen ($formMode === 'create', 'admin.upload-files.add_file_form')

    @if($formMode === 'edit')
        @foreach ($treatise->files as $file)
            <div class="text-center m-1">
                <a href="{{asset('storage/'.$file->file)}}" target="_blank">
                    <h6> {{basename($file->file)}}</h6>
                </a>
                <button type="button" class="btn btn-danger btn-sm" title="Delete file" onclick="deleteFile({{$file->id}});" >
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    Delete file
                </button>
            </div>

            @include ('admin.upload-files.edit_file_form')

        @endforeach
    @endif
</div>

<div class="form-group text-right">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>