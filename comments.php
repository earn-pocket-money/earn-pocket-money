<?php
if ( post_password_required() ) {
	return;
}

$disable_comment_area = get_theme_mod( 'disable-comment-area' );
if ( true === $disable_comment_area ) {
	return;
}
?>

<div id="comments" class="p-comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="p-comments-area__title"><?php esc_html_e( 'この記事へのコメント', 'earn-pocket-money' ); ?></h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="p-comment-nav" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'コメントナビゲーション', 'earn-pocket-money' ); ?></h3>
			<div class="c-nav-links">
				<div class="c-nav-links__prev">
					<?php previous_comments_link( esc_html__( '古いコメント', 'earn-pocket-money' ) ); ?>
				</div>
					<div class="c-nav-links__next">
					<?php next_comments_link( esc_html__( '新しいコメント', 'earn-pocket-money' ) ); ?>
				</div>
			</div>
		</nav>
		<?php endif; ?>

		<ol class="p-comments">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="p-comment-nav" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'コメントナビゲーション', 'earn-pocket-money' ); ?></h3>
			<div class="c-nav-links">
				<div class="c-nav-links__prev">
					<?php previous_comments_link( esc_html__( '古いコメント', 'earn-pocket-money' ) ); ?>
				</div>
					<div class="c-nav-links__next">
					<?php next_comments_link( esc_html__( '新しいコメント', 'earn-pocket-money' ) ); ?>
				</div>
			</div>
		</nav>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="p-no-comments">
			<?php esc_html_e( 'コメントは受け付けていません', 'earn-pocket-money' ); ?>
		</p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>
