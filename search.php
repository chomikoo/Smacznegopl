<?php
/**
 * Template Name: Search Results Page
 */
get_header();
?>
<section id="primary">
    <div id="content" role="main">
        <?php if (have_posts()): ?>
            <header class="page-header"><?php _e("Search Results"); ?></header>
            <div class="entry-content">
                <?php
                while (have_posts()): the_post();
                    echo get_post_type()    ;       
                    // if( ) {

                    // } else if () {

                    // }

                endwhile;
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();