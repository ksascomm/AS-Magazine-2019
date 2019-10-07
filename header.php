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
	</head>
	<body <?php body_class(); ?>>
		
	<div role="navigation" aria-label="Skip to main content">
		<a class="skip-main show-on-focus" href="#page" >Skip to main content</a>
	</div>

	<div class="show-for-print print-mast-head" aria-hidden="true">
		<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/krieger.logo.horizontal.blue.svg" alt="krieger logo">
		<h1><?php echo get_bloginfo( 'description' ); ?> <?php echo get_bloginfo( 'title' ); ?></h1>
	</div>
	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>


	<header class="site-header" role="banner">
		<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left">
				<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
					<?php bloginfo( 'name' ); ?> Main Menu
				</span>
			</div>
		</div>
		<div class="mobile-logo show-for-small-only">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/krieger.logo.horizontal.blue.svg" alt="Krieger School of Arts & Sciences">
			</a>
		</div>
	
		<div class="roof-header-top show-for-large">
	    	<div class="roof-header-top-links">
				<ul class="menu simple roof-menu align-right">
					<li class="roof-padding">
						<form method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" aria-label="Utility Bar Search">
							<div class="input-group">
								<div class="input-group-button">
					    			<button type="submit" class="button" aria-label="search"><span class="fa fa-search"></span></button>
					  			</div>
								<label for="s" class="screen-reader-text">
					                Search This Website
					            </label>
								<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" data-swplive="true" placeholder="Search this site" aria-label="Search This Website"/>	
							</div>
						</form>
					</li>
					<li><a class="button" href="#" aria-label="Explore KSAS" data-toggle="offCanvasTop1">Explore KSAS <span class="fa fa-bars" aria-hidden="true"></span></a></li>
				</ul>
	    		<?php get_template_part( 'template-parts/roof' ); ?>
	      	</div>
		</div>


		<nav class="site-navigation mast-head grid-container hide-for-print" role="navigation">
			<div class="grid-x grid-padding-x">

				<div class="cell small-12 medium-4 large-3">
					<div class="site-shield">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img data-interchange="[<?php echo get_template_directory_uri(); ?>/dist/assets/images/ksas-horizontal-md.png, small], [<?php echo get_template_directory_uri(); ?>/dist/assets/images/ksas-horizontal-md.png, medium], [<?php echo get_template_directory_uri(); ?>/dist/assets/images/ksas-horizontal-lg.png, large]" alt="Krieger School of Arts & Sciences">
						</a>
					</div>
				</div>

				<div class="cell small-12 medium-4 large-5">
					<div class="site-title">
						<h1>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
					</div>
				</div>

				<div class="cell small-12 medium-4 large-4">
					<div class="site-menu">

						<?php foundationpress_top_bar_r(); ?>

						<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
							<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
						<?php endif; ?>

					</div>
				</div>

			</div>
	</header>
