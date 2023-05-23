<?php
/**
 * Template Name: Front Curated
 */

get_header();
?>

<?php do_action( 'asmagazine_before_content' ); ?>
<?php
$currentissue = asmag_get_theme_option( 'input_example' );

$volume                                    = get_the_volume( $post );
$parent                                    = get_queried_object_id();
	$asmag_homepage_coverstory_query       = new WP_Query(
		array(
			'post_type'      => 'page',
			'volume'         => $currentissue,
			// 'post_parent' => $parent,
			// category must be 'Cover Story!'
			'category__in'   => array( 136 ),
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'posts_per_page' => 1,
		)
	);
	$asmag_homepage_highlighted_news_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'volume'         => $currentissue,
			'category__in'   => array( 72 ),
			'orderby'        => 'modified',
			'order'          => 'DESC',
			'posts_per_page' => 1,
		)
	);
	$asmag_homepage_seenheard_news_query   = new WP_Query(
		array(
			'post_type'      => 'post',
			'volume'         => $currentissue,
			'tag'            => 'seen-heard',
			'orderby'        => 'rand',
			'posts_per_page' => 1,
		)
	);
	$curated_content                       = ( array(
		'posts_per_page' => 6,
		'post_type'      => array( 'post', 'page' ),
		// 'volume' => $currentissue,
		'meta_query'     => array(
			array(
				'key'     => 'curated_content',
				'value'   => '1',
				'compare' => '=',
			),
		),
		'meta_key'       => 'curated_order',
		'orderby'        => 'meta_value',
		'order'          => 'ASC',
	) );

	$asmag_homepage_news_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'volume'         => $currentissue,
			'category__in'   => array( 1 ),
			'tag__not_in'    => array( 100, 141 ),
			'orderby'        => 'modified',
			'order'          => 'DESC',
			'posts_per_page' => '-1',
		)
	);
	?>
<main>
	<?php
	if ( $asmag_homepage_coverstory_query->have_posts() ) :
		while ( $asmag_homepage_coverstory_query->have_posts() ) :
			$asmag_homepage_coverstory_query->the_post();
			?>
		<style>
			.cover-story-wrapper {
				background-color: <?php the_field( 'header_background_color' ); ?>;
			}
		</style>
		<header class="cover-story-wrapper show-for-large" role="banner" aria-label="Cover Story" data-interchange="[<?php the_post_thumbnail_url( 'cover-story-small' ); ?>, small], [<?php the_post_thumbnail_url( 'cover-story-medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'cover-story-large' ); ?>, large], [<?php the_post_thumbnail_url( 'full' ); ?>, xlarge]">
			<div class="cover-story-text-area" id="page">
				<article class="cover-story-heading-text" aria-label="<?php the_title(); ?>">
					<a class="cover-story-link" href="<?php the_permalink(); ?>">
						<div class="cover-story-head">
							<h1>
								<span class="cover">Cover Story:</span>
										<?php the_title(); ?>
							</h1>
						</div>
						<div class="cover-story-subhead">
									<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?>
								<h2><?php the_field( 'ecpt_tagline' ); ?></h2>
							<?php endif; ?>
						</div>
					</a>
				</article>
			</div>
		</header>
		<!--Mobile Version-->
		<div class="cover-story mobile hide-for-large">
			<div class="cover-story-image">
						<?php the_post_thumbnail( 'featured-medium' ); ?>
			</div>
			<div class="grid-container">
				<div class="grid-x grid-padding-x padding-top">
					<div class="cover-story-title">
						<h1>Cover Story: <?php the_title(); ?></h1>
					</div>
					<div class="cover-story-excerpt">
								<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?>
							<p><?php the_field( 'ecpt_tagline' ); ?></p>
						<?php else : ?>
							<?php the_excerpt(); ?>
						<?php endif; ?>
						<p><a href="<?php the_permalink(); ?>" class="button">Read This Story</a></p>
					</div>
				</div>
			</div>
		</div>

			<?php
	endwhile;
endif;
	?>
	<div class="curated-posts-section-wrapper">
		<div class="grid-container">
			<div class="grid-x grid-padding-x padding-top">
				<?php
				$curated_content_query = new WP_Query( $curated_content );
				// $count = 0;
				if ( $curated_content_query->have_posts() ) :
					?>
					<div class="curated-posts grid-x">
						<h1 class="show-for-small-only">Inside this Issue</h1>
						<?php
						while ( $curated_content_query->have_posts() ) :
							$curated_content_query->the_post();
							// $count++;
							// if ($count == 1 || $count == 6) :
							$field = get_field_object( 'curated_order' );
							$value = $field['value'];
							if ( function_exists( 'get_field' ) && ( get_field( 'curated_order' ) == '1' || get_field( 'curated_order' ) == '6' ) ) :
								?>

							<div class="cell small-12 large-6 article-teaser-<?php echo $value; ?>">
									<?php get_template_part( 'template-parts/content', 'curated-large' ); ?>
							</div>
							<?php else : ?>
							<div class="cell small-12 large-3 article-teaser-<?php echo $value; ?>">
								<?php get_template_part( 'template-parts/content', 'curated-small' ); ?>
							</div>
								<?php
						endif;
endwhile;
						?>
					</div>
					<?php
					wp_reset_postdata();
