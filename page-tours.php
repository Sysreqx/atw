<?php /* Template Name: Tours */ ?>
<?php get_header(); ?>

<main role="main">
	<!-- section -->
	<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<h2><span><?php the_title(); ?></span></h2>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php 
				$args = array(
					'post_type'				=> 'atw_tours',
					'posts_per_page'	=> -1,
					'order_by'				=> 'title',
					'order'						=> 'ASC',
				);
				$query = new WP_Query( $args ); ?>

				<?php if ( $query->have_posts() ) : ?>

					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<h3><?php the_title(); ?></h3>
					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

					<?php else : ?>
						<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
					<?php endif; ?>

					<?php edit_post_link(); ?>

				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h2><?php _e( 'Sorry, nothing to display.', 'atw' ); ?></h2>

				</article>
				<!-- /article -->

			<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

	<?php get_sidebar(); ?>

	<?php get_footer(); ?>
