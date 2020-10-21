<div class='col-md-10'>

    <div class="tab-content nav-responsive nav nav-tabs" id="nav-tabContent">
        <div class="tab-pane fade active in" id="main-form" role="tabpanel" aria-labelledby="main-form">
            <div class="row">
            <ul class="nav-responsive nav nav-tabs">
              <li class='active'>
                <a class="nav-link btn btn-outline-primary btn-sm mb-2"
                  id="main-form-btn" data-toggle="pill"
                  href="#general" role="tab"
                  aria-controls="general" aria-selected="true"
                  >
                  @lang('admin.form.main')
                </a>
              </li>
              <li>
                <a class="nav-link btn btn-outline-primary btn-sm mb-2"
                  data-toggle="pill"
                  href="#price" role="tab"
                  aria-controls="price" aria-selected="true"
                  >
                  @lang('admin.products.form.tabs.price')
                </a>
              </li>
              <li>
                <a class="nav-link btn btn-outline-primary btn-sm mb-2"
                  data-toggle="pill"
                  href="#shipping" role="tab"
                  aria-controls="shipping" aria-selected="true"
                  >
                  @lang('admin.products.form.tabs.shipping')
                </a>
              </li>
              <li>
                <a class="nav-link btn btn-outline-primary btn-sm mb-2"
                  data-toggle="pill"
                  href="#images" role="tab"
                  aria-controls="images" aria-selected="true"
                  >
                  @lang('admin.products.form.tabs.images')
                </a>
              </li>
              <li>
                <a class="nav-link btn btn-outline-primary btn-sm mb-2"
                  data-toggle="pill"
                  href="#categories" role="tab"
                  aria-controls="categories" aria-selected="true"
                  >
                  @lang('admin.products.form.tabs.categories')
                </a>
              </li>
            </ul>
              <div class="tab-content nav-responsive nav nav-tabs sub-nav-content" id="nav-tabContent">
                @foreach ($product->attribute_family->attribute_groups as $attributeGroup)
                  @if (count($attributeGroup->custom_attributes))
                    <div class="tab-pane fade {{$loop->first ? 'active in' : ''}}" id="{{strtolower($attributeGroup->name)}}" role="tabpanel" aria-labelledby="{{$attributeGroup->name}}">
                      @foreach ($attributeGroup->custom_attributes as $attribute)
                        @if (! $product->super_attributes->contains($attribute) )
                          @if($attribute->code == 'tree_size')
                          <div class="form-group text">

                              <label for="tree_size" class="control-label col-sm-3 required">
                                @lang('admin.products.form.attributes.'. $attribute->code)
                              </label>
                              <select class='form-control col-sm-6' name='tree_size' data-value="{{$product->tree_size}}">
                                <option value=''>Выберите размер</option>
                                <option value='600_ml'>600мл</option>
                                <option value='5_l'>5 литров</option>
                                <option value='3_m'>Дерево 3 метра</option>
                                <option value='5_m'>Дерево 5 метров</option>
                              </select>
                            </div>
                          @elseif (!$attribute->value_per_locale && view()->exists($typeView = 'admin::catalog.products.field-types.' . $attribute->type) )
                            <div class="form-group {{ $attribute->type }}">

                              <label for="{{ $attribute->code }}" class="control-label col-sm-3 {{ $attribute->is_required ? 'required' : ''}}" >
                                @lang('admin.products.form.attributes.'. $attribute->code)
                                @if ($attribute->type == 'price')
                                    <span class="currency-code">({{ core()->currencySymbol(core()->getBaseCurrencyCode()) }})</span>
                                @endif
                                
                              </label>
                              @include ($typeView)
                            </div>
                          @endif
                        @endif
                      @endforeach
                    </div>
                  @endif

                @endforeach

                <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images">
                  <div class='form-group'>
                      @include('admin.add-images.cropper', ['images' => $product->images])
                  </div>
                </div>
                <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories">
                  <div class='form-group'>
                      @include('admin.products.tabs.categories')
                  </div>
                </div>



                <div class='hidden'>
                  <input name='attribute_family_id' value='2' hidden/>
                  <input name='channel' value='default' hidden/>
                  <input name='locale' value='en'/>
                </div>

              </div>
              
                
              </div>
            </div>

        </div>
        @foreach(config('translatable.locales') as $locale)
            <div class="tab-pane fade" id={{$locale}} role="tabpanel"
                aria-labelledby={{$locale}}>
                <div class="border p-4 mb-4 bg-light rounded">
                  
                  @foreach($localizedAttributes as $localizedAttribute)
                    @if($localizedAttribute->type == 'text')
                      @include('admin.multi_lang_inputs.text_input', [
                        'item' => $product,
                        'itemProperty' => $localizedAttribute->code, 
                        'name' => 'translates['.$locale.']['.$localizedAttribute->code.']'
                      ])
                    @elseif($localizedAttribute->type == 'textarea')
                      @include('admin.multi_lang_inputs.text_area', [
                        'item' => $product,
                        'itemProperty' => $localizedAttribute->code,
                        'name' => 'translates['.$locale.']['.$localizedAttribute->code.']'
                      ])
                    @endif
                  @endforeach
                </div>
                @if($locale == 'es')
                    <div class="text-center">
                        <button id="translate" type="button" class="btn btn-warning mb-2">
                            @lang('admin.form.translate_to_other')
                        </button>
                    </div>
                @endif
            </div>

        @endforeach
    </div>
    
</div>
<div class='col-md-2'>
    <div class='form-sidebar'>
        @include('admin.langPanel')
        <div>
            <button class="btn btn-success full-width mb-15" type="submit">@lang('admin.btns.save')</button>
        </div>
        <div>
            <a href="{{ url('/admin/products') }}" title="Back" class='btn btn-warning full-width mb-15'><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('admin.btns.back')</a>
        </div>
    </div>
</div>
@push('scripts')
  <script src="{{ asset('js/translate.js') }}"></script>
  <script>
    $(document).ready(function(){

      let selected = $('select[name="tree_size"]').data('value')
      $('select[name="tree_size"] option[value='+ selected +']').attr('selected', 'true')

      let lastViewedSubTab = undefined;
      $('.form-sidebar li a').click(function(){
        if($(this).attr('href') != '#main-form'){
          if($('#main-form .tab-pane.active').attr('id')){
            lastViewedSubTab = $('#main-form .tab-pane.active').attr('id')
          }
          $('#main-form.active').removeClass('active')
        }else{
          setTimeout(() => {
            $('#nav-tabContent ~ .tab-pane.active').removeClass('active in')
            $('#' + lastViewedSubTab).addClass('active in')  
          }, 200);
          
        }
      })
    })
  </script>
@endpush

