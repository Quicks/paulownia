<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="main-form" role="tabpanel" aria-labelledby="main-form">

        <div id="image-input-div" class="form-group  {{ $errors->has('image') ? 'has-error' : ''}}">
            <label for="image" class="control-label">Image</label>
             <input class="form-control" name="image" accept="image/*" type="file" id="image-input" value="">

            {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
        </div>

        <div id="cropper-div" class="m-2 d-none">
            <div>
                <img id="image-crop" style="max-width:100%; min-height: 400px; min-width: 400px;">
            </div>
        
            <div class="text-center">
                <button id="rot1" type="button" class="btn btn-info"><i class="fa fa-rotate-right" aria-hidden="true"></i> 90&deg; </button>
                <button id="rot2" type="button" class="btn btn-info"><i class="fa fa-rotate-left" aria-hidden="true"></i> -90&deg; </button>
                <button id="rot3" type="button" class="btn btn-info"><i class="fa fa-rotate-right" aria-hidden="true"></i> 3&deg; </button>
                <button id="rot4" type="button" class="btn btn-info"><i class="fa fa-rotate-left" aria-hidden="true"></i> -3&deg; </button>
                <button id="scalex" type="button" class="btn btn-info"><i class="fa fa-arrows-h" aria-hidden="true"></i>  </button>
                <button id="scaley" type="button" class="btn btn-info"><i class="fa fa-arrows-v" aria-hidden="true"></i> </button>
                <button id="reset" type="button" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Reset </button>
                <strong>  Add watermark  </strong>
                <input type="checkbox" name="watermark">
            </div>
        </div>

    </div>

    @foreach(config('translatable.locales') as $locale)
        <div class="tab-pane fade" id="{{$locale}}2" role="tabpanel" aria-labelledby="{{$locale}}">
            <div class="form-group {{ $errors->has('image_atr['.$locale.'][title]') ? 'has-error' : ''}}">
                <label for="{{'image_atr['.$locale.'][title]'}}" class="control-label">{{ 'Image title ('.$locale.')' }}</label>
                <input class="form-control" name="{{'image_atr['.$locale.'][title]'}}" type="text" id="{{'image_atr['.$locale.'][title]'}}" value="">
                {!! $errors->first('image_atr['.$locale.'][title]', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('image_atr['.$locale.'][desc]') ? 'has-error' : ''}}">
                <label for="{{'image_atr['.$locale.'][desc]'}}" class="control-label">{{ 'Image description ('.$locale.')' }}</label>
                <textarea class="form-control" rows="5" name="{{'image_atr['.$locale.'][desc]'}}" type="textarea" id="{{'image_atr['.$locale.'][desc]'}}" >

                </textarea>
                {!! $errors->first('image_atr['.$locale.'][desc]', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    @endforeach
</div>

@push('scripts')
<link  href="{{asset('css/cropper.min.css')}}" rel="stylesheet">
<script src="{{asset('js/cropper.min.js')}}"></script>
<script type='text/javascript'>
    $(document).ready(function () {

        function initCropper() {
            const image = document.getElementById('image-crop');
            const cropper = new Cropper(image, {
              aspectRatio: 1 / 1,
            });

            $('#rot1').click(function () {cropper.rotate(90);});
            $('#rot2').click(function () {cropper.rotate(-90);});
            $('#rot3').click(function () {cropper.rotate(3);});
            $('#rot4').click(function () {cropper.rotate(-3);});
            $('#scalex').click(function () {cropper.scaleX(-1);});
            $('#scaley').click(function () {cropper.scaleY(-1);});
            $('#reset').click(function () {cropper.reset();});

            $('form').submit(function saveCrop (event) {
                event.preventDefault();
                cropper.getCroppedCanvas({maxWidth: 2100, maxHeight: 2100,}).toBlob((blob) => {
                  var form = $('form')[0];
                  const formData = new FormData(form);
                  formData.append('image', blob);
                  $.ajax($('form').attr('action'), {
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success() {
                        history.back();
                    },
                    error() {
                      console.log('Upload error');
                    },
                  });
                });
            });
        };

        $('#image-input').change(function (event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-crop');
                output.src = reader.result;
                initCropper();
                $('#cropper-div').removeClass('d-none');
            }
            reader.readAsDataURL(event.target.files[0]);
            $('#image-input-div').remove();
        });

    });
</script>
@endpush
