@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">
                <div class="card">
                    <div>
                        <img id="image" style="max-width:100%;" src="{{asset('storage/'.$image->image)}}">
                    </div>
                </div>
            </div>
    </div>

    <div class="form-group text-right">
        <input class="btn btn-primary" type="button" value="Save">
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
          crop(event) {
            console.log(event.detail.x);
            console.log(event.detail.y);
            console.log(event.detail.width);
            console.log(event.detail.height);
            console.log(event.detail.rotate);
            console.log(event.detail.scaleX);
            console.log(event.detail.scaleY);
          },
        });

    });
    </script>
@endpush
