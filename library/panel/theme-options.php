<?php
/**
 * Travelify Theme Options
 *
 * Contains all the function related to theme options.
 *
 */

/****************************************************************************************/

add_action( 'admin_enqueue_scripts', 'travelify_jquery_cookie' );
/**
 * Register jquery cookie javascript file.
 *
 * jquery cookie used for remembering admin tabs, and potential future features... so let's register it early
 *
 * @uses wp_register_script
 */
function travelify_jquery_cookie() {
   wp_register_script( 'jquery-cookie', get_template_directory_uri() . '/library/panel/js/jquery.cookie.min.js', array( 'jquery' ) );
}

/****************************************************************************************/

add_action( 'admin_print_scripts-appearance_page_theme_options', 'travelify_admin_scripts' );
/**
 * Enqueuing some scripts.
 *
 * @uses wp_enqueue_script to register javascripts.
 * @uses wp_enqueue_script to add javascripts to WordPress generated pages.
 */
function travelify_admin_scripts() {
   wp_enqueue_script( 'travelify_admin', get_template_directory_uri() . '/library/panel/js/admin.min.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-cookie', 'jquery-ui-sortable', 'jquery-ui-draggable' ) );
   wp_enqueue_script( 'travelify_image_upload', get_template_directory_uri() . '/library/panel/js/add-image-script.min.js', array( 'jquery','media-upload', 'thickbox' ) );
}

/****************************************************************************************/

add_action( 'admin_print_styles-appearance_page_theme_options', 'travelify_admin_styles' );
/**
 * Enqueuing some styles.
 *
 * @uses wp_enqueue_style to register stylesheets.
 * @uses wp_enqueue_style to add styles.
 */
function travelify_admin_styles() {
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_style( 'travelify_admin_style', get_template_directory_uri() . '/library/panel/css/admin.css' );
}

/****************************************************************************************/

add_action( 'admin_print_styles-appearance_page_theme_options', 'travelify_social_script', 100);
/**
 * Facebook, twitter script hooked at head
 *
 * @useage for Facebook, Twitter and Print Script
 * @Use add_action to display the Script on header
 */
function travelify_social_script()
{ ?>
	<!-- Facebook -->
    <div id="fb-root"></div>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=328285627269392";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

    <!-- Twitter -->
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

    <!-- Print Script -->
	<script src="http://cdn.printfriendly.com/printfriendly.js" type="text/javascript"></script>
<?php
}

/****************************************************************************************/

add_action( 'admin_menu', 'travelify_options_menu' );
/**
 * Create sub-menu page.
 *
 * @uses add_theme_page to add sub-menu under the Appearance top level menu.
 */
function travelify_options_menu() {

	add_theme_page(
		__( 'Theme Options', 'travelify' ),           // Name of page
		__( 'Theme Options', 'travelify' ),           // Label in menu
		'edit_theme_options',                           // Capability required
		'theme_options',                                // Menu slug, used to uniquely identify the page
		'travelify_theme_options_do_page'             // Function that renders the options page
	);

}

/****************************************************************************************/

add_action( 'admin_init', 'travelify_register_settings' );
/**
 * Register options and validation callbacks
 *
 * @uses register_setting
 */
function travelify_register_settings() {
   register_setting( 'travelify_theme_options', 'travelify_theme_options', 'travelify_theme_options_validate' );
}

/****************************************************************************************/

/**
 * Render Travelify Theme Options page
 */
