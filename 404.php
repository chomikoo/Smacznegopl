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

		<section class="error  container">
			<header class="page-header">
				<h1 class="error__title">404</h1>
			</header><!-- .page-header -->

			<p class="error__content"><?php echo __( 'Wygląda na to, że podana strona nie istnieje.', 'photoportfolio' ); ?></p>
			<a class="error__link" href="<?php echo get_home_url(); ?>" >Wróć do strony głównej</a>
			
		</section>

	</main>

<?php get_footer(); ?>
