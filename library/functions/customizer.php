<?php

// Add block to WordPress theme customizer
function travelify_options_register_theme_customizer( $wp_customize ) {

    $wp_customize->add_section( 'travelify_menu_options' , array(
       'title'      => __('Travelify Header Area','travelify'),
       'description' => sprintf( __( 'Use the following settings change color for menu and website title', 'travelify' )),
       'priority'   => 31,
    ) );

    $wp_customize->add_setting(
        'travelify_logo_color',
            array(
                'default'     => '#57ad68'
            )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_logo_color',
            array(
                'label'      => __( 'Website Title Color', 'travelify' ),
                'section'    => 'travelify_menu_options',
                'settings'   => 'travelify_logo_color',
                'priority' => 1
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_logo_hover_color',
            array(
                'default'     => '#439f55'
            )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_logo_hover_color',
            array(
                'label'      => __( 'Website Title Hover Color', 'travelify' ),
                'section'    => 'travelify_menu_options',
                'settings'   => 'travelify_logo_hover_color',
                'priority' => 2
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_menu_color',
	        array(
	            'default'     => '#57ad68'
	        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_menu_color',
            array(
                'label'      => __( 'Menu Bar Color', 'travelify' ),
                'section'    => 'travelify_menu_options',
                'settings'   => 'travelify_menu_color'
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_menu_hover_color',
	        array(
	            'default'     => '#439f55'
	        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_menu_hover_color',
            array(
                'label'      => __( 'Menu Bar Hover Color', 'travelify' ),
                'section'    => 'travelify_menu_options',
                'settings'   => 'travelify_menu_hover_color'
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_menu_item_color',
            array(
                'default'     => '#FFF'
            )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_menu_item_color',
            array(
                'label'      => __( 'Menu Item Text Color', 'travelify' ),
                'section'    => 'travelify_menu_options',
                'settings'   => 'travelify_menu_item_color',
                'priority' => 3
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_social_color',
            array(
                'default'     => '#D0D0D0'
            )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_social_color',
            array(
                'label'      => __( 'Social Icon Color', 'travelify' ),
                'section'    => 'travelify_menu_options',
                'settings'   => 'travelify_social_color',
                'priority' => 13
            )
        )
    );

    $wp_customize->add_section( 'travelify_element_options' , array(
       'title'      => __('Travelify Element Color','travelify'),
       'description' => sprintf( __( 'Use the following settings change color for website elements', 'travelify' )),
       'priority'   => 32,
    ) );

    $wp_customize->add_setting(
        'travelify_element_color',
            array(
                'default'     => '#57ad68'
            )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_element_color',
            array(
                'label'      => __( 'Element Color', 'travelify' ),
                'section'    => 'travelify_element_options',
                'settings'   => 'travelify_element_color',
                'priority' => 4
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_element_hover_color',
            array(
                'default'     => '#439f55'
            )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_element_hover_color',
            array(
                'label'      => __( 'Element Hover Color', 'travelify' ),
                'section'    => 'travelify_element_options',
                'settings'   => 'travelify_element_hover_color',
                'priority'  => 5
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_wrapper_color',
            array(
                'default'     => '#F8F8F8'
            )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_wrapper_color',
            array(
                'label'      => __( 'Wrapper Color', 'travelify' ),
                'section'    => 'travelify_element_options',
                'settings'   => 'travelify_wrapper_color',
                'priority' => 6
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_content_bg_color',
            array(
                'default'     => '#FFF'
            )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_content_bg_color',
            array(
                'label'      => __( 'Content Background Color', 'travelify' ),
                'section'    => 'travelify_element_options',
                'settings'   => 'travelify_content_bg_color',
                'priority' => 7
            )
        )
    );

    $wp_customize->add_section( 'travelify_typography_options' , array(
       'title'      => __('Travelify Typography Color','travelify'),
       'description' => sprintf( __( 'Use the following settings change color for typography such as links, headings and content', 'travelify' )),
       'priority'   => 33,
    ) );

    $wp_customize->add_setting(
        'travelify_entry_color',
	        array(
	            'default'     => '#444'
	        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_entry_color',
            array(
                'label'      => __( 'Entry Content Color', 'travelify' ),
                'section'    => 'travelify_typography_options',
                'settings'   => 'travelify_entry_color'
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_header_color',
	        array(
	            'default'     => '#444'
	        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_header_color',
            array(
                'label'      => __( 'Header/Title Color', 'travelify' ),
                'section'    => 'travelify_typography_options',
                'settings'   => 'travelify_header_color',
                'priority' => 8
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_link_color',
            array(
                'default'     => '#57ad68'
            )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_link_color',
            array(
                'label'      => __( 'Link Color', 'travelify' ),
                'section'    => 'travelify_typography_options',
                'settings'   => 'travelify_link_color',
                'priority' => 11
            )
        )
    );

    $wp_customize->add_setting(
        'travelify_link_hover_color',
            array(
                'default'     => '#439f55'
            )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'travelify_link_hover_color',
            array(
                'label'      => __( 'Link Hover Color', 'travelify' ),
                'section'    => 'travelify_typography_options',
                'settings'   => 'travelify_link_hover_color',
                'priority' => 12
            )
        )
    );

    $wp_customize->add_section( 'travelify_footer_options' , array(
       'title'      => __('Travelify Footer','travelify'),
       'description' => sprintf( __( 'Use the following settings customize Footer', 'travelify' )),
       'priority'   => 34,
    ) );

    $wp_customize->add_setting(
        'travelify_footer_textbox',
            array(
                'default' => 'Default footer text',
            )
    );

    $wp_customize->add_control(
        'travelify_footer_textbox',
        array(
            'label' => __('Copyright text','travelify'),
            'section' => 'travelify_footer_options',
            'type' => 'text',
        )
    );

	$wp_customize->get_setting( 'travelify_menu_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'travelify_menu_hover_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'travelify_entry_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'travelify_element_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'travelify_logo_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'travelify_header_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'travelify_wrapper_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'travelify_content_bg_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'travelify_menu_item_color' )->transport = 'postMessage';

}
add_action( 'customize_register', 'travelify_options_register_theme_customizer' );


// Output custom CSS in theme header
function travelify_customizer_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo get_theme_mod( 'travelify_link_color' ); ?>; }
        #site-title a { color: <?php echo get_theme_mod( 'travelify_logo_color' ); ?>; }
        #site-title a:hover { color: <?php echo get_theme_mod( 'travelify_logo_hover_color' ); ?>; }
        .wrapper { background: <?php echo get_theme_mod( 'travelify_wrapper_color' ); ?>; }
        .social-icons ul li a { color: <?php echo get_theme_mod( 'travelify_social_color' ); ?>; }
        #main-nav a, #main-nav a:hover,#main-nav ul li.current-menu-item a,#main-nav ul li.current_page_ancestor a,#main-nav ul li.current-menu-ancestor a,#main-nav ul li.current_page_item a,#main-nav ul li:hover > a { color: <?php echo get_theme_mod( 'travelify_menu_item_color' ); ?>; }
        .widget, article { background: <?php echo get_theme_mod( 'travelify_content_bg_color' ); ?>; }
        .entry-title, .entry-title a, h1, h2, h3, h4, h5, h6, .widget-title  { color: <?php echo get_theme_mod( 'travelify_header_color' ); ?>; }
        a:focus, a:active, a:hover, .tags a:hover, .custom-gallery-title a, .widget-title a, #content ul a:hover,#content ol a:hover, .widget ul li a:hover, .entry-title a:hover, .entry-meta a:hover, #site-generator .copyright a:hover { color: <?php echo get_theme_mod( 'travelify_link_hover_color' ); ?>; }
        #main-nav { background: <?php echo get_theme_mod( 'travelify_menu_color' ); ?>; border-color: <?php echo get_theme_mod( 'travelify_menu_color' ); ?>; }
    	#main-nav ul li ul, body { border-color: <?php echo get_theme_mod( 'travelify_menu_color' ); ?>; }
    	#main-nav a:hover,#main-nav ul li.current-menu-item a,#main-nav ul li.current_page_ancestor a,#main-nav ul li.current-menu-ancestor a,#main-nav ul li.current_page_item a,#main-nav ul li:hover > a, #main-nav li:hover > a,#main-nav ul ul :hover > a,#main-nav a:focus { background: <?php echo get_theme_mod( 'travelify_menu_hover_color' ); ?>; }
    	#main-nav ul li ul li a:hover,#main-nav ul li ul li:hover > a,#main-nav ul li.current-menu-item ul li a:hover { color: <?php echo get_theme_mod( 'travelify_menu_hover_color' ); ?>; }
    	.entry-content { color: <?php echo get_theme_mod( 'travelify_entry_color' ); ?>; }
    	input[type="reset"], input[type="button"], input[type="submit"], .entry-meta-bar .readmore, #controllers a:hover, #controllers a.active, .pagination span, .pagination a:hover span, .wp-pagenavi .current, .wp-pagenavi a:hover { background: <?php echo get_theme_mod( 'travelify_element_color' ); ?>; border-color: <?php echo get_theme_mod( 'travelify_element_color' ); ?> !important; }
        ::selection { background: <?php echo get_theme_mod( 'travelify_element_color' ); ?>; }
        blockquote { border-color: <?php echo get_theme_mod( 'travelify_element_color' ); ?>; }
        #controllers a:hover, #controllers a.active { color: <?php echo get_theme_mod( 'travelify_element_color' ); ?>; }
    	input[type="reset"]:hover,input[type="button"]:hover,input[type="submit"]:hover,input[type="reset"]:active,input[type="button"]:active,input[type="submit"]:active, .entry-meta-bar .readmore:hover, .entry-meta-bar .readmore:active, ul.default-wp-page li a:hover, ul.default-wp-page li a:active { background: <?php echo get_theme_mod( 'travelify_element_hover_color' ); ?>; border-color: <?php echo get_theme_mod( 'travelify_element_hover_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'travelify_customizer_css' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travelify_customize_preview_js() {
	wp_enqueue_script( 'travelify_customizer', get_template_directory_uri() . '/library/js/customizer.js', array( 'customize-preview' ), '20140425', true );
}
add_action( 'customize_preview_init', 'travelify_customize_preview_js' );

?>