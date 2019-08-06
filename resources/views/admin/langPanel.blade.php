<div class="col-md-2">

    <div class="card">
        <div class="card-header">Lang Panel</div>


        <div class="card-body">


            <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                 aria-orientation="vertical">

                <a class="nav-link btn btn-outline-primary btn-sm active"
                   id="main-form-btn" data-toggle="pill"
                   href="#main-form" role="tab"
                   aria-controls="main-form" aria-selected="true"
                   onclick="openAllTabs('main-form');">
                    MAIN
                </a>

                @foreach(config('translatable.locales') as $locale)



                    <br>
                    <a class="nav-link btn btn-outline-primary btn-sm"
                       id={{$locale}} data-toggle="pill"
                       href="#{{$locale}}" role="tab"
                       aria-controls={{$locale}} aria-selected=@if ($loop->first)"true" @else "false" @endif
                       onclick="openAllTabs('{{$locale}}');">
                    {{ strtoupper($locale)}}
                    </a>
                @endforeach


            </div>
        </div>
    </div>
</div>

@push('scripts')
  <script type="text/javascript">    //shows-hides multiple tabs with same 'aria-labelledby' on the page
    function openAllTabs(tab) {
      $('[aria-labelledby]').each(function() {$(this).removeClass("active show");});
      $('[aria-labelledby='+tab+']').each(function() {$(this).tab('show');});
    }
  </script>
@endpush