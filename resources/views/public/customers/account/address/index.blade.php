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
                <div>@lang('profile.empty-address')</div>
                <br/>
                <a ajaxable href='#' data-res-id='address-container' data-href="{{ route('customer.address.create') }}">
                    @lang('profile.add-address')
                </a>
            @else
                <div class="address-holder">
                    @foreach ($addresses as $address)
                        <div class="address-card">
                            <div class="details disc_list">
                                <ul class="address-card-list">
                                    <li class="">
                                        {{ $address->name }}
                                    </li>
                                    <li class="">
                                        {{ $address->address1 }},
                                    </li>

                                    <li class="">
                                        {{ $address->city }}
                                    </li>

                                    <li class="">
                                        {{ $address->state }}
                                    </li>

                                    <li class="">
                                        {{ core()->country_name($address->country) }} {{ $address->postcode }}
                                    </li>

                                    <li class="">
                                        {{ $address->phone }}
                                    </li>
                                </ul>

                                <div class="control-links">
                                    <span>
                                        <a ajaxable href='#' data-res-id='address-container' data-href="{{ route('customer.address.edit', $address->id) }}">
                                            @lang('profile.edit')
                                        </a>
                                    </span>

                                    <span>
                                        <a class='delete-address-btn' href="{{ route('address.delete', $address->id) }}" >
                                            @lang('profile.delete')
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
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
