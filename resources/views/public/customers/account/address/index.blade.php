<div class="account-content">

    <div class="account-layout">

        <div class="account-head">            
            @if (! $addresses->isEmpty())
                <span class="account-action">
                    <a ajaxable href='#' data-res-id='address-container' data-href="{{ route('customer.address.create') }}">
                        @lang('profile.add-address')
                    </a>
                </span>
            @else
                <span></span>
            @endif
            <div class="horizontal-rule"></div>
        </div>

        <div class="account-table-content" id='address-container'>
            
            @if ($addresses->isEmpty())
                @include('public.customers.account.address.create')
                <!-- <div>@lang('profile.empty-address')</div>
                <br/>
                <a ajaxable href='#' data-res-id='address-container' data-href="{{ route('customer.address.create') }}">
                    @lang('profile.add-address')
                </a> -->
            @else
                <div class="address-holder">
                    @foreach ($addresses as $address)
                        @include('public.customers.account.address.edit', ['address' => $address])
                    @endforeach
                </div>
            @endif
        </div>

        {!! view_render_event('bagisto.shop.customers.account.address.list.after', ['addresses' => $addresses]) !!}
    </div>
</div>
@push('scripts')
    <script>
        $('a[ajaxable]').click(function(){
            let url = $(this).data('href')
            let resDom = $(this).data('resId')
            $.ajax({
                url: url,
                success: function(data){
                    $('#' + resDom).html(data)
                }
            })
            return false
        })
        $(document).on('click', '.delete-address-btn', function(){
            if (!confirm('Are you sure?'))
            event.preventDefault();
        })
        
    </script>
@endpush
