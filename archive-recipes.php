<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Smaczegopl

 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="side-main" role="main">

		<header class="archive__header">
			<div class="archive__wrapper">
				<h1 class="archive__title container"><?php echo get_the_archive_title(); ?></h1>
				<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
			</div>
		</header>

		<?php echo do_shortcode('[chomikoo_ajax_filter]') ?>

		<section class="container archive__container">
			
			<?php 

				if( have_posts() ):

					echo '<div class="page-limit" data-page="' . $_SERVER["REQUEST_URI"] . '">';
					echo '<div id="ajax_filter_results" class="row mx-auto">';
					while( have_posts() ):  the_post();

						get_template_part( 'template-parts/content-recipes' );
						
					endwhile;
					echo '</div>';
					echo '</div>';

				endif;

			?>

		</section><!-- .container -->

		<div class="paginaiton container">
			<?php chomikoo_pagination_nav(); ?>
		</div>

	</main>

</div>


<?php get_footer();
