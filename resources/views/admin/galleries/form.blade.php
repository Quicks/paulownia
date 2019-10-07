<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">
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
    </div>


@foreach(config('translatable.locales') as $locale)
    <div class="tab-pane fade" id="{{$locale}}" role="tabpanel" aria-labelledby="{{$locale}}">
            @include('admin.multi_lang_inputs.text_input', [
                    'item' => isset($gallery) ? $gallery : null, 'itemProperty' => 'title', 'translate' => 'translate'])

            @include('admin.multi_lang_inputs.text_area', [
                    'item' => isset($gallery) ? $gallery : null, 'itemProperty' => 'desc', 'itemName' => 'Description', 'translate' => 'translate'])

            @include('admin.multi_lang_inputs.text_input', [
                    'item' => isset($gallery) ? $gallery : null, 'itemProperty' => 'keywords', 'translate' => 'translate',
                    'placeholder' => 'set comma (,) after each word'])
            @if($locale == 'es')
                <div class="text-center">
                    <button id="translate" type="button" class="btn btn-warning mb-2">Translate from Spanish to rest of languages</button>
                </div>
            @endif
    </div>
@endforeach

    @includeWhen ($formMode === 'create', 'admin.add-images.add_image_form')

    @if($formMode === 'edit')
        @foreach ($gallery->images as $image)
            <h4> Image {{$loop->iteration}}</h4>
            <img class="img-thumbnail w-25 mx-auto d-block" src="{{asset('storage/'.$image->image)}}">
            <div class="text-center m-1">
                <a href="{{ url('/admin/image_crop/' . $image->id) }}" title="Crop Image">
                    <button type="button" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                        Crop image 
                    </button>
                </a>
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
    <input class="btn btn-primary" form="gallery-form" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>


@push('scripts')
   <script src="{{ asset('js/translate.js') }}"></script>
@endpush