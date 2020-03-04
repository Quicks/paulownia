@push('scripts')
    <script type="text/javascript" src="{{asset('js/g-search-api2html.js')}}"></script>
@endpush

<li class="list-inline-item mr-0">
    <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="1 0 20 20" onclick="toggleSearchInput()" 
      alt="Search on site" width="20px" class="align-middle position-relative"
      >
      <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
    </svg>
    <input id="gcs-input" class="d-none pl-1" type="text" name="gcs">
</li>

<div class="modal fade" id="searchResults" tabindex="-1" role="dialog" aria-labelledby="searchResultsLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="searchResultsLongTitle">Search Results</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="results-body" class="modal-body">

      </div>
      <div class="modal-footer">
        <button id="moreResults" type="button" class="btn btn-success d-none" onclick="gsearch($('#gcs-input').val(), searchPage)">
            More results...
        </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var resp_test = {
  "kind": "customsearch#search",
  "url": {
    "type": "application/json",
    "template": "https://www.googleapis.com/customsearch/v1?q={searchTerms}&num={count?}&start={startIndex?}&lr={language?}&safe={safe?}&cx={cx?}&sort={sort?}&filter={filter?}&gl={gl?}&cr={cr?}&googlehost={googleHost?}&c2coff={disableCnTwTranslation?}&hq={hq?}&hl={hl?}&siteSearch={siteSearch?}&siteSearchFilter={siteSearchFilter?}&exactTerms={exactTerms?}&excludeTerms={excludeTerms?}&linkSite={linkSite?}&orTerms={orTerms?}&relatedSite={relatedSite?}&dateRestrict={dateRestrict?}&lowRange={lowRange?}&highRange={highRange?}&searchType={searchType}&fileType={fileType?}&rights={rights?}&imgSize={imgSize?}&imgType={imgType?}&imgColorType={imgColorType?}&imgDominantColor={imgDominantColor?}&alt=json"
  },
  "queries": {
    "request": [
      {
        "title": "Google Custom Search - fast",
        "totalResults": "8",
        "searchTerms": "fast",
        "count": 8,
        "startIndex": 1,
        "inputEncoding": "utf8",
        "outputEncoding": "utf8",
        "safe": "off",
        "cx": "013231548468563012370:d5f5xfaqbek"
      }
    ]
  },
  "context": {
    "title": "Paulownia.itatests"
  },
  "searchInformation": {
    "searchTime": 0.357668,
    "formattedSearchTime": "0.36",
    "totalResults": "8",
    "formattedTotalResults": "8"
  },
  "items": [
    {
      "kind": "customsearch#result",
      "title": "Articles-test-en - Paulownia",
      "htmlTitle": "Articles-test-en - Paulownia",
      "link": "https://paulownia.itatests.com/en/show/article/18",
      "displayLink": "paulownia.itatests.com",
      "snippet": "Paulownia is a unique species of fast-growing trees that have no analogues in \nthe world. On the pages of the site you can learn about everything related to the.",
      "htmlSnippet": "Paulownia is a unique species of \u003cb\u003efast\u003c/b\u003e-growing trees that have no analogues in \u003cbr\u003e\nthe world. On the pages of the site you can learn about everything related to the.",
      "cacheId": "96ucohbUdQEJ",
      "formattedUrl": "https://paulownia.itatests.com/en/show/article/18",
      "htmlFormattedUrl": "https://paulownia.itatests.com/en/show/article/18",
      "pagemap": {
        "cse_thumbnail": [
          {
            "src": "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcR79_6rJkQ12mB46hI69Y4I9usE2WILPwPBoXSu9UrcBv6Sd5cGl2gIRks",
            "width": "150",
            "height": "18"
          }
        ],
        "metatags": [
          {
            "viewport": "width=device-width, initial-scale=1",
            "csrf-token": "c0mSNjk3axiT4xGQB9KO8ejzm1KJ9EMKijJfIPME"
          }
        ],
        "cse_image": [
          {
            "src": "https://paulownia.itatests.com/images/show-news-wave.png"
          }
        ]
      }
    },
    {
      "kind": "customsearch#result",
      "title": "Paulownia",
      "htmlTitle": "Paulownia",
      "link": "https://paulownia.itatests.com/news",
      "displayLink": "paulownia.itatests.com",
      "snippet": "Paulownia is a unique species of fast-growing trees that have no analogues in \nthe world. On the pages of the site you can learn about everything related to the ...",
      "htmlSnippet": "Paulownia is a unique species of \u003cb\u003efast\u003c/b\u003e-growing trees that have no analogues in \u003cbr\u003e\nthe world. On the pages of the site you can learn about everything related to the&nbsp;...",
      "cacheId": "3AN2lZ-9n0EJ",
      "formattedUrl": "https://paulownia.itatests.com/news",
      "htmlFormattedUrl": "https://paulownia.itatests.com/news",
      "pagemap": {
        "cse_thumbnail": [
          {
            "src": "https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTJJKdQguxs4hKGP_y3yPV_lS1qOfIALxo3JksBxBrlQ5hrfotpB66A",
            "width": "125",
            "height": "125"
          }
        ],
        "metatags": [
          {
            "viewport": "width=device-width, initial-scale=1",
            "csrf-token": "XzronRJ1drUvv99pVz3mcfNOWG8XwzKJoeWLnGxO"
          }
        ],
        "cse_image": [
          {
            "src": "https://paulownia.itatests.com/storage/uploads/Article/18/1573460493.jpg"
          }
        ]
      }
    },
    {
      "kind": "customsearch#result",
      "title": "treatise -Plantec Chile SPA/en - Paulownia",
      "htmlTitle": "treatise -Plantec Chile SPA/en - Paulownia",
      "link": "https://paulownia.itatests.com/en/show/treatise/19",
      "displayLink": "paulownia.itatests.com",
      "snippet": "Paulownia is a unique species of fast-growing trees that have no analogues in \nthe world. On the pages of the site you can learn about everything related to the.",
      "htmlSnippet": "Paulownia is a unique species of \u003cb\u003efast\u003c/b\u003e-growing trees that have no analogues in \u003cbr\u003e\nthe world. On the pages of the site you can learn about everything related to the.",
      "cacheId": "riWeNogXImAJ",
      "formattedUrl": "https://paulownia.itatests.com/en/show/treatise/19",
      "htmlFormattedUrl": "https://paulownia.itatests.com/en/show/treatise/19",
      "pagemap": {
        "cse_thumbnail": [
          {
            "src": "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcR79_6rJkQ12mB46hI69Y4I9usE2WILPwPBoXSu9UrcBv6Sd5cGl2gIRks",
            "width": "150",
            "height": "18"
          }
        ],
        "metatags": [
          {
            "viewport": "width=device-width, initial-scale=1",
            "csrf-token": "UM0FpjHXRdON8c37igojwnrR4jEr7vHyVSBTIUoO"
          }
        ],
        "cse_image": [
          {
            "src": "https://paulownia.itatests.com/images/show-news-wave.png"
          }
        ]
      }
    },
    {
      "kind": "customsearch#result",
      "title": "Paulownia",
      "htmlTitle": "Paulownia",
      "link": "https://paulownia.itatests.com/analysis-and-personal-design",
      "displayLink": "paulownia.itatests.com",
      "snippet": "Paulownia Elongata (“Elongated”)is a fast-growing species with a straight and \nlong trunk; in 5 years after a technical cut, it has the necessary size for the ...",
      "htmlSnippet": "Paulownia Elongata (“Elongated”)is a \u003cb\u003efast\u003c/b\u003e-growing species with a straight and \u003cbr\u003e\nlong trunk; in 5 years after a technical cut, it has the necessary size for the&nbsp;...",
      "cacheId": "Kl-h8OPLKVcJ",
      "formattedUrl": "https://paulownia.itatests.com/analysis-and-personal-design",
      "htmlFormattedUrl": "https://paulownia.itatests.com/analysis-and-personal-design",
      "pagemap": {
        "metatags": [
          {
            "viewport": "width=device-width, initial-scale=1",
            "csrf-token": "fM0YDwMDAoxWfawQrICst3596yxwjhXsde3bgDVF"
          }
        ]
      }
    },
    {
      "kind": "customsearch#result",
      "title": "Paulownia",
      "htmlTitle": "Paulownia",
      "link": "https://paulownia.itatests.com/faq",
      "displayLink": "paulownia.itatests.com",
      "snippet": "Main / FAQ. FAQ. How to plant; How to grow; Topic3; Topic4; Topic5. Plant to \nground? Yes. What does it eats? Water and sun. How fast is it grow??? Very fast.",
      "htmlSnippet": "Main / FAQ. FAQ. How to plant; How to grow; Topic3; Topic4; Topic5. Plant to \u003cbr\u003e\nground? Yes. What does it eats? Water and sun. How \u003cb\u003efast\u003c/b\u003e is it grow??? Very \u003cb\u003efast\u003c/b\u003e.",
      "cacheId": "rrR5XYEx6TUJ",
      "formattedUrl": "https://paulownia.itatests.com/faq",
      "htmlFormattedUrl": "https://paulownia.itatests.com/faq",
      "pagemap": {
        "metatags": [
          {
            "viewport": "width=device-width, initial-scale=1",
            "csrf-token": "r1J2nO63UK2JNbbuFrL7ls8QBehgeXmztamfQ3bN"
          }
        ]
      }
    },
    {
      "kind": "customsearch#result",
      "title": "Paulownia",
      "htmlTitle": "Paulownia",
      "link": "https://paulownia.itatests.com/paulownia/about",
      "displayLink": "paulownia.itatests.com",
      "snippet": "Creating plantations, fast-growing trees, combined with innovative technologies \nfor growing paulownia trees can be an important part of the policy of saving ...",
      "htmlSnippet": "Creating plantations, \u003cb\u003efast\u003c/b\u003e-growing trees, combined with innovative technologies \u003cbr\u003e\nfor growing paulownia trees can be an important part of the policy of saving&nbsp;...",
      "cacheId": "I7wxZPPMsBYJ",
      "formattedUrl": "https://paulownia.itatests.com/paulownia/about",
      "htmlFormattedUrl": "https://paulownia.itatests.com/paulownia/about",
      "pagemap": {
        "metatags": [
          {
            "viewport": "width=device-width, initial-scale=1",
            "csrf-token": "9pNVMH1h6MAK2AYhedDrCaSlzgbjWvXr5SHx4epy"
          }
        ]
      }
    },
    {
      "kind": "customsearch#result",
      "title": "\"Paulownia\" - a unique view - Paulownia",
      "htmlTitle": "&quot;Paulownia&quot; - a unique view - Paulownia",
      "link": "https://paulownia.itatests.com/show/article/16",
      "displayLink": "paulownia.itatests.com",
      "snippet": "Paulownia is a unique species of fast-growing trees that have no analogues in \nthe world. In the pages of the site you can learn about everything related to the.",
      "htmlSnippet": "Paulownia is a unique species of \u003cb\u003efast\u003c/b\u003e-growing trees that have no analogues in \u003cbr\u003e\nthe world. In the pages of the site you can learn about everything related to the.",
      "cacheId": "JdJAzsrJjCQJ",
      "formattedUrl": "https://paulownia.itatests.com/show/article/16",
      "htmlFormattedUrl": "https://paulownia.itatests.com/show/article/16",
      "pagemap": {
        "cse_thumbnail": [
          {
            "src": "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcR79_6rJkQ12mB46hI69Y4I9usE2WILPwPBoXSu9UrcBv6Sd5cGl2gIRks",
            "width": "150",
            "height": "18"
          }
        ],
        "metatags": [
          {
            "viewport": "width=device-width, initial-scale=1",
            "csrf-token": "wcknrmP7xr5qnCfksnGXWcI1fPqApMSXYfNImeit"
          }
        ],
        "cse_image": [
          {
            "src": "https://paulownia.itatests.com/images/show-news-wave.png"
          }
        ]
      }
    },
    {
      "kind": "customsearch#result",
      "title": "Paulownia",
      "htmlTitle": "Paulownia",
      "link": "https://paulownia.itatests.com/products/123en",
      "displayLink": "paulownia.itatests.com",
      "snippet": "Paulownia ShanTong in pot 5L; 9.00 €; without VAT; Over 200 pieces discount: -5\n%; Minimum order 1 tray 2 pieces. Size Product information Characteristic ...",
      "htmlSnippet": "Paulownia ShanTong in pot 5L; 9.00 €; without VAT; Over 200 pieces discount: -5\u003cbr\u003e\n%; Minimum order 1 tray 2 pieces. Size Product information Characteristic&nbsp;...",
      "cacheId": "RTGPbUF5QAwJ",
      "formattedUrl": "https://paulownia.itatests.com/products/123en",
      "htmlFormattedUrl": "https://paulownia.itatests.com/products/123en",
      "pagemap": {
        "cse_thumbnail": [
          {
            "src": "https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTYf-PVT5W4hp1flAGmOxQFN48TSPWS4Ad4yCiqgA2Lo1S21y5vLOsJ",
            "width": "127",
            "height": "91"
          }
        ],
        "metatags": [
          {
            "viewport": "width=device-width, initial-scale=1",
            "csrf-token": "tXY8VlPmON0LtNE3vHzq1CON3sIHiAzpAaxMijtl"
          }
        ],
        "cse_image": [
          {
            "src": "https://paulownia.itatests.com/images/product-card-1_4%20asp-rat-placeholder.jpg"
          }
        ]
      }
    }
  ]
}
</script>