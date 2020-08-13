<!-- START GALLERY ITEM -->
<li class="grid_item">
    <div class="gallery_item">
        <a href="{{route('public.galleries.show',[$gallery->id])}}" class="image_link">
            @if(isset($gallery->mainImage()->image))
                <img src="/storage/{{$gallery->mainImage()->thumbnail}}" alt="image">
            @else
                <img src="/images/gallery_item_small1.jpg" alt="image">
            @endif
        </a>
        <div class="gallery_content">
            <h5><a href="{{route('public.galleries.show',[$gallery->id])}}">{{$gallery->title}}</a></h5>
        </div>
    </div>
</li>
<!-- END GALLERY ITEM -->