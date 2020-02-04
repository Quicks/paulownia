@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/faq.css') }}?v3">
        <link rel="stylesheet" href="{{asset('css/contacts.css') }}?v1">
    @endpush

    <div class=" fon-faq">

        <div class="col-12 top-fon">@include('public.breadcrumbs', $breadcrumbs = [route('public.faq.index') => 'header-footer.faq' ])</div>

<div class="col-11 mx-auto">

    <div class="faq-text-list">FAQ</div>

    <ul class="nav nav-tabs justify-content-end" id="myTab" role="tablist">
        <li class="nav-item ">
            <a class="nav-link active" id="1-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home" aria-selected="true">Topic 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="2-tab" data-toggle="tab" href="#home-2" role="tab" aria-controls="profile" aria-selected="false">Topic 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="3-tab" data-toggle="tab" href="#home-3" role="tab" aria-controls="contact" aria-selected="false">Topic 3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="4-tab" data-toggle="tab" href="#home-4" role="tab" aria-controls="contact" aria-selected="false">Topic 4</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="other" data-toggle="tab" href="#home-5" role="tab" aria-controls="contact" aria-selected="false">Other
                <img data-src="/images/button-faq-down.png" class="lazyload " id="img-menu" onClick="chg(id)">
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="1-tab">
            <div class="accordion" id="accordionExample">

                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div class="row">
                            <div class="col-11">Long question №1</div>
                            <div class="col-1">
                                <button class="btn btn-link collapsed " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <img data-src="/images/button-faq-down.png" class="lazyload " id="img-text-1" onClick="chg(id)">
                                </button>
                            </div>

                        </div>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <div class="row">
                            <div class="col-11" >Long question №2</div>
                                 <div class="col-1">
                                     <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                         <img data-src="/images/button-faq-down.png" class="lazyload " id="img-text-2" onClick="chg(id)">
                                     </button>
                                 </div>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <div class="row">
                            <div class="col-11">Long question №3</div>
                                <div class="col-1">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <img data-src="/images/button-faq-down.png" class="lazyload " id="img-text-3" onClick="chg(id)">
                                    </button>
                                </div>
                        </div>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>


            <div class="card">
                <div class="card-header no" id="headingFour" >
                           <div class="row">
                               <div class="col-11" style="background:transparent;color: black" id="img-text-6" onClick="chg(id)">Long question №4</div>
                                   <div class="col-1">
                                       <button class="btn btn-link collapsed  " type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                           <img data-src="/images/button-faq-down.png" class="lazyload " id="img-text" onClick="chg(id)">
                                      </button>
                                   </div>
                        </div>

                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>

        </div>
        </div>
        <div class="tab-pane fade" id="home-2" role="tabpanel" aria-labelledby="2-tab">...</div>
        <div class="tab-pane fade" id="home-3" role="tabpanel" aria-labelledby="3-tab">...</div>
        <div class="tab-pane fade" id="home-4" role="tabpanel" aria-labelledby="4-tab">...</div>
        <div class="tab-pane fade" id="home-5" role="tabpanel" aria-labelledby="other">...

            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
            3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
            Food truck quinoa nesciunt laborum eiusmod.
            Brunch 3 wolf moon tempor,
            sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.

        </div>

    </div>

    </div>


        <div class="col-xl-11 col-md-11 col-sm-4 pl-5 mx-auto pb-5 pt-5">

            <span class="title-for-contacts name-contacts">@lang('contacts.write-to-us'):</span>
            <input placeholder="Your name" class="email-contacts ">
            <input placeholder="Email"     class="email-contacts">
            <input placeholder="@lang('contacts.your-message')" class="email-contacts messege-contacts">
            <button type="submit" class="button-contacts ">@lang('contacts.send')</button>

        </div>
    </div>

    <script>

        async function chg(id){

        if (document.getElementById(id).src.indexOf("/images/button-faq-down.png") > 0){

            document.getElementById(id).src="/images/button-faq-up.png"
        }else{
            document.getElementById(id).src="/images/button-faq-down.png"
        }
    }
    </script>

@endsection
