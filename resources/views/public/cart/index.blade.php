@extends('layouts.public')
@section('content')
	<div id='cart-wrapper'>
		@include('public.cart.cart', ['cart' => $cart])
	</div>
@endsection
@push('scripts')

<script>
	$(document).ready(function(){
		var timeout;
		$(document).on('click', '.plus', function(){
			var quantityDom = $(this).parents('.product-quantity').first()
			var quantity = quantityDom.find('input[name="quantity"]').val()
			var newQuantity = parseInt(quantity) + 1
			quantityDom.find('input[name="quantity"]').val(newQuantity)	
			clearTimeout(timeout)
			timeout = setTimeout(function(){
				updateCart(quantityDom, newQuantity)
			}, 500)
		})
		$(document).on('click', '.minus', function(){
			var quantityDom = $(this).parents('.product-quantity').first()
			var quantity = quantityDom.find('input[name="quantity"]').val()
			var newQuantity = parseInt(quantity) - 1
			if(newQuantity >= 1){
				quantityDom.find('input[name="quantity"]').val(newQuantity)
				clearTimeout(timeout)
				timeout = setTimeout(function(){
					updateCart(quantityDom, newQuantity)
				}, 500)
			}
		})
		$(document).on('click', '.product-remove', function(){
			Cart.removeFromCart($(this).data('cart-item-id'), function(){
				rerenderCart()
			})
		})
		
		function updateCart(quantityDom, newQuantity){
			var cartItemId = quantityDom.data('cart-item-id')
			Cart.updateQuantity(cartItemId, newQuantity, function(){
				rerenderCart(function(){
					var row = $('.product-row[data-cart-item-id="' + cartItemId + '"]')
					row.find('.product-subtotal').addClass('number-update')
					$('.cart_total_amount').addClass('number-update')
				})
			})
		}

		function rerenderCart(callback){
			$.ajax({
				url: '/{{App::getLocale()}}/cart',
				data: {
					format: 'html'
				},
				success: function(response){
					$('#cart-wrapper').html(response)
					callback()
				} 
			})
		}
	})
</script>

@endpush