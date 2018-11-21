<?php
/**
 * Portfolio: Menus
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */


// Register Menu
function chomikoo_custom_menu() {
	register_nav_menus(
	array(
		'top-menu' => __( 'Menu' ),
		'social-menu' => __( 'Social menu' )
		)
	);
}
add_action( 'init', 'chomikoo_custom_menu' );


function chomikoo_menu_classes($classes, $item, $args) {
	if($args->theme_location == 'top-menu') {
	  $classes[] = 'container';
	}
	return $classes;
  }
  add_filter('nav_menu_css_class', 'chomikoo_menu_classes', 1, 3);