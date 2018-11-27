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

    <main id="main" class="main">
    
        <div class="top-bar container">
			<?php get_template_part('template-parts/recipe/top-bar'); ?>
		</div>

        <article class="recipe recipe-<?php the_ID(); ?>">

            <header class="recipe__header">
                <?php the_post_thumbnail();  ?>
                <h1 class="post__title">
                    <?php the_title(); ?>
                </h1>

                <?php get_template_part('template-parts/recipe/features.php'); ?>

                <div class="badge_container container">
                    <!-- <span class="badge badge--date badge--info">
                        <?php echo get_the_date(); ?>
                    </span> -->
                    <span class="badge">
                        <?php echo __('Czas', 'smacznegopl'); ?>:
                        <?php echo min_2_h( $time ); ?>
                    </span>,
                    <span class="badge">
                        <?php echo __('Kcal','smacznegopl'); ?>:
                        <?php echo $kcal; ?>
                    </span>
                </div>
            </header>
            
            <div class="recipe__content">

                <?php get_template_part('template-parts/recipe/nutritionbar'); ?>

                        
                <?php if( get_field( 'wstep' ) ) { ?>
                <div class="recipe__enter">
                    <!-- wstęp -->
                    <div class="text wysiwg-container">
                        <?php echo get_field('wstep'); ?>
                    </div>

                </div>
                <?php } ?>

        <div class="row mx-auto">

<div class="col-12 col-md-5">

    <!-- Przepis -->

    <?php  if( have_rows( 'przepis' ) ): ?>

    <div class="recipe">

        <h2 class="recipe__subtitle">
            <?php echo __('Składniki', 'smacznegopl'); ?>:</h2>

        <?php 
        $i == 0;
        while( have_rows('przepis') ) : the_row();
        
        $header = get_sub_field('naglowek');
        $ingredients = get_sub_field('skladniki');
        
    ?>

        <div class="recipe__single">

            <div class="recipe__head">

                <h2 class="recipe__title">
                    <?php echo $header ?>
                </h2>

                <!-- <div class="portions"> -->
                <?php if( $i == 0) { 
                    $i++;
                ?>
                <div class="recipe__portions">
                    <button id="portion-minus" class="recipe__btn">
                        <span class="fas fa-minus"></span>
                    </button>
                    <input id="jsPortions" class="recipe__input" type="text" value="<?php echo $portions; ?>">
                    <button id="portion-add" class="recipe__btn">
                        <span class="fas fa-plus"></span>
                    </button>
                </div>
                <?php } ?>
                <!-- </div> -->

            </div>

            <?php if( $ingredients ) :  ?>

            <ul class="recipe__list">

                <?php

                    while( have_rows('skladniki') ) : the_row(); ?>

                <li class="recipe__ingredient">

                    <span class="recipe__quantity">
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

                    <a href="<?php the_permalink(); ?>" class="recipe__link tooltip tooltip--bottom"
                        data-tooltip="kcal:<?php the_field('kcal'); ?>/B:<?php the_field('bialko'); ?>/W:<?php the_field('weglowodany'); ?>/T:<?php the_field('tluszcze'); ?> w 100g">
                        <?php the_title();?>
                    </a>

                    <?php wp_reset_postdata();
                    }
                    $prod_info = get_sub_field('info');
                    if( $prod_info ) {
                        echo '<span class="recipe__info tooltip tooltip--right" data-tooltip="' . $prod_info . '"><span class="fas fa-info-circle"></span></span>';
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

<div class="col-12 col-md-7">

    <!-- wykonanie -->
    <div class="text wysiwg-container">
        <?php echo get_field('wykonianie'); ?>
    </div>

</div>

</div>

<!-- zakonczenie -->
<?php if( get_field( 'zakonczenie' ) ) { ?>
<div class="recipe__end ">
    <div class="text wysiwg-container">
        <?php echo get_field('zakonczenie'); ?>
    </div>
</div>
<?php } ?>

<?php
    $barcode = get_field( 'barcode' );
    if( !empty($barcode) ) { 
?>
<div class="recipe__barcode">
    <h2 class="recipe__subtitle subtitle">
        <?php echo __('Kod MyfintessPal / Fitatu', 'smacznegopl'); ?>
    </h2>
    <img class="mx-auto" src="<?php echo $barcode['url'] ?>" alt="<?php echo ( !empty($barcode['alt']) )  ? $barcode['alt'] : $barcode['title'] ?>" />
</div>

<?php } ?>


            </div>
                
        </article>

        <?php chomikoo_the_post_nav(); ?>

        <div class="section-spacer container">
            <span class="section-spacer__bar"></span>
            <span>
                <?php echo __('Zobacz też:', 'smacznegopl'); ?></span>
            <span class="section-spacer__bar"></span>
        </div>

        <?php get_template_part( 'template-parts/partials/related-posts'); ?>



    </main>
            
<?php get_footer();
