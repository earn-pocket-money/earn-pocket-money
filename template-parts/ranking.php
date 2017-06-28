<?php
if ( ! class_exists( 'SCF' ) ) {
	return;
}

$ranking = SCF::get( 'ranking' );
?>
<div class="p-ranking">
	<?php
	foreach ( $ranking as $post_id ) {
		$post = get_post( $post_id );
		if ( ! $post ) {
			continue;
		}
		setup_postdata( $post );
		get_template_part( 'template-parts/affiliate-tag' );
	}
	wp_reset_postdata();
	?>
</div>
