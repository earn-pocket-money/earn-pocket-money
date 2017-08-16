<?php
$includes = array(
	'/inc',
	'/inc/breadcrumbs',
	'/inc/customizer-framework',
	'/inc/oembed-blog-card',
	'/inc/ogp',
	'/inc/github-theme-updater',
	'/functions',
	'/shortcodes',
);
foreach ( $includes as $include ) {
	foreach ( glob( get_template_directory() . $include . '/*.php' ) as $file ) {
		require_once( $file );
	}
}

/**
 * Loads text domain
 */
load_textdomain( 'tgmpa', get_template_directory() . '/languages/tgmpa/tgmpa-' . get_locale() . '.mo' );
load_theme_textdomain( 'earn-pocket-money', get_template_directory() . '/languages' );

/**
 * Sets $content_width
 *
 * @see https://wpdocs.osdn.jp/%E3%82%B3%E3%83%B3%E3%83%86%E3%83%B3%E3%83%84%E5%B9%85
 */
if ( ! isset( $content_width ) ) {
	$content_width = apply_filters( 'earn_pocket_money_content_width', 1152 );
}

/**
 * GitHub Theme Updater
 */
new Earn_Pocket_Money_GitHub_Theme_Updater( 'earn-pocket-money', 'earn-pocket-money', 'earn-pocket-money' );

/**
 * Sets up the theme
 */
if ( ! function_exists( 'earn_pocket_money_init' ) ) {
	function earn_pocket_money_init() {
		load_theme_textdomain( 'earn-pocket-money', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'caption', 'comment-form', 'comment-list', 'gallery', 'search-form',
		) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-logo', array(
			'height'      => 32,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		add_editor_style( array(
			'assets/packages/font-awesome/css/font-awesome.min.css',
			'/assets/packages/bootstrap/dist/css/bootstrap.min.css',
			'assets/css/editor-style.min.css',
		) );

		register_nav_menus( array(
			'global-nav' => esc_html__( 'グローバルナビゲーション (For PC)', 'earn-pocket-money' ),
			'drawer-nav' => esc_html__( 'ドロワーナビゲーション (For Mobile)', 'earn-pocket-money' ),
			'footer-nav' => esc_html__( 'フッターナビゲーション', 'earn-pocket-money' ),
			'social-header-nav' => esc_html__( 'SNS ナビゲーション (ヘッダー)', 'earn-pocket-money' ),
			'social-footer-nav' => esc_html__( 'SNS ナビゲーション (フッター)', 'earn-pocket-money' ),
		) );

		register_post_type( 'affiliate-tag', array(
			'public'  => false,
			'show_ui' => true,
			'label'   => esc_html__( 'アフィリエイトタグ', 'earn-pocket-money' ),
		) );

		register_post_type( 'ranking', array(
			'public'   => false,
			'show_ui'  => true,
			'label'    => esc_html__( 'ランキング', 'earn-pocket-money' ),
			'supports' => array( 'title' ),
		) );

		register_post_type( 'recommend', array(
			'public'   => false,
			'show_ui'  => true,
			'label'    => esc_html__( 'おすすめ記事', 'earn-pocket-money' ),
			'supports' => array( 'title' ),
		) );
	}
}
add_action( 'after_setup_theme', 'earn_pocket_money_init' );
