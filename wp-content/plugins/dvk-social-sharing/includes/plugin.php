<?php

if( ! defined("DVKSS_VERSION") ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

/**
* Get social sharing button options
* @return array Options in array format
*/
function dvkss_get_options()
{	
	static $options;

	// load options from database
	if( ! $options ) {
		
		// default options
		$defaults = array(
			'load_icon_css' => 1,
			'load_popup_js' => 0,
			'icon_size' => 32,
			'twitter_username' => '',
			'auto_add_post_types' => array( 'post' ),
			'before_text' => "Share this post: ",
            'social_options' => array( 'twitter', 'facebook', 'googleplus' ),
		);

		// get options from db
		$db_option = get_option( 'dvk_social_sharing', array() );

		// add option to database if not set, saves a query
		if( ! $db_option ) {
			update_option( 'dvk_social_sharing', $defaults );
		}

		// merge with default options to prevent notices
		$options = wp_parse_args( $db_option, $defaults );
	}

	return $options;
}

/**
* Load the plugin translation strings
*/
function dvkss_load_textdomain() {
	load_plugin_textdomain( 'dvk-social-sharing', false, 'dvk-social-sharing/languages/' );
}