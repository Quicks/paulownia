<div class="col-md-2">

<div class="card">
    <div class="card-header">Lang Panel</div>


    <div class="card-body">


        <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
             aria-orientation="vertical">


            @foreach(config('translatable.locales') as $locale)



                <br>
                <a class="nav-link btn btn-outline-primary btn-sm   @if ($loop->first)active @endif"
                   id={{$locale}} data-toggle="pill"
                   href="#{{$locale}}" role="tab"
                   aria-controls={{$locale}} aria-selected=@if ($loop->first)"true" @else "false" @endif>
                {{ strtoupper($locale)}}
                </a>
            @endforeach


        </div>


    </div>
</div>
</div>