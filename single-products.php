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

	<main id="main" class="site-main container product product--single" role="main">

		<header id="post-<?php the_ID(); ?>" <?php post_class('product__header'); ?> >

			<div class="product__thumb thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>

			<div class="product__info container">

				<h1 class="subtitle product__title">
					<?php the_title(); ?>
				</h1>

				<div class="product__category">
					<?php echo __('Kategoria produktu:  ', 'smaczegopl'); ?>
					<?php echo get_the_term_list( $post->ID, 'product-type') ?>
				</div>

				<div class="nutrition-facts product__boxREMOVE row mx-auto">

					<?php get_template_part( 'template-parts/partials/nutrition-table' ); ?>

				</div>

				<?php if(get_field('opis')) { ?>
				<div class="product__description">
					<?php echo custom_field_excerpt('opis'); ?>
				</div>
				<?php } ?>


			</div>

		</header>

		<section class="archive-related">
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