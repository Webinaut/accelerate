<?php
/*
Plugin Name: Social Sharing (by Danny)
Version: 1.2.7
Plugin URI: https://dannyvankooten.com/wordpress-plugins/social-sharing-by-danny/
Description: Adds super lightweight (no-scripts) social share buttons to your posts.
Author: ibericode
Author URI: https://dannyvankooten.com/
Text Domain: dvk-social-sharing
Domain Path: /languages/
License: GPL v3

Social Sharing By Danny Plugin
Copyright (C) 2013-2017, Danny van Kooten, hi@dannyvankooten.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

define( 'DVKSS_VERSION', '1.2.7' );
define( 'DVKSS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'DVKSS_PLUGIN_URL', plugins_url( '/' , __FILE__ ) );

require_once DVKSS_PLUGIN_DIR . 'includes/plugin.php';
add_action( 'plugins_loaded', 'dvkss_load_textdomain' );

if( ! is_admin() ) {

	// PUBLIC SECTION
	require_once DVKSS_PLUGIN_DIR . 'includes/template-functions.php';
	require_once DVKSS_PLUGIN_DIR . 'includes/class-public.php';
	new DVKSS_Public();

} elseif( ! defined("DOING_AJAX") || ! DOING_AJAX ) {
	
	// ADMIN SECTION
	require DVKSS_PLUGIN_DIR . 'includes/class-admin.php';
	new DVKSS_Admin();

}
