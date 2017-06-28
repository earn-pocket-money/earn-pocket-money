<?php
/**
 * Template Name: ヘッダー・フッターのみ
 */
?>
<?php get_header(); ?>

<div class="l-contents" role="document">
	<main class="l-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<div class="c-entry__content">
				<?php the_content(); ?>
			</div>
		</article>
		<?php endwhile; ?>

	</main>
</div>

<?php get_footer(); ?>
