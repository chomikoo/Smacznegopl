<?php
/**
 * Portfolio: Single Recipe
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */

 // Vars

 $portionWeight = get_field('waga_porcji');
 $kcal = get_field('kcal');
 $proteins = get_field('bialko');
 $carbs = get_field('weglowodany');
 $fats = get_field('tluszcze');
 $portions = get_field('porcje');
 $prepTime = get_field('czas');

 get_header(); ?>

<div class="wrap">
    <div id="primary">
        <main id="main" class="main">
        
            <div class="top-bar">
                <?php get_template_part('template-parts/top-bar'); ?>
            </div>

            <article class="single-recipe recipe-<?php the_ID(); ?> container">

                <header class="single-recipe__header thumbnail gradient-bg">
                    <?php the_post_thumbnail('full');  ?>
                    <div class="single-recipe__info">
                        <div class="single-recipe__badges badges">
                            <span class="badges__single"><?php echo get_the_date( 'd F Y' ); ?></span><span class="dot"></span>
                            <span class="badges__single"><?php the_author() ?></span>
                            <span class="badges__single"><span class="far fa-clock"></span>&nbsp;<?php echo min_2_h( get_field('czas') ); ?></span><span class="dot"></span>
                        </div>
                        
                        <h1 class="post__title">
                            <?php the_title(); ?>
                        </h1>
                    </div>

                    <?php get_template_part('template-parts/recipe/features.php'); ?>

                </header>
                
                <div class="single-recipe__content">

                    <?php get_template_part('template-parts/recipe/nutritionbar'); ?>

                            
                    <?php if( get_field( 'wstep' ) ) { ?>
                    <div class="single-recipe__enter">
                        <!-- wstęp -->
                        <div class="wysiwyg-container">
                            <?php echo get_field('wstep'); ?>
                        </div>

                    </div>
                    <?php } ?>

                    <div class="row mx-auto justify-sb">

                        <div class="col-12 col-md-5">

                            <!-- Przepis -->

                            <?php  if( have_rows( 'przepis' ) ): ?>

                            <div class="ingredients">

                                <h2 class="ingredients__subtitle">
                                    <?php echo __('Składniki', 'smacznegopl'); ?>:</h2>

                                <?php 
                                    $i == 0;
                                    while( have_rows('przepis') ) : the_row();
                                    
                                    $header = get_sub_field('naglowek');
                                    $ingredients = get_sub_field('skladniki');                        
                                ?>

                                <div class="ingredients__single">

                                        <div class="ingredients__head">

                                            <h2 class="ingredients__title">
                                                <?php echo $header ?>
                                            </h2>

                                            <?php if( $i == 0) { 
                                                $i++;
                                            ?>
                                            <div class="ingredients__portions">
                                                <button id="portion-minus" class="btn btn--control">
                                                    <span class="fas fa-minus"></span>
                                                </button>
                                                <input id="jsPortions" class="ingredients__input" type="text" value="<?php echo $portions; ?>">
                                                <button id="portion-add" class="btn btn--control">
                                                    <span class="fas fa-plus"></span>
                                                </button>
                                            </div>
                                            <?php } ?>

                                        </div>

                                        <?php if( $ingredients ) :  ?>

                                        <ul class="ingredients__list">

                                            <?php

                                            while( have_rows('skladniki') ) : the_row(); ?>

                                            <li class="ingredients__element">

                                                <span class="ingredients__quantity">
                                                    <?php echo get_sub_field('ilosc'); ?>
                                                </span>

                                                <?php 
                                                    $unit = get_sub_field('jednostka'); 
                                                    if( $unit ) {
                                                        echo  $unit ;
                                                    }
                                        
                                                    $prod_obj = get_sub_field('skladnik');
                                                    if ( $prod_obj ) {
                                                        $post = $prod_obj;
                                                        setup_postdata( $post );
                                                    ?>

                                                <a href="<?php the_permalink(); ?>" class="ingredients__link tooltip tooltip--bottom"
                                                    data-tooltip="kcal:<?php the_field('kcal'); ?>/B:<?php the_field('bialko'); ?>/W:<?php the_field('weglowodany'); ?>/T:<?php the_field('tluszcze'); ?> w 100g">
                                                    <?php the_title();?>
                                                </a>

                                                <?php wp_reset_postdata();
                                                }
                                                $prod_info = get_sub_field('info');
                                                if( $prod_info ) {
                                                    echo '<span class="ingredients__info tooltip tooltip--right" data-tooltip="' . $prod_info . '"><span class="fas fa-info-circle"></span></span>';
                                                }
                                                ?>
                                            </li>

                                            <?php endwhile; ?>

                                        </ul>

                                        <?php endif; ?>

                                    </div>

                                    <?php endwhile; ?>

                                </div>

                                <?php endif; ?>

                                <!-- PrzepisEnd -->

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- wykonanie -->
                                <div class="wysiwyg-container">
                                    <?php echo get_field('wykonianie'); ?>
                                </div>

                            </div>

                        </div>

            <!-- zakonczenie -->
            <?php if( get_field( 'zakonczenie' ) ) { ?>
            <div class="single-recipe__end ">
                <div class="wysiwyg-container">
                    <?php echo get_field('zakonczenie'); ?>
                </div>
            </div>
            <?php } ?>

            <?php
                $barcode = get_field( 'barcode' );
                if( !empty($barcode) ) { 
            ?>
            <div class="barcode">
                <h2 class="barcode__subtitle subtitle">
                    <?php echo __('Kod MyfintessPal / Fitatu', 'smacznegopl'); ?>
                </h2>
                <img class="barcode-img mx-auto" src="<?php echo $barcode['url'] ?>" alt="<?php echo ( !empty($barcode['alt']) )  ? $barcode['alt'] : $barcode['title'] ?>" />
            </div>

            <?php } ?>
            </div>

            <div class="single-recipe__gallery">
                <?php $gallery = get_field('galeria');
                if( $gallery ) {
                    echo '<ul class="gallery">';
                    foreach( $gallery as $image) { ?>
                    <li class="gallery__element">
                        <figure class="gallery__figure thumbnail">
                            <img class="gallery__img" <?php awesome_acf_responsive_image( $image[ID], 'thumb-640', '1200px' ); ?> alt="<?php echo $image['alt']; ?>" />
                            <?php 
                                $figcaption = $image['caption'];
                                if( $figcaption ) { echo "<figcaption class=\"gallery__caption\">$figcaption</figcaption>";}
                            ?>
                        </figure>
                    </li>    
                <?php }
                echo '</ul>';
                } ?>
            </div>
                    
            </article>

            <?php get_template_part('template-parts/post_nav') ?>

            <div class="section-spacer container">
                <span class="section-spacer__bar"></span>
                <span>
                    <?php echo __('Zobacz też:', 'smacznegopl'); ?></span>
                <span class="section-spacer__bar"></span>
            </div>

            <?php get_template_part( 'template-parts/recipe/related-posts'); ?>

        </main>
    </div><!-- #primary -->
</div><!-- .wrap -->
            
<?php get_footer();
