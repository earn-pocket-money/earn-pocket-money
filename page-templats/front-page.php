<?php
/**
 * Template Name: フロントページ
 */
?>
<?php get_header(); ?>

<div class="l-contents" role="document">

	<?php if ( class_exists( 'SCF' ) ) : ?>
		<?php
		if ( wp_is_mobile() ) {
			$images = SCF::get( 'front-page-main-visual-mobile-id' );
		} else {
			$images = SCF::get( 'front-page-main-visual-pc-id' );
		}
		?>
		<?php if ( ! empty( $images ) ) : ?>
		<div class="p-main-visual">
			<?php
			foreach ( $images as $id ) {
				$image_url = wp_get_attachment_image_url( $id, 'large' );
				if ( $image_url ) {
					printf(
						'<div class="p-main-visual__item"><img src="%1$s" alt=""></div>',
						esc_url( $image_url )
					);
				}
			}
			?>
		</div>
		<?php endif; ?>
	<?php endif; ?>

	<div class="container">
		<div class="l-contents__main">
			<main class="l-main" role="main">

				<?php
				$recent_posts = get_posts( array(
					'post_type'      => 'post',
					'posts_per_page' => 5,
				) );
				?>
				<div class="p-front-page-recent-entries">
					<div class="p-entries">
						<h2 class="p-entries__title"><?php esc_html_e( '最新記事', 'earn-pocket-money' ); ?></h2>
						<ul class="c-entries">
							<?php foreach ( $recent_posts as $post ) : setup_postdata( $post ); ?>
							<li class="c-entries__item">
								<a href="<?php the_permalink(); ?>">
									<?php get_template_part( 'template-parts/content/content' ); ?>
								</a>
							</li>
							<?php endforeach; wp_reset_postdata(); ?>
						</ul>
					</div>
				</div>

				<?php
				if ( class_exists( 'SCF' ) ) {
					$recommend = SCF::get( 'front-page-recommend' );
					if ( $recommend ) {
						echo sprintf(
							'<div class="p-front-page-recommend">%s</div>',
							do_shortcode( '[recommend id="' . $recommend[0] . '"]' )
						);
					}
				}
				?>

				<?php
				if ( class_exists( 'SCF' ) ) {
					$ranking = SCF::get( 'front-page-ranking' );
					if ( $ranking ) {
						echo sprintf(
							'<div class="p-front-page-ranking">%s</div>',
							do_shortcode( '[ranking id="' . $ranking[0] . '"]' )
						);
					}
				}
				?>

			</main>
		</div>
		<div class="l-contents__aside">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
