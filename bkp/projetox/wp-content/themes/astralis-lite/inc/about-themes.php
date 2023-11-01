<?php
/**
 * Astralis Lite About Theme
 *
 * @package Astralis Lite
 */

//about theme info
add_action( 'admin_menu', 'astralis_lite_abouttheme' );
function astralis_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'astralis-lite'), __('About Theme Info', 'astralis-lite'), 'edit_theme_options', 'astralis_lite_guide', 'astralis_lite_mostrar_guide');   
} 

//Info of the theme
function astralis_lite_mostrar_guide() { 	
?>

<h1><?php esc_html_e('About Theme Info', 'astralis-lite'); ?></h1>
<hr />  

<p><?php esc_html_e('Astralis Lite eSports is a popular Esports Gaming WordPress Theme that specializes in flaunting an extremely impressive appeal for the gaming or sports industry. It does not matter if you are a sports item manufacturer or sports item or apparel seller, or just a sports consultancy service provider; this theme will always help you out. Precisely, this theme will fulfill your every eSports business needs with ease. Also, you can sell games with this theme. This is a ready-made solution for the businessmen out there, and you can get started with it almost immediately. If you are a newbie or a neophyte user, this is the ideal solution for your business needs.', 'astralis-lite'); ?></p>

<h2><?php esc_html_e('Theme Features', 'astralis-lite'); ?></h2>
<hr />  
 
<h3><?php esc_html_e('Theme Customizer', 'astralis-lite'); ?></h3>
<p><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'astralis-lite'); ?></p>


<h3><?php esc_html_e('Responsive Ready', 'astralis-lite'); ?></h3>
<p><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'astralis-lite'); ?></p>


<h3><?php esc_html_e('Cross Browser Compatible', 'astralis-lite'); ?></h3>
<p><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'astralis-lite'); ?></p>


<h3><?php esc_html_e('E-commerce', 'astralis-lite'); ?></h3>
<p><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'astralis-lite'); ?></p>

<hr />  	
<p><a href="http://www.gracethemesdemo.com/documentation/astralis/#homepage-lite" target="_blank"><?php esc_html_e('Documentation', 'astralis-lite'); ?></a></p>

<?php } ?>