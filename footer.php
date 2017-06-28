<footer class="l-footer" role="content-info">
	<div class="container">
		<?php if ( has_nav_menu( 'footer-nav' ) ) : ?>
		<nav class="p-footer-nav" role="navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-nav',
				'container'      => false,
				'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'          => 1,
			) );
			?>
		</nav>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
		<div class="p-footer-widgets">
			<div class="row">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'social-header-nav' ) ) : ?>
		<div class="hidden-xs hidden-sm">
			<nav class="p-social-nav" role="navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'social-header-nav',
					'container'      => false,
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'          => 1,
				) );
				?>
			</nav>
		</div>
		<?php endif; ?>

		<div class="c-copyright">
			<?php
			$copyright = get_theme_mod( 'footer-copyright' );
			echo wp_kses_post( $copyright );
			?>
		</div>
	</div>
</footer>

<div class="c-pagetop" aria-hidden="true">
	<a href="#container"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>

<!-- /#container --></div>
<?php wp_footer(); ?>
</body>
</html>
