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
                    'item' => isset($gallery) ? $gallery : null, 'itemProperty' => 'title'])

            @include('admin.multi_lang_inputs.text_area', [
                    'item' => isset($gallery) ? $gallery : null, 'itemProperty' => 'desc', 'itemName' => 'Description'])

            @include('admin.multi_lang_inputs.text_input', [
                    'item' => isset($gallery) ? $gallery : null, 'itemProperty' => 'keywords',
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
<script type="text/javascript">
    $(document).ready(function () {

        $('#translate').click(function (event) {
            $(this).attr("disabled", true);
            var texts = [];
            $('input[id^="es"],textarea[id^="es"]').each(function() {
                texts.push($(this).val());
            });

            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax("{{route('translate')}}", {
                method: "POST",
                data: {"texts":texts},
                success(answer) {
                    alert("Translate successful, don't forget to save result.");
                    $.each(allLangArr, function (idx, locale) {
                        if(locale != 'es') {
                           $('input[id^="'+locale+'"],textarea[id^="'+locale+'"]').each(function(index ) {
                                $(this).val(htmlDecode(answer[locale][index]));
                            });
                           tinymce.get(locale+'[desc]').setContent(answer[locale][1]);
                        };
                    });
                },
                error(answer) {
                    alert("Translate error, see console for details");
                    console.log(answer);
                }
            });
        });

        function htmlDecode(input){
          var e = document.createElement('textarea');
          e.innerHTML = input;
          return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
        }

    });
</script>
@endpush