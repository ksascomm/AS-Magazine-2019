<?php
/**
 * Template Name: Section Listing
 */
get_header();
?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content-full-width">
			<?php
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">', '</p>' );
			}
			?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>
				<div class="grid-x grid-padding-x small-up-2 large-up-4">
					<?php
						$sections   = array(
							'orderby'      => 'name',
							'hierarchical' => 1,
							'taxonomy'     => 'category',
							'exclude'      => array( 71, 74, 77 ), // editors note, letters to the editor, uncategorized
							'hide_empty'   => 1,
							'parent'       => 0,
						);
						$categories = get_categories( $sections );
						?>
					<?php foreach ( $categories as $category ) : ?>
						<div class="cell">
							<div class="category section-card">
								<h2><?php echo $category->name; ?></h2>
								<p>Explore articles categorized <a href="<?php echo get_category_link( $category->cat_ID ); ?>" aria-label="<?php echo $category->name; ?> Category Archive Link"><?php echo $category->name; ?></a>.</p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<hr>
			<h1>Topics</h1>
			<div class="grid-x grid-padding-x small-up-2 large-up-4">
				<?php
					$tags = get_tags();
				foreach ( $tags as $tag ) :
					$tag_link = get_tag_link( $tag->term_id );

					?>

					<div class="cell">
						<div class="tag section-card">
							<h2><?php echo $tag->name; ?></h2>
							<p>Explore articles tagged <a href="<?php echo $tag_link; ?>" aria-label="<?php echo $tag->name; ?> Tag Archive Link"><?php echo $tag->name; ?></a>.</p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
