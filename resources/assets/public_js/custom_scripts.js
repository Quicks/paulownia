function resizeCardsHeight(selector){
  var heights = $(selector).map(function ()
  {
      return $(this).height();
  }).get();

  $(selector).css('height', Math.max.apply(null, heights))
}

$(document).ready(function(){
  $(document).on('click', '.add-product-to-cart', function(e){
    var productId = $(this).data('product-id')
    var quantity = $(this).data('quantity')

    $.ajax({
      url: 'api/checkout/cart/add/' + productId,
      type: 'POST',
      data: {
        product: productId,
        quantity: quantity
      }, success: function(response){
        console.log(response)
        $('.cart_count').text(response.data.items_count)

      }
    })
    return false
  })

  $(document).on('click', '.item_remove', function(e){
    var productId = $(this).data('product-id')
    var that = this
    $.ajax({
      url: 'api/checkout/cart/remove-item/' + productId,
      success: function(response){
        $(that).parent().remove()
        $('.cart_count').text(response.data.items_count)
      }
    })
    return false
  })
})
