<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function online_video_games_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'online-video-games' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	online_video_games_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'online_video_games_register_recommended_plugins' );