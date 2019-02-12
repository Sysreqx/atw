<?php get_header(); ?>

<main role="main">
	<!-- section -->
	<section>
		<div class="wrapper">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<!-- post title -->
					<h2>
						<span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
					</h2>
					<!-- /post title -->

					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					<?php endif; ?>
					<!-- /post thumbnail -->

					<!-- post details -->
					<?php 
					$dateformatstring = 'j M Y';
					$unixtimestamp = strtotime(get_field('leaving_date'));
					$leaving_date = date_i18n( $dateformatstring, $unixtimestamp );

					$unixtimestamp = strtotime(get_field('returning_date'));
					$returning_date = date_i18n( $dateformatstring, $unixtimestamp );
					?>
					<div class="single-tour-detail">
						<p><strong>Leaving and Returning Date:</strong> <?php echo $leaving_date . " - " . $returning_date ?></p>
						<p><strong>Location for departure:</strong> <?php echo get_field("location_for_departure"); ?></p>
						<p><strong>Available Seats:</strong> <?php echo get_field("available_seats"); ?></p>
						<p><strong>Price:</strong> <?php echo get_field("price"); ?></p>
					</div>

					<div class="itinerary">
						<h2>Travel Itinerary</h2>
						<?php echo get_field("travel_itenerary"); ?>
					</div>
					<!-- /post details -->

				</article>
				<!-- /article -->

				<aside class="tour-gallery">
					<h2>Gallery</h2>
					<?php the_content(); ?>
				</aside>

				<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'atw' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>
		</div>
	</section>
	<!-- /section -->
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
