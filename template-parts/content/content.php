<section class="c-entry-summary">
	<?php
	$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
	if ( ! $thumbnail_url ) {
		$thumbnail_url = get_theme_mod( 'default-thumbnail-image' );
	}
	?>
	<div class="c-entry-summary__figure"
		style="background-image: url( <?php echo esc_url( $thumbnail_url ); ?> );"
	></div>
	<div class="c-entry-summary__body">
		<h2 class="c-entry-summary__title"><?php the_title(); ?></h2>
		<div class="c-entry-summary__excerpt">
			<?php the_excerpt(); ?>
		</div>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="c-entry-summary__meta">
				<?php the_time( get_option( 'date_format' ) ); ?>
				/
				<?php
				$categories = array();
				foreach ( get_the_category() as $category ) {
					$categories[] = $category->cat_name;
				}
				echo esc_html( implode( ', ', $categories ) );

				$tags = array();
				$the_tags = get_the_tags();
				if ( is_array( $the_tags ) ) {
					foreach ( get_the_tags() as $tag ) {
						$tags[] = $tag->name;
					}
					if ( $tags ) {
						echo ' / <i class="fa fa-tags" aria-hidden="true"></i> ' . esc_html( implode( ', ', $tags ) );
					}
				}
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
