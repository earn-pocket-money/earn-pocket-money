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
						<div class="c-entry__meta">
							<?php the_time( get_option( 'date_format' ) ); ?>
							/
							<?php the_category( ', ' ); ?>
							<?php if ( false !== get_the_tags() ) : ?>
								/
								<?php the_tags( '<i class="fa fa-tags" aria-hidden="true"></i> ' ); ?>
							<?php endif; ?>
						</div>
					</header>

					<?php if ( is_active_sidebar( 'after-post-title-mobile' ) && wp_is_mobile() ) : ?>
					<div class="c-ad-mobile">
						<?php dynamic_sidebar( 'after-post-title-mobile' ); ?>
					</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'after-post-title-pc' ) && ! wp_is_mobile() ) : ?>
					<div class="c-ad-single-wide">
						<?php dynamic_sidebar( 'after-post-title-pc' ); ?>
					</div>
					<?php endif; ?>

					<div class="c-entry__content">
						<?php the_content(); ?>
					</div>
				</article>

				<div class="p-ad-and-related-posts">
					<h2 class="p-ad-and-related-posts__title"><?php echo esc_html( get_theme_mod( 'related-posts-title' ) ); ?></h2>

					<?php if ( is_active_sidebar( 'after-post-content-mobile' ) && wp_is_mobile() ) : ?>
					<div class="c-ad-mobile p-ad-and-related-posts__ad">
						<?php dynamic_sidebar( 'after-post-content-mobile' ); ?>
					</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'after-post-content-pc-1col' ) && ! wp_is_mobile() ) : ?>
					<div class="c-ad-single-wide p-ad-and-related-posts__ad">
						<?php dynamic_sidebar( 'after-post-content-pc-1col' ); ?>
					</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'after-post-content-pc' ) && ! wp_is_mobile() ) : ?>
					<div class="c-ad-double-rectangle p-ad-and-related-posts__ad">
						<div class="row">
							<?php dynamic_sidebar( 'after-post-content-pc' ); ?>
						</div>
					</div>
					<?php endif; ?>

					<div class="c-related-posts p-ad-and-related-posts__related-posts">
						<?php get_template_part( 'template-parts/related-posts' ); ?>
					</div>
				</div>

				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
				<?php endwhile; ?>

			</main>
		</div>
		<div class="l-contents__aside">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
