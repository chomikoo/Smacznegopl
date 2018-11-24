<?php
/**
 * Smacznego: Header
 *
 * @package WordPress
 * @subpackage Smacznego
 * 
 */
?>

<nav class="navbar">
    <?php
        wp_nav_menu( array( 
            'theme_location' => 'top-menu', 
            'container' => 'ul',
            'menu_class' => 'navbar__menu'
            // 'items_wrap' => '<ul id="main-menu" class="navbar__menu">%3$s</ul>',
            ) ); 
    ?>

    <button id="hamburger" class="hamburger" aria-label="Otwórz menu">
        <span class="hamburger__bar"></span>
        <span class="hamburger__bar"></span>
        <span class="hamburger__bar"></span>
    </button>
</nav>
