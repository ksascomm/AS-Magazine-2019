<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

get_header();
?>

<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content">
			<article>
				<header>
					<h1 class="entry-title"><?php _e( 'Oops! Story Not Found', 'asmagazine' ); ?></h1>
				</header>
				<div class="entry-content">
					<div class="error">
						<p class="bottom"><?php _e( 'The story you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'asmagazine' ); ?></p>
					</div>
					<p><?php _e( 'Please try the following:', 'asmagazine' ); ?></p>
					<ul>
						<li>
							<?php _e( 'Check your spelling', 'asmagazine' ); ?>
						</li>
						<li>
							<?php
								/* translators: %s: home page url */
								printf(
									__( 'Return to the <a href="%s">home page</a>', 'asmagazine' ),
									home_url()
								);
								?>
						</li>
						<li>
							<?php _e( 'Click the <a href="javascript:history.back()">Back</a> button', 'asmagazine' ); ?>
						</li>
						<li>Try searching using the search box in the menu 
						</li>
					</ul>
				</div>
			</article>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
