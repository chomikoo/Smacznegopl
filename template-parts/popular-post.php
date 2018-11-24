<?php 
    $postType = get_post_type_object( get_post_type($post));
    $postTypeLabel = $postType->label;
    $postTypeSingularLabel = $postType->labels->singular_name;

?>

<article class="popular__single post-<?php the_ID(); ?> col-6 col-md-4">
    <a href="<?php the_permalink(); ?>" class="popular__link">
        <div class="popular__thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>')">
            <!-- <img <?php responsive_thumbnail( get_the_ID(), 'thumb-320', '600px' )?> /> -->
        </div>           
        <div class="popular__content">
            <h2 class="popular__title"><span class="bold"><?php echo $postTypeSingularLabel; ?>:</span> <?php the_title(); ?></h2>
            <span class="popular__date"><?php echo get_the_date( 'd m Y' ); ?></span> 
        </div> 
    </a>
</article>