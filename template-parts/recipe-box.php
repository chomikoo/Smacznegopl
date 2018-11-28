<?php 

    $postType = get_post_type_object( get_post_type($post));
    $postTypeLabel = $postType->label;
    $postTypeSingularLabel = $postType->labels->singular_name;
?>

<article class="recipe recipe-<?php the_ID(); ?> col col-sm-6 col-md-4">
    <a href="<?php the_permalink(); ?>" class="recipe__thumbnail thumbnail">
        <img <?php responsive_thumbnail( get_the_ID(), 'thumb-640', '1200px' )?> />
    </a>

    <div class="recipe__content">

        <span class="recipe__post-type"><?php echo $postTypeLabel; ?></span> 
        
        <h2 class="recipe__title"><span class="bold"><?php echo $postTypeSingularLabel; ?>:</span> <?php the_title(); ?></h2>
        
        <?php if ( $postType->name == 'recipes' ) { ?>
            <div class="recipe__info recipe__info--nutrition">    
                <span class="recipe__badge"><?php echo get_field('kcal'); ?>kcal</span><span class="spacer"></span>
                <span class="recipe__badge">B:&nbsp;<?php echo get_field('bialko'); ?>g</span><span class="spacer"></span>
                <span class="recipe__badge">W:&nbsp;<?php echo get_field('weglowodany'); ?>g</span><span class="spacer"></span>
                <span class="recipe__badge">T:&nbsp;<?php echo get_field('tluszcze'); ?>g</span><span class="spacer"></span>
                <span class="recipe__badge"><span class="far fa-clock"></span>&nbsp;<?php echo min_2_h( get_field('czas') ); ?></span>
            </div>
        <?php } ?>

        <div class="recipe__info">
            <span class="recipe__badge"><?php echo get_the_date( 'd m Y' ); ?></span><span class="dot"></span>
            <span class="recipe__badge"><?php echo min_2_h( get_field('czas') ); ?></span><span class="dot"></span>
            <span class="recipe__badge"><?php the_author() ?></span>
        </div>
        
        <div class="recipe__excerpt">
            <?php if(has_excerpt($recipe->id)) {
                the_excerpt();
            } else {
                echo custom_field_excerpt('wstep', 20); 
            }?>
        </div>
        
    </div>
    <footer class="recipe__footer">
        <a href="<?php the_permalink(); ?>" class="recipe__more">Czytaj dalej</a>
        <span class="bar"></span>
    </footer>

</article>