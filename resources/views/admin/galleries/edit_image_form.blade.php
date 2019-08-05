@foreach ($gallery->images as $image)
    <h3> Image {{$loop->iteration}}</h3>
    <img class="img-thumbnail w-25 mx-auto d-block" src="{{asset('storage/'.$image->image)}}">
    <div class="text-center m-1">
        <form method="POST" action="{{ url('/admin/galleries/image_del/' . $image->id) }}" accept-charset="UTF-8" id="del-img{{$image->id}}">
            <input type="hidden" name="_method" value="DELETE" form="del-img{{$image->id}}">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete image" form="del-img{{$image->id}}" onclick="return confirm(&quot;Confirm delete?&quot;)">
                <i class="fa fa-trash-o" aria-hidden="true"></i> 
                Delete image
            </button>
        </form>
    </div>


    @foreach(config('translatable.locales') as $locale)
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
    @endforeach

@endforeach