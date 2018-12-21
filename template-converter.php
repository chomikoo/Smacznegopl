<?php 
/**
*
*	@package Smacznegopl
*
*	Template Name: Page Converter
*/

get_header(); ?>

<main>

	<section class="entry">
		<?php the_field('entry') ?>
	</section>

	<section id="tabs" class="container">

		<ul class="tabs__nav">
			<li><a href="#tab1" class="tabs__link tabs__link--active">Kulinarny</a></li>
			<li><a href="#tab2" class="tabs__link">Temperatur</a></li>
			<li><a href="#tab3" class="tabs__link">Wag</a></li>
			<li><a href="#tab4" class="tabs__link">Objetości</a></li>
		</ul>

		<div id="tab1" class="tabs__tab tabs__tab--current">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Przelicznik Kuchenny');?>
			</h2>

			<form id="kitchen_conv" class="" action="">

			</form>

			<div id="kitchen" class="convert__result">

			</div>

		</div>

		<div id="tab2" class="tabs__tab">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Przelicznik Wagowy');?>
			</h2>

			<form id="weight_conv" class="" action="">
			<div role="group" class="calculator__text d-flex flex-column">

			<div class="calculator__group">

				<label class="calculator__label" for="tempC">
					<?php echo __('Stopni Celsjusza'); ?>
				</label>
				<input class="calculator__input" id="tempC" type="number" name="C" require>

			</div>

			<div class="calculator__group">

				<label class="calculator__label" for="tempF">
					<?php echo __('Stopni Fahrenheita'); ?>
				</label>
				<input class="calculator__input" id="tempF" type="number" name="F" require>

			</div>

			</div>
			</form>

			<div id="weight" class="convert__result">

			</div>

		</div>

		<div id="tab3" class="tabs__tab">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Przelicznik Temperatur');?>
			</h2>

			<form id="weight_conv" class="" action="">

			</form>

			<div id="weight" class="convert__result">

			</div>

		</div>

		<div id="tab4" class="tabs__tab">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Przelicznik Objęści');?>
			</h2>

			<form id="weight_conv" class="" action="">

			</form>

			<div id="weight" class="convert__result">

			</div>

		</div>

		<!-- .calculator__bf -->

	</section>

</main>


<?php get_footer(); ?>