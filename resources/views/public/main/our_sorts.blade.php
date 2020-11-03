<!-- START SECTION BLOG -->
<div class="sorts-container">
    <h6>PAULOWNIA PROFESSIONAL®</h6>
    <h1>{{__('products.sort-header')}}</h1>
    <div class="row px-4 sort-body">
        <img class="main-sort-leaf" src="{{ asset('images/main_sort_leaf.png') }}" alt="paulownia">
        <div class="col-12 sorts-wrap mt-4">
            <div class="row">
                <div class="col-12">  
                    <div class="col-4 sort-label">
                        <img src="{{ asset('images/label-z-pro.png') }}" alt="paulownia z-pro">
                        <div class="z-pro">Ze Pro®</div>
                    </div>
                    <div class="sort-label col-4">
                        <img src="{{ asset('images/label-turbo-pro.png') }}" alt="paulownia turbo-pro">
                        <div class="turbo-pro">Turbo Pro®</div>
                    </div>
                    <div class="sort-label col-4">
                        <img src="{{ asset('images/label-pro-x.png') }}" alt="paulownia PrOxY">
                        <div class="proxy">PrOxY 2®</div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 sort-label-text">
                    <div>Elongata</div>
                    <div>Tomentosa</div>
                    <div>Kawakamii</div>
                    <div>Shan Tong</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->
@push('scripts')
    <script>

        $.ajax({
            url: '/sorts-data',
            success: function(response){
                let textSortLabels = [];
                response.sorts.map(function(sort) {
                    if(sort.admin_name.toLowerCase().indexOf('ze') > -1) {
                        $('.z-pro').html(sort.admin_name);
                    } else if (sort.admin_name.toLowerCase().indexOf('turbo') > -1) {
                        $('.turbo-pro').html(sort.admin_name);
                    } else if (sort.admin_name.toLowerCase().indexOf('prox') > -1) {
                        $('.proxy').html(sort.admin_name);
                    } else {
                        textSortLabels.push(`<div>${sort.admin_name}</div>`);
                    }
                });
                $('.sort-label-text').html('');
                $('.sort-label-text').html(textSortLabels.join(''));
            }
        })
    </script>
@endpush