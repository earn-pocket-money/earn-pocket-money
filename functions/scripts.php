<?php
/**
 * Enqueue scripts
 */
function earn_pocket_money_scripts() {
	$theme = wp_get_theme();

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script(
		'bootstrap',
		get_template_directory_uri() . '/assets/packages/bootstrap/dist/js/bootstrap.min.js',
		array(),
		$theme->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'slick',
		get_template_directory_uri() . '/assets/packages/slick-carousel/slick/slick.min.js',
		array(),
		$theme->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'jquery.easiing',
		'//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js',
		array( 'jquery' ),
		$theme->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'jquery.smoothscroll',
		get_template_directory_uri() . '/assets/packages/jquery.smoothscroll/dist/jquery.smoothscroll.min.js',
		array( 'jquery' ),
		$theme->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		get_stylesheet(),
		get_template_directory_uri() . '/assets/js/app.min.js',
		array( 'jquery', 'bootstrap' ),
		$theme->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'html5shiv',
		get_template_directory_uri() . '/assets/packages/html5shiv/dist/html5shiv.min.js'
	);
	wp_script_add_data(
		'html5shiv',
		'conditional',
		'lt IE 9'
	);
}
add_action( 'wp_enqueue_scripts', 'earn_pocket_money_scripts' );
