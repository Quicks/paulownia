<div class="footer py-4">
    <div class="footer-content row mx-auto">
        <div class="col-xl-3 col-md-6 col-sm-12">
            <p class="footer-title">@lang('header-footer.to customers') </p>
            <hr class="footer-line mt-n3">
            <ul class="text-list m-0 p-0">
                <li><a href="#">@lang('header-footer.stocks')</a></li>
                <li><a href="#">@lang('header-footer.wholesale offers')</a></li>
                <li><a href="#">@lang('header-footer.terms of sale')</a></li>
                <li><a href="#">@lang('header-footer.terms of purchase')</a></li>
                <li><a href="#">@lang('header-footer.terms of use')</a></li>
            </ul>
        </div>
        <div class="col-xl-3 col-md-6 col-sm-12">
            <p class="footer-title">@lang('header-footer.menu') </p>
            <hr class="footer-line mt-n3">
            <ul class="text-list m-0 p-0">
                <li><a href="{{route('main')}}">@lang('header-footer.main')</a></li>
                <li><a href="{{route('public.news.index')}}">@lang('header-footer.news')</a></li>
                <li><a href="{{route('public.products.index')}}">@lang('header-footer.goods')</a></li>
                <li><a href="{{route('public.calculations.index')}}">@lang('header-footer.profitability calculation')</a></li>
                <li><a href="{{route('public.galleries.index')}}">@lang('header-footer.gallery')</a></li>
                <li><a href="{{route('public.faq.index')}}">@lang('header-footer.faq')</a></li>
                <li><a href="{{route('public.about-us.index')}}">@lang('header-footer.about us')</a></li>
            </ul>
        </div>
        <div class="col-xl-3 col-md-6 col-sm-12">
            <p class="footer-title">  @lang('header-footer.paulownia') </p>
            <hr class="footer-line mt-n3">
            <ul class="text-list m-0 p-0">
                <li><a href="#">@lang('header-footer.paulownia shan tong') </a></li>
                <li><a href="#">@lang('header-footer.paulownia elongata')</a></li>
                <li><a href="#">@lang('header-footer.paulownia tomentosa')</a></li>
                <li><a href="#">@lang('header-footer.paulownia kawakamii')</a></li>
                <li><a href="#">@lang('header-footer.paulownia turbo pro')</a></li>
                <li><a href="#">@lang('header-footer.paulownia ze pro')</a></li>
            </ul>
        </div>
        <div class="col-xl-3 col-md-6 col-sm-12">
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
                        <a href="#"><img src="{{asset('images/linkedin.svg')}}"></a>
                        <a href="#" class="ml-2"><img src="{{asset('images/fb.svg')}}"></a>
                        <a href="#" class="ml-2"><img src="{{asset('images/instagram.svg')}}"></a>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</div>
<div class="row footer-bottom text-center">
    <div class="col-xl-6 col-md-6 col-sm-12 footer-bottom-copy py-5">
        <span>Copyright © by Paulownia.pro® 2019</span>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12 py-4">
        <a href="#">
            <img src="{{asset('images/download-booklet.svg')}}">
        </a>
    </div>
</div>