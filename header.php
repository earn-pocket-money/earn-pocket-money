<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
$google_analytics = get_theme_mod( 'google-analytics' );
if ( $google_analytics ) {
	echo get_theme_mod( 'google-analytics' );
}
?>

<div id="container" class="l-container">

<header class="l-header" role="banner">
	<div class="container">
		<div class="p-site-branding">
			<h1 class="p-site-branding__title">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
			</h1>

			<?php if ( true === get_theme_mod( 'display-site-description' ) ) : ?>
				<div class="p-site-branding__description">
					<?php bloginfo( 'description' ); ?>
				</div>
			<?php endif; ?>
		</div>

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
	</div>

	<?php if ( has_nav_menu( 'global-nav' ) ) : ?>
	<nav class="p-global-nav hidden-xs hidden-sm" role="navigation">
		<div class="container">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'global-nav',
			'container'      => false,
			'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'          => 0,
		) );
		?>
		</div>
	</nav>
	<?php endif; ?>

	<?php if ( has_nav_menu( 'drawer-nav' ) ) : ?>
	<div class="hidden-md hidden-lg">
		<div class="c-hamburger-btn" aria-expanded="false" aria-control="drawer-nav">
			<div class="c-hamburger-btn__bars">
				<div class="c-hamburger-btn__bar"></div>
				<div class="c-hamburger-btn__bar"></div>
				<div class="c-hamburger-btn__bar"></div>
			</div>
			<div class="c-hamburger-btn__label">
				MENU
			</div>
		</div>
		<nav class="p-drawer-nav" id="drawer-nav" role="navigation" aria-hidden="true">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'drawer-nav',
				'container'      => false,
				'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'          => 0,
			) );
			?>
		</nav>
	</div>
	<?php endif; ?>
</header>
