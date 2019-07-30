<div class="card">
    <div class="card-header">Lang Panel</div>


    <div class="card-body">



        <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
             aria-orientation="vertical">



            @foreach(config('translatable.locales') as $locale)
                <br>
                <a class="nav-link btn btn-outline-primary btn-sm" id={{$locale}} data-toggle="pill"
                   href="#{{$locale}}" role="tab"
                   aria-controls={{$locale}} aria-selected="false"> <label
                            for="{{$locale.'[title]'}}"
                            class="control-label">
                        {{ strtoupper($locale)}}
                    </label></a>
            @endforeach


        </div>


    </div>
</div>