function travelify_theme_options_do_page() {
?>

   <div id="colorawesomeness" class="wrap">

   		<div class="theme-option-header">
			<div class="theme-option-block clearfix">
		<div class="theme-option-title"><h2><?php _e( 'Theme Options by', 'travelify' ); ?></h2></div><div class="theme-option-link"><a href="http://colorlib.com/" title="Colorlib" target="_blank"><img src="<?php echo get_template_directory_uri() . '/library/panel/images/logo.png'; ?>" alt="'<?php _e( 'Colorlib', 'travelify' ); ?>" /></a> </div>
			<div id="social-share">
		    	<div class="fb-like" data-href="https://www.facebook.com/colorlib" data-send="false" data-layout="button_count" data-width="90" data-show-faces="true"></div>
		    	<div class="tw-follow" >		<a href="https://twitter.com/colorlib" class="twitter-follow-button" data-show-count="false">Follow @colorlib</a></div>
			</div>
			    <div id="theme-support">
              <ul>
              	<li><a class="button" href="http://colorlib.com/" title="<?php esc_attr_e('Other Themes', 'travelify'); ?>" target="_blank"><?php printf(__('Other Themes','travelify')); ?></a></li>
              	<li><a class="button" href="http://wordpress.org/support/view/theme-reviews/travelify?filter=5" title="<?php esc_attr_e('Rate this Theme', 'travelify'); ?>" target="_blank"><?php printf(__('Rate this Theme','travelify')); ?></a></li>
								<li><a class="button" href="http://colorlib.com/wp/support/travelify/" title="<?php esc_attr_e('Theme Instruction', 'travelify'); ?>" target="_blank"><?php printf(__('Theme Instructions','travelify')); ?></a></li>
                <li><a class="button" href="http://colorlib.com/wp/forums/" title="<?php esc_attr_e('Support Forum', 'travelify'); ?>" target="_blank"><?php printf(__('Support','travelify')); ?></a></li>
                <li><a class="button" href="http://www.facebook.com/colorlib" title="Like Colorlib on Facebook" target="_blank"><?php printf(__('Facebook','travelify')); ?></a></li>
                <li><a class="button" href="http://twitter.com/colorlib/" title="Follow Colrolib on Twitter" target="_blank"><?php printf(__('Twitter','travelify')); ?></a></li>
              </ul>
          </div>
			</div>
		</div>

      <form method="post" action="options.php">
			<?php
				settings_fields( 'travelify_theme_options' );
				global $travelify_theme_options_settings;
				$options = $travelify_theme_options_settings;
			?>

			<?php if( isset( $_GET [ 'settings-updated' ] ) && 'true' == $_GET[ 'settings-updated' ] ): ?>
					<div class="updated fade" id="message">
					   <p><strong><?php _e( 'Settings saved.', 'travelify' );?></strong></p>
					</div>
			<?php endif; ?>

         <div id="travelify_tabs">
				<ul id="main-navigation" class="tab-navigation">
					<li><a href="#designoptions"><?php _e( 'Main Options', 'travelify' );?></a></li>
					<li><a href="#featuredslider"><?php _e( 'Featured Slider', 'travelify' );?></a></li>
					<li><a href="#sociallinks"><?php _e( 'Social Links', 'travelify' );?></a></li>
					<li><a href="#other"><?php _e( 'Other', 'travelify' );?></a></li>
				</ul><!-- .tab-navigation #main-navigation -->

				<!-- Option for Design Options -->
				<div id="designoptions">
					<div class="option-container">
						<h3 class="option-toggle"><a href="#"><?php _e( 'Header Options', 'travelify' ); ?></a></h3>
						<div class="option-content inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label for="header_logo"><?php _e( 'Header Logo', 'travelify' ); ?></label></th>
										<td>
										   <input class="upload" size="65" type="text" id="header_logo" name="travelify_theme_options[header_logo]" value="<?php echo esc_url( $options [ 'header_logo' ] ); ?>" />
										   <input class="upload-button button" name="image-add" type="button" value="<?php esc_attr_e( 'Upload Logo', 'travelify' ); ?>" />
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="header_logo"><?php _e( 'Preview', 'travelify' ); ?></label></th>
										<td>
										   <?php
										       echo '<img src="'.esc_url( $options[ 'header_logo' ] ).'" alt="'.__( 'Header Logo', 'travelify' ).'" />';
										   ?>
										</td>
									</tr>
									<tr>
										<th scope="row"><label><?php _e( 'Show', 'travelify' ); ?></label></th>
										<td>
											<input type="radio" name="travelify_theme_options[header_show]" id="header-logo" <?php checked($options['header_show'], 'header-logo') ?> value="header-logo"  />
											<?php _e( 'Header Logo Only', 'travelify' ); ?></br>

											<input type="radio" name="travelify_theme_options[header_show]" id="header-text" <?php checked($options['header_show'], 'header-text') ?> value="header-text"  />
											<?php _e( 'Header Text Only', 'travelify' ); ?></br>

											<input type="radio" name="travelify_theme_options[header_show]" id="header-text" <?php checked($options['header_show'], 'disable-both') ?> value="disable-both"  />
											<?php _e( 'Disable', 'travelify' ); ?></br>
										</td>
									</tr>
								</tbody>
							</table>
							<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'travelify' ); ?>" /></p>
						</div><!-- .option-content -->
					</div><!-- .option-container -->

					<div class="option-container">
						<h3 class="option-toggle"><a href="#"><?php _e( 'Favicon Options', 'travelify' ); ?></a></h3>
						<div class="option-content inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label for="disable_favicon"><?php _e( 'Disable Favicon', 'travelify' ); ?></label></th>
										<input type='hidden' value='0' name='travelify_theme_options[disable_favicon]'>
										<td><input type="checkbox" id="disable_favicon" name="travelify_theme_options[disable_favicon]" value="1" <?php checked( '1', $options['disable_favicon'] ); ?> /> <?php _e('Check to disable', 'travelify'); ?></td>
									</tr>
									<tr>
									<th scope="row"><label for="fav_icon_url"><?php _e( 'Favicon URL', 'travelify' ); ?></label></th>
										<td>
										   <input class="upload" size="65" type="text" id="fav_icon_url" name="travelify_theme_options[favicon]" value="<?php echo esc_url( $options [ 'favicon' ] ); ?>" />
										   <input class="upload-button button" name="image-add" type="button" value="<?php esc_attr_e( 'Upload Favicon', 'travelify' ); ?>" />
											<p><?php _e( 'Favicon is this tiny icon you see beside URL in your browser address bar', 'travelify' ); ?></p>
										</td>
									</tr>
									<tr>
										<th scope="row"><label><?php _e( 'Preview', 'travelify' ); ?></label></th>
										<td>
										   <?php
										       echo '<img src="'.esc_url( $options[ 'favicon' ] ).'" alt="'.__( 'favicon', 'travelify' ).'" />';
										   ?>
										</td>
									</tr>
								</tbody>
							</table>
							<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'travelify' ); ?>" /></p>
						</div><!-- .option-content -->
					</div><!-- .option-container -->

					<div class="option-container">
						<h3 class="option-toggle"><a href="#"><?php _e( 'Web Clip Icon Options', 'travelify' ); ?></a></h3>
						<div class="option-content inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label for="disable_webpageicon"><?php _e( 'Disable Web Clip Icon', 'travelify' ); ?></label></th>
										<input type='hidden' value='0' name='travelify_theme_options[disable_webpageicon]'>
										<td><input type="checkbox" id="disable_webpageicon" name="travelify_theme_options[disable_webpageicon]" value="1" <?php checked( '1', $options['disable_webpageicon'] ); ?> /> <?php _e('Check to disable', 'travelify'); ?></td>
									</tr>
									<tr>
									<th scope="row"><label for="webpageicon_icon_url"><?php _e( 'Web Clip Icon URL', 'travelify' ); ?></label></th>
										<td>
										   <input class="upload" size="65" type="text" id="webpageicon_icon_url" name="travelify_theme_options[webpageicon]" value="<?php echo esc_url( $options [ 'webpageicon' ] ); ?>" />
										   <input class="upload-button button" name="image-add" type="button" value="<?php esc_attr_e( 'Upload Web Clip Icon', 'travelify' ); ?>" />
											<p><?php _e( 'Web Clip works as shortcut to website on iOS devices home screen', 'travelify' ); ?></p>
										</td>
									</tr>
									<tr>
										<th scope="row"><label><?php _e( 'Preview', 'travelify' ); ?></label></th>
										<td>
										   <?php
										       echo '<img src="'.esc_url( $options[ 'webpageicon' ] ).'" alt="'.__( 'webpage icon', 'travelify' ).'" />';
										   ?>
										</td>
									</tr>
								</tbody>
							</table>
							<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'travelify' ); ?>" /></p>
						</div><!-- .option-content -->
					</div><!-- .option-container -->

					<div class="option-container">
						<h3 class="option-toggle"><a href="#"><?php _e( 'Layout Options', 'travelify' ); ?></a></h3>
						<div class="option-content inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label><?php _e( 'Default Layout', 'travelify' ); ?></label></th>
										<td>
											<label title="no-sidebar" class="box" style="margin-right: 18px"><img src="<?php echo get_template_directory_uri(); ?>/library/panel/images/no-sidebar.png" alt="Content-Sidebar" /><br />
											<input type="radio" name="travelify_theme_options[default_layout]" id="no-sidebar" <?php checked($options['default_layout'], 'no-sidebar') ?> value="no-sidebar"  />
											<?php _e( 'No Sidebar', 'travelify' ); ?>
											</label>
											<label title="no-sidebar-full-width" class="box" style="margin-right: 18px"><img src="<?php echo get_template_directory_uri(); ?>/library/panel/images/no-sidebar-fullwidth.png" alt="Content-Sidebar" /><br />
											<input type="radio" name="travelify_theme_options[default_layout]" id="no-sidebar-full-width" <?php checked($options['default_layout'], 'no-sidebar-full-width') ?> value="no-sidebar-full-width"  />
											<?php _e( 'No Sidebar, Full Width', 'travelify' ); ?>
											</label>
											<label title="no-sidebar-one-column" class="box" style="margin-right: 18px"><img src="<?php echo get_template_directory_uri(); ?>/library/panel/images/one-column.png" alt="Content-Sidebar" /><br />
											<input type="radio" name="travelify_theme_options[default_layout]" id="no-sidebar-one-column" <?php checked($options['default_layout'], 'no-sidebar-one-column') ?> value="no-sidebar-one-column"  />
											<?php _e( 'No Sidebar, One Column', 'travelify' ); ?>
											</label>
											<label title="left-Sidebar" class="box" style="margin-right: 18px"><img src="<?php echo get_template_directory_uri(); ?>/library/panel/images/left-sidebar.png" alt="Content-Sidebar" /><br />
											<input type="radio" name="travelify_theme_options[default_layout]" id="left-sidebar" <?php checked($options['default_layout'], 'left-sidebar') ?> value="left-sidebar"  />
											<?php _e( 'Left Sidebar', 'travelify' ); ?>
											</label>
											<label title="right-sidebar" class="box" style="margin-right: 18px"><img src="<?php echo get_template_directory_uri(); ?>/library/panel/images/right-sidebar.png" alt="Content-Sidebar" /><br />
											<input type="radio" name="travelify_theme_options[default_layout]" id="right-sidebar" <?php checked($options['default_layout'], 'right-sidebar') ?> value="right-sidebar"  />
											<?php _e( 'Right Sidebar', 'travelify' ); ?>
											</label>
										</td>
									</tr>
									<?php if( "1" == $options[ 'reset_layout' ] ) { $options[ 'reset_layout' ] = "0"; } ?>
									<tr>
									<p><?php _e( 'This will set the default layout style. However, you can choose different layout for each page via editor', 'travelify' ); ?></p>
									<th scope="row"><label for="reset_layout"><?php _e( 'Reset Layout', 'travelify' ); ?></th>
									<input type='hidden' value='0' name='travelify_theme_options[reset_layout]'>
									<td>
									<input type="checkbox" id="reset_layout" name="travelify_theme_options[reset_layout]" value="1" <?php checked( '1', $options['reset_layout'] ); ?> /> <?php _e('Check to reset', 'travelify'); ?>
									</td>
									</tr>
								</tbody>
							</table>
							<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'travelify' ); ?>" /></p>
						</div><!-- .option-content -->
					</div><!-- .option-container -->

					<div class="option-container">
						<h3 class="option-toggle"><a href="#"><?php _e( 'Custom Background', 'travelify' ); ?></a></h3>
						<div class="option-content inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e( 'Change theme background', 'travelify' ); ?></label>
										</th>
										<td style="padding-bottom: 64px;">
											<?php printf(__('<a class="button" href="%s">Click here</a>', 'travelify'), admin_url('themes.php?page=custom-background')); ?>
										</td>
										<td style="padding-bottom: 20px;">
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .option-content -->
					</div><!-- .option-container -->
					<div class="option-container">
						<h3 class="option-toggle"><a href="#"><?php _e( 'RSS URL', 'travelify' ); ?></a></h3>
						<div class="option-content inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row">
											<label for="feed-redirect"><?php _e( 'Feed Redirect URL', 'travelify' ); ?></label>
										</th>
										<td><input type="text" id="feed-redirect" size="70" name="travelify_theme_options[feed_url]" value="<?php echo esc_attr( $options[ 'feed_url' ] ); ?>" />
										<p><?php _e( 'Enter your preferred RSS URL. (Feedburner or other)', 'travelify' ); ?></p>
										</td>
									</tr>
								</tbody>
							</table>
							<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'travelify' ); ?>" /></p>
						</div><!-- .option-content -->
					</div><!-- .option-container -->

               <div class="option-container">
                  <h3 class="option-toggle"><a href="#"><?php _e( 'Homepage Post Options', 'travelify' ); ?></a></h3>
                  <div class="option-content inside">
                  	<table class="form-table">
                     	<tbody>
                        	<tr>
                           	<th scope="row">
                              	<label for="frontpage_posts_cats"><?php _e( 'Homepage posts categories:', 'travelify' ); ?></label>
                                 <p>
                                 	<small><?php _e( 'Only posts that belong to the categories selected here will be displayed on the front page.', 'travelify' ); ?></small>
                                 </p>
                              </th>
                              <td>
	                              <select name="travelify_theme_options[front_page_category][]" id="frontpage_posts_cats" multiple="multiple" class="select-multiple">
	                              	<option value="0" <?php if ( empty( $options['front_page_category'] ) ) { selected( true, true ); } ?>><?php _e( '--Disabled--', 'travelify' ); ?></option>
                                 	<?php /* Get the list of categories */
                                 	if( empty( $options[ 'front_page_category' ] ) ) {
                                    	$options[ 'front_page_category' ] = array();
                                  	}
                                  	$categories = get_categories();
                                  	foreach ( $categories as $category) :?>
	                                 	<option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $options['front_page_category'] ) ) {echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
	                                 <?php endforeach; ?>
	                              </select><br />
                                 <span class="description"><?php _e( 'You may select multiple categories by holding down the CTRL (Windows) or cmd (Mac).', 'travelify' ); ?></span>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'travelify' ); ?>" /></p>
                  </div><!-- .option-content -->
              	</div><!-- .option-container -->
				</div> <!-- #designoptions -->

				<!-- Option for Featured Post Slider -->
				<div id="featuredslider">
					<div class="option-container">
						<h3 class="option-toggle"><a href="#"><?php _e( 'Featured Post/Page Slider Options', 'travelify' ); ?></a></h3>
						<div class="option-content inside">
							<table class="form-table">
								<tr>
									<th scope="row"><label><?php _e( 'Exclude Slider post from Homepage posts?', 'travelify' ); ?></label></th>
									<input type='hidden' value='0' name='travelify_theme_options[exclude_slider_post]'>
									<td><input type="checkbox" id="headerlogo" name="travelify_theme_options[exclude_slider_post]" value="1" <?php checked( '1', $options['exclude_slider_post'] ); ?> /> <?php _e('Check to exclude', 'travelify'); ?></td>
								</tr>
								<tbody class="sortable">
									<tr>
										<th scope="row"><label><?php _e( 'Number of Slides', 'travelify' ); ?></label></th>
										<td><input type="text" name="travelify_theme_options[slider_quantity]" value="<?php echo intval( $options[ 'slider_quantity' ] ); ?>" size="2" /></td>
									</tr>
									<?php for ( $i = 1; $i <= $options[ 'slider_quantity' ]; $i++ ): ?>
									<tr>
										<th scope="row"><label class="handle"><?php _e( 'Featured Slide #', 'travelify' ); ?><span class="count"><?php echo absint( $i ); ?></span></label></th>
										<td><input type="text" name="travelify_theme_options[featured_post_slider][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_post_slider', $options ) && array_key_exists( $i, $options[ 'featured_post_slider' ] ) ) echo absint( $options[ 'featured_post_slider' ][ $i ] ); ?>" />
										<a href="<?php bloginfo ( 'url' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_post_slider', $options ) && array_key_exists ( $i, $options[ 'featured_post_slider' ] ) ) echo absint( $options[ 'featured_post_slider' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e('Click Here To Edit'); ?>" target="_blank"><?php _e( 'Click Here To Edit', 'travelify' ); ?></a>
										</td>
									</tr>
									<?php endfor; ?>
								</tbody>
							</table>
							<p><strong><?php _e( 'How to use the featured slider?', 'travelify' ); ?></strong><p/>
							<ul>
								<li><?php _e( 'Create Post or Page and add featured image to it.', 'travelify' ); ?></li>
								<li><?php _e( 'Add all the Post ID that you want to use in the featured slider. Post ID can be found at All Posts table in last column', 'travelify' ); ?></li>
								<li><?php _e( 'Featured Slider will show featured images, Title and excerpt of the respected added post IDs.', 'travelify' ); ?></li>
								<li><?php _e( 'The recommended image size is', 'travelify' ); ?><strong> 1018px x 460px.</strong></li>
							</ul>
							<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'travelify' ); ?>" /></p>
						</div><!-- .option-content -->
					</div><!-- .option-container -->

					<!-- Option for More Slider Options -->
					<div class="option-container">
						<h3 class="option-toggle"><a href="#"><?php _e( 'Slider Options', 'travelify' ); ?></a></h3>
						<div class="option-content inside">
							<table class="form-table">
								<tr>
									<th scope="row"><label><?php _e( 'Disable Slider', 'travelify' ); ?></label></th>
									<input type='hidden' value='0' name='travelify_theme_options[disable_slider]'>
									<td><input type="checkbox" id="headerlogo" name="travelify_theme_options[disable_slider]" value="1" <?php checked( '1', $options['disable_slider'] ); ?> /> <?php _e('Check to disable', 'travelify'); ?></td>
								</tr>
								<tr>
									<th>
									<label for="travelify_cycle_style"><?php _e( 'Transition Effect:', 'travelify' ); ?></label>
									</th>
									<td>
										<select id="travelify_cycle_style" name="travelify_theme_options[transition_effect]">
											<?php
												$transition_effects = array();
												$transition_effects = array( 	'fade',
																						'wipe',
																						'scrollUp',
																						'scrollDown',
																						'scrollLeft',
																						'scrollRight',
																						'blindX',
																						'blindY',
																						'blindZ',
																						'cover',
																						'shuffle'
																			);
										foreach( $transition_effects as $effect ) {
											?>
											<option value="<?php echo $effect; ?>" <?php selected( $effect, $options['transition_effect']); ?>><?php printf( __( '%s', 'travelify' ), $effect ); ?></option>
											<?php
										}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Transition Delay', 'travelify' ); ?></label></th>
									<td>
										<input type="text" name="travelify_theme_options[transition_delay]" value="<?php echo $options[ 'transition_delay' ]; ?>" size="2" />
										<span class="description"><?php _e( 'second(s)', 'travelify' ); ?></span>
									</td>
								</tr>
								<tr>
									<th scope="row"><label><?php _e( 'Transition Length', 'travelify' ); ?></label></th>
									<td>
										<input type="text" name="travelify_theme_options[transition_duration]" value="<?php echo $options[ 'transition_duration' ]; ?>" size="2" />
										<span class="description"><?php _e( 'second(s)', 'travelify' ); ?></span>
									</td>
								</tr>
							</table>
							<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'travelify' ); ?>" /></p>
						</div><!-- .option-content -->
					</div><!-- .option-container -->

				</div> <!-- #featuredslider -->

				<!-- Option for Design Settings -->
				<div id="sociallinks">
					<?php
						$social_links = array();
						$social_links = array( 	'Facebook' 		=> 'social_facebook',
														'Twitter' 		=> 'social_twitter',
														'Google-Plus'	=> 'social_googleplus',
														'Pinterest' 	=> 'social_pinterest',
														'YouTube'		=> 'social_youtube',
														'Vimeo'			=> 'social_vimeo',
														'LinkedIn'		=> 'social_linkedin',
														'Flickr'		=> 'social_flickr',
														'Tumblr'		=> 'social_tumblr',
														'Instagram'		=> 'social_instagram',
														'RSS'			=> 'social_rss'
													);
					?>
					<table class="form-table">
						<p><?php _e( 'Enter URLs for your social networks e.g.', 'travelify' ); ?> https://twitter.com/colorlib</p>
						<tbody>
						<?php
						foreach( $social_links as $key => $value ) {
						?>
							<tr>
								<th scope="row"><h4><?php printf( __( '%s', 'travelify' ), $key ); ?></h4></th>
								<td><input type="text" size="45" name="travelify_theme_options[<?php echo $value; ?>]" value="<?php echo esc_url( $options[$value] ); ?>" />
								</td>
							</tr>
						<?php
						}
						?>
						</tbody>
					</table>
	            <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'travelify' ); ?>" /></p>


				</div> <!-- #sociallinks -->

				<!-- Option for Design Settings -->
				<div id="other">
					<div class="option-container">
						<h3 class="option-toggle"><a href="#"><?php _e( 'Custom CSS (Advanced)', 'travelify' ); ?></a></h3>
						<div class="option-content inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label for="custom-css"><?php _e( 'Enter your custom CSS styles.', 'travelify' ); ?></label>
											<p><small><?php _e( 'This CSS will overwrite the CSS of style.css file.', 'travelify' ); ?></small></p>
										</th>
										<td>
										<textarea name="travelify_theme_options[custom_css]" id="custom-css" cols="90" rows="12"><?php echo esc_attr( $options[ 'custom_css' ] ); ?></textarea>
										<p><?php _e( 'Make sure you know what you are doing.', 'travelify' ); ?></p>
										</td>
									</tr>
								</tbody>
							</table>
							<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save All Changes', 'travelify' ); ?>" /></p>
						</div><!-- .option-content -->
					</div><!-- .option-container -->
				</div> <!-- #other tools -->

         </div><!-- #travelify_tabs -->

      </form>

   </div><!-- .wrap -->
