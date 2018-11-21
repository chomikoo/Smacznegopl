<?php
/**
 * Portfolio: Base
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */

	if(!defined('THEME_PATH')) {
		define('THEME_PATH', ABSPATH.'wp-content/themes/'.get_template().'/');
	}	

	if(!defined('THEME_URL')) {
		define('THEME_URL', WP_CONTENT_URL.'/themes/'.get_template().'/');
	}



	// SUPPORTS

	add_theme_support( 'post-thumbnails' ); 