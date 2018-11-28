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
    
    <div class="related container">
        <ul class="related__list row mx-auto">
        <?php while ( $rel_query->have_posts() ) : $rel_query->the_post(); ?>
            <li class="related__element col-6 col-md-4">

                <?php 
                    $postType = get_post_type_object( get_post_type($post));
                    $postTypeLabel = $postType->label;
                    $postTypeSingularLabel = $postType->labels->singular_name;
                ?>

                <article class="related__single post-<?php the_ID(); ?>">
                    <a href="<?php the_permalink(); ?>" class="related__link">
                        <div class="related__thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>')"></div>           
                        <div class="related__content">
                            <h2 class="related__title"><span class="bold"><?php echo $postTypeSingularLabel; ?>:</span> <?php the_title(); ?></h2>
                            <span class="related__date"><?php echo get_the_date( 'd F Y' ); ?></span> 
                        </div> 
                    </a>
                </article>

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