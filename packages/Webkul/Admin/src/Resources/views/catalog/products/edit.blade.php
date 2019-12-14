@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.catalog.products.edit-title') }}
@stop

@section('content')
    <div class="content">
        <?php $locale = request()->get('locale') ?: app()->getLocale(); ?>
        <?php $channel = request()->get('channel') ?: core()->getDefaultChannelCode(); ?>

        {!! view_render_event('bagisto.admin.catalog.product.edit.before', ['product' => $product]) !!}

        <form method="POST" action="" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">

                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>

                        {{ __('admin::app.catalog.products.edit-title') }}
                    </h1>

                    <div class="control-group">
                        <select class="control" id="channel-switcher" name="channel">
                            @foreach (core()->getAllChannels() as $channelModel)

                                <option value="{{ $channelModel->code }}" {{ ($channelModel->code) == $channel ? 'selected' : '' }}>
                                    {{ $channelModel->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>

                    <div class="control-group">
                        <select class="control" id="locale-switcher" name="locale">
                            @foreach (core()->getAllLocales() as $localeModel)

                                <option value="{{ $localeModel->code }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                    {{ $localeModel->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <script>
                    function scrollToRequiredField() {
                        let elements = document.getElementsByClassName('control-error');
                        if (elements != undefined) {
                            elements[0].scrollIntoView({block: "center", behavior: "smooth"});
                        }
                    }
                </script>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary" onclick="scrollToRequiredField()">
                        {{ __('admin::app.catalog.products.save-btn-title') }}
                    </button>
                </div>
            </div>

            <div class="page-content">
                @csrf()
                <div id="cropper-div" class="modal">
                    <div>
                        <img id="image-crop" style="max-width:100%; min-height: 450px; min-width: 450px;">
                    </div>
                    <div class="">
                        <button id="rot1" type="button" class="btn btn-black" style="margin:4px"><i class="fa fa-rotate-right" aria-hidden="true"></i> 90&deg; </button>
                        <button id="rot2" type="button" class="btn btn-black" style="margin:4px"><i class="fa fa-rotate-left" aria-hidden="true"></i> -90&deg; </button>
                        <button id="rot3" type="button" class="btn btn-black" style="margin:4px"><i class="fa fa-rotate-right" aria-hidden="true"></i> 3&deg; </button>
                        <button id="rot4" type="button" class="btn btn-black" style="margin:4px"><i class="fa fa-rotate-left" aria-hidden="true"></i> -3&deg; </button>
                        <button id="scalex" type="button" class="btn btn-black" style="margin:4px"><i class="fa fa-arrows-h" aria-hidden="true"></i>  </button>
                        <button id="scaley" type="button" class="btn btn-black" style="margin:4px"><i class="fa fa-arrows-v" aria-hidden="true"></i> </button>
                        <br>
                        <button id="zoom-in" type="button" class="btn btn-black" style="margin:4px"><i class="fa fa-search-plus" aria-hidden="true"></i> zoom in</button>
                        <button id="zoom-out" type="button" class="btn btn-black" style="margin:4px"><i class="fa fa-search-minus" aria-hidden="true"></i> zoom-out</button>
                        <button id="reset" type="button" class="btn btn-black" style="margin:4px"><i class="fa fa-refresh" aria-hidden="true"></i> Reset </button>
                        <br>
                        <button id="checkbtn" class="btn btn-black" type="button" style="margin:4px">
                            <label class="">
                                <input type="checkbox" name="watermark" id="watermark" 
                                onchange="$('#checkbtn').toggleClass('btn-info btn-outline-info')">
                                Add watermark
                            </label>
                        </button>
                        <button id="save" type="button" class="btn btn-primary" style="float:right; margin:4px">
                            <i class="fa fa-save" aria-hidden="true"></i> 
                            Save 
                        </button>
                    </div>
                </div>
                <input name="_method" type="hidden" value="PUT">

                @foreach ($product->attribute_family->attribute_groups as $attributeGroup)

                    @if (count($attributeGroup->custom_attributes))

                        {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.' . $attributeGroup->name . '.before', ['product' => $product]) !!}

                        <accordian :title="'{{ __($attributeGroup->name) }}'" :active="true">
                            <div slot="body">
                                {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.' . $attributeGroup->name . '.controls.before', ['product' => $product]) !!}

                                @foreach ($attributeGroup->custom_attributes as $attribute)

                                    @if (! $product->super_attributes->contains($attribute))

                                        <?php
                                            $validations = [];
                                            $disabled = false;
                                            if ($product->type == 'configurable' && in_array($attribute->code, ['price', 'cost', 'special_price', 'special_price_from', 'special_price_to', 'width', 'height', 'depth', 'weight'])) {
                                                if (! $attribute->is_required)
                                                    continue;

                                                $disabled = true;
                                            } else {
                                                if ($attribute->is_required) {
                                                    array_push($validations, 'required');
                                                }

                                                if ($attribute->type == 'price') {
                                                    array_push($validations, 'decimal');
                                                }

                                                array_push($validations, $attribute->validation);
                                            }

                                            $validations = implode('|', array_filter($validations));
                                        ?>

                                        @if (view()->exists($typeView = 'admin::catalog.products.field-types.' . $attribute->type))

                                            <div class="control-group {{ $attribute->type }}" @if ($attribute->type == 'multiselect') :class="[errors.has('{{ $attribute->code }}[]') ? 'has-error' : '']" @else :class="[errors.has('{{ $attribute->code }}') ? 'has-error' : '']" @endif>

                                                <label for="{{ $attribute->code }}" {{ $attribute->is_required ? 'class=required' : '' }}>
                                                    {{ $attribute->admin_name }}

                                                    @if ($attribute->type == 'price')
                                                        <span class="currency-code">({{ core()->currencySymbol(core()->getBaseCurrencyCode()) }})</span>
                                                    @endif

                                                    <?php
                                                        $channel_locale = [];
                                                        if ($attribute->value_per_channel) {
                                                            array_push($channel_locale, $channel);
                                                        }

                                                        if ($attribute->value_per_locale) {
                                                            array_push($channel_locale, $locale);
                                                        }
                                                    ?>

                                                    @if (count($channel_locale))
                                                        <span class="locale">[{{ implode(' - ', $channel_locale) }}]</span>
                                                    @endif
                                                </label>

                                                @include ($typeView)

                                                <span class="control-error"  @if ($attribute->type == 'multiselect') v-if="errors.has('{{ $attribute->code }}[]')" @else  v-if="errors.has('{{ $attribute->code }}')"  @endif>
                                                    @if ($attribute->type == 'multiselect')
                                                        @{{ errors.first('{!! $attribute->code !!}[]') }}
                                                    @else
                                                        @{{ errors.first('{!! $attribute->code !!}') }}
                                                    @endif
                                                </span>
                                            </div>

                                        @endif

                                    @endif

                                @endforeach

                                {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.' . $attributeGroup->name . '.controls.after', ['product' => $product]) !!}
                            </div>
                        </accordian>

                        {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.' . $attributeGroup->name . '.after', ['product' => $product]) !!}

                    @endif

                @endforeach


                {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.inventories.before', ['product' => $product]) !!}

                @include ('admin::catalog.products.accordians.inventories')

                {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.inventories.after', ['product' => $product]) !!}


                {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.images.before', ['product' => $product]) !!}

                @include ('admin::catalog.products.accordians.images')

                {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.images.after', ['product' => $product]) !!}



                {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.categories.before', ['product' => $product]) !!}

                @include ('admin::catalog.products.accordians.categories')

                {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.categories.after', ['product' => $product]) !!}


                {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.variations.before', ['product' => $product]) !!}

                @include ('admin::catalog.products.accordians.variations')

                {!! view_render_event('bagisto.admin.catalog.product.edit_form_accordian.variations.after', ['product' => $product]) !!}

                @include ('admin::catalog.products.accordians.product-links')

            </div>

        </form>

        {!! view_render_event('bagisto.admin.catalog.product.edit.after', ['product' => $product]) !!}
    </div>
@stop

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>
    <link  href="{{asset('css/cropper.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/cropper.min.js')}}"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <script>
        $(document).ready(function () {

            $('.image-item').css({'height':'100%', 'min-height':'100px'});

            $('#channel-switcher, #locale-switcher').on('change', function (e) {
                $('#channel-switcher').val()
                var query = '?channel=' + $('#channel-switcher').val() + '&locale=' + $('#locale-switcher').val();

                window.location.href = "{{ route('admin.catalog.products.edit', $product->id)  }}" + query;
            })

            tinymce.init({
                selector: 'textarea#description, textarea#short_description',
                height: 200,
                width: "100%",
                plugins: 'image imagetools media wordcount save fullscreen code',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent  | removeformat | code',
                image_advtab: true
            });

            $.modal.defaults = {clickClose: false, showClose: true, escapeClose: true};

            function initCropper(inputName) {
                var image = document.getElementById('image-crop');
                if (window.cropper) {
                    window.cropper.replace(image.src);
                } else {
                    window.cropper = new Cropper(image, {
                       aspectRatio: 428 / 247,
                    });
                }

                $('#rot1').click(function () {cropper.rotate(90);});
                $('#rot2').click(function () {cropper.rotate(-90);});
                $('#rot3').click(function () {cropper.rotate(3);});
                $('#rot4').click(function () {cropper.rotate(-3);});
                $('#scalex').click(function () {cropper.scaleX(-1);});
                $('#scaley').click(function () {cropper.scaleY(-1);});
                $('#zoom-in').click(function () {cropper.zoom(0.1);});
                $('#zoom-out').click(function () {cropper.zoom(-0.1);});
                $('#reset').click(function () {cropper.reset();});

                $('#save').click(function saveCrop (event) {
                    $('#save, button').prop('disabled', true);
                    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                    cropper.getCroppedCanvas({maxWidth: 2100, maxHeight: 2100,}).toBlob((blob) => {
                        var image_id = inputName.substring(inputName.lastIndexOf("[") + 1, inputName.lastIndexOf("]") );
                        const formData = new FormData();
                        formData.append('image', blob);
                        formData.append('image_id', image_id);
                        if ($('#watermark').prop('checked')) {
                            formData.append('watermark', true);
                        }
                      $.ajax('{{route('updateProductImage', $product->id)}}', {
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success(answer) {
                            $.modal.close();
                            $('#save, button').prop('disabled', false);
                            $('input[name="'+inputName+'"]').prop('name', 'images['+answer+']');
                            $('input[type=file]').val('');
                            $('input[name="images['+answer+']"] + img.preview')
                                .prop('src', cropper.getCroppedCanvas({maxWidth: 2100, maxHeight: 2100,}).toDataURL());
                            $('.image-item').css({'height':'100%', 'min-height':'100px'});
                        },
                        error(answer) {
                            alert("Error");
                            console.log(answer);
                        }
                      });
                    });
                });
            };

            $(document).on('change', '[name^="images"]', function(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('image-crop');
                    output.src = reader.result;
                    var inputName = event.target.name;
                    initCropper(inputName);
                    $('#cropper-div').modal();
                }
                reader.readAsDataURL(event.target.files[0]);
            }); 

        });
    </script>
@endpush