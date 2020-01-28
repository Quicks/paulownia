@extends('layouts.public')
@section('content')

    @push('css')
        <link rel="stylesheet" href="{{asset('css/about-paulownia.css')}}">

    @endpush

    <div class="row position-relative">
        <div class="col-12 border-up">

            <div class="row mt-4 mb-4">
                <div class="col-2"></div>
                <div class="col-6">
                    <a class="text-href p-4" href="#" target="_self">About paulownia</a>
                    <a class="text-href p-4" href="{{route('public.paulownia.show')}}">Types of paulownia</a>
                    <a class="text-href p-4" href="#" target="_self">Plantation creation</a>
                </div>
                <div class="col-4"></div>
            </div>

        </div>


        <div class="col-12 fon-for-title">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="title-text mt-5 pt-5">About paulownia</div>
                    <div class="text-under-title mb-5 pb-5">It is called a “miracle tree” or “tree-oil well.
                        ” If you want to learn more about the tree, its features and proper cultivation, then you are on the right track!
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
        {{--<img data-src="/images/line-for-paulownia.png" class="lazyload line-paulownia">--}}
        <div class="col-12 p-0">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active margin-for-paulownia pt-5 pb-5 pl-0 pr-0" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">A bit of history </a>
                    <a class="nav-item nav-link margin-for-paulownia pt-5 pb-5 pl-0 pr-0" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">General characteristics</a>
                    <a class="nav-item nav-link margin-for-paulownia pt-5 pb-5 pl-0 pr-0" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Benefits and application</a>
                    <a class="nav-item nav-link margin-for-paulownia pt-5 pb-5 pl-0 pr-0" id="nav-contact-tab1" data-toggle="tab" href="#nav-contact1" role="tab" aria-controls="nav-contact1" aria-selected="false">Other</a>
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

                    <div class="row">

                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 text-center">
                            <div class="row m-4 ty">
                                <div class="col-5 style-image-1"><div class="text-for-icons">Biofuel</div></div>
                                <div class="col-2 p-0"></div>
                                <div class="col-5 style-image-2"><div class="text-for-icons">Fodder for cattle</div></div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 text-center">
                            <div class="row m-4">
                                <div class="col-5 style-image-3"> <div class="text-for-icons">Using wood</div></div>
                                <div class="col-2 p-0"></div>
                                <div class="col-5 style-image-4"><div class="text-for-icons">Ultra growth</div> </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 text-center">
                            <div class="row m-4">
                                <div class="col-5 style-image-5 "><div class="text-for-icons">Fire resistance</div></div>
                                <div class="col-2 p-0"></div>
                                <div class="col-5 style-image-6 "><div class="text-for-icons-1">Resistance to assaulted insects</div> </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 text-center">
                            <div class="row m-4">
                                <div class="col-5 style-image-7"><div class="text-for-icons">Cosmec</div></div>
                                <div class="col-2 p-0"></div>
                                <div class="col-5 style-image-8"><div class="text-for-icons"> Application for food</div></div>
                            </div>
                        </div>

                        <div class="col-12 text-about-paulownia mt-5">
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

    </div>



@endsection