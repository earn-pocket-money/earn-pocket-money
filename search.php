<?php get_header(); ?>

<div class="container">
	<div class="l-contents" role="document">
		<?php
		if ( ! is_front_page() ) {
			get_template_part( 'template-parts/breadcrumbs' );
		}
		?>

		<div class="l-contents__main">
			<main class="l-main" role="main">

				<div class="p-entries">
					<h1 class="p-entries__title">
						<?php
						printf(
							esc_html__( '「%1$s」の検索結果', 'earn-pocket-money' ),
							get_search_query()
						);
						?>
					</h1>

					<?php if ( have_posts() ) : ?>

						<ul class="c-entries">
							<?php while ( have_posts() ) : the_post(); ?>
							<li class="c-entries__item">
								<a href="<?php the_permalink(); ?>">
									<?php get_template_part( 'template-parts/content/content' ); ?>
								</a>
							</li>
							<?php endwhile; ?>
						</ul>
						<?php get_template_part( 'template-parts/pagination' ); ?>

					<?php else: ?>

						<p>
							<?php esc_html_e( '見つかりませんでした。', 'earn-pocket-money' ); ?>
						</p>

					<?php endif; ?>
				</div>

			</main>
		</div>
		<div class="l-contents__aside">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
