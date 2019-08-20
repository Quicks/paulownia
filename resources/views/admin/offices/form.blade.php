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
                @include('admin.multi_lang_inputs.text_input', [
                        'item' => isset($office) ? $office : null, 'itemProperty' => 'title'])

                @include('admin.multi_lang_inputs.text_input', [
                        'item' => isset($office) ? $office : null, 'itemProperty' => 'address'])

                @include('admin.multi_lang_inputs.text_input', [
                        'item' => isset($office) ? $office : null, 'itemProperty' => 'city'])

                @include('admin.multi_lang_inputs.text_input', [
                        'item' => isset($office) ? $office : null, 'itemProperty' => 'country'])
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


