<?php 
function latest_cpt_init() {

    require get_template_directory() . '/inc/widgets/latest-cpt.php';
    register_widget( 'WP_Custom_Post_Type_Widgets_Recent_Posts' );

}

add_action( 'widgets_init', 'latest_cpt_init' );

function about_me() {

    require get_template_directory() . '/inc/widgets/widget-about-me.php';
    register_widget( 'About_Me' );

}

add_action( 'widgets_init', 'about_me' );