<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="name" class="control-label">{{ 'Name' }}</label>
            <input class="form-control" name="name" type="text" id="name" value="{{ isset($office->name) ? $office->name : ''}}" required>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('postcode') ? 'has-error' : ''}}">
            <label for="postcode" class="control-label">{{ 'Postcode' }}</label>
            <input class="form-control" name="postcode" type="text" id="postcode" value="{{ isset($office->postcode) ? $office->postcode : ''}}" >
            {!! $errors->first('postcode', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
            <label for="phone" class="control-label">{{ 'Phone' }}</label>
            <input class="form-control" name="phone" type="tel" id="phone" value="{{ isset($office->phone) ? $office->phone : ''}}" >
            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <label for="email" class="control-label">{{ 'Email' }}</label>
            <input class="form-control" name="email" type="email" id="email" value="{{ isset($office->email) ? $office->email : ''}}" required>
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('website') ? 'has-error' : ''}}">
            <label for="website" class="control-label">{{ 'Website' }}</label>
            <input class="form-control" name="website" type="url" id="website" value="{{ isset($office->website) ? $office->website : ''}}" >
            {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
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
                           value="{{ isset($office) && isset($office->translate($locale)->title) ? $office->translate($locale)->title : ''}}"
                    >
                    {!! $errors->first($locale.'[title]', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has($locale.'[address]') ? 'has-error' : ''}}">
                    <label for="{{$locale.'[address]'}}" class="control-label">
                        {{ 'Address ('.$locale.')'}}
                    </label>
                    <input class="form-control" @if($locale == 'ar') dir="rtl" class="text-right" @endif
                    name="{{$locale.'[address]'}}" type="text"
                           id="{{$locale.'[address]'}}"
                           value="{{ isset($office) && isset($office->translate($locale)->address) ? $office->translate($locale)->address : ''}}"
                    >
                    {!! $errors->first($locale.'[address]', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has($locale.'[city]') ? 'has-error' : ''}}">
                    <label for="{{$locale.'[city]'}}" class="control-label">
                        {{ 'City ('.$locale.')'}}
                    </label>
                    <input class="form-control" @if($locale == 'ar') dir="rtl" class="text-right" @endif
                    name="{{$locale.'[city]'}}" type="text"
                           id="{{$locale.'[city]'}}"
                           value="{{ isset($office) && isset($office->translate($locale)->city) ? $office->translate($locale)->city : ''}}"
                    >
                    {!! $errors->first($locale.'[city]', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has($locale.'[country]') ? 'has-error' : ''}}">
                    <label for="{{$locale.'[country]'}}" class="control-label">
                        {{ 'Country ('.$locale.')'}}
                    </label>
                    <input class="form-control" @if($locale == 'ar') dir="rtl" class="text-right" @endif
                    name="{{$locale.'[country]'}}" type="text"
                           id="{{$locale.'[city]'}}"
                           value="{{ isset($office) && isset($office->translate($locale)->city) ? $office->translate($locale)->city : ''}}"
                    >
                    {!! $errors->first($locale.'[country]', '<p class="help-block">:message</p>') !!}
                </div>


            </div>
        </div>
    @endforeach

    @includeWhen ($formMode === 'create', 'admin.add-images.add_image_form')

    @if($formMode === 'edit')
        @foreach ($office->images as $image)
            <h4> Image {{$loop->iteration}}</h4>
            <img class="img-thumbnail w-25 mx-auto d-block" src="{{asset('storage/'.$image->image)}}">
            <div class="text-center m-1">
                <button type="button" class="btn btn-danger btn-sm" title="Delete image" onclick="deleteImage({{$image->id}});" >
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    Delete image
                </button>
            </div>

            @include ('admin.add-images.edit_image_form')

        @endforeach
    @endif
</div>
<div class="form-group text-right">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>


