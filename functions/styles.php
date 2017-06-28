<?php
/**
 * Enqueue styles
 */
function earn_pocket_money_styles() {
	$theme = wp_get_theme();

	wp_enqueue_style(
		'bootstrap',
		get_template_directory_uri() . '/assets/packages/bootstrap/dist/css/bootstrap.min.css',
		array(),
		$theme->get( 'Version' )
	);

	wp_enqueue_style(
		'font-awesome',
		get_template_directory_uri() . '/assets/packages/font-awesome/css/font-awesome.min.css',
		array(),
		$theme->get( 'Version' )
	);

	wp_enqueue_style(
		'slick',
		get_template_directory_uri() . '/assets/packages/slick-carousel/slick/slick.css',
		array(),
		$theme->get( 'Version' )
	);

	wp_enqueue_style(
		'slick-theme',
		get_template_directory_uri() . '/assets/packages/slick-carousel/slick/slick-theme.css',
		array( 'slick' ),
		$theme->get( 'Version' )
	);

	wp_enqueue_style(
		get_stylesheet(),
		get_template_directory_uri() . '/assets/css/style.min.css',
		array(),
		$theme->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'earn_pocket_money_styles' );
