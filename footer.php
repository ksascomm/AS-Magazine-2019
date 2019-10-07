<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer">
	<div class="footer-container">
		<div class="footer-grid">
	        <?php dynamic_sidebar( 'footer-widgets' ); ?>
	    </div>
	    <div class="grid-x grid-padding-x align-center-middle text-center">
	    	<div class="copydate">
	    		<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, Zanvyl Krieger School of Arts & Sciences, 3400 N. Charles St, Baltimore, MD 21218</p>
	    	</div>
	    </div>
    </div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>