<?php
/**
 * Portfolio: Cleanup
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */

// Hide AdminBar for Admin
if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}

// remove ver string ,from js and css
function chomikoo_remove_wp_version_strings( $src ) {

    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;

}

add_filter( 'script_loader_src', 'chomikoo_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'chomikoo_remove_wp_version_strings' );


// Remove metatag generator from header

function chomikoo_remove_meta_version() {
	return '';
}
add_filter( 'the_generator', 'chomikoo_remove_meta_version' );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );










