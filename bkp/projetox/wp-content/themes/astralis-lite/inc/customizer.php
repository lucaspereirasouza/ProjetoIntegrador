<?php    
/**
 *astralis-lite Theme Customizer
 *
 * @package Astralis Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function astralis_lite_customize_register( $wp_customize ) {	
	
	function astralis_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function astralis_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	} 
	
	function astralis_lite_sanitize_phone_number( $phone ) {
		// sanitize phone
		return preg_replace( '/[^\d+]/', '', $phone );
	} 
	
	
	function astralis_lite_sanitize_excerptrange( $number, $setting ) {	
		// Ensure input is an absolute integer.
		$number = absint( $number );	
		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;	
		// Get minimum number in the range.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );	
		// Get maximum number in the range.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );	
		// Get step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );	
		// If the number is within the valid range, return it; otherwise, return the default
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}

	function astralis_lite_sanitize_number_absint( $number, $setting ) {
		// Ensure $number is an absolute integer (whole number, zero or greater).
		$number = absint( $number );		
		// If the input is an absolute integer, return it; otherwise, return the default
		return ( $number ? $number : $setting->default );
	}
	
	// Ensure is an absolute integer
	function astralis_lite_sanitize_choices( $input, $setting ) {
		global $wp_customize; 
		$control = $wp_customize->get_control( $setting->id ); 
		if ( array_key_exists( $input, $control->choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
	
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo h1 a',
		'render_callback' => 'astralis_lite_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.logo p',
		'render_callback' => 'astralis_lite_customize_partial_blogdescription',
	) );
		
	 	
	//Panel for section & control
	$wp_customize->add_panel( 'astralis_lite_panel_settings', array(
		'priority' => 4,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Astralis Lite Theme Settings', 'astralis-lite' ),		
	) );

	$wp_customize->add_section('astralis_lite_themelayout',array(
		'title' => __('Site Layout Settings','astralis-lite'),			
		'priority' => 1,
		'panel' => 	'astralis_lite_panel_settings',          
	));		
	
	$wp_customize->add_setting('astralis_lite_boxlayoutoption',array(
		'sanitize_callback' => 'astralis_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'astralis_lite_boxlayoutoption', array(
    	'section'   => 'astralis_lite_themelayout',    	 
		'label' => __('Check to Show Box Layout','astralis-lite'),
		'description' => __('check for box layout','astralis-lite'),
    	'type'      => 'checkbox'
     )); //Layout Settings 
	
	$wp_customize->add_setting('astralis_lite_colorscheme',array(
		'default' => '#05c2df',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'astralis_lite_colorscheme',array(
			'label' => __('Color Scheme','astralis-lite'),			
			'section' => 'colors',
			'settings' => 'astralis_lite_colorscheme'
		))
	);
	
	$wp_customize->add_setting('astralis_lite_nextcolor_option',array(
		'default' => '#000060',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'astralis_lite_nextcolor_option',array(
			'label' => __('Next Color Options','astralis-lite'),			
			'section' => 'colors',
			'settings' => 'astralis_lite_nextcolor_option'
		))
	);
	
	$wp_customize->add_setting('astralis_lite_topmenu-fontcolor',array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'astralis_lite_topmenu-fontcolor',array(
			'label' => __('Navigation font Color','astralis-lite'),			
			'section' => 'colors',
			'settings' => 'astralis_lite_topmenu-fontcolor'
		))
	);
	
	
	$wp_customize->add_setting('astralis_lite_topmenu-fontcoloractive',array(
		'default' => '#05c2df',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'astralis_lite_topmenu-fontcoloractive',array(
			'label' => __('Navigation Hover/Active Color','astralis-lite'),			
			'section' => 'colors',
			'settings' => 'astralis_lite_topmenu-fontcoloractive'
		))
	);
	
	
	 //Header Contact Details
	$wp_customize->add_section('astralis_lite_infodetail_sec',array(
		'title' => __('Header Contact Details','astralis-lite'),				
		'priority' => null,
		'panel' => 	'astralis_lite_panel_settings',
	));	
	
	$wp_customize->add_setting('astralis_lite_phonenumber',array(
		'default' => null,
		'sanitize_callback' => 'astralis_lite_sanitize_phone_number'	
	));
	
	$wp_customize->add_control('astralis_lite_phonenumber',array(	
		'type' => 'text',
		'label' => __('Enter phone number here','astralis-lite'),
		'section' => 'astralis_lite_infodetail_sec',
		'setting' => 'astralis_lite_phonenumber'
	));
	
	$wp_customize->add_setting('astralis_lite_emailid',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('astralis_lite_emailid',array(
		'type' => 'email',
		'label' => __('Enter email id here','astralis-lite'),
		'section' => 'astralis_lite_infodetail_sec'
	));	
	
	
	$wp_customize->add_setting('astralis_lite_facebooklink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('astralis_lite_facebooklink',array(
		'label' => __('Add facebook link here','astralis-lite'),
		'section' => 'astralis_lite_infodetail_sec',
		'setting' => 'astralis_lite_facebooklink'
	));	
	
	$wp_customize->add_setting('astralis_lite_twitterlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('astralis_lite_twitterlink',array(
		'label' => __('Add twitter link here','astralis-lite'),
		'section' => 'astralis_lite_infodetail_sec',
		'setting' => 'astralis_lite_twitterlink'
	));

	
	$wp_customize->add_setting('astralis_lite_linkedinlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('astralis_lite_linkedinlink',array(
		'label' => __('Add linkedin link here','astralis-lite'),
		'section' => 'astralis_lite_infodetail_sec',
		'setting' => 'astralis_lite_linkedinlink'
	));
	
	$wp_customize->add_setting('astralis_lite_instagramlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('astralis_lite_instagramlink',array(
		'label' => __('Add instagram link here','astralis-lite'),
		'section' => 'astralis_lite_infodetail_sec',
		'setting' => 'astralis_lite_instagramlink'
	));		
	
	$wp_customize->add_setting('astralis_lite_infodetail_sec_show',array(
		'default' => false,
		'sanitize_callback' => 'astralis_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'astralis_lite_infodetail_sec_show', array(
	   'settings' => 'astralis_lite_infodetail_sec_show',
	   'section'   => 'astralis_lite_infodetail_sec',
	   'label'     => __('Check To show Header contact info','astralis-lite'),
	   'type'      => 'checkbox'
	 ));//Show Contact Info
	 
	 	 	
	//Frontpage Slide Section		
	$wp_customize->add_section( 'astralis_lite_frontslider_settings', array(
		'title' => __('Front Slider Settings', 'astralis-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 770 pixel.','astralis-lite'), 
		'panel' => 	'astralis_lite_panel_settings',           			
    ));
	
	$wp_customize->add_setting('astralis_lite_slider_pagenumber1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'astralis_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('astralis_lite_slider_pagenumber1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide 1:','astralis-lite'),
		'section' => 'astralis_lite_frontslider_settings'
	));	
	
	$wp_customize->add_setting('astralis_lite_slider_pagenumber2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'astralis_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('astralis_lite_slider_pagenumber2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide 2:','astralis-lite'),
		'section' => 'astralis_lite_frontslider_settings'
	));	
	
	$wp_customize->add_setting('astralis_lite_slider_pagenumber3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'astralis_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('astralis_lite_slider_pagenumber3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide 3:','astralis-lite'),
		'section' => 'astralis_lite_frontslider_settings'
	));	//frontpage Slider Section	
	
	//Slider Excerpt Length
	$wp_customize->add_setting( 'astralis_lite_slidepage_excerptlength', array(
		'default'              => 10,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'astralis_lite_sanitize_excerptrange',		
	) );
	$wp_customize->add_control( 'astralis_lite_slidepage_excerptlength', array(
		'label'       => __( 'Slider Excerpt length','astralis-lite' ),
		'section'     => 'astralis_lite_frontslider_settings',
		'type'        => 'range',
		'settings'    => 'astralis_lite_slidepage_excerptlength','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );	
	
	$wp_customize->add_setting('astralis_lite_slider_discoverbtn',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('astralis_lite_slider_discoverbtn',array(	
		'type' => 'text',
		'label' => __('Enter button name here','astralis-lite'),
		'section' => 'astralis_lite_frontslider_settings',
		'setting' => 'astralis_lite_slider_discoverbtn'
	)); // slider discover more button text
	
	$wp_customize->add_setting('astralis_lite_browsegametext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('astralis_lite_browsegametext',array(	
		'type' => 'text',
		'label' => __('Enter button name here','astralis-lite'),
		'section' => 'astralis_lite_frontslider_settings',
		'setting' => 'astralis_lite_browsegametext'
	)); //browse game button text
	
	
	$wp_customize->add_setting('astralis_lite_browsegametextlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('astralis_lite_browsegametextlink',array(
		'label' => __('Add button link here','astralis-lite'),		
		'setting' => 'astralis_lite_browsegametextlink',
		'section' => 'astralis_lite_frontslider_settings'
	));	
	
		
	$wp_customize->add_setting('astralis_lite_frontslider_settings_show',array(
		'default' => false,
		'sanitize_callback' => 'astralis_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'astralis_lite_frontslider_settings_show', array(
	    'settings' => 'astralis_lite_frontslider_settings_show',
	    'section'   => 'astralis_lite_frontslider_settings',
	    'label'     => __('Check To Show This Section','astralis-lite'),
	   'type'      => 'checkbox'
	 ));//Show front Page Slider Sections	
	 
	 
	 //Fifth Column Sections
	$wp_customize->add_section('astralis_lite_fifthcolumn_settings', array(
		'title' => __('Fifth Column Services','astralis-lite'),
		'description' => __('Select pages from the dropdown for fifth column services','astralis-lite'),
		'priority' => null,
		'panel' => 	'astralis_lite_panel_settings',          
	));
		
	$wp_customize->add_setting('astralis_lite_fifthbx_pgeno1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'astralis_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'astralis_lite_fifthbx_pgeno1',array(
		'type' => 'dropdown-pages',			
		'section' => 'astralis_lite_fifthcolumn_settings',
	));		
	
	$wp_customize->add_setting('astralis_lite_fifthbx_pgeno2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'astralis_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'astralis_lite_fifthbx_pgeno2',array(
		'type' => 'dropdown-pages',			
		'section' => 'astralis_lite_fifthcolumn_settings',
	));
	
	$wp_customize->add_setting('astralis_lite_fifthbx_pgeno3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'astralis_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'astralis_lite_fifthbx_pgeno3',array(
		'type' => 'dropdown-pages',			
		'section' => 'astralis_lite_fifthcolumn_settings',
	));
	
	$wp_customize->add_setting('astralis_lite_fifthbx_pgeno4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'astralis_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'astralis_lite_fifthbx_pgeno4',array(
		'type' => 'dropdown-pages',			
		'section' => 'astralis_lite_fifthcolumn_settings',
	));
	
	$wp_customize->add_setting('astralis_lite_fifthbx_pgeno5',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'astralis_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'astralis_lite_fifthbx_pgeno5',array(
		'type' => 'dropdown-pages',			
		'section' => 'astralis_lite_fifthcolumn_settings',
	));

	
	$wp_customize->add_setting( 'astralis_lite_fifthbx_pgeno_excerpt_length', array(
		'default'              => 8,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'astralis_lite_sanitize_excerptrange',		
	) );
	$wp_customize->add_control( 'astralis_lite_fifthbx_pgeno_excerpt_length', array(
		'label'       => __( 'Circle box excerpt length','astralis-lite' ),
		'section'     => 'astralis_lite_fifthcolumn_settings',
		'type'        => 'range',
		'settings'    => 'astralis_lite_fifthbx_pgeno_excerpt_length','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );	
	
	
	$wp_customize->add_setting('astralis_lite_fifthcolumn_settings_show',array(
		'default' => false,
		'sanitize_callback' => 'astralis_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));		
	
	$wp_customize->add_control( 'astralis_lite_fifthcolumn_settings_show', array(
	   'settings' => 'astralis_lite_fifthcolumn_settings_show',
	   'section'   => 'astralis_lite_fifthcolumn_settings',
	   'label'     => __('Check To Show This Section','astralis-lite'),
	   'type'      => 'checkbox'
	 ));//Show Four box sections
	 
	 
	 //Best Gaming Company Sections
	$wp_customize->add_section('astralis_lite_bestgaming_settings', array(
		'title' => __('Best Gaming Company Sections','astralis-lite'),
		'description' => __('Select pages from the dropdown for Best Gaming Company sections','astralis-lite'),
		'priority' => null,
		'panel' => 	'astralis_lite_panel_settings',          
	));
	
	$wp_customize->add_setting('astralis_lite_bestgaming_settings_subtitle',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('astralis_lite_bestgaming_settings_subtitle',array(	
		'type' => 'text',
		'label' => __('Enter sub title here','astralis-lite'),
		'section' => 'astralis_lite_bestgaming_settings',
		'setting' => 'astralis_lite_bestgaming_settings_subtitle'
	)); // Welcome sub title	
		
	$wp_customize->add_setting('astralis_lite_intropagebx',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'astralis_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'astralis_lite_intropagebx',array(
		'type' => 'dropdown-pages',			
		'section' => 'astralis_lite_bestgaming_settings',
	));	
	
	$wp_customize->add_setting( 'astralis_lite_excerpt_length_intropagebx', array(
		'default'              => 100,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'astralis_lite_sanitize_excerptrange',		
	) );
	$wp_customize->add_control( 'astralis_lite_excerpt_length_intropagebx', array(
		'label'       => __( 'Circle box excerpt length','astralis-lite' ),
		'section'     => 'astralis_lite_bestgaming_settings',
		'type'        => 'range',
		'settings'    => 'astralis_lite_excerpt_length_intropagebx','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	
	$wp_customize->add_setting('astralis_lite_intropagebx_readmoretext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('astralis_lite_intropagebx_readmoretext',array(	
		'type' => 'text',
		'label' => __('Enter read more button text','astralis-lite'),
		'section' => 'astralis_lite_bestgaming_settings',
		'setting' => 'astralis_lite_intropagebx_readmoretext'
	)); // welcome read more button text	
	
	
	$wp_customize->add_setting('astralis_lite_bestgaming_settings_show',array(
		'default' => false,
		'sanitize_callback' => 'astralis_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));		
	
	$wp_customize->add_control( 'astralis_lite_bestgaming_settings_show', array(
	   'settings' => 'astralis_lite_bestgaming_settings_show',
	   'section'   => 'astralis_lite_bestgaming_settings',
	   'label'     => __('Check To Show This Section','astralis-lite'),
	   'type'      => 'checkbox'
	 ));//Show Welcome sections
	
	 
	 //Blog Posts Settings
	$wp_customize->add_panel( 'astralis_lite_blogpost_settings', array(
		'priority' => 3,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Blog Posts Settings', 'astralis-lite' ),		
	) );
	
	$wp_customize->add_section('astralis_lite_blogmeta_options',array(
		'title' => __('Blog Meta Options','astralis-lite'),			
		'priority' => null,
		'panel' => 	'astralis_lite_blogpost_settings', 	         
	));		
	
	$wp_customize->add_setting('astralis_lite_hide_blogdate',array(
		'sanitize_callback' => 'astralis_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'astralis_lite_hide_blogdate', array(
    	'label' => __('Check to hide post date','astralis-lite'),	
		'section'   => 'astralis_lite_blogmeta_options', 
		'setting' => 'astralis_lite_hide_blogdate',		
    	'type'      => 'checkbox'
     )); //Blog Post Date
	 
	 
	 $wp_customize->add_setting('astralis_lite_hide_postcats',array(
		'sanitize_callback' => 'astralis_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'astralis_lite_hide_postcats', array(
		'label' => __('Check to hide post category','astralis-lite'),	
    	'section'   => 'astralis_lite_blogmeta_options',		
		'setting' => 'astralis_lite_hide_postcats',		
    	'type'      => 'checkbox'
     )); //blog Posts category	 
	 
	 
	 $wp_customize->add_section('astralis_lite_postfeatured_image',array(
		'title' => __('Posts Featured image','astralis-lite'),			
		'priority' => null,
		'panel' => 	'astralis_lite_blogpost_settings', 	         
	));		
	
	$wp_customize->add_setting('astralis_lite_hide_postfeatured_image',array(
		'sanitize_callback' => 'astralis_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'astralis_lite_hide_postfeatured_image', array(
		'label' => __('Check to hide post featured image','astralis-lite'),
    	'section'   => 'astralis_lite_postfeatured_image',		
		'setting' => 'astralis_lite_hide_postfeatured_image',	
    	'type'      => 'checkbox'
     )); //Posts featured image
	
	$wp_customize->add_section('astralis_lite_blogpost_content_settings',array(
		'title' => __('Blog Posts Excerpt Settings','astralis-lite'),			
		'priority' => null,
		'panel' => 	'astralis_lite_blogpost_settings', 	         
	 ));	 
	 
	$wp_customize->add_setting( 'astralis_lite_postsexcerptrange', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'astralis_lite_sanitize_excerptrange',		
	) );
	
	$wp_customize->add_control( 'astralis_lite_postsexcerptrange', array(
		'label'       => __( 'Excerpt length','astralis-lite' ),
		'section'     => 'astralis_lite_blogpost_content_settings',
		'type'        => 'range',
		'settings'    => 'astralis_lite_postsexcerptrange','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('astralis_lite_postsfullcontent',array(
        'default' => 'Excerpt',     
        'sanitize_callback' => 'astralis_lite_sanitize_choices'
	));
	
	$wp_customize->add_control('astralis_lite_postsfullcontent',array(
        'type' => 'select',
        'label' => __('Posts Content','astralis-lite'),
        'section' => 'astralis_lite_blogpost_content_settings',
        'choices' => array(
        	'Content' => __('Content','astralis-lite'),
            'Excerpt' => __('Excerpt','astralis-lite'),
            'No Content' => __('No Excerpt','astralis-lite')
        ),
	) ); 
	
	
	$wp_customize->add_section('astralis_lite_postsinglemeta',array(
		'title' => __('Posts Single Settings','astralis-lite'),			
		'priority' => null,
		'panel' => 	'astralis_lite_blogpost_settings', 	         
	));	
	
	$wp_customize->add_setting('astralis_lite_hide_postdate_fromsingle',array(
		'sanitize_callback' => 'astralis_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'astralis_lite_hide_postdate_fromsingle', array(
    	'label' => __('Check to hide post date from single','astralis-lite'),	
		'section'   => 'astralis_lite_postsinglemeta', 
		'setting' => 'astralis_lite_hide_postdate_fromsingle',		
    	'type'      => 'checkbox'
     )); //Hide Posts date from single
	 
	 
	 $wp_customize->add_setting('astralis_lite_hide_postcats_fromsingle',array(
		'sanitize_callback' => 'astralis_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'astralis_lite_hide_postcats_fromsingle', array(
		'label' => __('Check to hide post category from single','astralis-lite'),	
    	'section'   => 'astralis_lite_postsinglemeta',		
		'setting' => 'astralis_lite_hide_postcats_fromsingle',		
    	'type'      => 'checkbox'
     )); //Hide blogposts category single
		 
}
add_action( 'customize_register', 'astralis_lite_customize_register' );

function astralis_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a,
        #sidebar ul li a:hover,
		#sidebar ol li a:hover,	
        .post-list-style-2 h3 a:hover,
		.site-footer ul li a:hover, 
		.site-footer ul li.current_page_item a,				
        .postmeta a:hover,
		.hdr-social-icons a:hover,
        .button:hover,
		h2.services_title span,			
		.blog-postmeta a:hover,
		.blog-postmeta a:focus,
		blockquote::before	
            { color:<?php echo esc_html( get_theme_mod('astralis_lite_colorscheme','#05c2df')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,
        .nivo-controlNav a.active,
		.sd-search input, .sd-top-bar-nav .sd-search input,			
		a.blogreadmore,
		a.ReadMoreBtn,
		.column-5bx .equalbx-bg:hover,
		.copyrigh-wrapper:before,										
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,		
		.morebutton,
		.nivo-directionNav a:hover,	
		.nivo-caption .slidermorebtn.browse	
            { background-color:<?php echo esc_html( get_theme_mod('astralis_lite_colorscheme','#05c2df')); ?>;}
			

		
		.tagcloud a:hover,
		.logo::after,
		.logo,
		blockquote
            { border-color:<?php echo esc_html( get_theme_mod('astralis_lite_colorscheme','#05c2df')); ?>;}
			
		#main-site-wrapper a:focus,
		input[type="date"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="button"]:focus,
		input[type="month"]:focus,
		button:focus,
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="range"]:focus,		
		input[type="password"]:focus,
		input[type="datetime"]:focus,
		input[type="week"]:focus,
		input[type="submit"]:focus,
		input[type="datetime-local"]:focus,		
		input[type="url"]:focus,
		input[type="time"]:focus,
		input[type="reset"]:focus,
		input[type="color"]:focus,
		textarea:focus
            { outline:1px solid <?php echo esc_html( get_theme_mod('astralis_lite_colorscheme','#05c2df')); ?>;}	
			
		
		.nivo-caption .slidermorebtn:hover,
		.column-5bx .equalbx-bg,
		.hdr-bluebar,
		aside.widget 			
            { background-color:<?php echo esc_html( get_theme_mod('astralis_lite_nextcolor_option','#000060')); ?>;}
			
			
			
		
		.site-navi a,
		.site-navi ul li.current_page_parent ul.sub-menu li a,
		.site-navi ul li.current_page_parent ul.sub-menu li.current_page_item ul.sub-menu li a,
		.site-navi ul li.current-menu-ancestor ul.sub-menu li.current-menu-item ul.sub-menu li a  			
            { color:<?php echo esc_html( get_theme_mod('astralis_lite_topmenu-fontcolor','#ffffff')); ?>;}	
			
		
		.site-navi ul.nav-menu .current_page_item > a,
		.site-navi ul.nav-menu .current-menu-item > a,
		.site-navi ul.nav-menu .current_page_ancestor > a,
		.site-navi ul.nav-menu .current-menu-ancestor > a, 
		.site-navi .nav-menu a:hover,
		.site-navi .nav-menu a:focus,
		.site-navi .nav-menu ul a:hover,
		.site-navi .nav-menu ul a:focus,
		.site-navi ul li a:hover, 
		.site-navi ul li.current-menu-item a,			
		.site-navi ul li.current_page_parent ul.sub-menu li.current-menu-item a,
		.site-navi ul li.current_page_parent ul.sub-menu li a:hover,
		.site-navi ul li.current-menu-item ul.sub-menu li a:hover,
		.site-navi ul li.current-menu-ancestor ul.sub-menu li.current-menu-item ul.sub-menu li a:hover 		 			
            { color:<?php echo esc_html( get_theme_mod('astralis_lite_topmenu-fontcoloractive','#05c2df')); ?>;}
			
		.hdrtopcart .cart-count
            { background-color:<?php echo esc_html( get_theme_mod('astralis_lite_topmenu-fontcoloractive','#05c2df')); ?>;}		
			
		#main-site-wrapper .site-navi a:focus		 			
            { outline:1px solid <?php echo esc_html( get_theme_mod('astralis_lite_topmenu-fontcoloractive','#05c2df')); ?>;}	
	
    </style> 
<?php                               
}
         
add_action('wp_head','astralis_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function astralis_lite_customize_preview_js() {
	wp_enqueue_script( 'astralis_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '19062019', true );
}
add_action( 'customize_preview_init', 'astralis_lite_customize_preview_js' );