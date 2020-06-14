@push('scripts')
    <script type="text/javascript" src="{{asset('js/g-search-api2html.js')}}"></script>
@endpush

<li class="list-inline-item mr-0">
    <svg id="search-icon" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="1 0 20 20" onclick="toggleSearchInput()" 
        width="20px" class="align-middle position-relative"
      >
      <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
    </svg>
    <input id="gcs-input" class="d-none pl-1" type="text" name="gcs">
</li>

<div class="modal fade" id="searchResults" tabindex="-1" role="dialog" aria-labelledby="searchResultsLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="searchResultsLongTitle"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div id="results-body" class="modal-body"></div>

            <div class="modal-footer">
                <button id="moreResults" type="button" class="btn btn-success d-none" onclick="gsearch($('#gcs-input').val(), searchPage)">
                    More results...
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

