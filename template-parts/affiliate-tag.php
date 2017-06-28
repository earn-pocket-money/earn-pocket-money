<?php
if ( class_exists( 'SCF' ) ) {
	$format           = SCF::get( 'format' );
	$star             = SCF::get( 'star' );
	$affiliate_banner = SCF::get( 'affiliate-banner' );
	$affiliate_text   = SCF::get( 'affiliate-text' );
	$detail_link      = SCF::get( 'detail-link' );
	$detail_link_text = SCF::get( 'detail-link-text' );
}
?>

<?php if ( empty( $format ) || '_0' === $format ) : ?>
	<div class="p-affiliate-tag">
		<div class="p-affiliate-tag__title">
			<?php the_title(); ?>
			<?php
			if ( ! empty( $star ) ) {
				if ( preg_match( '/^_?(\d+?)/', $star, $reg ) ) {
					$star = $reg[1];
				} else {
					$star = 0;
				}
				echo sprintf(
					'<span class="p-affiliate-tag__star">%1$s</span>',
					esc_html( str_repeat( '★', $star ) )
				);
			}
			?>
		</div>
		<div class="p-affiliate-tag__body">
			<div class="p-affiliate-tag__content">
				<?php if ( ! empty( $affiliate_banner ) ) : ?>
					<span class="alignleft">
						<?php echo $affiliate_banner; ?>
					</span>
				<?php endif; ?>
				<?php echo wpautop( $post->post_content ) ?>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<?php if ( ! empty( $detail_link ) && ! empty( $detail_link_text ) ) : ?>
						<span class="p-affiliate-tag__detail-link-wrapper">
							<a href="<?php echo esc_url( $detail_link ); ?>" target="_blank"><?php echo esc_html( $detail_link_text ); ?></a>
						</span>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $affiliate_text ) ) : ?>
					<div class="col-xs-12 col-md-6">
						<span class="p-affiliate-tag__affiliate-text-wrapper">
							<?php echo $affiliate_text; ?>
						</span>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php elseif ( ! empty( $format ) && '_1' === $format ) : // only banner ?>
	<?php
	if ( ! empty( $affiliate_banner ) ) {
		echo $affiliate_banner;
	}
	?>
<?php elseif ( ! empty( $format ) && '_2' === $format ) : // only text ?>
	<?php
	if ( ! empty( $affiliate_text ) ) {
		echo $affiliate_text;
	}
	?>
<?php endif; ?>
