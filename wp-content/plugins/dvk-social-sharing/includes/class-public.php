<?php

if( ! defined( "DVKSS_VERSION" ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

class DVKSS_Public {
	
	/**
	* Constructor
	*/
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ), 99 );
		add_filter( 'the_content', array( $this, 'add_links' ) );
		add_shortcode( 'dvk_social_sharing', 'dvk_social_sharing' );
	}

	/**
	* Load plugin stylesheets and scripts
	*/
	public function load_assets() 
	{
		$opts = dvkss_get_options();
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		if( $opts['load_icon_css'] ) {
			wp_enqueue_style( 'dvk-social-sharing', DVKSS_PLUGIN_URL . 'assets/css/styles' . $suffix . '.css', array(), DVKSS_VERSION );
		}

		if( $opts['load_popup_js'] ) {
			wp_enqueue_script( 'dvk-social-sharing', DVKSS_PLUGIN_URL . 'assets/js/script' . $suffix . '.js', array( ), DVKSS_VERSION, true );
		}
	}

	/**
	 * Automatically adds links to post content
	 *
	 * @param string $content
	 * @return string
	 */
	public function add_links( $content )
	{
		$opts = dvkss_get_options();
		$show_buttons = false;

		if( ! empty( $opts['auto_add_post_types'] ) && in_array( get_post_type(), $opts['auto_add_post_types'] ) && is_singular( $opts['auto_add_post_types'] ) ) {
			$show_buttons = true;
		}

		// allow custom conditionals
		$show_buttons = apply_filters( 'dvkss_display', $show_buttons );

		if( ! $show_buttons ) { 
			return $content; 
		}

		// add buttons to content
		return $content . dvk_social_sharing();
	}
}