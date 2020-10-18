@extends('layouts.public')
@section('content')
@include('public.blocks.page_header', ['title' => __('products.all-goods')])
<div class='custom-page-description'>
<section>
    <div class='products-info'>
        ОСЕНЬ / ЗИМА 2020/2021
        Мы рады приветствовать всех любителей Павловнии, посетителей нашего сайта и наших клиентов. Мы ценим ваше доверие и выбор Paulownia Professional® в качестве основного поставщика. В осенне-зимнем сезоне 2020/2021 мы предложим вам деревья павловнии 3 и 5 метров и Stumps разного формата открытым корнем. Сток по всем позициям ограничен !!! Летний сезон деревьев и саженцев павловнии в горшках 5 л и 600 мл окончен и даные товары будут доступны в начале весеннего сезона 2021 года.
        Перевозка:
        Стоимость доставки рассчитывается индивидуально после получения вашего заказа.
        Стоимость доставки для минимальных заказов от € 13,50(По Европе).

        Экономичные, срочные отгрузки 24 часа Испания, Португалия.
        Доставка во все европейские страны, включая Канарские острова 72 часа
    </div>
	<div class="products-data">
    	<div class="row">	
        	<div class="col-lg-9 products-list">
                <div class="row shop_container grid_view">
                  @foreach($products as $product)
                    @include('public.products.product_card', ['product' => $product])
                  @endforeach
                </div>
                <div class="row">
                    <div class="col-12 mt-3 mt-lg-4">
                        {{ $products->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        	<div class="col-lg-3 order-lg-first mt-5 mt-lg-0 products-sidebar pd-10" data-products-price-min="{{$allProducts->min('price')}}" data-products-price-max="{{$allProducts->max('price')}}" >
                <div id="accordion" class="accordion">
                    <div class="card">
                      <div class="card-header" id="heading-One">
                        <h6 class="mb-0">
                            <a data-toggle="collapse" href="#collapse-One" aria-expanded="true" aria-controls="collapse-One">
                                Цена, $
                            </a>
                        </h6>
                      </div>
                      <div id="collapse-One" class="collapse show" aria-labelledby="heading-One" data-parent="#accordion">
                        <div class="card-body">
                            <div class='row form-group'>
                                <div class='col-md-6 pd-10'>
                                    <label>От </label>
                                    <input placeholder="От" class='col-md-12 form-control' step="1" name="filters[price][from]" type="number" max="{{$allProducts->max('price')}}" min="{{$allProducts->min('price')}}">
                                </div>
                                <div class='col-md-6 pd-10'>
                                    <label>До </label>
                                    <input placeholder="До" class='col-md-12 form-control' step="1" name="filters[price][to]" type="number" min="{{$allProducts->min('price')}}" max="{{$allProducts->max('price')}}">
                                </div>
                            </div>
                            <div id="slider-range"></div>

                        </div>
                      </div>
                    </div>
                </div>
                <div id="accordion2" class="accordion">
                    <div class="card">
                      <div class="card-header" id="heading-Two">
                        <h6 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-Two" aria-expanded="false" aria-controls="collapse-Two">
                                Donec sollicitudin molestie malesuada?
                            </a>
                        </h6>
                      </div>
                      <div id="collapse-Two" class="collapse" aria-labelledby="heading-Two" data-parent="#accordion2">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                      </div>
                    </div>
                </div>
                <div id="accordion3" class="accordion">
                    <div class="card">
                      <div class="card-header" id="heading-Three">
                        <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse-Three" aria-expanded="false" aria-controls="collapse-Three">Vivamus magna justo lacinia eget convallis at tellus?</a> </h6>
                      </div>
                      <div id="collapse-Three" class="collapse" aria-labelledby="heading-Three" data-parent="#accordion3">
                        <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                      </div>
                    </div>
                </div>
                <div id="accordion4" class="accordion">
                    <div class="card">
                      <div class="card-header" id="heading-Four">
                        <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse-Four" aria-expanded="false" aria-controls="collapse-Four">Proin tortor risus Curabitur non nulla amet?</a> </h6>
                      </div>
                      <div id="collapse-Four" class="collapse" aria-labelledby="heading-Four" data-parent="#accordion4">
                        <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                      </div>
                    </div>
                </div>
                <div id="accordion5" class="accordion">
                    <div class="card">
                      <div class="card-header" id="heading-Five">
                        <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapse-Five" aria-expanded="false" aria-controls="collapse-Five">Donec sollicitudin molestie malesuada?</a> </h6>
                      </div>
                      <div id="collapse-Five" class="collapse" aria-labelledby="heading-Five" data-parent="#accordion">
                        <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection

@push('scripts')

<script>
  $( function() {
    let min = parseInt($('.products-sidebar').data('products-price-min'))
    let max = parseInt($('.products-sidebar').data('products-price-max'))
    $( "#slider-range" ).slider({
      range: true,
      min: min,
      max: max,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $('input[name="filters[price][from]"]').val(ui.values[0])
        $('input[name="filters[price][to]"]').val(ui.values[1])
        // $("#amount").val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $('input[name="filters[price][from]"]').val(75)
    $('input[name="filters[price][to]"]').val(300)
    $('input[name="filters[price][from]"]').change(function(){
        $("#slider-range").slider('values', 0 , $(this).val()); // sets first handle (index 0) to 50
    })
    $('input[name="filters[price][to]"]').change(function(){
        $("#slider-range").slider('values', 1 , $(this).val()); // sets first handle (index 0) to 50
    })

  } );
</script>

@endpush
