<?php
/**
 * Portfolio: Single Product
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main product product--single" role="main">

		<div class="top-bar">
			<?php get_template_part('template-parts/top-bar'); ?>
		</div>

		<header id="post-<?php the_ID(); ?>" class="product__header container row" >

			<div class="product__thumb thumbnail col-12 col-sm-6">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} else { ?>
				<img src="<?php echo THEME_URL . "/dist/img/placeholder.jpg " ?>" alt="<?php the_title(); ?>" />
			<?php } ?>
			</div>

			<div class="product__info container col-12 col-sm-6">

				<h1 class="subtitle product__title">
					<?php the_title(); ?>
				</h1>

				<div class="product__category">
					<?php echo __('Kategoria produktu:  ', 'smaczegopl'); ?>
					<?php echo get_the_term_list( $post->ID, 'product-type') ?>
				</div>

				<div class="nutrition-facts row mx-auto">

					<?php get_template_part( 'template-parts/recipe/nutrition-table' ); ?>

				</div>

				<?php if(get_field('opis')) { ?>
				<div class="product__description">
					<?php echo custom_field_excerpt('opis'); ?>
				</div>
				<?php } ?>


			</div>

		</header>

		<section class="archive-related container">
			<h2 class="subtitle product__subtitle">
				<?php echo __('Przepisy z ', 'smaczegopl'); ?>
				<?php the_title(); ?>
			</h2>
			<div class="row mx-auto justify-content-between">
				
				<?php recipesWithSimilarIngredients(get_the_ID()); ?>

			</div>
		</section>

	</main>

</div>


<?php get_footer(); ?>