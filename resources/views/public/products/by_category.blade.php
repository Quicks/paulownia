@foreach($products as $product)
  @include('public.products.product_card', ['product' => $product, 'customClasses' => $customClasses])
@endforeach