<section class="pb_70">
	<div class="container">
    <div class="row">
      <div class="col-md-12 mb-md-5 mb-4">
        <div class="col-12">
          <div class="text-center">
            <div class="heading_s3 text-center animation" data-animation="fadeInDown" data-animation-delay="0.02s">
              <div class="sub_heading">Our Works</div>
                <h2>Our Works</h2>
            </div>
            <p class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
              <br class="d-none d-md-block"> blandit massa enim. Nullam id varius nunc id varius nunc.
            </p>
            <div class="small_divider"></div>
          </div>
        </div>
        <ul class="list_none carousel_slide4 owl-carousel owl-theme nav_style2" data-margin="15" data-dots="false" data-nav="true" data-loop="true">
          @foreach($mainGallery as $gallery)

            <li>
              <a href='{{route("public.galleries.show", ["id" => $gallery->id])}}'>
                  @if(isset($gallery->mainImage()->image))
                      <img src="/storage/{{$gallery->mainImage()->thumbnail}}" alt="image">
                  @else
                      <img src="/images/gallery_item_small1.jpg" alt="image">
                  @endif
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>