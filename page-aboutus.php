<?php /*Template Name: About Us*/ ?>
<?php get_header(); ?>

<main role="main">
	<!-- section -->
	<section id="about-us">
		<div class="wrapper">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<h2><span><?php the_title(); ?></span></h2>

				<div id="main-content">
					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<?php the_content(); ?>
						
						<!-- <br class="clear"> -->
						
						<!-- <?php edit_post_link(); ?> -->
						
					</article>
					<!-- /article -->
					
					<div class="about-us-images">
						
						<?php 
						$image = get_field('image_1');
						$size = 'medium'; 
						if( $image ) { ?>
							<div class="photo">
								<?php echo wp_get_attachment_image( $image, $size, false, array('class' => 'polaroid') ); ?>
							</div>
						<?php } ?>
						
						<?php 
						$image = get_field('image_2');
						$size = 'medium'; 
						if( $image ) { ?>
							<div class="photo">
								<?php echo wp_get_attachment_image( $image, $size, false, array('class' => 'polaroid') ); ?>
							</div>
						<?php } ?>
						
					</div>
				</div>

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h2><?php _e( 'Sorry, nothing to display.', 'atw' ); ?></h2>

				</article>
				<!-- /article -->

			<?php endif; ?>
		</div>
	</section>
	<!-- /section -->
</main>


<?php get_footer(); ?>