<?php
}

/****************************************************************************************/

/**
 * Validate all theme options values
 *
 * @uses esc_url_raw, absint, esc_textarea, sanitize_text_field, travelify_invalidate_caches
 */
function travelify_theme_options_validate( $options ) {
	global $travelify_theme_options_settings, $travelify_theme_options_defaults;
	$input_validated = $travelify_theme_options_settings;
	$input = array();
	$input = $options;

	if ( isset( $input[ 'header_logo' ] ) ) {
		$input_validated[ 'header_logo' ] = esc_url_raw( $input[ 'header_logo' ] );
	}

	if( isset( $input[ 'header_show' ] ) ) {
		$input_validated[ 'header_show' ] = $input[ 'header_show' ];
	}

	if( isset( $options[ 'button_text' ] ) ) {
		$input_validated[ 'button_text' ] = sanitize_text_field( $input[ 'button_text' ] );
	}

	if( isset( $options[ 'redirect_button_link' ] ) ) {
		$input_validated[ 'redirect_button_link' ] = esc_url_raw( $input[ 'redirect_button_link' ] );
	}

	if ( isset( $input[ 'favicon' ] ) ) {
		$input_validated[ 'favicon' ] = esc_url_raw( $input[ 'favicon' ] );
	}

	if ( isset( $input['disable_favicon'] ) ) {
		$input_validated[ 'disable_favicon' ] = $input[ 'disable_favicon' ];
	}

	if ( isset( $input[ 'webpageicon' ] ) ) {
		$input_validated[ 'webpageicon' ] = esc_url_raw( $input[ 'webpageicon' ] );
	}

	if ( isset( $input['disable_webpageicon'] ) ) {
		$input_validated[ 'disable_webpageicon' ] = $input[ 'disable_webpageicon' ];
	}

	//Site Layout
	if( isset( $input[ 'site_layout' ] ) ) {
		$input_validated[ 'site_layout' ] = $input[ 'site_layout' ];
	}

   // Front page posts categories
	if( isset( $input['front_page_category' ] ) ) {
		$input_validated['front_page_category'] = $input['front_page_category'];
	}

	// Data Validation for Featured Slider
	if( isset( $input[ 'disable_slider' ] ) ) {
		$input_validated[ 'disable_slider' ] = $input[ 'disable_slider' ];
	}

	if ( isset( $input[ 'slider_quantity' ] ) ) {
		$input_validated[ 'slider_quantity' ] = absint( $input[ 'slider_quantity' ] ) ? $input [ 'slider_quantity' ] : 4;
	}
	if ( isset( $input['exclude_slider_post'] ) ) {
		$input_validated[ 'exclude_slider_post' ] = $input[ 'exclude_slider_post' ];

	}
	if ( isset( $input[ 'featured_post_slider' ] ) ) {
		$input_validated[ 'featured_post_slider' ] = array();
	}
	if( isset( $input[ 'slider_quantity' ] ) )
	for ( $i = 1; $i <= $input [ 'slider_quantity' ]; $i++ ) {
		if ( intval( $input[ 'featured_post_slider' ][ $i ] ) ) {
			$input_validated[ 'featured_post_slider' ][ $i ] = absint($input[ 'featured_post_slider' ][ $i ] );
		}
	}

   // data validation for transition effect
	if( isset( $input[ 'transition_effect' ] ) ) {
		$input_validated['transition_effect'] = wp_filter_nohtml_kses( $input['transition_effect'] );
	}

	// data validation for transition delay
	if ( isset( $input[ 'transition_delay' ] ) && is_numeric( $input[ 'transition_delay' ] ) ) {
		$input_validated[ 'transition_delay' ] = $input[ 'transition_delay' ];
	}

	// data validation for transition length
	if ( isset( $input[ 'transition_duration' ] ) && is_numeric( $input[ 'transition_duration' ] ) ) {
		$input_validated[ 'transition_duration' ] = $input[ 'transition_duration' ];
	}

   // data validation for Social Icons
	if( isset( $input[ 'social_facebook' ] ) ) {
		$input_validated[ 'social_facebook' ] = esc_url_raw( $input[ 'social_facebook' ] );
	}
	if( isset( $input[ 'social_twitter' ] ) ) {
		$input_validated[ 'social_twitter' ] = esc_url_raw( $input[ 'social_twitter' ] );
	}
	if( isset( $input[ 'social_googleplus' ] ) ) {
		$input_validated[ 'social_googleplus' ] = esc_url_raw( $input[ 'social_googleplus' ] );
	}
	if( isset( $input[ 'social_pinterest' ] ) ) {
		$input_validated[ 'social_pinterest' ] = esc_url_raw( $input[ 'social_pinterest' ] );
	}
	if( isset( $input[ 'social_youtube' ] ) ) {
		$input_validated[ 'social_youtube' ] = esc_url_raw( $input[ 'social_youtube' ] );
	}
	if( isset( $input[ 'social_vimeo' ] ) ) {
		$input_validated[ 'social_vimeo' ] = esc_url_raw( $input[ 'social_vimeo' ] );
	}
	if( isset( $input[ 'social_linkedin' ] ) ) {
		$input_validated[ 'social_linkedin' ] = esc_url_raw( $input[ 'social_linkedin' ] );
	}
	if( isset( $input[ 'social_flickr' ] ) ) {
		$input_validated[ 'social_flickr' ] = esc_url_raw( $input[ 'social_flickr' ] );
	}
	if( isset( $input[ 'social_tumblr' ] ) ) {
		$input_validated[ 'social_tumblr' ] = esc_url_raw( $input[ 'social_tumblr' ] );
	}
	if( isset( $input[ 'social_instagram' ] ) ) {
		$input_validated[ 'social_instagram' ] = esc_url_raw( $input[ 'social_instagram' ] );
	}
	if( isset( $input[ 'social_rss' ] ) ) {
		$input_validated[ 'social_rss' ] = esc_url_raw( $input[ 'social_rss' ] );
	}

	//Custom CSS Style Validation
	if ( isset( $input['custom_css'] ) ) {
		$input_validated['custom_css'] = wp_kses_stripslashes($input['custom_css']);
	}

	// Layout settings verification
	if( isset( $input[ 'reset_layout' ] ) ) {
		$input_validated[ 'reset_layout' ] = $input[ 'reset_layout' ];
	}
	if( 0 == $input_validated[ 'reset_layout' ] ) {
		if( isset( $input[ 'default_layout' ] ) ) {
			$input_validated[ 'default_layout' ] = $input[ 'default_layout' ];
		}
	}
	else {
		$input_validated['default_layout'] = $travelify_theme_options_defaults[ 'default_layout' ];
	}

	//RSS Service
	$input_validated['feed_url'] = esc_url_raw($input['feed_url']);

	//Clearing the theme option cache
	if( function_exists( 'travelify_themeoption_invalidate_caches' ) ) travelify_themeoption_invalidate_caches();

   return $input_validated;
}


/**
 * Clearing the cache if any changes in Admin Theme Option
 */
function travelify_themeoption_invalidate_caches(){
	delete_transient( 'travelify_favicon' );
	delete_transient( 'travelify_webpageicon' );
	delete_transient( 'travelify_featured_post_slider' );
	delete_transient( 'travelify_socialnetworks' );
	delete_transient( 'travelify_footercode' );
	delete_transient( 'travelify_internal_css' );
	delete_transient( 'travelify_headercode' );
}


add_action( 'save_post', 'travelify_post_invalidate_caches' );
/**
 * Clearing the cache if any changes in post or page
 */
function travelify_post_invalidate_caches(){
   delete_transient( 'travelify_featured_post_slider' );
}

?>