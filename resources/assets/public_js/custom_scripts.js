function resizeCardsHeight(selector){
  var heights = $(selector).map(function ()
  {
      return $(this).height();
  }).get();

  $(selector).css('height', Math.max.apply(null, heights))
}