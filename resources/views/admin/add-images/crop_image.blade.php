@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="m-2">
                            <img id="image" style="max-width:100%; min-height: 400px;" src="{{asset('storage/'.$image->image)}}">
                        </div>
                        <div class="text-center">
                            <form>
                                <button id="checkbtn" class="btn btn-outline-info ml-3" type="button">
                                    <label class="m-0 p-0">
                                        <input type="checkbox" name="watermark" 
                                        onchange="$('#checkbtn').toggleClass('btn-info btn-outline-info')">
                                        @lang('admin.form.watermark')
                                    </label>
                                </button>
                            </form>
                        </div>
                        <a href="{{url($redirect_route)}}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</button>
                        </a>
                        <div class="form-group text-right">
                            <button id="save" class="btn btn-primary" type="button">@lang('admin.btns.save')</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@push('scripts')
    <link  href="{{asset('css/cropper.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/cropper.min.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        const image = document.getElementById('image');
        const cropper = new Cropper(image, {
          // aspectRatio: 1 / 1,
        });

        $('#rot1').click(function () {cropper.rotate(90);});
        $('#rot2').click(function () {cropper.rotate(-90);});
        $('#rot3').click(function () {cropper.rotate(3);});
        $('#rot4').click(function () {cropper.rotate(-3);});
        $('#scalex').click(function () {cropper.scaleX(-1);});
        $('#scaley').click(function () {cropper.scaleY(-1);});
        $('#reset').click(function () {cropper.reset();});

        $('#save').click(function saveCrop () {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

            cropper.getCroppedCanvas({maxWidth: 2100, maxHeight: 2100,}).toBlob((blob) => {
              var form = $('form')[0];
              const formData = new FormData(form);
              formData.append('croppedImage', blob);
              $.ajax('/admin/image_save_crop/{{$image->id}}', {
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success() {
                  window.location.replace('{{url($redirect_route)}}');
                },
                error() {
                  console.log('Upload error');
                },
              });
            });
        });
    });
    </script>
@endpush
