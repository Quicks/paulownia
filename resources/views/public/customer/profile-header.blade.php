<div class="profile-header row mb-2">
    <?php   $customer = auth()->guard('customer')->user();    ?>
    <div class="col-4">
        <div>{{ $customer->first_name }} {{ $customer->last_name }}</div>
        <div>{{ $customer->email }}</div>
    </div>
    <div class="col-8">
        <ul class="nav nav-tabs float-right">
            <li class="nav-item">
                <a class="nav-link @if($activeItem == 'profile') active @endif" href="{{route('customer.profile.index')}}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($activeItem == 'address') active @endif" href="{{route('customer.address.index')}}">Address</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($activeItem == 'reviews') active @endif" href="{{route('customer.reviews.index')}}">Reviews</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($activeItem == 'wishlist') active @endif" href="{{route('customer.wishlist.index')}}">Wishlist</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($activeItem == 'orders') active @endif" href="{{route('customer.orders.index')}}">Orders</a>
            </li>
        </ul>
    </div>
</div>