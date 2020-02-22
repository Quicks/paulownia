@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/plantation-creation.css')}}">
        <link rel="stylesheet" href="{{asset('css/about-paulownia.css')}}?v1">
    @endpush

    <div class="row">
        <div class="col-12 border-up  p-sm-0">
            @include('public.paulownia.nav-paulownia')
        </div>

        <div class="col-12 fon-for-title-2">
            <div class="row">
                <div class="col-xl-2 col-md-2 col-sm-0"></div>
                <div class="col-9 mt-5 pt-5 mb-5 pb-5">
                    <div class="title-text mt-5 pt-5 ">@lang('about-paulownia.plantation-creation-1')</div>
                    <div class="text-under-title ">@lang('about-paulownia.text')
                    </div>
                    <div class="col-xl-1 col-md-1 col-sm-0"></div>
                </div>
            </div>
        </div>

        </div>

        <div class="col-12 p-0 fon-for-paulownia-type">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active pt-4 pb-3 pl-0 pr-0 margin-for-beggin" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">@lang('about-paulownia.soil-groundwater') </a>
                    <a class="nav-item nav-link margin-for-paulownia pt-4 pb-3 pl-0 pr-0" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">@lang('about-paulownia.site-preparation')</a>
                    <a class="nav-item nav-link margin-for-paulownia pt-4 pb-3 pl-0 pr-0 " id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">@lang('about-paulownia.tree-planting-care')</a>
                    <a href="#"><img class="f-booklet-download lazyload margin-for-end pt-3 pb-3 pl-0 pr-0" data-src="{{asset('images/download-booklet.svg')}}" ></a>
                </div>
            </nav>

            <div class="tab-content p-5 ml-2" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="row">
                        <div class="col-12 text-about-paulownia mt-4">
                            With the constantly growing consumption of biofuels, in the near future, the countries of Central Europe will
                            not have enough of their forest resources, therefore Germany, Holland, Great Britain and Spain plan to significantly increase the import of pellets.
                            Today, when technological progress is measured by the degree of nature protection, more and more attention has been paid to biofuels from renewable,
                            high-performance energy crops. The use of paulownia in the form of energy raw materials - paulownia is used, except in industry, also in the form of pellets
                            (solid fuel for boilers and fireplaces with fully automated fuel supply), as well as in the form of raw materials for alternative restored biofuels.
                            For these purposes, all parts of the tree are used: trunk, branches and leaves. Pellets can be used both for boilers heating private houses and apartments,
                            as well as for large installations and electrical networks. Biogas is a new source of renewable energy, environmentally friendly and economically viable.
                            It is a gas consisting mainly of methane (CH4), carbon dioxide (CO2) and small amounts of other gases. It occurs during the fermentation of organic
                            substances under anaerobic conditions (in the absence of oxygen). Biogas plants are plants where an accelerated form of the natural decomposition cycle
                            takes place.
                            Paulownia leaves are increasingly being used as a component of the organic matter of this biofuel.
                            Having a large size, the decomposition produces more of the main gases of which biogas directly consists, in comparison with the organic material
                            offered by other types of plants, which makes paulownia an ideal product for producing this biofuel . Another application of paulownia is its use as
                            a raw material for the production of Bioethanol. American scientists have developed a new technology based on a combination of thermochemical and
                            biotechnological methods as a result of which 511 liters of ethanol are extracted from one ton of dry wood. This is the only reason to call our tree
                            an "oil well." Creating plantations, fast-growing trees, combined with innovative technologies for growing paulownia trees
                            can be an important part of the policy of saving resources and solving problems related to energy consumption, without risk to the environment.
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <div class="col-12 text-about-paulownia mt-4">
                            With the constantly growing consumption of biofuels, in the near future, the countries of Central Europe will
                            not have enough of their forest resources, therefore Germany, Holland, Great Britain and Spain plan to significantly increase the import of pellets.
                            Today, when technological progress is measured by the degree of nature protection, more and more attention has been paid to biofuels from renewable,
                            high-performance energy crops. The use of paulownia in the form of energy raw materials - paulownia is used, except in industry, also in the form of pellets
                            (solid fuel for boilers and fireplaces with fully automated fuel supply), as well as in the form of raw materials for alternative restored biofuels.
                            For these purposes, all parts of the tree are used: trunk, branches and leaves. Pellets can be used both for boilers heating private houses and apartments,
                            as well as for large installations and electrical networks. Biogas is a new source of renewable energy, environmentally friendly and economically viable.
                            It is a gas consisting mainly of methane (CH4), carbon dioxide (CO2) and small amounts of other gases. It occurs during the fermentation of organic
                            substances under anaerobic conditions (in the absence of oxygen). Biogas plants are plants where an accelerated form of the natural decomposition cycle
                            takes place.
                            Paulownia leaves are increasingly being used as a component of the organic matter of this biofuel.
                            Having a large size, the decomposition produces more of the main gases of which biogas directly consists, in comparison with the organic material
                            offered by other types of plants, which makes paulownia an ideal product for producing this biofuel . Another application of paulownia is its use as
                            a raw material for the production of Bioethanol. American scientists have developed a new technology based on a combination of thermochemical and
                            biotechnological methods as a result of which 511 liters of ethanol are extracted from one ton of dry wood. This is the only reason to call our tree
                            an "oil well." Creating plantations, fast-growing trees, combined with innovative technologies for growing paulownia trees
                            can be an important part of the policy of saving resources and solving problems related to energy consumption, without risk to the environment.
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                    <div class="row mx-auto justify-content-center">

                        <div class="col-xl-1 col-md-2 col-sm-6  img-tree-planting-1  mr-xl-5 mr-md-3 mr-sm-2 mb-3 ">
                            <div class="text-for-icons">@lang('about-paulownia.seedlings')</div>
                        </div>
                        <div class="col-xl-1 col-md-2 col-sm-6  img-tree-planting-2 ml-xl-5 mr-xl-5 ml-md-3 mr-md-3 ml-sm-2  ml-sm-2 mb-3">
                            <div class="text-for-icons">@lang('about-paulownia.landing')</div>
                        </div>
                        <div class="col-xl-1 col-md-2 col-sm-6  img-tree-planting-3  ml-xl-5 mr-xl-5 ml-md-3 mr-md-3 ml-sm-2  ml-sm-2 mb-3">
                            <div class="text-for-icons">@lang('about-paulownia.watering')</div>
                        </div>
                        <div class="col-xl-1 col-md-2 col-sm-6  img-tree-planting-4  ml-xl-5 mr-xl-5 ml-md-3 mr-md-3 ml-sm-2  ml-sm-2 mb-3">
                            <div class="text-for-icons">@lang('about-paulownia.fight-weed')</div>
                        </div>
                        <div class="col-xl-1 col-md-2 col-sm-6  img-tree-planting-5 ml-xl-5 ml-md-3 ml-sm-2 ">
                            <div class="text-for-icons">@lang('about-paulownia.technical-slice')</div>
                        </div>

                        <div class="col-12 text-about-paulownia mt-5">
                            A good start is, of course, getting a quality seedling that has grown stronger and adapted to
                            the environment after greenhouse plastic. Which will receive the least stress from transportation and subsequent planting in the field.
                            Either an ingrained stamp or a year-old tree with an already well-developed root system.
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact-tab1">

                    <div class="row">
                        <div class="col-12 text-about-paulownia mt-4">
                            With the constantly growing consumption of biofuels, in the near future, the countries of Central Europe will
                            not have enough of their forest resources, therefore Germany, Holland, Great Britain and Spain plan to significantly increase the import of pellets.
                            Today, when technological progress is measured by the degree of nature protection, more and more attention has been paid to biofuels from renewable,
                            high-performance energy crops. The use of paulownia in the form of energy raw materials - paulownia is used, except in industry, also in the form of pellets
                            (solid fuel for boilers and fireplaces with fully automated fuel supply), as well as in the form of raw materials for alternative restored biofuels.
                            For these purposes, all parts of the tree are used: trunk, branches and leaves. Pellets can be used both for boilers heating private houses and apartments,
                            as well as for large installations and electrical networks. Biogas is a new source of renewable energy, environmentally friendly and economically viable.
                            It is a gas consisting mainly of methane (CH4), carbon dioxide (CO2) and small amounts of other gases. It occurs during the fermentation of organic
                            substances under anaerobic conditions (in the absence of oxygen). Biogas plants are plants where an accelerated form of the natural decomposition cycle
                            takes place.
                            Paulownia leaves are increasingly being used as a component of the organic matter of this biofuel.
                            Having a large size, the decomposition produces more of the main gases of which biogas directly consists, in comparison with the organic material
                            offered by other types of plants, which makes paulownia an ideal product for producing this biofuel . Another application of paulownia is its use as
                            a raw material for the production of Bioethanol. American scientists have developed a new technology based on a combination of thermochemical and
                            biotechnological methods as a result of which 511 liters of ethanol are extracted from one ton of dry wood. This is the only reason to call our tree
                            an "oil well." Creating plantations, fast-growing trees, combined with innovative technologies for growing paulownia trees
                            can be an important part of the policy of saving resources and solving problems related to energy consumption, without risk to the environment.
                        </div>
                    </div>



                </div>
            </div>

        </div>

@endsection