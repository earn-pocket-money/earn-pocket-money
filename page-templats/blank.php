<?php
/**
 * Template Name: 空ページ
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="container" class="l-container">

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

<!-- /#container --></div>
<?php wp_footer(); ?>
</body>
</html>
