<?php 
/**
*
*	@package Smacznegopl
*
*	Template Name: Page Conventer
*/

get_header(); ?>

<main>

	<section id="tabs" class="container">

		<ul class="tabs__nav">
			<li><a href="#tab1" class="tabs__link tabs__link--active">Kulinarny</a></li>
			<li><a href="#tab2" class="tabs__link">Temperatur</a></li>
			<li><a href="#tab3" class="tabs__link">Wag</a></li>
			<li><a href="#tab4" class="tabs__link">Objetości</a></li>
		</ul>

		<div id="tab1" class="tabs__tab tabs__tab--current">Tab 1 Kulinarny</div>
		<div id="tab2" class="tabs__tab">Tab 2 Temperatur</div>
		<div id="tab3" class="tabs__tab">Tab 3 Wag</div>
		<div id="tab4" class="tabs__tab">Tab 4 Objetosci</div>

		<!-- .calculator__bf -->

	</section>

</main>


<?php get_footer(); ?>