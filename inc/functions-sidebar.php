<?php

    function chomikoo_widgets_init() {
    
    register_sidebar( array(
        'name' => __( 'Strona główna', 'smacznegopl' ),
        'id' => 'right-sidebar',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Archiwum przepisów', 'smacznegopl' ),
        'id' => 'archive-sidebar',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<section id="%1$s" class="%2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );


    register_sidebar( array(
        'name' =>__( 'Footer', 'smaczegopl'),
        'id' => 'sidebar-2',
        'description' => __( 'Stopka strony', 'smacznegopl' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

}

add_action( 'widgets_init', 'chomikoo_widgets_init' );