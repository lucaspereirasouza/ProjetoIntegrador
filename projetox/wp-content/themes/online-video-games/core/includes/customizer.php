<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'online_video_games_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'online-video-games' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'online-video-games' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'online_video_games_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'online-video-games' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'online-video-games' ),
			'off' => esc_html__( 'Disable', 'online-video-games' ),
		],
		'partial_refresh'    => [
		'online_video_games_display_header_title' => [
			'selector'        => '.logo a',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'online_video_games_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'online-video-games' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'online-video-games' ),
			'off' => esc_html__( 'Disable', 'online-video-games' ),
		],
		'partial_refresh'    => [
		'online_video_games_display_header_text' => [
			'selector'        => '.logo-content span',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	//FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'online_video_games_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'online-video-games' ),
	) );

	Kirki::add_section( 'online_video_games_font_style_section', array(
		'title'      => esc_attr__( 'Typography Option',  'online-video-games' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_all_headings_typography',
		'section'     => 'online_video_games_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'online-video-games' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'online_video_games_all_headings_typography',
		'label'       => esc_attr__( 'Heading Typography',  'online-video-games' ),
		'description' => esc_attr__( 'Select the typography options for your heading.',  'online-video-games' ),
		'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).',  'online-video-games' ),
		'section'     => 'online_video_games_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_body_content_typography',
		'section'     => 'online_video_games_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'online-video-games' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'online_video_games_body_content_typography',
		'label'       => esc_attr__( 'Content Typography',  'online-video-games' ),
		'description' => esc_attr__( 'Select the typography options for your content.',  'online-video-games' ),
		'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).',  'online-video-games' ),
		'section'     => 'online_video_games_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	// PANEL

	Kirki::add_panel( 'online_video_games_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'online-video-games' ),
	) );

	// Scroll Top

	Kirki::add_section( 'online_video_games_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'online-video-games' ),
	    'panel'          => 'online_video_games_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'online_video_games_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'online-video-games' ),
		'section'     => 'online_video_games_additional_settings',
		'default'     => '1',
		'priority'    => 10,
		'partial_refresh'    => [
		'online_video_games_scroll_enable_setting' => [
			'selector'        => '.scroll-up a',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'online_video_games_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'online-video-games' ),
		'section'     => 'online_video_games_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'online-video-games' ),
			'Center' => esc_html__( 'Center', 'online-video-games' ),
			'Right'  => esc_html__( 'Right', 'online-video-games' ),
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_online_video_games',
		'label'       => esc_html__( 'Menus Text Transform', 'online-video-games' ),
		'section'     => 'online_video_games_additional_settings',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'online-video-games' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'online-video-games' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'online-video-games' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'online-video-games' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'online_video_games_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'online-video-games' ),
		'section'     => 'online_video_games_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'online_video_games_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'online-video-games' ),
		'section'     => 'online_video_games_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'online_video_games_sticky_header',
		'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'online-video-games' ),
		'section'     => 'online_video_games_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	if ( class_exists("woocommerce")){

	// Woocommerce Settings

	Kirki::add_section( 'online_video_games_woocommerce_settings', array(
			'title'          => esc_html__( 'Woocommerce Settings', 'online-video-games' ),
			'description'    => esc_html__( 'Shop Page', 'online-video-games' ),
			'panel'          => 'online_video_games_panel_id',
			'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'online_video_games_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'online-video-games' ),
		'section'     => 'online_video_games_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'online_video_games_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'online-video-games' ),
		'section'     => 'online_video_games_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'online_video_games_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'online-video-games' ),
		'section'     => 'online_video_games_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
	[
		'settings' => 'online_video_games_per_columns',
		'label'    => esc_html__( 'Product Per Row', 'online-video-games' ),
		'section'  => 'online_video_games_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'online_video_games_product_per_page',
		'label'    => esc_html__( 'Product Per Page', 'online-video-games' ),
		'section'  => 'online_video_games_woocommerce_settings',
		'default'  => 9,
		'choices'  => [
			'min'  => 1,
			'max'  => 15,
			'step' => 1,
		],
	]
	);

}

	// POST SECTION

	Kirki::add_section( 'online_video_games_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'online-video-games' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'online-video-games' ),
	    'panel'          => 'online_video_games_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_enable_post_heading',
		'section'     => 'online_video_games_section_post',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Post Settings.', 'online-video-games' ) . '</h3>',
		'priority'    => 10,
		'partial_refresh'    => [
		'online_video_games_enable_post_heading' => [
			'selector'        => 'h3.post-title',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'online_video_games_blog_admin_enable',
		'label'       => esc_html__( 'Post Author Enable / Disable Button', 'online-video-games' ),
		'section'     => 'online_video_games_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'online-video-games' ),
			'off' => esc_html__( 'Disable', 'online-video-games' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'online_video_games_blog_comment_enable',
		'label'       => esc_html__( 'Post Comment Enable / Disable Button', 'online-video-games' ),
		'section'     => 'online_video_games_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'online-video-games' ),
			'off' => esc_html__( 'Disable', 'online-video-games' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'online_video_games_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'online-video-games' ),
		'section'     => 'online_video_games_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'online_video_games_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'online-video-games' ),
		'section'     => 'online_video_games_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

	// HEADER SECTION

	Kirki::add_section( 'online_video_games_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'online-video-games' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'online-video-games' ),
	    'panel'          => 'online_video_games_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_header_announcement_text_heading',
		'section'     => 'online_video_games_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Announcement Text', 'online-video-games' ) . '</h3>',
		'priority'    => 10,
		'partial_refresh'    => [
		'online_video_games_header_announcement_text_heading' => [
			'selector'        => '.top-header p',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'online_video_games_header_announcement_text',
		'section'  => 'online_video_games_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_header_sign_button_heading',
		'section'     => 'online_video_games_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Button', 'online-video-games' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Sign Up Text', 'online-video-games' ),
		'settings' => 'online_video_games_sign_up_text',
		'section'  => 'online_video_games_section_header',
		'default'  => '',
		'priority' => 10,
		'partial_refresh'    => [
		'online_video_games_sign_up_text' => [
			'selector'        => '.signup-box',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'       => esc_html__( 'Sign Up URL', 'online-video-games' ),
		'settings' => 'online_video_games_sign_up_url',
		'section'  => 'online_video_games_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Sign In Text', 'online-video-games' ),
		'settings' => 'online_video_games_sign_in_text',
		'section'  => 'online_video_games_section_header',
		'default'  => '',
		'priority' => 10,
		'partial_refresh'    => [
		'online_video_games_sign_in_text' => [
			'selector'        => '.signin-box',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'       => esc_html__( 'Sign In URL', 'online-video-games' ),
		'settings' => 'online_video_games_sign_in_url',
		'section'  => 'online_video_games_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_enable_socail_link',
		'section'     => 'online_video_games_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'online-video-games' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'online_video_games_section_header',
		'priority'    => 10,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'online-video-games' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'online-video-games' ),
		'settings'     => 'online_video_games_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'online-video-games' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'online-video-games' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'online-video-games' ),
				'description' => esc_html__( 'Add the social icon url here.', 'online-video-games' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
		'partial_refresh'    => [
		'online_video_games_social_links_settings' => [
			'selector'        => '.social-links a',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'online_video_games_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'online-video-games' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'online-video-games' ),
        'panel'          => 'online_video_games_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_enable_heading',
		'section'     => 'online_video_games_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'online-video-games' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'online_video_games_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'online-video-games' ),
		'section'     => 'online_video_games_blog_slide_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'online-video-games' ),
			'off' => esc_html__( 'Disable', 'online-video-games' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'online_video_games_title_unable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'online-video-games' ),
		'section'     => 'online_video_games_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'online-video-games' ),
			'off' => esc_html__( 'Disable', 'online-video-games' ),
		],
		'partial_refresh'    => [
		'online_video_games_title_unable_disable' => [
			'selector'        => '.blog_box h3',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'online_video_games_button_unable_disable',
		'label'       => esc_html__( 'Slide Button Enable / Disable', 'online-video-games' ),
		'section'     => 'online_video_games_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'online-video-games' ),
			'off' => esc_html__( 'Disable', 'online-video-games' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_slider_heading',
		'section'     => 'online_video_games_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'online-video-games' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'online_video_games_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'online-video-games' ),
		'section'     => 'online_video_games_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'online_video_games_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'online-video-games' ),
		'section'     => 'online_video_games_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'online-video-games' ),
		'priority'    => 10,
		'choices'     => online_video_games_get_categories_select(),
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_slider_short_heading',
		'section'     => 'online_video_games_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider Sub Title', 'online-video-games' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'online_video_games_slider_short_title',
		'section'  => 'online_video_games_blog_slide_section',
		'priority' => 10,
    ] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'online_video_games_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'online-video-games' ),
		'section'     => 'online_video_games_blog_slide_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'online-video-games' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'online-video-games' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'online-video-games' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'online-video-games' ),

		],
	] );

	// LATEST GAME SECTION

	Kirki::add_section( 'online_video_games_latest_game_section', array(
        'title'          => esc_html__( 'Latest Game Settings', 'online-video-games' ),
        'description'    => esc_html__( 'You have to select product category to show games section.', 'online-video-games' ),
        'panel'          => 'online_video_games_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_latest_game_section_enable_heading',
		'section'     => 'online_video_games_latest_game_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Latest Game Section', 'online-video-games' ) . '</h3>',
		'priority'    => 1,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'online_video_games_latest_game_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'online-video-games' ),
		'section'     => 'online_video_games_latest_game_section',
		'default'     => '0',
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'online-video-games' ),
			'off' => esc_html__( 'Disable', 'online-video-games' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_latest_game_heading',
		'section'     => 'online_video_games_latest_game_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Latest Game Headings',  'online-video-games' ) . '</h3>',
		'priority'    => 3,

		'partial_refresh'    => [
		'online_video_games_latest_game_heading' => [
			'selector'        => '#latest_game h3',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'online_video_games_latest_game_sub_heading',
		'label'    => esc_html__( 'Sub Heading', 'online-video-games' ),
		'section'  => 'online_video_games_latest_game_section',
		'priority' => 4,
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'online_video_games_latest_game_main_heading',
		'label'    => esc_html__( 'Main Heading', 'online-video-games' ),
		'section'  => 'online_video_games_latest_game_section',
		'priority' => 5,
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_game_product_heading',
		'section'     => 'online_video_games_latest_game_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Latest Games', 'online-video-games' ) . '</h3>',
		'priority'    => 7,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'online_video_games_latest_game_per_page',
		'label'       => esc_html__( 'Number of products to show', 'online-video-games' ),
		'section'     => 'online_video_games_latest_game_section',
		'default'     => 8,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	// FOOTER SECTION

	Kirki::add_section( 'online_video_games_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'online-video-games' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'online-video-games' ),
        'panel'          => 'online_video_games_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_footer_enable_heading',
		'section'     => 'online_video_games_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'online-video-games' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'online_video_games_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'online-video-games' ),
		'section'     => 'online_video_games_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'online-video-games' ),
			'off' => esc_html__( 'Disable', 'online-video-games' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'online_video_games_footer_text_heading',
		'section'     => 'online_video_games_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'online-video-games' ) . '</h3>',
		'priority'    => 10,
		'partial_refresh'    => [
		'online_video_games_footer_text_heading' => [
			'selector'        => '.copy-text p',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'online_video_games_footer_text',
		'section'  => 'online_video_games_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'online_video_games_footer_text_heading_2',
	'section'     => 'online_video_games_footer_section',
	'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'online-video-games' ) . '</h3>',
	'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'online_video_games_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'online-video-games' ),
		'section'     => 'online_video_games_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'online-video-games' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'online-video-games' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'online-video-games' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'online-video-games' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'online_video_games_footer_text_heading_1',
	'section'     => 'online_video_games_footer_section',
	'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'online-video-games' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'online_video_games_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'online-video-games' ),
		'section'     => 'online_video_games_footer_section',
		'default'     => '',
	] );
}

add_action( 'customize_register', 'online_video_games_customizer_settings' );
function online_video_games_customizer_settings( $wp_customize ) {
	//Latest Game Section
	$args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
	$categories = get_categories($args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($m==0){
			$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('online_video_games_latest_game_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'online_video_games_sanitize_select',
	));
	$wp_customize->add_control('online_video_games_latest_game_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display games ','online-video-games'),
		'section' => 'online_video_games_latest_game_section',
	));
}
