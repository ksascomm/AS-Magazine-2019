<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

get_header();
?>

<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content-full-width">

		<h1 class="term-title">Section: <?php single_term_title(); ?> </h1>

			<div class="grid-x grid-margin-x small-up-2 medium-up-3">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'taxonomy-archive' ); ?>
					<?php endwhile; ?>

					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; // End have_posts() check. ?>
			</div>
			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php
			if ( function_exists( 'asmagazine_pagination' ) ) :
				asmagazine_pagination();
			elseif ( is_paged() ) :
				?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'asmagazine' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'asmagazine' ) ); ?></div>
				</nav>
			<?php endif; ?>

		</main>
		<?php get_sidebar(); ?>

	</div>
</div>
<?php
get_footer();
