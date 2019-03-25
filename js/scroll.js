(function ( $ ) {
  var $els = $('.content');
  var $window = $(window);
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

        // Iro
        if ($el.data().fgColor) {
          document.documentElement.style
            .setProperty('--fg-color', $el.data().fgColor);
        }

        if ($el.data().bgColor) {
          document.documentElement.style
            .setProperty('--bg-color', $el.data().bgColor);
        }
      }
    })
  });

  $.each( $els, function () {
    // Hide the content that is out of view
    if ( $(this).offset().top > $window.height() ) {
      $('.content').addClass('content_type_hidden');
    }
  })
} ( jQuery ) )
