var gcsInputClosed = true;
function toggleSearchInput() {
    if (gcsInputClosed) {
        $("#gcs-input").removeClass('d-none').addClass('gcs-input-animate').focus();
        gcsInputClosed = false;
    } else {
        $("#gcs-input").removeClass('gcs-input-animate').addClass('d-none');
        if($('#gcs-input').val() != "") {
            gsearch($('#gcs-input').val(), 1);
        }
        gcsInputClosed = true;
    }
}

var searchPage = 1;
var onPage = 10;
function gsearch(searchText, page) {
    let key = 'AIzaSyBka8NI0ipWHV-_rKotvoXQmen-6q-pvcg';
    let cx = '013231548468563012370:d5f5xfaqbek';
    $.ajax({
        url: 'https://www.googleapis.com/customsearch/v1',
        type: "get",
        data: {'key':key, 'cx':cx, 'q':searchText, 'num':onPage, 
            'start':page==1 ? 0 : page*onPage-onPage+1
        },
        success: function (response) {
            parseResponceToHtml (response, searchText);
        },
        error: function(xhr) {
            console.log(xhr);
        }
    })
}

$("#gcs-input").on('keyup', function (e) {
    if (e.keyCode === 13) {
        toggleSearchInput()
    }
});

function parseResponceToHtml (response, searchText) {
    if(response.items) {
        response.items.forEach(item => {
           $('#results-body').append(
                $('<a/>', {'href': item.link, 'class':'gcs-results-link'})
                .append($('<h4/>').html(item.title))
                .append($('<b/>').html(item.link))
                .append($('<p/>').html(item.htmlSnippet))
                );
            })
    } else {
        $('#results-body').append('<h4>No results for \"'+searchText+'\".</h4>');
    }

    $('#searchResultsLongTitle').text('Search Results for \"'+searchText+'\".');
    $('#searchResults').modal('show');

    if(response.searchInformation.totalResults > searchPage*onPage) {
        searchPage++;
        $('#moreResults').removeClass('d-none');
    } else {
        $('#moreResults').addClass('d-none');
    }
}

$('#searchResults').on('hidden.bs.modal', function (e) {
    $('#results-body').empty();
    $('#searchResultsLongTitle').empty();
    searchPage = 1;
})
