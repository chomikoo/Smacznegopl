<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Smaczegoppl
 * @version 1.0
 */

get_header(); ?>
	<main class="main front-page">
		
		<section class="top-carousel ">
			
			<?php 
				$head_posts = get_field('head_slider');
				if ( $head_posts ): ?>

				<ul class="slider__list">

					<?php foreach( $head_posts as $post ) {
						setup_postdata( $post ); 

						get_template_part('template-parts/slide');
																		
					} ?>

				</ul>

				<?php
					wp_reset_postdata();
					endif;          
				?>

		</section>

		<?php get_template_part('template-parts/section-spacer'); ?>

		<section class="terms">

			<h2 class="section-title container">
				<?php echo __('Kategorie', 'smacznegopl'); ?>
			</h2>

			<?php 
			
			$args = array(
				'taxonomy' => 'meal-type',
				'hide_empty' => false
			);
			$terms = get_terms($args);

			if (!empty($terms) && !is_wp_error($terms) ){
				echo '<ul class="meal-terms">';
				foreach ($terms as $term) {
					$link = esc_url( get_term_link( $term, $term->taxonomy ) ); 
					
					$image = get_field('tax_thumbnail', 'term_' . $term->term_id);
					?>

					<li class="meal-terms__element" >

						<a href="<?php echo $link; ?>" class="meal-terms__link" style="background-image:url('<?php echo $image[url]; ?>')">

							<h3 class="meal-terms__title">
								<?php echo $term->name; ?>
							</h3>
							<!-- <span><?php echo $term->count; ?></span> -->
						</a>
					</li>

				<?php
				}
				echo '</ul>';
				// echo '<div class="meal-types__arrows"><button class="meal-types__arrows--prev" data-controls="prev" tabindex="-1" aria-controls="tns1">&lsaquo;</button><button class="meal-types__arrows--next" data-controls="next" tabindex="-1" aria-controls="tns1">&rsaquo;</button></div>';
			}
			
			?>

		</section><!-- .terms -->

		<?php get_template_part('template-parts/section-spacer'); ?>

		<section class="latest-posts container">

			<h2 class="section-title">
				<?php echo __('Najnowsze przepisy', 'smacznegopl'); ?>
			</h2>

			<div class="row mx-auto">
				<?php	
					$newsest_recipes_arg = new WP_Query( array(
						'post_type' => array('recipes', 'post'),
						'posts_per_page' => '6',
						'post_status'    => 'publish',
					) );
					while ( $newsest_recipes_arg->have_posts() ) :
						$newsest_recipes_arg->the_post();

						get_template_part( 'template-parts/recipe-box' );
					
					endwhile;
					wp_reset_postdata();
					?>
				<!-- </div> -->
			</div>

		</section><!-- .latest-posts -->

		<?php get_template_part('template-parts/section-spacer'); ?>

		<section class="popular-posts container">

			<h2 class="section-title">
				<?php echo __('Popularne', 'smacznegopl'); ?>
			</h2>

			<div class="row mx-auto">
				<?php	
					$newsest_recipes_arg = new WP_Query( array(
						'post_type' => array('recipes', 'post'),
						'posts_per_page' => '6',
						'post_status'    => 'publish',
					) );
					while ( $newsest_recipes_arg->have_posts() ) :
						$newsest_recipes_arg->the_post();

						get_template_part( 'template-parts/popular-post' );
					
					endwhile;
					wp_reset_postdata();
					?>
				<!-- </div> -->
			</div>

		</section><!-- .popular-posts -->

		<?php get_template_part('template-parts/section-spacer'); ?>

		<section class="instagram container">
			
			<h2 class="section-title">
				<?php echo __('#insta', 'smacznegopl'); ?>
			</h2>
			
			<div id="insta" class="insta"></div>
			
		</section><!-- instagram -->
		

	</main>

<?php get_footer();
