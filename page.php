<?php get_header(); ?>

<div class="container">
	<div class="l-contents" role="document">
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

		<div class="l-contents__main">
			<main class="l-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?>>
					<header class="c-entry__header">
						<h1 class="c-entry__title"><?php the_title(); ?></h1>
					</header>
					<div class="c-entry__content">
						<?php the_content(); ?>
					</div>
				</article>
				<?php endwhile; ?>

			</main>
		</div>
		<div class="l-contents__aside">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
