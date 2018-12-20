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
		wp_enqueue_script( 'recipe', THEME_URL . 'src/js/frontend/recipe.js', array('jquery'), $ver, 'all'  );	
	}

	if( is_page_template('template-calculator.php') ) {
		wp_enqueue_script( 'calculators', THEME_URL . 'src/js/frontend/calculators.js', array('jquery'), $ver, 'all'  );	
	}

	// if( archive ) {}
		
		wp_enqueue_script( 'myscript', THEME_URL . 'dist/js/script.min.js', array('jquery'), $ver, 'all'  );
		wp_localize_script('myscript', 'themeData', array(
			'root_url' => get_site_url()
		));
	}
	
	add_action( 'wp_enqueue_scripts', 'chomikoo_load_scripts' );
	
function chomikoo_ajax_filter_scripts() {
	
		wp_enqueue_script( 'filter-script', THEME_URL . 'src/js/frontend/filter-ajax.js', array('jquery'), $ver, 'all'  );
		wp_localize_script( 'filter-script', 'ajax_url', admin_url('admin-ajax.php') );
	
}


function chomikoo_admin_scripts() {

	wp_enqueue_script('admin_js', THEME_URL . 'src/js/backend/admin_script.js', array('jquery'), $ver, 'all');

}

add_action( 'admin_enqueue_scripts', 'chomikoo_admin_scripts' );
