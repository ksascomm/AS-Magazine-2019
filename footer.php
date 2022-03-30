<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>

<footer class="footer">
	<div class="footer-container">
		<div class="footer-grid">
			<?php dynamic_sidebar( 'footer-widgets' ); ?>
		</div>
		<div class="grid-x grid-padding-x align-center-middle text-center">
			<div class="copydate">
				<p>&copy; <?php print gmdate( 'Y' ); ?> Johns Hopkins University, Zanvyl Krieger School of Arts & Sciences, 3400 N. Charles St, Baltimore, MD 21218</p>
			</div>
		</div>
	</div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<script>
(function() {
	var cx = '012258670098148303364:rjbbbscnowo';
	var gcse = document.createElement('script');
	gcse.type = 'text/javascript';
	gcse.async = true;
	gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(gcse, s);
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