endif;
				?>
				<?php if ( function_exists( 'get_field' ) && get_field( 'current_issue_link' ) ) : ?>
				<div class="cell small-12 cta-section">
					<div class="float-right">
							<?php $current_issue_link = get_field( 'current_issue_link' ); ?>
							<?php if ( $current_issue_link ) { ?>
								<a class="button cta-link" href="<?php echo $current_issue_link; ?>">View The Rest Of This Issue <span class="fa-solid fa-arrow-circle-right"></span>
								</a>
							<?php } ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="section-spacer"></div>
	<div class="news-section-wrapper">
		<div class="grid-container">
			<h1>News</h1>
			<div class="grid-x grid-padding-x padding-top">
				<?php if ( $asmag_homepage_news_query->have_posts() ) : ?>
				<div class="news-section">
					<div class="news-carousel" data-equalizer>
					<?php
					while ( $asmag_homepage_news_query->have_posts() ) :
						$asmag_homepage_news_query->the_post();
						?>

						<div data-equalizer-watch>
							<article aria-labelledby="news-carousel-post-<?php the_ID(); ?>">
								<header>
									<h2><a href="<?php the_permalink(); ?>" id="news-carousel-post-<?php the_ID(); ?>"><?php the_title(); ?></a></h2>
								</header>
								<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?>
									<p><?php the_field( 'ecpt_tagline' ); ?></p>
								<?php else : ?>
									<?php the_excerpt(); ?>
								<?php endif; ?>
							</article>
						</div>

					<?php endwhile; ?>
					</div>
				</div>
					<?php
					wp_reset_postdata();
endif;
				?>
				<?php if ( function_exists( 'get_field' ) && get_field( 'contact_link' ) ) : ?>
				<div class="cell small-12 cta-section">
					<div class="float-right">
						<?php $contact_link = get_field( 'contact_link' ); ?>
						<?php if ( $contact_link ) { ?>
							<a class="button cta-link" href="<?php echo $contact_link; ?>">Send Us Your News <span class="fa-solid fa-thumbs-up"></span></a>
						<?php } ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="section-spacer"></div>
	<div class="dean-seen-section-wrapper">
		<div class="grid-container">
			<div class="grid-x grid-padding-x padding-top" data-equalizer>
			<?php
			if ( $asmag_homepage_highlighted_news_query->have_posts() ) :
				while ( $asmag_homepage_highlighted_news_query->have_posts() ) :
					$asmag_homepage_highlighted_news_query->the_post();
					?>
				<div class="cell small-12 large-6">
					<article class="callout deans-desktop" aria-labelledby="post-<?php the_ID(); ?>" data-equalizer-watch>
						<h1><?php the_title(); ?></h1>
						<div class="card no-border">
							<div class="card-image">
								<?php the_post_thumbnail( 'home-curated-small', array( 'class' => 'home-post-image' ) ); ?>
							</div>
							<div class="card-section">
								<p><?php echo strip_tags( get_the_excerpt() ); ?></p>
								<p><a class="button heritage" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">More from the Dean</a></p>
							</div>
						</div>
					</article>
				</div>
					<?php
				endwhile;
				wp_reset_postdata();
				endif;
			?>
				<div class="cell small-12 large-6">
					<article class="callout instagram-feed" aria-label="post-<?php the_ID(); ?>" data-equalizer-watch>
						<h1>Social</h1>
						<?php echo do_shortcode( '[instagram-feed feed=1]' ); ?>
					</article>
				</div>
			</div>
		</div>
	</div>
	<div class="social-section-wrapper">
		<div class="grid-container">
			<div class="grid-x grid-padding-x padding-top">
				<div class="cell small-12 cta-section">
					<div class="float-right cta-link">
						<ul class="menu simple">
							<li class="text">Follow us @jhuartsciences</li>
							<li><a href="http://facebook.com/JHUArtsSciences"><span class="fa-brands fa-facebook fa-2x"></span><span class="screen-reader-text">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/JHUArtsSciences/"><span class="fa-brands fa-instagram fa-2x"></span><span class="screen-reader-text">Instagram</span></a></li>
							<li><a href="https://twitter.com/JHUArtsSciences"><span class="fa-brands fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a></li>
							<li><a href="https://www.youtube.com/user/jhuksas"><span class="fa-brands fa-youtube fa-2x"></span><span class="screen-reader-text">YouTube</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-spacer"></div>
	<div class="past-issues-section-wrapper">
		<div class="grid-container">
			<h1>Browse Issues</h1>
			<div class="grid-x grid-padding-x padding-top small-up-2 medium-up-4">
			<article class="cell" aria-label="Spring 2023 Issue">
				<div class="past-issue card">
					<p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>spring-2023/"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2023/05/sp23_cover-1-1.jpg" alt="Spring 2023 Issue"/></a>
					</p>
					<div class="card-section">
						<p>
							Spring 2023
						</p>
					</div>
				</div>
			</article>
			<article class="cell" aria-label="Fall 2022 Issue">
				<div class="past-issue card">
					<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>fall-2022/"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2022/11/fall22-cover-portrait.jpg" alt="Fall 2022 Issue Cover" /></a></p>
					<div class="card-section">
						<p>
							Fall 2022
						</p>
					</div>
				</div>
				</article>
				<article class="cell" aria-label="Spring 2022 Issue">
					<div class="past-issue card">
						<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>spring-2022/"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2022/05/spring-2022.jpg" alt="Spring 2020 Issue" /></a></p>
						<div class="card-section">
							<p>
								Spring 2022
							</p>
						</div>
					</div>
				</article>
				<article class="cell" aria-label="Fall 2021 Issue">
					<div class="past-issue card">
						<p>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>fall-2021/"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2021/11/F21_cover.jpg" alt="Fall 2021 Issue Cover art"/></a>
						</p>
						<div class="card-section">
							<p>
								Fall 2021
							</p>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();
