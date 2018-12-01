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

        <header class="header">
            <div class="header__container container">
                <?php get_template_part('template-parts/header/navbar'); ?>
                <h1 class="header__logo logo"><a href="<?php echo get_home_url(); ?>" class="header__link">Smacznego.pl</a></h1>
                <button id="open-search" class="btn btn--search">
                    <span class="fas fa-search"></span>
                </button>
            </div>

        </header>