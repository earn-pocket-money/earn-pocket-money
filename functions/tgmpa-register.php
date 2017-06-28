<?php
/**
 * Registers TGM Plugin Activation settings
 *
 * @see http://tgmpluginactivation.com/
 */
function earn_pocket_money_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Smart Custom Fields',
			'slug'      => 'smart-custom-fields',
			'required'  => true,
		),
		array(
			'name'      => 'VA Social Buzz',
			'slug'      => 'va-social-buzz',
			'required'  => true,
		),
		array(
			'name'      => 'WP Social Bookmarking Light',
			'slug'      => 'wp-social-bookmarking-light',
			'required'  => true,
		),
		array(
			'name'      => 'Jetpack by WordPress.com',
			'slug'      => 'jetpack',
			'required'  => true,
		),
		array(
			'name'      => 'AMP',
			'slug'      => 'amp',
			'required'  => true,
		),
		array(
			'name'      => 'AMP for WP – Accelerated Mobile Pages',
			'slug'      => 'accelerated-mobile-pages',
			'required'  => true,
		),
	);

	$config = array(
		'id'           => 'earn-pocket-money',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => false,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'earn_pocket_money_register_required_plugins' );
