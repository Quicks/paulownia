@foreach ($gallery->images as $image)
    <h4> Image {{$loop->iteration}}</h4>
    <img class="img-thumbnail w-25 mx-auto d-block" src="{{asset('storage/'.$image->image)}}">
    <div class="text-center m-1">
        <button type="button" class="btn btn-danger btn-sm" title="Delete image" onclick="deleteImage({{$image->id}});" >
            <i class="fa fa-trash-o" aria-hidden="true"></i> 
            Delete image
        </button>
    </div>


    @foreach(config('translatable.locales') as $locale)
    <div class="tab-pane fade" id="{{$locale}}2" role="tabpanel" aria-labelledby="{{$locale}}">
        <div class="form-group {{ $errors->has('image_atr['.$image->id.']['.$locale.'][title]') ? 'has-error' : ''}}">
            <label for="{{'image_atr['.$image->id.']['.$locale.'][title]'}}" class="control-label">{{ 'Image title ('.$locale.')' }}</label>
            <input class="form-control" name="{{'image_atr['.$image->id.']['.$locale.'][title]'}}" type="text" 
                id="{{'image_atr['.$image->id.']['.$locale.'][title]'}}" form="gallery-form"
                value="@isset($image->translate($locale)->title) {{$image->translate($locale)->title}} @endisset">
            {!! $errors->first('image_atr['.$image->id.']['.$locale.'][title]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('image_atr['.$image->id.']['.$locale.'][desc]') ? 'has-error' : ''}}">
            <label for="{{'image_atr['.$image->id.']['.$locale.'][desc]'}}" class="control-label">{{ 'Image description ('.$locale.')' }}</label>
            <textarea class="form-control" rows="5" name="{{'image_atr['.$image->id.']['.$locale.'][desc]'}}" type="textarea" 
                id="{{'image_atr['.$image->id.']['.$locale.'][desc]'}}" form="gallery-form" >
                @isset($image->translate($locale)->desc) {{$image->translate($locale)->desc}} @endisset
            </textarea>
            {!! $errors->first('image_atr['.$image->id.']['.$locale.'][desc]', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    @endforeach

@endforeach

@push('scripts')
    <script type="text/javascript">
    //delete image form creates here because otherwise it becomes nested in gallery form (html prohibits nested forms)
        function deleteImage (imageId) {
            if (confirm('Confirm image delete?')) {
                var formImgDelHTML = '<form method="POST" action="{{url('/admin/galleries/image_del/')}}/'+imageId+'" accept-charset="UTF-8">{!! method_field('DELETE') . csrf_field() !!}</form>';

                $(formImgDelHTML).appendTo('body').submit();
            }
        };
    </script>
@endpush