@extends('layouts.public')
@section('content')
    @push('css')
        <link rel="stylesheet" href="{{asset('css/products-price.css') }}?v2">
        <link rel="stylesheet" href="{{asset('css/terms-of-sale.css') }}?v2">
    @endpush

    @include('public.breadcrumbs', $breadcrumbs = [route('public.products.index') => 'header-footer.terms of sale' ])

    <div class="fon-for-terms mt-5">
        <div class="price-background">
            <div class="row">
                <div class="col-12" style="height: 200px">
                    <div class="price-img-leaf-position terms-img-leaf ">
                        <img class="price-img-leaf lazyload"
                             data-src="{{asset('/images/service-leaf-tree.png')}}">
                    </div>
                    <div class="text-on-leaf mt-5 ">
                        Terms of sales, purchase, use rules
                    </div>
                </div>
            </div>
        </div>


        <ul class="title-for-rules mt-4 ml-3 mr-5 mb-0">
            Terms of sales rules
            <li class="text-for-rules pt-5"><span class="title-for-rules">Website visitor</span>
                - a person who came to odevaika.ru without the purpose of placing an Order.</li>
            <li class="text-for-rules"><span class="title-for-rules"> User  </span>  - an individual,
                a visitor to the Site, accepting the terms of this Agreement and wanting to place / make a preliminary order (s)
                in the Odevaika.ru online store. </li>
            <li class="text-for-rules"><span class="title-for-rules"> Buyer   </span>
                - User who made / placed a preliminary order in the Odevaika.ru online store
            </li>
            <li class="text-for-rules"><span class="title-for-rules">  Seller  </span>
                - IRIS LLC OGRN 5077746751539, TIN 7734563578 / KPP 773401001, Legal address: 123098,
                Moscow, ul. Marshal Vasilevsky, 3, building 1.
            </li>
            <li class="text-for-rules"><span class="title-for-rules"> Online store  </span>
                - an Internet site owned by the Seller located on the Internet at odevaika.ru,
                where the Goods offered by the Seller for purchase are presented, as well as the
                terms of payment and delivery of Goods to Buyers.
            </li>
            <li class="text-for-rules"><span class="title-for-rules"> Goods  </span>
                - children's shoes, clothes, accessories and other goods presented for sale on the Seller’s Website.
            </li>
            <li class="text-for-rules"><span class="title-for-rules">  Order </span>
                - a duly executed Buyer's request for purchase and delivery
                to the address indicated by the Buyer / by means of pickup of the Goods selected for purchase on the Site.
            </li>
        </ul>
        <ol class="title-for-rules mt-4 ml-3 mr-5 mb-0 " style="height:856px;">
            1. General Provisions
            <li class="text-for-rules"><span class="title-for-rules">1.1.</span> The seller carries out the retail
                sale of goods using the Internet, the store is located at odevaika.ru. </li>
            <li class="text-for-rules"><span class="title-for-rules">1.2.</span> By ordering the Goods through the website odevaika.ru,
                the User agrees to the conditions for the sale of Goods listed below (hereinafter - the Conditions for the sale of goods).
                In case of disagreement with this Agreement (hereinafter - the Agreement),
                the User is obliged to immediately stop using the service and leave the site </li>

        </ol>

    </div>

@endsection