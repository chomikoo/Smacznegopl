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
				<h1 class="archive__title container"><?php post_type_archive_title(); ?>:</h1>
				<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
			</div>
		</header>

		<section id="archive_container" class="container archive__container">
			
			<?php 

				if( have_posts() ):

					echo '<div class="page-limit" data-page="' . $_SERVER["REQUEST_URI"] . '">';
						echo '<div class="row mx-auto">';
						while( have_posts() ):  the_post();

							// get_template_part('template-parts/content', get_post_type());

						endwhile;
						echo '</div>';
					echo '</div>';

				endif;

			?>

		</section><!-- .container -->


	</main>

</div>


<?php get_footer();
