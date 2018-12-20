<?php 

    $postType = get_post_type_object( get_post_type($post));
    $postTypeLabel = $postType->label;
    $postTypeSingularLabel = $postType->labels->singular_name;
    // $terms = get_the_term_list( $post->ID, 'meal-type', '<ul class="recipe__post-type-list"><li class="recipe__post-type">', ',</li><li class="recipe__post-type">', '</li></ul>' );
    $terms = terms_list($post_ID, 'meal-type');
    // echo $post->ID;
?>

<article class="recipe recipe-<?php the_ID(); ?> reveal <?php echo (is_search()) ? 'col-12' : 'col-12 col-sm-6 col-md-4'; ?> ">
    <a href="<?php the_permalink(); ?>" class="recipe__thumbnail thumbnail">
            <img <?php responsive_thumbnail( get_the_ID(), 'thumb-640', '1200px' )?> />
            <?php if ( $postType->name == 'recipes' ) { ?>
            <div class="recipe__info recipe__info--thumbnail">    
                <span class="recipe__time"><span class="far fa-clock"></span>&nbsp;<?php echo min_2_h( get_field('czas') ); ?></span>
                <span class="recipe__badge"><?php echo get_field('kcal'); ?>kcal</span>
           </div>
        <?php } ?>
    </a>

    <div class="recipe__content">
        <?php echo $terms; ?>

        <h2 class="recipe__title"><span class="bold"><?php echo $postTypeSingularLabel; ?>:</span> <?php the_title(); ?></h2>

        <div class="recipe__excerpt">
            <!-- <?php echo $recipe->id; ?> -->
            <?php if(has_excerpt($post->id)) {
                the_excerpt();
            } else {
                echo custom_field_excerpt('wstep', 20); 
            }?>
        </div>


        <?php if ( $postType->name == 'recipes' ) { ?>
            <div class="recipe__info recipe__info--nutrition">    
                <span class="recipe__badge"><?php echo get_field('kcal'); ?>kcal</span><span class="spacer"></span>
                <span class="recipe__badge">B:&nbsp;<?php echo get_field('bialko'); ?>g</span><span class="spacer"></span>
                <span class="recipe__badge">W:&nbsp;<?php echo get_field('weglowodany'); ?>g</span><span class="spacer"></span>
                <span class="recipe__badge">T:&nbsp;<?php echo get_field('tluszcze'); ?>g</span>
                <!-- <span class="recipe__badge"><span class="far fa-clock"></span>&nbsp;<?php echo min_2_h( get_field('czas') ); ?></span> -->
            </div>
        <?php } ?>
        
    </div>
    <footer class="recipe__footer">
        <a href="<?php the_permalink(); ?>" class="recipe__more">Czytaj dalej</a>
        <span class="bar"></span>
    </footer>

</article>