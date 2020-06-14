<form class="row" method="POST" action="{{route('write-to-us')}}">
    @csrf
    <div class="title-for-contacts name-contacts col-xl-2 col-md-12 col-sm-12">
        @lang('contacts.write-to-us'):
    </div>
    <div class="col-xl-2 col-md-12 col-sm-12 padding-1199">
        <input type="text" name="name" placeholder="Your name" 
            class="email-contacts" required value="{{old('name')}}">
        @haserror('name')<span class="control-error mt-1">{{$errors->first('name')}}</span>@endhaserror
    </div>
    <div class="col-xl-2 col-md-12 col-sm-12 padding-1199" >
        <input type="email" name="contact_email" placeholder="Email" 
            class="email-contacts" required value="{{old('contact_email')}}">
        @haserror('contact_email')<span class="control-error mt-1">{{$errors->first('contact_email')}}</span>@endhaserror
    </div>
    <div class="col-xl-4 col-md-12 col-sm-12 padding-1199">
        <input type="text" name="message" placeholder="@lang('contacts.your-message')" 
            class="messege-contacts" required value="{{old('message')}}">
        @haserror('message')<span class="control-error mt-1">{{$errors->first('message')}}</span>@endhaserror
    </div>
    <div class="col-xl-2 col-md-12 col-sm-12 text-center">
        <button type="submit" class="button-contacts">@lang('contacts.send')</button>
    </div>
</form>