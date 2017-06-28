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
						if ( is_home() ) {
							esc_html_e( '記事一覧', 'earn-pocket-money' );
						} else {
							the_archive_title();
							esc_html_e( 'の記事一覧', 'earn-pocket-money' );
						}
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
							<?php esc_html_e( '投稿がありません。', 'earn-pocket-money' ); ?>
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
