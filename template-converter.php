<?php 
/**
*
*	@package Smacznegopl
*
*	Template Name: Page Converter
*/

get_header(); ?>

<main class="converter">

	<section class="entry">
		<?php the_field('entry') ?>
	</section>

	<section id="tabs" class="container">

		<h2 class="converter__subtitle subtitle"><?php _e('Przelicznik jednostek'); ?></h2>

		<ul class="tabs__nav">
			<li><a href="#tab1" class="tabs__link tabs__link--active"><?php _e('Kuchenny');?></a></li>
			<li><a href="#tab2" class="tabs__link"><?php _e('Temperatur');?></a></li>
			<li><a href="#tab3" class="tabs__link"><?php _e('Wag');?></a></li>
			<li><a href="#tab4" class="tabs__link"><?php _e('Objetości');?></a></li>
		</ul>

		<div id="tab1" class="tabs__tab">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Przelicznik Kuchenny');?>
			</h2>

			<form id="kitchen_conv" class="" action="">

			</form>

			<div id="kitchen" class="convert__result">

			</div>

		</div>

		<!-- // Temperature Converter -->
		<div id="tab2" class="tabs__tab tabs__tab--current">
			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Przelicznik Temperatur');?>
			</h2>
			<form action="">
				<div role="group" class="calculator__text row">
					<div class="input-text col-6">
						<input class="input-text__input" id="tempC" type="number" name="C" placeholder=" ">
						<label class="input-text__label" for="tempC">
							<?php echo __('Stopni Celsjusza'); ?>
						</label>
					</div>
					<div class="input-text col-6">						
						<input class="input-text__input" id="tempF" type="number" name="F" placeholder=" ">
						<label class="input-text__label" for="tempF">
							<?php echo __('Stopni Fahrenheita'); ?>
						</label>
					</div>
				</div>
			</form>
		</div>

		<!-- // Temperature Weight -->
		<div id="tab3" class="tabs__tab">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Przelicznik Wag');?>
			</h2>

			<form action="">
				<div role="group" class="calculator__text row">
					<div class="input-text col-12">
						<input class="input-text__input" id="w_gr" type="number" name="w_gr" placeholder=" ">
						<label class="input-text__label" for="w_gr">
							<?php echo __('Gramy'); ?>
						</label>
					</div>
					<div class="input-text col-12">						
						<input class="input-text__input" id="w_dgr" type="number" name="w_dgr" placeholder=" ">
						<label class="input-text__label" for="w_dgr">
							<?php echo __('Dekagramy'); ?>
						</label>
					</div>

					<div class="input-text col-12">						
						<input class="input-text__input" id="w_kg" type="number" name="w_kg" placeholder=" ">
						<label class="input-text__label" for="w_kg">
							<?php echo __('Kilogramy'); ?>
						</label>
					</div>

					<div class="input-text col-12">						
						<input class="input-text__input" id="w_lb" type="number" name="w_lb" placeholder=" ">
						<label class="input-text__label" for="w_lb">
							<?php echo __('Funty'); ?>
						</label>
					</div>
				</div>
			</form>

		
		</div>

		<div id="tab4" class="tabs__tab ">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Przelicznik Objęści');?>
			</h2>

			<form id="capacity_conv" class="" action="">
				<div role="group" class="calculator__text row">

					<div class="input-text col-12">						
						<input class="input-text__input" id="ml" type="number" name="ml" placeholder=" ">
						<label class="input-text__label" for="ml">
							<?php echo __('mililitry'); ?>
						</label>
					</div>
					<div class="input-text col-12">						
						<input class="input-text__input" id="liters" type="number" name="liters" placeholder=" ">
						<label class="input-text__label" for="liters">
							<?php echo __('Litry'); ?>
						</label>
					</div>
					<div class="input-text col-12">						
						<input class="input-text__input" id="ts" type="number" name="ts" placeholder=" ">
						<label class="input-text__label" for="ts">
							<?php echo __('Łyżeczka'); ?>
						</label>
					</div>
					<div class="input-text col-12">						
						<input class="input-text__input" id="spoon" type="number" name="spoon" placeholder=" ">
						<label class="input-text__label" for="spoon">
							<?php echo __('Łyżka stołowa'); ?>
						</label>
					</div>

					<div class="input-text col-12">						
						<input class="input-text__input" id="glass" type="number" name="glass" placeholder=" ">
						<label class="input-text__label" for="glass">
							<?php echo __('Szklanki'); ?>
						</label>
					</div>

				</div>
			</form>

		</div>


	</section>

</main>


<?php get_footer(); ?>