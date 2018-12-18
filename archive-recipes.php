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

		<?php if( is_paged() ){ ?>
		<div class="paginaiton paginaiton--ajax container">
			<button class="btn btn--loadmore btn__loadPrev" data-prev="1" data-page="<?php echo chomikoo_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<span class="icon--loading fas fa-cookie-bite"></span>
				<span class="btn__text">Ładuj poprzednie</span>
			</button>
		</div>
		<?php } ?>

		<section id="ajax_filter_results" class="container archive__container">
			
			<?php 

				if( have_posts() ):

					echo '<div class="page-limit row" data-page="/' . chomikoo_check_paged() . '">';
					// echo '<div id="ajax_filter_results" class="row mx-auto">';
					while( have_posts() ):  the_post();

						get_template_part( 'template-parts/content-recipes' );
						
					endwhile;
					// echo '</div>';
					echo '</div>';

				endif;

			?>

		</section><!-- .container -->

		<div class="paginaiton paginaiton--ajax container">
			<button class="btn btn--loadmore btn__loadNext" data-page="<?php echo chomikoo_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<span class="icon--loading fas fa-cookie-bite"></span>
				<span class="btn__text">Ładuj nastepne</span>
			</button>
		</div>

	</main>

</div>


<?php get_footer();
