@push('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}?v2">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vee-validate/2.0.0-rc.26/vee-validate.min.js"></script>
    <script src="{{asset('js/shop-vue.js')}}"></script>
@endpush

<div class="profile-header row mb-3">
    <?php   $customer = auth()->guard('customer')->user();    ?>
    <div class="col-12">
        @include('public.breadcrumbs', $breadcrumbs = [route('profile.index') => 'profile.profile',
        null => $customer->first_name . ' ' . $customer->last_name])
    </div>
    <div class="col-4 pt-5 pos-profile">
        <div class="user-name-profile">{{ $customer->first_name }} {{ $customer->last_name }}</div>
        <div class="user-email-profile">Email: {{ $customer->email }}</div>
    </div>
    <div class="col-8 pt-5">
        <ul class="nav nav-tabs float-right">
            <li class="nav-item mr-lg-5">
                <a class="nav-link custom-tab-profile @if($activeItem == 'wishlist') active @endif"
                   href="{{route('wishlist.index')}}">
                    @lang('profile.favorite')
                </a>
            </li>
            <li class="nav-item mr-lg-5">
                <a class="nav-link custom-tab-profile @if($activeItem == 'orders') active @endif"
                   href="{{route('orders.index')}}">
                    @lang('profile.story')
                </a>
            </li>
            <li class="nav-item mr-lg-5">
                <a class="nav-link custom-tab-profile @if($activeItem == 'profile') active @endif"
                   href="{{route('profile.index')}}">
                   @lang('profile.profile')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-tab-profile @if($activeItem == 'address') active @endif"
                   href="{{route('address.index')}}">
                    @lang('profile.address')
                </a>
            </li>
            {{--             <li class="nav-item">--}}
            {{--                <a class="nav-link @if($activeItem == 'reviews') active @endif" href="{{route('customer.reviews.index')}}">Reviews</a>--}}
            {{--            </li> --}}
        </ul>
    </div>
    <div class="col-12 pos-profile">
        <hr class="custom-profile-line">
    </div>
</div>