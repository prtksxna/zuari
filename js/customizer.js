/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.header a, .header' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.header a, .header' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.header a, .header' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header background color.
  wp.customize( 'header_bgcolor', function ( value ) {
    value.bind( function ( to ) {
			$( '.header' ).css( 'background-color', to );
    } );
  } );

  // Header image.
  wp.customize( 'header_image', function ( value ) {
    value.bind( function ( to ) {
			$( '.header' ).css( 'background-image', 'url(' + to + ')');
    } );
  } );

  // Foreground color variable
  wp.customize( 'fgcolor', function ( value ) {
    value.bind( function ( to ) {
      document.documentElement.style.setProperty( '--fg-color', to );
    } );
  } );

} )( jQuery );
