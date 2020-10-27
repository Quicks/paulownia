function resizeCardsHeight(selector){
  var heights = $(selector).map(function ()
  {
      return $(this).height();
  }).get();

  $(selector).css('height', Math.max.apply(null, heights))
}

var Cart = (function(){
  this.addtoCart = function(productId, quantity, callback){
    $.ajax({
      url: '/api/checkout/cart/add/' + productId,
      type: 'POST',
      data: {
        product: productId,
        quantity: quantity
      },
      success: function(response){
        updatePreview()
        let html = $('#success-put-to-bag-modal-wrapper').html()
        $.magnificPopup.open({
          items: {
            src: html,
            type: 'inline'
          }
        });
        callback(response)
      }
    })
  }
  this.removeFromCart = function(productId, callback){
    $.ajax({
      url: '/api/checkout/cart/remove-item/' + productId,
      success: function(response){
        updatePreview()
        callback(response)
      }
    })
  }
  this.updateQuantity = function(cartItemId, quantity, callback){
    $.ajax({
      url: '/api/checkout/cart/update',
      method: 'PUT',
      data: {
        qty: {
          [cartItemId]: quantity
        }
      },
      success: function(response){
        updatePreview()
        callback(response)
      }
    })
  }

  function updatePreview(){
    $.ajax({
      url: '/cart/cart-preview',
      success: function(response){
        $('#cart-header-preview').html(response)
      }
    })
  }

  return this
})()

$(document).ready(function(){
  $(document).on('click', '.add-product-to-cart', function(e){
    var productId = $(this).data('product-id')
    var quantity = $(this).data('quantity')
    Cart.addtoCart(productId, quantity, function(response){
      $('.cart_count').text(response.data.items_count)
    })
    return false
  })
  $(document).on('click', '.add-product-to-wishlist', function(e){
    let that = this
    var productId = $(this).data('product-id')
    $.ajax({
      url: '/api/wishlist/add/' + productId,
      success: function(response){
        if(response.data){
          $.magnificPopup.open({
            items: {
              src: $('#wishlist-added-popup').html(),
              type: 'inline'
            }
          });
          $(that).addClass('wishlisted')
        }else{
          $.magnificPopup.open({
            items: {
              src: $('#wishlist-removed-popup').html(),
              type: 'inline'
            }
          });
          $(that).removeClass('wishlisted')
        }

      }
    })
    return false
  })
  $(document).on('click', '.item_remove', function(e){
    var productId = $(this).data('product-id')
    var that = this
    Cart.removeFromCart(productId, function(response){
      $(that).parent().remove()
      $('.cart_count').text(response.data.items_count)
    })
    return false
  })
  // close message in header
  $('.message-close').click(function () {
    $('.header-message-wrap').css('visibility', 'hidden')
  })
  
  var timeoutTitme = 200;
  var timeout;
  $(document).on('click', '.plus', function(){
    var quantityDom = $(this).parents('.product-quantity').first()
    var quantity = quantityDom.find('input[name="quantity"]').val()
    var newQuantity = parseInt(quantity) + 1
    quantityDom.find('input[name="quantity"]').val(newQuantity)	
    clearTimeout(timeout)
    timeout = setTimeout(function(){
      updateCart(quantityDom, newQuantity)
    }, timeoutTitme)
  })
  $(document).on('click', '.minus', function(){
    var quantityDom = $(this).parents('.product-quantity').first()
    var quantity = quantityDom.find('input[name="quantity"]').val()
    var newQuantity = parseInt(quantity) - 1
    var minOrderQty = quantityDom.data('cart-min-qty')
    if(newQuantity >= minOrderQty){
      quantityDom.find('input[name="quantity"]').val(newQuantity)
      clearTimeout(timeout)
      timeout = setTimeout(function(){
        updateCart(quantityDom, newQuantity)
      }, timeoutTitme)
    }
  })
  $(document).on('change', '.quantity input[name="quantity"]', function(){
    var quantityDom = $(this).parents('.product-quantity').first()
    var newQuantity = parseInt($(this).val())
    var minOrderQty = quantityDom.data('cart-min-qty')
    if(newQuantity >= minOrderQty){
      clearTimeout(timeout)
      timeout = setTimeout(function(){
        updateCart(quantityDom, newQuantity)
      }, timeoutTitme)
    }else{
      clearTimeout(timeout)
      timeout = setTimeout(function(){
        updateCart(quantityDom, minOrderQty)
      }, timeoutTitme)
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
