(function ( $ ) {
  var $els = $('.content');
  var $window = $(window);

  // Reveal content as the user scrolls
  $window.on('scroll resize', function () {
    var window_height = $window.height();
    var window_top = $window.scrollTop();
    var window_bottom = (window_top + window_height);
    $.each( $els, function () {
      var $el = $(this);
      var el_height = $el.outerHeight();
      var el_top = $el.offset().top;
      var el_bottom = (el_top + el_height);
      if (
        (el_bottom >= window_top) &&
        (el_top <= window_bottom)
      ) {
        $el.removeClass( 'content_type_hidden' )
      }
    })
  });

  // Hide only the content that is out of view
  var window_height = $window.height();
  var window_top = $window.scrollTop();
  var window_bottom = (window_top + window_height);
  $.each( $els, function () {
    var $el = $(this);
    var el_top = $el.offset().top;
    if ( el_top >= window_bottom )  {
      $(this).addClass('content_type_hidden');
    }
  })
} ( jQuery ) )
