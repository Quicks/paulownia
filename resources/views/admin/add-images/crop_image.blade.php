@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Crop Image {{ $image->title }}</div>
                    <div class="card-body">
                        <a href="{{url($redirect_route)}}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                        </a>
                        <div class="m-2">
                            <img id="image" style="max-width:100%; min-height: 400px;" src="{{asset('storage/'.$image->image)}}">
                        </div>
                        <div class="text-center">
                            <button id="rot1" class="btn btn-info"><i class="fa fa-rotate-right" aria-hidden="true"></i> 90&deg; </button>
                            <button id="rot2" class="btn btn-info"><i class="fa fa-rotate-left" aria-hidden="true"></i> -90&deg; </button>
                            <button id="rot3" class="btn btn-info"><i class="fa fa-rotate-right" aria-hidden="true"></i> 3&deg; </button>
                            <button id="rot4" class="btn btn-info"><i class="fa fa-rotate-left" aria-hidden="true"></i> -3&deg; </button>
                            <button id="scalex" class="btn btn-info"><i class="fa fa-arrows-h" aria-hidden="true"></i>  </button>
                            <button id="scaley" class="btn btn-info"><i class="fa fa-arrows-v" aria-hidden="true"></i> </button>
                            <button id="reset" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Reset </button>
                        </div>
                        <div class="form-group text-right">
                            <button id="save" class="btn btn-primary" type="button"> Save </button>
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
          aspectRatio: 1 / 1,
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

            cropper.getCroppedCanvas().toBlob((blob) => {
              const formData = new FormData();
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
