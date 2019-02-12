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

					<ul>
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<li>
								<div class="featured-tour">
									<?php the_post_thumbnail(); ?>
									<a href="<?php get_permalink(); ?>" class="more-info">
										<img src="<?php echo get_template_directory_uri(); ?>/img/moreinfo.png" alt="<?php echo get_the_title(); ?>">
									</a>
								</div>
								<?php 
								$dateformatstring = 'j M Y';
								$unixtimestamp = strtotime(get_field('leaving_date'));
								$leaving_date = date_i18n( $dateformatstring, $unixtimestamp );

								$unixtimestamp = strtotime(get_field('returning_date'));
								$returning_date = date_i18n( $dateformatstring, $unixtimestamp );

								?>
								<div class="date-price">
									<p class="date"><?php echo $leaving_date . ' - ' . $returning_date ?></p>
									<p class="price"><?php echo get_field('price') ?></p>
								</div>
								<div class="tour-description">
									<?php the_field('small_description'); ?>
								</div>
							</li>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<?php else : ?>
							<p><?php esc_html_e( 'Нет постов по вашим критериям.' ); ?></p>
						<?php endif; ?>
					</ul>

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
