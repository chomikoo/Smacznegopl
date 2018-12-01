<?php
/**
 * Smacznego: Enqueue Assets
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */



function chomikoo_load_scripts() {

	// $ver = '1.0.2';
	$ver = time();

	wp_enqueue_script( 'fontawesome',  'https://use.fontawesome.com/releases/v5.5.0/js/all.js', array(), 'all' );

	wp_enqueue_style( 'styles', THEME_URL . 'dist/css/style.min.css', array(), $ver, 'all' );

	if( is_single() && get_post_type()=='recipes' ) {
		wp_enqueue_script( 'recipe', THEME_URL . 'src/js/recipe.js', array('jquery'), $ver, 'all'  );	
	}

	wp_enqueue_script( 'myscript', THEME_URL . 'dist/js/script.min.js', array('jquery'), $ver, 'all'  );
}

add_action( 'wp_enqueue_scripts', 'chomikoo_load_scripts' );