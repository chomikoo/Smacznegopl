<?php 
/**
*
*	@package Smacznegopl
*
*	Template Name: Page Calculators
*/

get_header(); ?>

<main>

	<section class="container">

		<div class="tabs calculator__tabs">
			<a href="#bmiTab" class="tabs__nav tabs__nav--active btn btn--tab"><?php echo __('BMI'); ?></a>
			<a href="#bmrTab" class="tabs__nav btn btn--tab"><?php echo __('BMR'); ?></a>
			<a href="#pwTab" class="tabs__nav btn btn--tab"><?php echo __('Idealna Waga'); ?></a>
			<a href="#bfTab" class="tabs__nav btn btn--tab"><?php echo __('BF'); ?></a>
		</div>

		<div id="bmiTab" class="calculator calculator__bmi tabs--current">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Kalkulator BMI');?>
			</h2>
			<!-- BMI -->

			<?php 

			if( get_field('about_bmi') ) {
				?>

			<div class="calculator__about wysiwg-container">
				<?php the_field('about_bmi'); ?>
			</div>

			<?php } ?>

			<form id="bmiForm" class="calculator__form" action="">

				<div role="group" class="calculator__text d-flex flex-column">

					<div class="calculator__group">

						<label class="calculator__label" for="bmiHeight">
							<?php echo __('Wzrost [cm]'); ?>
						</label>
						<input class="calculator__input" id="bmiHeight" type="number" name="height" require>

					</div>

					<div class="calculator__group">

						<label class="calculator__label" for="bmiWeight">
							<?php echo __('Waga [kg]'); ?>
						</label>
						<input class="calculator__input" id="bmiWeight" type="number" name="weight" require>

					</div>

				</div>

				<button id="bmiBtn" type="submit" class="btn btn--calc">
					<?php echo __('Policz'); ?>
				</button>

			</form>

			<div id="bmiComment" class="calculator__comment">
			</div>

		</div>

		<!-- BMR -->

		<div id="bmrTab" class="calculator calculator__bmr">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Kalkulator BMR');?>
			</h2>
			<?php 

				if( get_field('about_bmr') ) {
					?>

			<div class="calculator__about">
				<?php the_field('about_bmr'); ?>
			</div>

			<?php
					}
				?>
			<form id="bmrForm" class="calculator__form">

				<div role="group" class="calculator__radio radio row justify-sb">

					<div class="radio__group col-auto">
						<input class="radio__input" id="bmrM" type="radio" value="m" name="bmr_gender">
						<label class="radio__label" for="bmrM" checked="checked">
							<?php echo __('Mężczyzna'); ?>
						</label>
					</div>

					<div class="radio__group col-auto">
						<input class="radio__input" id="bmiF" type="radio" value="f" name="bmr_gender">
						<label class="radio__label" for="bmiF">
							<?php echo __('Kobieta'); ?>
						</label>
					</div>

				</div>

				<div role="group" class="calculator__text">

					<div class="calculator__group">

						<label class="calculator__label" for="bmrHeight">
							<?php echo __('Wzrost [cm]'); ?>
						</label>
						<input class="calculator__input" id="bmrHeight" type="number" name="height" require>

					</div>

					<div class="calculator__group">

						<label class="calculator__label" for="bmrWeight">
							<?php echo __('Waga [kg]'); ?>
						</label>
						<input class="calculator__input" id="bmrWeight" type="number" name="weight" require>

					</div>

					<div class="calculator__group">

						<label class="calculator__label" for="bmrAge">
							<?php echo __('Wiek'); ?>
						</label>
						<input class="calculator__input" id="bmrAge" type="number" name="age" require>

					</div>

					<div class="calculator__group">

						<select id="bmr_activity" class="calculator__select">
							<option value="" selected disabled hidden>
								<?php echo __('Określ swoją aktywność'); ?>
							</option>
							<option value="1.3">
								<?php echo __('Osoba chora/leżąca - 0 ruchu'); ?>
							</option>
							<option value="1.4">
								<?php echo __('Niska aktywność fizyczna'); ?>
							</option>
							<option value="1.6">
								<?php echo __('Umiarkowana aktywność fizyczna'); ?>
							</option>
							<option value="1.75">
								<?php echo __('Aktywny tryb życia'); ?>
							</option>
							<option value="2">
								<?php echo __('B. aktywny tryb życia'); ?>
							</option>
							<option value="2.3">
								<?php echo __('Wyczynowe uprawianie sportu'); ?>
							</option>
						</select>

					</div>

				</div>

				<button id="bmrBtn" type="submit" class="btn btn--calc">
					<?php echo __('Policz'); ?>
				</button>

			</form>

			<div id="bmrComment" class="calculator__comment">

			</div>

		</div>
		<!-- .calculator__bmr -->

		<!-- Idealna Waga -->

		<div id="pwTab" class="calculator calculator__pw">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Kalkulator Idealna Waga');?>
			</h2>
			<?php 

	if( get_field('about_pw') ) {
		?>

			<div class="calculator__about">
				<?php the_field('about_pw'); ?>
			</div>

			<?php
		}
	?>
			<form id="pwForm" class="calculator__form">

				<div role="group" class="calculator__radio radio row justify-sb">

					<div class="radio__group col-auto">
						<input class="radio__input" id="pwM" type="radio" value="m" name="pw_gender">
						<label class="radio__label" for="pwM" checked="checked">
							<?php echo __('Mężczyzna'); ?>
						</label>
					</div>

					<div class="radio__group col-auto">
						<input class="radio__input" id="pwF" type="radio" value="f" name="pw_gender">
						<label class="radio__label" for="pwF">
							<?php echo __('Kobieta'); ?>
						</label>
					</div>

				</div>

				<div role="group" class="calculator__text">

					<div class="calculator__group">

						<label class="calculator__label" for="pwHeight">
							<?php echo __('Wzrost [cm]'); ?>
						</label>
						<input class="calculator__input" id="pwHeight" type="number" name="height" require>

					</div>

				</div>

				<button id="pwBtn" type="submit" class="btn btn--calc">
					<?php echo __('Policz'); ?>
				</button>

			</form>

			<div id="pwComment" class="calculator__comment">

			</div>

		</div>
		<!-- .calculator__pw -->

		<div id="bfTab" class="calculator calculator__bf">

			<h2 class="calculator__subtitle subtitle">
				<?php echo __('Kalkulator Bf');?>
			</h2>
			<?php 
				if( get_field('about_bf') ) {
			?>

			<div class="calculator__about">
				<?php the_field('about_bf'); ?>
			</div>

			<?php
		}
		?>
			<form id="bfForm" class="calculator__form">

				<div role="group" class="calculator__radio radio row justify-sb">

					<div class="radio__group col-auto">
						<input class="radio__input" id="bfM" type="radio" value="m" name="bf_gender">
						<label class="radio__label" for="bfM">
							<?php echo __('Mężczyzna'); ?>
						</label>
					</div>

					<div class="radio__group col-auto">
						<input class="radio__input" id="bfF" type="radio" value="f" name="bf_gender">
						<label class="radio__label" for="bfF">
							<?php echo __('Kobieta'); ?>
						</label>
					</div>

				</div>

				<div role="group" class="calculator__text">

					<div class="calculator__group">

						<label class="calculator__label" for="bfHeight">
							<?php echo __('Wzrost [cm]'); ?>
						</label>
						<input class="calculator__input" id="bfHeight" type="number" name="height" require>

					</div>

					<div class="calculator__group">

						<label class="calculator__label" for="bfWeight">
							<?php echo __('Waga [kg]'); ?>
						</label>
						<input class="calculator__input" id="bfWeight" type="number" name="weight" require>

					</div>

					<div class="calculator__group">

						<label class="calculator__label" for="bfWaist">
							<?php echo __('Talia [cm]'); ?>
						</label>
						<input class="calculator__input" id="bfWaist" type="number" name="waist" require>

					</div>

					<div class="calculator__group">

						<label class="calculator__label" for="bfNeck">
							<?php echo __('Kark [cm]'); ?>
						</label>
						<input class="calculator__input" id="bfNeck" type="number" name="Neck" require>

					</div>

					<div class="calculator__group d-none">

						<label class="calculator__label" for="bfHip">
							<?php echo __('Biodra [cm]'); ?>
						</label>
						<input class="calculator__input" id="bfHip" type="number" name="Hips">

					</div>

				</div>

				<button id="bfBtn" type="submit" class="btn btn--calc">
					<?php echo __('Policz'); ?>
				</button>

			</form>

			<div id="bfComment" class="calculator__comment"></div>

		</div>
		<!-- .calculator__bf -->

	</section>

</main>


<?php get_footer(); ?>