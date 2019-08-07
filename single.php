<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
			  yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">','</p>' );
			}
			?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php 

				if ( has_tag('seen-heard') ) : 
					get_template_part('template-parts/content', 'seen-heard');
				elseif (has_tag('snapshot') ):
					get_template_part('template-parts/content', 'snapshot');
				else:
					get_template_part( 'template-parts/content', '' ); ?>
			<?php endif;
				endwhile; ?>
		</main>
	</div>
	<?php get_template_part('template-parts/explore-and-share');?>
</div>
<?php get_template_part ('template-parts/content', 'related-posts');?>
<div class="grid-container">
	<?php comments_template(); ?>
</div>
<?php get_footer();
