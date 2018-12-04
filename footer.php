<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Smaczegopl
 */

?>

	<footer class="footer">
		<div class="container">

			<?php get_template_part('template-parts/newsletter'); ?>

			<!-- <div class="footer__newsletter">

				<form id="newsletter">
					<input id="newsletter" type="text">
					<label for="newsletter"></label>
				</form>

			</div> -->
			
			<div class="footer__logo logo">
				Smacznego.pl
			</div>

			<div class="footer__socials">
				<ul class="socials">
					<li><a href="#" class="socials__link"><span class="fab fa-facebook-f"></span></a></li>
					<li><a href="#" class="socials__link"><span class="fab fa-instagram"></span></a></li>
					<li><a href="#" class="socials__link"><span class="fab fa-pinterest-p"></span></a></li>
					<li><a href="#" class="socials__link"><span class="fas fa-rss"></span></a></li>
				</ul>
			</div>


			<div class="footer__copy">
				Chomikoo &copy; 2018
			</div>
				
		</div>

	</footer>
	<?php get_template_part('template-parts/search-overlay'); ?>


	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
	<script>
	WebFont.load({
		google: {
			families: ['Open+Sans:400,700','Mali:300i','Montserrat:400,700&amp;subset=latin-ext']
		}
	});
	</script>

	<?php wp_footer(); ?>

</body>
</html>
