<?php
/*
Template Name: Feature (Centerpiece)
*/
get_header(); ?>
<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<div class="hero-full-screen hide-for-print" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;">
	<div class="middle-content-section">
		<!--<h1>Centerpiece</h1>-->
	</div>
	<div class="bottom-content-section" data-magellan data-threshold="0">
		<a href="#main-content-section"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-18.005-1.568l1.415-1.414 4.59 4.574 4.579-4.574 1.416 1.414-5.995 5.988-6.005-5.988z"/></svg></a>
	</div>
</div>
<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content-full-width" id="main-content-section" data-magellan-target="main-content-section">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="show-for-print">
					<?php the_post_thumbnail('large'); ?>
				</div>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php get_template_part( 'template-parts/feature', 'footer' ); ?>
<?php get_footer();
