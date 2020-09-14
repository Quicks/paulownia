<div class="account-content">


    <div class="account-layout">

        <form method="post" action="{{ route('customer.address.create') }}" id='create-address-form'>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="account-table-content">
                @csrf
                <div class="form-group">
                    <label>@lang('profile.street-address')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="address1[]" value="{{ old('address1[]') }}" />
                </div>

                <div class="form-group">
                    <label for="country">@lang('profile.country')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="country">
                </div>
                <input type="hidden" class="form-control" name="name" value='billing'>
                <div class="form-group">
                    <label for="country" >@lang('profile.state')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="state">
                </div>
                <div class="form-group">
                    <label for="city">@lang('profile.city')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="city">
                </div>
                

                <div class="form-group">
                    <label for="postcode">@lang('profile.postcode')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="postcode" v-validate="'required'">
                </div>

                <div class="form-group">
                    <label for="phone">@lang('profile.phone')<span class="required">*</span></label>
                    <input type="text" required class="form-control" name="phone">
                </div>

                <div class="form-group">
                    <input class="btn btn-default btn-sm" type="submit" value="{{__('profile.save-address')}}">
                </div>
            </div>

        </form>
    </div>
</div>
<div id="created-address-popup" class="white-popup mfp-hide">
    <div>
        @lang('profile.created-address')
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#create-address-form').submit(function(event){
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
                    $.magnificPopup.open({
                        items: {
                        src: $('#created-address-popup').html(),
                        type: 'inline'
                        }
                    });
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
