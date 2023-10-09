<?php
/**
 * Template Name: Table of Contents
 */

get_header();
?>

<?php
		$volume = get_the_volume( $post );
		$parent = get_queried_object_id();

		$asmag_news_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 1 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 30,
			)
		);

		$asmag_faculty_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 345 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_studentresearch_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 351 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_classroom_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 348 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_community_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 349 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_oncampus_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 350 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_bigideas_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 70 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_students_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 76 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_alumni_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 69 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_insights_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 73 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_research_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 75 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_webexclusive_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 78 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_webextras_toc_query = new WP_Query(
			array(
				'post_type'      => 'post',
				'volume'         => $volume,
				'category__in'   => array( 79 ),
				'orderby'        => 'modified',
				'order'          => 'DESC',
				'posts_per_page' => 20,
			)
		);

		$asmag_features_toc_query = new WP_Query(
			array(
				'post_type'      => 'page',
				'volume'         => $volume,
				'post_parent'    => $parent,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'posts_per_page' => 20,
			)
		);
		?>

<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content-full-width">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<h1>Issue: <?php the_title(); ?></h1>
			<?php endwhile; ?>
			<?php if ( $asmag_features_toc_query->have_posts() ) : ?>	
				<div class="toc home features">
					<h1>Features</h1>
					<?php
					while ( $asmag_features_toc_query->have_posts() ) :
						$asmag_features_toc_query->the_post();
						?>
					<div class="grid-x grid-padding-x grid-margin-x story">
						<div class="cell small-12 large-5">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'related-posts' ); ?></a>
						</div>
						<div class="cell small-12 large-7">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?> 
								<p><?php the_field( 'ecpt_tagline' ); ?></p>
							<?php else : ?>
								<?php the_excerpt(); ?>
							<?php endif; ?>
						</div>
					</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_news_toc_query->have_posts() ) : ?>	
				<div class="toc home news">
					<h1>News</h1>
					<?php
					while ( $asmag_news_toc_query->have_posts() ) :
						$asmag_news_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_research_toc_query->have_posts() ) : ?>	
				<div class="toc home research">
					<h1>Research</h1>
					<?php
					while ( $asmag_research_toc_query->have_posts() ) :
						$asmag_research_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_faculty_toc_query->have_posts() ) : ?>	
				<div class="toc home faculty">
					<h1>Faculty</h1>
					<?php
					while ( $asmag_faculty_toc_query->have_posts() ) :
						$asmag_faculty_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_studentresearch_toc_query->have_posts() ) : ?>	
				<div class="toc home studentresearch">
					<h1>Student Research</h1>
					<?php
					while ( $asmag_studentresearch_toc_query->have_posts() ) :
						$asmag_studentresearch_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>			
			<?php if ( $asmag_classroom_toc_query->have_posts() ) : ?>	
				<div class="toc home classroom">
					<h1>Classroom</h1>
					<?php
					while ( $asmag_classroom_toc_query->have_posts() ) :
						$asmag_classroom_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_community_toc_query->have_posts() ) : ?>	
				<div class="toc home community">
					<h1>Community</h1>
					<?php
					while ( $asmag_community_toc_query->have_posts() ) :
						$asmag_community_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_alumni_toc_query->have_posts() ) : ?>	
				<div class="toc home alumni">
					<h1>Alumni</h1>
					<?php
					while ( $asmag_alumni_toc_query->have_posts() ) :
						$asmag_alumni_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_oncampus_toc_query->have_posts() ) : ?>	
				<div class="toc home oncampus">
					<h1>On Campus</h1>
					<?php
					while ( $asmag_oncampus_toc_query->have_posts() ) :
						$asmag_oncampus_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_bigideas_toc_query->have_posts() ) : ?>
				<div class="toc home bigideas">
					<h1>Big Ideas</h1>
					<?php
					while ( $asmag_bigideas_toc_query->have_posts() ) :
						$asmag_bigideas_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_students_toc_query->have_posts() ) : ?>
				<div class="toc home students">
					<h1>Student Digest</h1>
					<?php
					while ( $asmag_students_toc_query->have_posts() ) :
						$asmag_students_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>			
			<?php if ( $asmag_insights_toc_query->have_posts() ) : ?>	
				<div class="toc home insights">
					<h1>Insights</h1> 
					<?php
					while ( $asmag_insights_toc_query->have_posts() ) :
						$asmag_insights_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_webexclusive_toc_query->have_posts() ) : ?>	
				<div class="toc home webexclusives">
					<h1>Web Exclusives</h1>
					<?php
					while ( $asmag_webexclusive_toc_query->have_posts() ) :
						$asmag_webexclusive_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
			<?php if ( $asmag_webextras_toc_query->have_posts() ) : ?>	
				<div class="toc home webextras">
					<h1>Web Extras</h1>
					<?php
					while ( $asmag_webextras_toc_query->have_posts() ) :
						$asmag_webextras_toc_query->the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'toc' ); ?>
						<?php
					endwhile;
					wp_reset_postdata();
					?>

				</div>
			<?php endif; ?>
		</main>
	</div>
</div>
<?php
get_footer();
