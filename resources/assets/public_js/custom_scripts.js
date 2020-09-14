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
})
