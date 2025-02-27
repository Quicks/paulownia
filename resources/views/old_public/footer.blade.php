<div class="footer py-4">
    <div class="footer-content row mx-auto p-5">
        <div class="col-xl-2 col-md-6 col-sm-12 mb-3">
            <p class="footer-title">  @lang('header-footer.our service') </p>
            <hr class="footer-line mt-n3">
            <ul class="text-list m-0 p-0">
                <li><a href="{{route('public.service.index')}}">@lang('header-footer.sale of seedlings') </a></li>
                <li><a href="{{route('public.analysis-and-personal-design.index')}}">@lang('header-footer.analysis and personal design')</a></li>
                <li><a href="{{route('public.calculations.index')}}">@lang('header-footer.ROI calculation')</a></li>
                <li><a href="{{route('public.consultation-during-the-cultivation.index')}}">@lang('header-footer.consultation during the cultivation')</a></li>
            </ul>
        </div>
        <div class="col-xl-2 col-md-6 col-sm-12 mb-3">
            <p class="footer-title">@lang('header-footer.to customers')</p>
            <hr class="footer-line mt-n3">
            <ul class="text-list m-0 p-0">
                <li><a href="#">@lang('header-footer.stocks')</a></li>
                <li><a href="#">@lang('header-footer.wholesale offers')</a></li>
                <li><a href="{{route('public.terms-of-sale.index')}}">@lang('header-footer.terms of sale')</a></li>
                <li><a href="{{route('public.terms-of-sale.index')}}">@lang('header-footer.terms of purchase')</a></li>
                <li><a href="{{route('public.terms-of-sale.index')}}">@lang('header-footer.terms of use')</a></li>
            </ul>
        </div>
        <div class="col-xl-2 col-md-6 col-sm-12 mb-3">
            <p class="footer-title">@lang('header-footer.menu') </p>
            <hr class="footer-line mt-n3">
            <ul class="text-list m-0 p-0">
                <li><a href="{{route('main')}}">@lang('header-footer.main')</a></li>
                <li><a href="{{route('public.news.index')}}">@lang('header-footer.news')</a></li>
                <li><a href="{{route('public.paulownia.about')}}">Paulownia</a></li>
                <li><a href="{{route('public.products.index')}}">@lang('header-footer.goods')</a></li>
                <li><a href="{{route('public.calculations.index')}}">@lang('header-footer.profitability calculation')</a></li>
{{--                <li><a href="{{route('public.galleries.index')}}">@lang('header-footer.gallery')</a></li>--}}
                <li><a href="{{route('public.faq.index')}}">@lang('header-footer.faq')</a></li>
                <li><a href="{{route('public.about-us.index')}}">@lang('header-footer.about us')</a></li>
            </ul>
        </div>
        <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
            <p class="footer-title">@lang('header-footer.contacts')</p>
            <hr class="footer-line mt-n3">
            <ul class="text-list m-0 p-0">
                <li>@lang('header-footer.phone:') <a href="tel:+34642787555"> +34 642 787 555 </a></li>
                <li>@lang('header-footer.email:') <a href="mailto: info@paulownia.pro"> info@paulownia.pro</a></li>
                <li>Viber: <a href="viber://chat?number=+34642787555">+34 642 787 555</a></li>
                <li>@lang('header-footer.we work:')</li>
                <li>@lang('header-footer.mon.-fri. from 09:00 before 18:00')</li>
                <ul class="text-list m-0 p-0">
                    <li>
                        <a href="#"><img src="{{asset('images/footer-linkedin.svg')}}"></a>
                        <a href="#" class="ml-2"><img src="{{asset('images/footer-fb.svg')}}"></a>
                        <a href="#" class="ml-2"><img src="{{asset('images/footer-instagram.svg')}}"></a>
                    </li>
                </ul>
            </ul>
        </div>
        <div class="col-xl-3 col-md-12 col-sm-12 ">
            <div>
                <img class="mt-4 ml-xl-4 mx-auto footer-booklet" src="{{asset('images/booklet_en.jpg')}}">
            </div>
            <div class="mt-3">
                <a @if(app()->getLocale() == 'fr' || app()->getLocale() == 'pl' || app()->getLocale() == 'ar')
                   href="{{asset('/files/booklet_en.pdf')}}"
                   @else href="{{asset('/files/booklet_' . app()->getLocale()  .  '.pdf')}}"
                   @endif download >
                    <button class="button-booklet ml-xl-4 ml-md-0">
                        <img data-src="/images/booklet-footer.svg" class="lazyload booklet-img"> booklet of Paulownia</button>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row footer-bottom text-center">
    <div class="col-12 footer-bottom-copy py-4">Copyright © by Paulownia.pro® 2019</div>
</div>
