<?php
/**
 * Shows the sidebar content.
 *
 */

/****************************************************************************************/

add_action( 'travelify_left_sidebar', 'travelify_display_left_sidebar', 10 );
/**
 * Show widgets of left sidebar.
 *
 * Shows all the widgets that are dragged and dropped on the left Sidebar.
 */
function travelify_display_left_sidebar() {
	// Calling the left sidebar if it exists.
	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'travelify_left_sidebar' ) ):
	endif;
}

/****************************************************************************************/

add_action( 'travelify_right_sidebar', 'travelify_display_right_sidebar', 10 );
/**
 * Show widgets of right sidebar.
 *
 * Shows all the widgets that are dragged and dropped on the right Sidebar.
 */
function travelify_display_right_sidebar() {
	// Calling the right sidebar if it exists.
	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'travelify_right_sidebar' ) ):
	endif;
}

/****************************************************************************************/

add_action( 'travelify_footer_widget', 'travelify_display_footer_widget', 10 );
/**
 * Show widgets on Footer of the theme.
 *
 * Shows all the widgets that are dragged and dropped on the Footer Sidebar.
 */
function travelify_display_footer_widget() {
  if( is_active_sidebar( 'travelify_footer_widget' ) || is_active_sidebar( 'travelify_footer_widget_2' ) ||
            is_active_sidebar( 'travelify_footer_widget_3' )) {
    ?>
    <div class="widget-wrap">
      <div class="container">
        <div class="widget-area clearfix">
            <div class="col-3">
            <?php
              // Calling the footer sidebar if it exists.
              if ( !is_active_sidebar( 'travelify_footer_widget' ) || !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'travelify_footer_widget' ) ):
               ?><div style="width:1px;height:1px">&nbsp;</div><?php
              endif;
            ?>
            </div><!-- .col3 -->
            <div class="col-3">
            <?php
              // Calling the footer sidebar if it exists.
              if ( !is_active_sidebar( 'travelify_footer_widget_2' ) || !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'travelify_footer_widget_2' ) ):
               ?><div style="width:1px;height:1px">&nbsp;</div><?php
              endif;
            ?>
            </div><!-- .col3 -->
            <div class="col-3">
            <?php
              // Calling the footer sidebar if it exists.
              if ( !is_active_sidebar( 'travelify_footer_widget_3' ) || !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'travelify_footer_widget_3' ) ):
               ?><div style="width:1px;height:1px">&nbsp;</div><?php
              endif;
            ?>
            </div><!-- .col3 -->
        </div><!-- .widget-area -->
      </div><!-- .container -->
    </div><!-- .widget-wrap -->
    <?php
  }
}

?>
