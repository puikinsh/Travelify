/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' == to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	//  Menu color text color.
  wp.customize( 'travelify_menu_color', function( value ) {
      value.bind( function( to ) {
          $( '#main-nav' ).css( {
          	'background-color': to,
          	'border-color': to
          } );
      } );
  });

  // Menu hover color
  wp.customize( 'travelify_menu_hover_color', function( value ) {
      value.bind( function( to ) {
          $( '#main-nav a:hover,#main-nav ul li.current-menu-item a,#main-nav ul li.current_page_ancestor a,#main-nav ul li.current-menu-ancestor a,#main-nav ul li.current_page_item a,#main-nav ul li:hover > a, #main-nav li:hover > a,#main-nav ul ul :hover > a,#main-nav a:focus,#main-nav ul li ul li a:hover,#main-nav ul li ul li:hover > a,#main-nav ul li.current-menu-item ul li a:hover' ).css( {
          	'background-color': to
          } );
      } );
  });

  // Entry content text color
  wp.customize( 'travelify_entry_color', function( value ) {
      value.bind( function( to ) {
          $( '.entry-content' ).css( {
          	'color': to
          } );
      } );
  });

  // Element content text color
  wp.customize( 'travelify_element_color', function( value ) {
      value.bind( function( to ) {
          $( 'input[type="reset"], input[type="button"], input[type="submit"], a.readmore' ).css( {
          	'background-color': to,
          	'border-color': to
          } );
      } );
  });

  // Website title color
  wp.customize( 'travelify_logo_color', function( value ) {
      value.bind( function( to ) {
          $( '#site-title a' ).css( {
          	'color': to
          } );
      } );
  });

  // Header and Title color
  wp.customize( 'travelify_header_color', function( value ) {
      value.bind( function( to ) {
          $( '.entry-title, .entry-title a, h1, h2, h3, h4, h5, h6, .widget-title' ).css( {
          	'color': to
          } );
      } );
  });

  // Wrapper color
  wp.customize( 'travelify_wrapper_color', function( value ) {
      value.bind( function( to ) {
          $( '.wrapper' ).css( {
          	'background-color': to
          } );
      } );
  });

  // Content and widget background color
  wp.customize( 'travelify_content_bg_color', function( value ) {
      value.bind( function( to ) {
          $( '.widget, article' ).css( {
          	'background-color': to
          } );
      } );
  });

  // Menu item text color
  wp.customize( 'travelify_menu_item_color', function( value ) {
      value.bind( function( to ) {
          $( '#main-nav a, #main-nav a:hover,#main-nav ul li.current-menu-item a,#main-nav ul li.current_page_ancestor a,#main-nav ul li.current-menu-ancestor a,#main-nav ul li.current_page_item a,#main-nav ul li:hover > a' ).css( {
          	'color': to
          } );
      } );
  });

} )( jQuery );