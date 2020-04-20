<div class="card">
  <div class="card-body">
    <ul class="nav-responsive nav nav-tabs">
      <li class='active'>
        <a class="nav-link btn btn-outline-primary btn-sm mb-2"
          id="main-form-btn" data-toggle="pill"
          href="#main-form" role="tab"
          aria-controls="main-form" aria-selected="true"
          >
          @lang('admin.form.main')
        </a>
      </li>
      @foreach(config('translatable.locales') as $locale)
        <li>
          <a class="nav-link btn btn-outline-primary btn-sm mb-2 mt-2"
            id={{$locale}} data-toggle="pill"
            href="#{{$locale}}" role="tab"
            aria-controls={{$locale}} aria-selected=@if ($loop->first)"true" @else "false" @endif
            >
            @lang('admin.form.lang.'.$locale)
            </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
