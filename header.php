<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-100553583-17"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-100553583-17');
		gtag('config', 'G-BXWF6LM8V4');
		</script>
		<!-- End Global site tag (gtag.js) -->
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-T9S2PC4');</script>
		<!-- End Google Tag Manager -->
		<script type="text/javascript">
		/*<![CDATA[*/
		(function() {
		var sz = document.createElement('script'); sz.type = 'text/javascript'; sz.async = true;
		sz.src = '//siteimproveanalytics.com/js/siteanalyze_11464.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sz, s);
		})();
		/*]]>*/
		</script>
	</head>
	<body <?php body_class(); ?>>

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T9S2PC4"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

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


	<header class="site-header" role="banner" aria-label="Navigation Area">
		<div class="site-title-bar title-bar" <?php asmagazine_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left">
				<button aria-label="<?php _e( 'Main Menu', 'asmagazine' ); ?>" class="menu-icon" type="button" data-toggle="<?php asmagazine_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
					<?php bloginfo( 'name' ); ?> Main Menu
				</span>
			</div>
		</div>
		<div class="mobile-logo show-for-small-only">
			<a href="https://krieger.jhu.edu/" rel="home">
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
									<button type="submit" class="button" aria-label="search"><span class="fa-solid fa-magnifying-glass"></span></button>
								</div>
								<label for="s" class="screen-reader-text">
									Search This Website
								</label>
								<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search this site" aria-label="Search This Website"/>
							</div>
						</form>
					</li>
					<li><a class="button" href="#" aria-label="Explore KSAS" data-toggle="offCanvasTop1">Explore KSAS <span class="fa-solid fa-bars"></span></a></li>
				</ul>
				<?php get_template_part( 'template-parts/roof' ); ?>
			</div>
		</div>


		<nav class="site-navigation mast-head grid-container hide-for-print" aria-label="Main Menu">
			<div class="grid-x grid-padding-x">

				<div class="cell small-12 medium-4 large-3">
					<div class="site-shield">
						<a href="https://krieger.jhu.edu/" rel="home">
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

						<?php asmagazine_top_bar_r(); ?>

						<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
							<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
						<?php endif; ?>

					</div>
				</div>

			</div>
		</nav>
	</header>
