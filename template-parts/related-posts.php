<?php
if ( true === get_theme_mod( 'disable-related-posts' ) ) {
	return;
}

$tax_query = array();

$category_ids = array();
$categories = get_the_category();
if ( is_array( $categories ) ) {
	foreach ( $categories as $category ) {
		$category_ids[] = $category->term_id;
	}
}
if ( $category_ids ) {
	$tax_query[] = array(
		'taxonomy' => 'category',
		'field'    => 'id',
		'terms'    => $category_ids,
		'operator' => 'OR',
	);
}

$tag_ids = array();
$tags = get_the_tags();
if ( is_array( $tags ) ) {
	foreach ( $tags as $tag ) {
		$tag_ids[] = $tag->term_id;
	}
}
if ( $tag_ids ) {
	$tax_query[] = array(
		'taxonomy' => 'post_tag',
		'field'    => 'id',
		'terms'    => $tag_ids,
		'operator' => 'OR',
	);
}
?>
<?php if ( $tax_query ) : ?>
	<?php
	$related_posts_args = array(
		'post_type'      => get_post_type( $post->ID ),
		'posts_per_page' => 3,
		'orderby'        => 'rand',
		'post__not_in'   => array( $post->ID ),
		'tax_query'      => array_merge(
			array(
				'relation' => 'OR',
			),
			$tax_query
		),
	);
	$related_posts = get_posts( $related_posts_args );
	?>
	<ul class="c-entries">
		<?php foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
			<li class="c-entries__item">
				<a href="<?php the_permalink(); ?>">
					<?php get_template_part( 'template-parts/content/content' ); ?>
				</a>
			</li>
		<?php endforeach; wp_reset_postdata( $post ); ?>
	</ul>
<?php endif; ?>
