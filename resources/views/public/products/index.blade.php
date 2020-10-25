@extends('layouts.public')
@section('content')
@include('public.blocks.page_header', ['title' => __('products.all-goods')])
<div class='custom-page-description'>
  <section>
    <div class='products-info'>
        <div class='close-btn'>
          <img src='/images/close.png'>
        </div>
        <div class='title highlighted'>
          ОСЕНЬ / ЗИМА 2020/2021
        </div>

        Мы рады приветствовать всех любителей Павловнии, посетителей нашего сайта и наших клиентов. Мы ценим ваше доверие и выбор Paulownia Professional® в качестве основного поставщика. В <span class='highlighted'>осенне-зимнем сезоне 2020/2021</span> мы предложим вам деревья павловнии <span class='highlighted'>3 и 5 метров</span> и Stumps разного формата открытым корнем. Сток по всем позициям ограничен !!! <span class='highlighted'>Летний сезон</span> деревьев и саженцев павловнии <span class='highlighted'>в горшках 5 л и 600 мл окончен</span> и даные товары будут доступны в начале весеннего сезона 2021 года.
        
        <div class='title highlighted'>
          Перевозка:
        </div>
        <p>
          Стоимость доставки рассчитывается индивидуально после получения вашего заказа.</br>
        Стоимость доставки для <span class='highlighted'>минимальных заказов</span> от <span class='highlighted'>€ 13,50</span>(По Европе).
        </p>
        Экономичные, срочные отгрузки <span class='highlighted'>24 часа Испания, Португалия</span>.<br>
        Доставка во все <span class='highlighted'>европейские страны</span>, включая Канарские острова 72 часа
    </div>
	  <div class="products-data">
    	<div class="row">	
        	<div class="col-lg-9 products-list">
                <div class="row shop_container grid_view">
                  @foreach($products as $product)
                    @include('public.products.product_card', ['product' => $product, 'customClasses' => 'col-lg-4'])
                  @endforeach
                </div>
                <div class="row">
                    <div class="col-12 mt-3 mt-lg-4">
                        {{ $products->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
          <div class="col-lg-3 order-lg-first mt-5 mt-lg-0 products-sidebar pd-10"
            data-products-price-min="{{$allProducts->min('price')}}"
            data-products-price-max="{{$allProducts->max('price')}}" >
            <form>
              <div id="accordion" class="accordion">
                  <div class="card">
                    <div class="card-header" id="heading-One">
                      <h6 class="mb-0">
                          <a data-toggle="collapse" href="#collapse-One" aria-expanded="true" aria-controls="collapse-One">
                              @lang('products.price'), $
                          </a>
                      </h6>
                    </div>
                    <div id="collapse-One" class="collapse show" aria-labelledby="heading-One" data-parent="#accordion">
                      <div class="card-body">
                          <div class='row form-group'>
                              <div class='col-md-6 pd-10'>
                                  <label>@lang('products.price.from')</label>
                                  <input placeholder="От" class='col-md-12 form-control'
                                    data-current-value='{{empty($currentFilters["price"]) ? 25 : $currentFilters["price"]["from"]}}'
                                    step="1"
                                    name="filters[price][from]"
                                    type="number"
                                    max="{{(int)$allProducts->max('price')}}"
                                    min="{{(int)$allProducts->min('price')}}"
                                  >
                              </div>
                              <div class='col-md-6 pd-10'>
                                  <label>@lang('products.price.to')</label>
                                  <input placeholder="До"
                                    class='col-md-12 form-control'
                                    data-current-value='{{empty($currentFilters["price"]) ? 400 : $currentFilters["price"]["to"]}}'
                                    step="1"
                                    name="filters[price][to]"
                                    type="number"
                                    min="{{(int)$allProducts->min('price')}}"
                                    max="{{(int)$allProducts->max('price')}}"
                                  >
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
                              @lang('products.categories')
                          </a>
                      </h6>
                    </div>
                    <div id="collapse-Two" class="collapse" aria-labelledby="heading-Two" data-parent="#accordion2">
                      <div class="card-body">
                        @foreach($categories as $category)
                          <label class="checkbox-container">
                            {{$category->name}}
                            @if(!empty($currentFilters["categories"]) && in_array($category->id, $currentFilters["categories"]))
                              <input 
                                type="checkbox" 
                                name='filters[categories][]'
                                value="{{$category->id}}"
                                checked='true'
                              >
                            @else
                              <input 
                                type="checkbox" 
                                name='filters[categories][]'
                                value="{{$category->id}}"
                              >
                            @endif
                            <span class="checkmark"></span>
                          </label>
                        @endforeach
                      </div>
                    </div>
                  </div>
              </div>
              <div id="accordion3" class="accordion">
                  <div class="card">
                    <div class="card-header" id="heading-Three">
                      <h6 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapse-Three" aria-expanded="false" aria-controls="collapse-Three">
                              @lang('products.sort')
                          </a>
                      </h6>
                    </div>
                    <div id="collapse-Three" class="collapse" aria-labelledby="heading-Three" data-parent="#accordion3">
                      <div class="card-body">
                        @foreach($sorts as $sort)
                          <label class="checkbox-container">
                            {{$sort->admin_name}}
                            @if(!empty($currentFilters["type_of_paulownia"]) && in_array($sort->id, $currentFilters["type_of_paulownia"]))
                              <input type="checkbox" name='filters[type_of_paulownia][]' value='{{$sort->id}}' checked='true'>
                            @else
                              <input type="checkbox" name='filters[type_of_paulownia][]' value='{{$sort->id}}'>
                            @endif
                            <span class="checkmark"></span>
                          </label>
                        @endforeach
                      </div>
                    </div>
                  </div>
              </div>
              <div id="accordion4" class="accordion">
                  <div class="card">
                    <div class="card-header" id="heading-Four">
                      <h6 class="mb-0">
                          <a class="collapsed" data-toggle="collapse" href="#collapse-Four" aria-expanded="false" aria-controls="collapse-Four">
                            @lang('products.tree_size')
                          </a>
                      </h6>
                    </div>
                    
                    <div id="collapse-Four" class="collapse" aria-labelledby="heading-Four" data-parent="#accordion4">
                      <div class="card-body">
                        <label class="checkbox-container">
                          @lang('products.tree_size.600_ml')
                          @if(!empty($currentFilters["tree_size"]) && in_array('600_ml', $currentFilters["tree_size"]))
                              <input type="checkbox" name='filters[tree_size][]' value='600_ml' checked='true'>
                          @else
                            <input type="checkbox" name='filters[tree_size][]' value='600_ml'>
                          @endif
                          <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-container">
                          @lang('products.tree_size.5_l')
                          @if(!empty($currentFilters["tree_size"]) && in_array('5_l', $currentFilters["tree_size"]))
                              <input type="checkbox" name='filters[tree_size][]' value='5_l' checked='true'>
                          @else
                            <input type="checkbox" name='filters[tree_size][]' value='5_l'>
                          @endif
                          <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-container">
                          @lang('products.tree_size.3_m')
                          @if(!empty($currentFilters["tree_size"]) && in_array('3_m', $currentFilters["tree_size"]))
                              <input type="checkbox" name='filters[tree_size][]' value='3_m' checked='true'>
                          @else
                            <input type="checkbox" name='filters[tree_size][]' value='3_m'>
                          @endif
                          <span class="checkmark"></span>
                        </label>
                        <label class="checkbox-container">
                          @lang('products.tree_size.5_m')
                          @if(!empty($currentFilters["tree_size"]) && in_array('5_m', $currentFilters["tree_size"]))
                              <input type="checkbox" name='filters[tree_size][]' value='5_m' checked='true'>
                          @else
                            <input type="checkbox" name='filters[tree_size][]' value='5_m'>
                          @endif
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
              </div>
              <div id="accordion5" class="accordion">
                <div class="card">
                  <div class="card-header" id="heading-Five">
                    <h6 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" href="#collapse-Five" aria-expanded="false" aria-controls="collapse-Five">
                          @lang('products.season')
                        </a>
                    </h6>
                  </div>
                  <div id="collapse-Five" class="collapse" aria-labelledby="heading-Five" data-parent="#accordion">
                    <div class="card-body">
                      @foreach($seasons as $season)
                        <label class="checkbox-container">
                          {{$season->admin_name}}
                          @if(!empty($currentFilters["season"]) && in_array($season->id, $currentFilters["season"]))
                              <input type="checkbox" name='filters[type_of_paulownia][]' value='{{$season->id}}' checked='true'>
                          @else
                            <input type="checkbox" name='filters[season][]' value="{{$season->id}}">
                          @endif
                          <span class="checkmark"></span>
                        </label>    
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <button class='custom-page-tab col-md-10 col-sm-offset-2 active submit-btn'>
                @lang('products.filters.submit')
              </div>
            </div>
          </form>
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
    var priceFrom = $('input[name="filters[price][from]"]')
    var priceTo = $('input[name="filters[price][to]"]')
    
    var priceFromValue = priceFrom.data('current-value') || 75
    var priceToValue = priceTo.data('current-value') || 300
    priceFrom.val(priceFromValue)
    priceTo.val(priceToValue)
    $( "#slider-range" ).slider({
      range: true,
      min: min,
      max: max,
      values: [ priceFromValue, priceToValue ],
      slide: function( event, ui ) {
        $('input[name="filters[price][from]"]').val(ui.values[0])
        $('input[name="filters[price][to]"]').val(ui.values[1])
      }
    });
    
    $('input[name="filters[price][from]"]').change(function(){
        $("#slider-range").slider('values', 0 , $(this).val()); // sets first handle (index 0) to 50
    })
    $('input[name="filters[price][to]"]').change(function(){
        $("#slider-range").slider('values', 1 , $(this).val()); // sets first handle (index 0) to 50
    })

    $('.close-btn').click(function(){
      $('.products-info').fadeOut(900)
    })

  } );
</script>

@endpush
