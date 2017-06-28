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

					<p>
						<?php esc_html_e( 'ページが見つかりませんでした。', 'earn-pocket-money' ); ?><br>
						<?php esc_html_e( 'お探しのページは移動したか削除されています。', 'earn-pocket-money' ); ?>
					</p>

			</main>
		</div>
		<div class="l-contents__aside">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
