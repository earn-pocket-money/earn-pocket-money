<?php
if ( ! class_exists( 'SCF' ) ) {
	return;
}

$recommend = SCF::get( 'recommend' );
?>
<div class="p-entries">
	<h1 class="p-entries__title"><?php esc_html_e( 'おすすめ記事', 'earn-pocket-money' ); ?></h2>
	<ul class="c-entries">
		<?php foreach ( $recommend as $post_id ) : ?>
			<?php
			$post = get_post( $post_id );
			if ( ! $post ) {
				continue;
			}
			setup_postdata( $post );
			?>
			<li class="c-entries__item">
				<a href="<?php the_permalink(); ?>">
					<?php get_template_part( 'template-parts/content/content' ); ?>
				</a>
			</li>
		<?php endforeach; wp_reset_postdata(); ?>
	</ul>
</div>
