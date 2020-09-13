<div class="account-content">

    <div class="account-layout">

        <form method="post" action="{{ route('customer.address.edit', $address->id) }}" id='edit-address-form'>

            <div class="account-table-content">
                @method('PUT')
                @csrf

                <?php $addresses = explode(PHP_EOL, $address->address1); ?>
                <div class="form-group">
                    <label>@lang('profile.street-address')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="address1[]" value="{{ isset($addresses[0]) ? $addresses[0] : '' }}"/>
                </div>
                
                <div class="form-group">
                    <label for="country">@lang('profile.country')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="country" value="{{ $address->country }}">
                </div>
                <input type="hidden" class="form-control" name="name" value='factual'>
                <div class="form-group">
                    <label for="country" >@lang('profile.state')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="state" value="{{ $address->state }}">
                </div>
                <div class="form-group">
                    <label for="city">@lang('profile.city')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="city" value="{{ $address->city }}">
                </div>
                

                <div class="form-group">
                    <label for="postcode">@lang('profile.postcode')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="postcode" value="{{ $address->postcode }}">
                </div>

                <div class="form-group">
                    <label for="phone">@lang('profile.phone')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="phone" value="{{ $address->phone }}">
                </div>

                <div class="form-group">
                    <input class="btn btn-default btn-sm" type="submit" value="{{__('profile.save-address')}}">
                </div>

            </div>

        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#edit-address-form').submit(function(event){
            let addressData = {}
            event.preventDefault();

            $(this).serializeArray().forEach(function(field){
                addressData[field.name] = field.value
            })
            $.ajax({
                method: 'POST',
                url: $(this).attr('action'),
                data: addressData,
                success: function(data){
                    $('#address').html(data)
                },
                error: function (request, status, error) {
                    let errors = request.responseJSON.errors
                    for(error in errors){
                        let domWithError = $('input[name="'+ error +'"]')
                        domWithError.siblings('label').addClass('required')
                        domWithError.focus()
                    }
                }
            })
        })
    })
</script>
