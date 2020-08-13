@extends('layouts.public')

@section('content')
<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-7 col-md-9 text-center">
        <div class="error_txt background_bg" style="background-image: url('/images/background-about.jpg'); background-position: center center; background-size: cover;">404</div>
        <div class="heading_s2 mb-2">
          <h5>oops! The page you requested was not found!</h5> 
        </div>
        <p>The page you are looking for was moved, removed, renamed or might never existed.</p>
        <a href="index.html" class="btn btn-outline-black">Back To Home</a>
      </div>
    </div>
  </div>
</section>
@endsection