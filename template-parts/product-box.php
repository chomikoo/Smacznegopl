<?php
/**
 * Template part for displaying ingredients
 */
 
    $kcal = get_field('kcal');
    $proteins = get_field('bialko');
    $carbs = get_field('weglowodany');
    $fat = get_field('tluszcze');
    $fiber = get_field('blonnik');
    $salt = get_field('sol');


?>

<article id="post-<?php the_ID(); ?>" <?php post_class('product row'); ?> >

    <a href="<?php the_permalink(); ?>" class="product__thumb thumbnail col-12 col-sm-4">
    <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        } else { ?>
            <img src="<?php echo THEME_URL . "/dist/img/placeholder.jpg " ?>" alt="<?php the_title(); ?>" />
    <?php } ?>
    </a>

    <div class="product__info col-12 col-sm-8">
        
        <ul class="product__types"><?php __('Typ: ', 'smaczegopl'); ?>
            <?php echo get_the_term_list( $post->ID, 'product-type', '<li class="product__type">', ', ', '</li>' ) ?>
        </ul>

        <h2 class="subtitle product__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <div class="product__box row mx-auto">

            <div class="product__macro">
                <span><?php echo __('kcal'); ?>:</span><span><?php echo $kcal; ?></span>
            </div>

            <div class="product__macro">
                <span><?php echo __('Białko'); ?>:</span><span><?php echo $proteins; ?>g</span>
            </div>

            <div class="product__macro">
                <span><?php echo __('Węglowodany'); ?>:</span><span><?php echo $carbs; ?>g</span>
            </div>

            <div class="product__macro">
                <span><?php echo __('Tłuszcz'); ?>:</span><span><?php echo $fat; ?>g</span>
            </div>
            <?php if($fiber) { ?>
            <div class="product__macro">
                <span><?php echo __('Błonnik'); ?>:</span><span><?php echo $fiber; ?>g</span>
            </div>
            <?php }?>
            <?php if($salt) { ?>
            <div class="product__macro">
                <span><?php echo __('Sól'); ?>:</span><span><?php echo $salt; ?>g</span>
            </div>
            <?php } ?>

        </div>

        <?php if(get_field('opis')) { ?>
        <div class="product__description">
            <?php echo custom_field_excerpt('opis'); ?>
        </div>
        <?php } ?>

    </div><!-- nutrition -->

</article>