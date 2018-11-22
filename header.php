<?php
/**
 * Smacznego: Header
 *
 * @package WordPress
 * @subpackage Smacznego
 * 
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <header class="header container">
            
            <h1 class="header__logo page-title">Smacznego.pl</h1>
            <?php get_template_part('template-parts/nav/navbar'); ?>
            
        </header>