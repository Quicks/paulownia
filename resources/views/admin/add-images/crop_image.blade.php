<div class="row">
    <div id="image-input-div" class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        <label for="image" class="control-label col-sm-3">@lang('admin.form.one_crop_label')</label>
        <div class="fileinput fileinput-new col-sm-6" data-provides="fileinput">
            <span class="btn btn-primary btn-file">
                <span class="fileinput-new">@lang('admin.form.file_choose')</span>
                <span class="fileinput-exists">@lang('admin.form.file_change')</span>
                <input class="form-control" name="image" accept="image/*" type="file" id="image-input" value="" 
                    @if(isset($image_required) && $image_required) required @endif>
            </span>
            <span class="fileinput-filename"></span>
            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
        </div>
    </div>
</div>
<div class="row">
    <div id="cropper-div" class="m-2 d-none" style='opacity: 0'>
        <div class='preview' style='height: 200px'></div>
        <div class="text-center m-3 actions">
            <button type="button" class="btn btn-info save-croped-image"><i class="fa fa-refresh" aria-hidden="true"></i> @lang('admin.btns.save') </button> 
            <button id="checkbtn" class="btn btn-outline-info ml-3" type="button">
                <label class="m-0 p-0">
                    <input type="checkbox" name="watermark" 
                    onchange="$('#checkbtn').toggleClass('btn-info btn-outline-info')">
                </label>
            </button>
        </div>
        <div>
            <img id="image-crop" style="max-width:100%; min-height: 400px; min-width: 400px;">
        </div>
    </div>
    <div class='cropped-images col-sm-6 col-sm-offset-3' data-image="{{isset($image) ? $image->toJson() : ''}}"></div>

</div>


@push('scripts')
<link  href="{{asset('css/cropper.min.css')}}" rel="stylesheet">
<script src="{{asset('js/cropper.min.js')}}"></script>
<script type='text/javascript'>
    $(document).ready(function () {

        function initCropper() {
            const image = document.getElementById('image-crop');
            const cropper = new Cropper(image, {
              aspectRatio: 16 / 16,
              preview: '.preview'
            });
            $('.save-croped-image').removeClass('hidden')
            $('#cropper-div').show()
            return cropper;
        };
        var SingleCropperManager = {
            results: [],
            initImage: function(item){
                this.results = {
                    image: '/storage/' + item.image,
                    id: item.id,
                }
                
            },
            setImage: function(dataUrl){
                this.results.image = dataUrl
            },
            buildInputs: function(index, item){
                let inputs = `
                    <input class="form-control" name="images[${index}][image]" value=${item.image}>
                `
                if(item.id){
                    inputs += `<input class="form-control" name="images[${index}][id]" value='${item.id}'>`
                }
                if(item['_destroy']){
                    inputs += `<input class="form-control" name="images[${index}][_destroy]" value=1>`
                }
                return inputs
            },
            rerender: function(){
                $('.cropped-images').empty()
                var html = ''
                var that = this
                let item = this.results
                var el = $(`
                    <div class='cropped-image edit-croped-image ${item['_destroy'] ? 'hidden' : ''}'>
                        ${that.buildInputs(0, item)}
                        <img class='img-responsive' src='${item.image}'>
                        <div class="image-editor-panel">
                            <a class='edit-img-btn' href="#" title="Crop Image">
                                <i class="glyph-icon tooltip-button icon-edit" title=""></i>
                            </a>
                        </div>
                    </div>
                `)
                $('.cropped-images').append(el)
                $('.cropped-images').append('<hr>')
                el.ready(function(){
                    el.find('.edit-img-btn').click(function(e){
                        e.preventDefault()
                        $('#image-crop').attr('src', item.image)
                        SingleCropperManager.cropper = initCropper()
                        $('#cropper-div').css('height', 'auto');
                        $('#cropper-div').css('opacity', 1);
                    })
                })
            }
        }
        let oldImage = $('.cropped-images').data('image')

        if(oldImage){
            SingleCropperManager.initImage(oldImage)
            SingleCropperManager.rerender()
        }

        $('#image-input').change(function (event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-crop');
                output.src = reader.result;
                SingleCropperManager.cropper = initCropper();
                $('#cropper-div').css('height', 'auto');
                $('#cropper-div').css('opacity', 1);
            }

            reader.readAsDataURL(event.target.files[0]);
        });
        $('.save-croped-image').click(function() {
            $(this).addClass('hidden')
            $('#edit').removeClass('hidden')
            SingleCropperManager.setImage(SingleCropperManager.cropper.getCroppedCanvas().toDataURL())
            SingleCropperManager.rerender()
            SingleCropperManager.editableIndex = undefined
            SingleCropperManager.cropper.destroy()
            $('#cropper-div').hide()
        })

    });
</script>
@endpush
