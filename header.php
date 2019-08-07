<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
		<!--Kathy css edits. Bundle back into /assets-->
		<link rel="stylesheet" href="https://dl.dropbox.com/s/mznfcnfrb69cswq/kathy.css"  type="text/css">
	</head>
	<body <?php body_class(); ?>>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>


	<header class="site-header" role="banner">
		<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left">
				<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</span>
			</div>
		</div>

	
		<div class="roof-header-top show-for-large hide-for-print">
			<div class="row align-justify">
		    	<div class="roof-header-top-links">
		        	<?php get_template_part( 'template-parts/roof' ); ?>
		      	</div>
		    </div>
		</div>


		<nav class="site-navigation top-bar topbar-center-logo" role="navigation" id="<?php foundationpress_mobile_menu_id(); ?>">
			<div class="top-bar-left">
				<div class="nav-shield">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img data-interchange="[<?php echo get_template_directory_uri(); ?>/dist/assets/images/krieger.blue.svg, small], [<?php echo get_template_directory_uri(); ?>/dist/assets/images/ksas-horizontal-md.png, medium], [<?php echo get_template_directory_uri(); ?>/dist/assets/images/ksas-horizontal-lg.png, large]" alt="Krieger School of Arts & Sciences">
					</a>
				</div>
			</div>
			<div class="top-bar-center">
				<div class="site-desktop-title top-bar-title">
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				</div>
			</div>
			<div class="top-bar-right">
				<?php foundationpress_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>

	</header>
