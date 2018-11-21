<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Smaczegopl
 * 
 */

get_header(); ?>

	<main>

		<section class="error-404  container">
			<header class="page-header">
				<h1 class="page-title">404</h1>
			</header><!-- .page-header -->

			<p class="error404__content"><?php echo __( 'Wygląda na to, że podana strona nie istnieje.', 'photoportfolio' ); ?></p>
			<a class="error404__link" href="<?php echo get_home_url(); ?>" >Wróć do strony głównej</a>
			
		</section>

	</main>

<?php get_footer(); ?>
