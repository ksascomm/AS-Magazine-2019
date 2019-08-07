<?php
/**
 * The template for displaying the header on the front page
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

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>
	<?php $volume = get_the_volume($post); $parent = get_queried_object_id();
		$asmag_homepage_coverstory_query = new WP_Query(array(
			'post_type' => 'page',
			'volume' => $volume,
			'post_parent' => $parent,
			//category must be 'Cover Story!'
			'category__in' => array(136),
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'posts_per_page' => '1'
		));
		?>
	<?php if ( $asmag_homepage_coverstory_query->have_posts() ) : while ($asmag_homepage_coverstory_query->have_posts()) : $asmag_homepage_coverstory_query->the_post(); ?>
		<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	<div class="cover-story" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;">
		<header class="site-header top-content-section" role="banner">
			<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
				<div class="title-bar-left">
					<button aria-label="<?php _e( 'Main Menu', 'foundationpress' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
					<span class="site-mobile-title title-bar-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</div>
			</div>

		<div class="site-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<div class="cell small-12 large-8">
							<div class="top-bar-title">
								<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/EZineMasthead.png" alt="Johns Hopkins University"></h1>
							</div>
						</div>
				     	<div class="cell small-12 large-4 button-area">
				     		<div class="grid-x">
				     			<div class="small button-group">
				     				<a href="<?php echo home_url(); ?>/subscribe" class="button">Subscribe/Update Address</a>
				     				<form class="search-box" method="GET" action="<?php echo home_url( '/' ); ?>" role="search" aria-label="Utility Bar Search">
					     				<div class="input-group search">
											<label for="s" class="screen-reader-text">
								                Search This Website
								            </label>	
						     				<input class="input-group-field search-field" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search this site" aria-label="Search This Website"/>
											<div class="input-group-button">
												<button type="submit" class="button search-icon" aria-label="search"><span class="fas fa-search"></span></button>
											</div>
										</div>
									</form>
				     			</div> 
				     		</div>
				     	</div>												
					</div>
				</div>		
			</div>
		</div>
			<div class="top-bar main-navigation">
				
					<div class="top-bar-left">
						<?php foundationpress_top_bar_current_issue(); ?>

						<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
							<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
						<?php endif; ?>
					</div>
					<div class="top-bar-right">
						<?php foundationpress_top_bar(); ?>
					</div>
				
			</div>
		</header>
		<div class="middle-content-section">
			<div class="marketing">
				<div class="tagline">
					<h1><span class="cover">Cover Story:</span><br><?php the_title();?></h1>
					<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
					<h4><?php the_field( 'ecpt_tagline' ); ?></h4>
					<?php endif;?>
				</div>
			</div>
		</div>
		<?php endwhile; endif;?>
	</div>