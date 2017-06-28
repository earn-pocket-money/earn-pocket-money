<?php
/**
 * Registers widget areas
 */
function earn_pocket_money_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'サイドバー', 'earn-pocket-money' ),
		'id'            => 'sidebar',
		'description'   => __( 'サイドバー', 'earn-pocket-money' ),
		'before_widget' => '<section id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="c-widget__title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'フッター', 'earn-pocket-money' ),
		'id'            => 'footer',
		'description'   => __( 'フッター', 'earn-pocket-money' ),
		'before_widget' => '<section id="%1$s" class="c-widget %2$s col-">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="c-widget__title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( '投稿記事タイトル下（PC向け広告用）', 'earn-pocket-money' ),
		'id'            => 'after-post-title-pc',
		'description'   => __( 'ワイドバナー広告もしくはレスポンシブ広告1つの配置を推奨', 'earn-pocket-money' ),
		'before_widget' => '<section id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="c-widget__title" aria-hidden="true" hidden>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( '投稿記事タイトル下（モバイル向け広告用）', 'earn-pocket-money' ),
		'id'            => 'after-post-title-mobile',
		'description'   => __( 'レクタングル広告もしくはレスポンシブ広告1つの配置を推奨', 'earn-pocket-money' ),
		'before_widget' => '<section id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="c-widget__title" aria-hidden="true" hidden>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( '投稿記事本文下（PC向け広告用、1カラム）', 'earn-pocket-money' ),
		'id'            => 'after-post-content-pc-1col',
		'description'   => __( 'レクタングル広告1つの配置を推奨', 'earn-pocket-money' ),
		'before_widget' => '<section id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="c-widget__title" aria-hidden="true" hidden>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( '投稿記事本文下（PC向け広告用、2カラム）', 'earn-pocket-money' ),
		'id'            => 'after-post-content-pc',
		'description'   => __( 'レクタングル広告2つの配置を推奨', 'earn-pocket-money' ),
		'before_widget' => '<section id="%1$s" class="c-widget %2$s col-md-6">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="c-widget__title" aria-hidden="true" hidden>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( '投稿記事本文下（モバイル向け広告用）', 'earn-pocket-money' ),
		'id'            => 'after-post-content-mobile',
		'description'   => __( 'レクタングル広告もしくはレスポンシブ広告1つの配置を推奨', 'earn-pocket-money' ),
		'before_widget' => '<section id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="c-widget__title" aria-hidden="true" hidden>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'earn_pocket_money_widgets_init' );

/**
 * Activate sortcode in text widget
 */
add_filter( 'widget_text', 'do_shortcode' );
