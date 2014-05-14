<?php
/**
 * Contains all the shortcodes of the theme.
 *
 */

/* Register shortcodes. */
add_action( 'init', 'travelify_add_shortcodes' );
/**
 * Creates new shortcodes for use in any shortcode-ready area.  This function uses the add_shortcode() 
 * function to register new shortcodes with WordPress.
 *
 * @uses add_shortcode() to create new shortcodes.
 */
function travelify_add_shortcodes() {
	/* Add theme-specific shortcodes. */
	add_shortcode( 'the-year', 'travelify_the_year' );
	add_shortcode( 'site-link', 'travelify_site_link' );
	add_shortcode( 'wp-link', 'travelify_wp_link' );
	add_shortcode( 'th-link', 'travelify_colorawesome_link' );
}

/**
 * Shortcode to display the current year.
 *
 * @uses date() Gets the current year.
 * @return string
 */
function travelify_the_year() {
   return date( 'Y' );
}

/**
 * Shortcode to display a link back to the site.
 *
 * @uses get_bloginfo() Gets the site link
 * @return string
 */
function travelify_site_link() {
   return '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';
}

/**
 * Shortcode to display a link to WordPress.org.
 *
 * @return string
 */
function travelify_wp_link() {
   return '<a href="'.esc_url( 'http://wordpress.org' ).'" target="_blank" title="' . esc_attr__( 'WordPress', 'travelify' ) . '"><span>' . __( 'WordPress', 'travelify' ) . '</span></a>';
}

/**
 * Shortcode to display a link to travelify.com.
 *
 * @return string
 */
function travelify_colorawesome_link() {
   return '<a href="'.esc_url( 'http://colorlib.com/wp/travelify/' ).'" target="_blank" title="'.esc_attr__( 'Colorlib', 'travelify' ).'" ><span>'.__( 'Colorlib', 'travelify') .'</span></a>';
}

?>