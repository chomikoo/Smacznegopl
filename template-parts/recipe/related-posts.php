<?php

    global $post;

    $current_post_type = get_post_type( $post );

    // The query arguments
    $args = array(
        'posts_per_page' => 3,
        'orderby' => 'rand',
        'post_type' => $current_post_type,
        'post__not_in' => array( $post->ID )
    );

    // Create the related query
    $rel_query = new WP_Query( $args );

    // Check if there is any related posts
    if( $rel_query->have_posts() ) : 

    ?>
    
    <div class="related">
        <ul class="related__list row mx-auto">
    <?php
        // The Loop
        while ( $rel_query->have_posts() ) :
            $rel_query->the_post();
    ?>
            <li class="related__element col-12 col-md-4">
                <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" rel="bookmark">
                    <article class="related__container thumbnail">
                        <?php the_post_thumbnail(); ?>
                        <h1 class="subtitle related__title"><?php the_title() ?></h1>
                    </article>
                </a>
            </li>
    <?php
        endwhile;
    ?>
        </ul><!-- .group -->
    </div><!-- #related -->
    <?php
    endif;

    // Reset the query
    wp_reset_query();

?>