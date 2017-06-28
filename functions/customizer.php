<?php
abstract class Earn_Pocket_Money_Abstract_Customizer {
	protected $Customizer;
	protected $Panel;

	public function __construct() {
		$this->Customizer = Earn_Pocket_Money_Customizer_Framework::init();
	}
}

/**
 * Default
 */
class Earn_Pocket_Money_Customizer_Default extends Earn_Pocket_Money_Abstract_Customizer {
	public function __construct() {
		parent::__construct();
		$this->Customizer->deregister( 'header_text' );
	}

	public function title_tagline() {
		$Section = $this->Customizer->Section( 'title_tagline' );
		$this->Customizer->register( $this->Customizer->Control(
			'checkbox',
			'display-site-description',
			array(
				'label'   => esc_html__( 'キャッチフレーズを表示する', 'earn-pocket-money' ),
				'default' => true,
			)
		) )->join( $Section );
	}
}

$Customizer_Default = new Earn_Pocket_Money_Customizer_Default();
$Customizer_Default->title_tagline();

/**
 * Design
 */
class Earn_Pocket_Money_Customizer_Design extends Earn_Pocket_Money_Abstract_Customizer {
	public function __construct() {
		parent::__construct();
		$this->Panel = $this->Customizer->Panel(
			'design',
			array(
				'title' => esc_html__( 'デザイン', 'earn-pocket-money' ),
			)
		);
	}

	public function general() {
		$Section = $this->Customizer->Section(
			'design-general',
			array(
				'title' => esc_html__( '全般', 'earn-pocket-money' ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'color',
			'default-bgcolor',
			array(
				'label'   => esc_html__( '背景色', 'earn-pocket-money' ),
				'default' => '#fff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'color',
			'default-link-color',
			array(
				'label'   => esc_html__( 'リンク文字色', 'earn-pocket-money' ),
				'default' => '#337ab7',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'select',
			'default-font',
			array(
				'label'   => esc_html__( 'フォント', 'earn-pocket-money' ),
				'default' => 'gothic',
				'choices' => array(
					'gothic' => esc_html__( 'ゴシック', 'earn-pocket-money' ),
					'mincho' => esc_html__( '明朝', 'earn-pocket-money' ),
				),
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'select',
			'base-font-size',
			array(
				'label'   => esc_html__( '基本文字サイズ', 'earn-pocket-money' ),
				'default' => '16px',
				'choices' => array(
					'13px' => '13px',
					'14px' => '14px',
					'15px' => '15px',
					'16px' => '16px',
					'17px' => '17px',
					'18px' => '18px',
				),
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'checkbox',
			'image-border-radius',
			array(
				'label'   => esc_html__( 'サムネイル、記事中の画像を角丸にする', 'earn-pocket-money' ),
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'image',
			'default-thumbnail-image',
			array(
				'label'       => esc_html__( 'デフォルトサムネイル画像', 'earn-pocket-money' ),
				'description' => esc_html__( '記事のアイキャッチ画像が未設定の場合に使用されます。', 'earn-pocket-money' ),
			)
		) )->join( $Section )->join( $this->Panel );
	}

	public function header() {
		$Section = $this->Customizer->Section(
			'design-header',
			array(
				'title' => esc_html__( 'ヘッダー', 'earn-pocket-money' ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'color',
			'header-bgcolor',
			array(
				'label'   => esc_html__( '背景色', 'earn-pocket-money' ),
				'default' => '#fff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		) )->join( $Section )->join( $this->Panel );
	}

	public function footer() {
		$Section = $this->Customizer->Section(
			'design-footer',
			array(
				'title' => esc_html__( 'フッター', 'earn-pocket-money' ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'color',
			'footer-bgcolor',
			array(
				'label'   => esc_html__( '背景色', 'earn-pocket-money' ),
				'default' => '#fff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'color',
			'footer-text-color',
			array(
				'label'   => esc_html__( '文字色', 'earn-pocket-money' ),
				'default' => '#333',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'color',
			'footer-link-color',
			array(
				'label'   => esc_html__( 'リンク文字色', 'earn-pocket-money' ),
				'default' => '#333',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'select',
			'footer-columns',
			array(
				'label'   => esc_html__( 'フッターカラム数（PC）', 'earn-pocket-money' ),
				'default' => '3',
				'choices' => array(
					'4' => esc_html__( '4カラム', 'earn-pocket-money' ),
					'3' => esc_html__( '3カラム', 'earn-pocket-money' ),
					'2' => esc_html__( '2カラム', 'earn-pocket-money' ),
				),
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'text',
			'footer-copyright',
			array(
				'label'       => esc_html__( 'copyright', 'earn-pocket-money' ),
				'default'     => 'Proudly powered by <a href="https://wordpress.org/" target="_blank">WordPress</a>',
				'description' => esc_html__( 'HTML 使用可', 'earn-pocket-money' ),
			)
		) )->join( $Section )->join( $this->Panel );
	}

	public function gnav() {
		$Section = $this->Customizer->Section(
			'design-gnav',
			array(
				'title' => esc_html__( 'グローバルナビゲーション', 'earn-pocket-money' ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'color',
			'gnav-bgcolor',
			array(
				'label'   => esc_html__( '背景色', 'earn-pocket-money' ),
				'default' => '#fff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'color',
			'gnav-link-color',
			array(
				'label'   => esc_html__( 'リンク文字色', 'earn-pocket-money' ),
				'default' => '#333',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		) )->join( $Section )->join( $this->Panel );
	}

	public function related_posts() {
		$Section = $this->Customizer->Section(
			'design-related-posts',
			array(
				'title' => esc_html__( '関連記事＆広告', 'earn-pocket-money' ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'text',
			'related-posts-title',
			array(
				'label'   => esc_html__( 'タイトル', 'earn-pocket-money' ),
				'default' => __( '関連記事＆広告', 'earn-pocket-money' ),
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'checkbox',
			'disable-related-posts',
			array(
				'label' => esc_html__( '関連記事を表示しない', 'earn-pocket-money' ),
			)
		) )->join( $Section )->join( $this->Panel );
	}
}

$Customizer_Design = new Earn_Pocket_Money_Customizer_Design();
$Customizer_Design->general();
$Customizer_Design->header();
$Customizer_Design->footer();
$Customizer_Design->gnav();
$Customizer_Design->related_posts();

/**
 * SEO
 */
class Earn_Pocket_Money_Customizer_SEO extends Earn_Pocket_Money_Abstract_Customizer {
	public function __construct() {
		parent::__construct();
		$this->Panel = $this->Customizer->Panel(
			'seo',
			array(
				'title' => esc_html__( 'SEO', 'earn-pocket-money' ),
			)
		);
	}

	public function ogp() {
		$Section = $this->Customizer->Section(
			'seo-ogp',
			array(
				'title' => esc_html__( 'OGP', 'earn-pocket-money' ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'image',
			'default-og-image',
			array(
				'label'       => esc_html__( 'デフォルト OGP 画像', 'earn-pocket-money' ),
				'description' => esc_html__( 'Facebook で投稿した際に表示される画像です。投稿した記事にアイキャッチ画像が設定されている場合はアイキャッチ画像が使用されます。', 'earn-pocket-money' ),
			)
		) )->join( $Section )->join( $this->Panel );
	}

	public function twitter_cards() {
		$Section = $this->Customizer->Section(
			'seo-twitter-cards',
			array(
				'title' => esc_html__( 'Twitter カード', 'earn-pocket-money' ),
				'description' => sprintf( '%1$s<a href="https://cards-dev.twitter.com/validator" target="_blank">Card validator</a>', esc_html__( 'Twitter カードの利用には URL の申請が必要です。', 'earn-pocket-money' ) ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'select',
			'twitter-card',
			array(
				'label'       => esc_html__( 'twitter:card', 'earn-pocket-money' ),
				'description' => esc_html__( '表示される Twitter カードのフォーマット', 'earn-pocket-money' ),
				'default' => 'summary',
				'choices' => array(
					'summary'             => 'Summary Card',
					'summary_large_image' => 'Summary Card with Large Image',
				),
			)
		) )->join( $Section )->join( $this->Panel );

		$this->Customizer->register( $this->Customizer->Control(
			'text',
			'twitter-site',
			array(
				'label'       => esc_html__( 'twitter:site', 'earn-pocket-money' ),
				'description' => esc_html__( 'サイトの Twitter アカウント名。@username の形式で入力してください。', 'earn-pocket-money' ),
				'default'     => '@',
			)
		) )->join( $Section )->join( $this->Panel );
	}

	public function google_analytics() {
		$Section = $this->Customizer->Section(
			'seo-google-analytics',
			array(
				'title' => esc_html__( 'Google Analytics', 'earn-pocket-money' ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'textarea',
			'google-analytics',
			array(
				'label' => esc_html__( 'Google Analytics コード', 'earn-pocket-money' ),
			)
		) )->join( $Section )->join( $this->Panel );
	}

	public function google_search_console() {
		$Section = $this->Customizer->Section(
			'seo-google-search-console',
			array(
				'title' => esc_html__( 'Google Search Console', 'earn-pocket-money' ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'text',
			'google-search-console',
			array(
				'label' => esc_html__( 'Google Search Console meta タグ', 'earn-pocket-money' ),
			)
		) )->join( $Section )->join( $this->Panel );
	}

	public function other() {
		$Section = $this->Customizer->Section(
			'seo-other',
			array(
				'title' => esc_html__( 'その他', 'earn-pocket-money' ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'checkbox',
			'nofollow',
			array(
				'label' => esc_html__( '外部リンクに rel="nofollow" を付与する', 'earn-pocket-money' ),
			)
		) )->join( $Section )->join( $this->Panel );
	}
}

$Customizer_SEO = new Earn_Pocket_Money_Customizer_SEO();
$Customizer_SEO->ogp();
$Customizer_SEO->twitter_cards();
$Customizer_SEO->google_analytics();
$Customizer_SEO->google_search_console();
$Customizer_SEO->other();

/**
 * ディスカッション
 */
class Earn_Pocket_Money_Customizer_Discussion extends Earn_Pocket_Money_Abstract_Customizer {
	public function comment_area() {
		$Section = $this->Customizer->Section(
			'discussion',
			array(
				'title' => esc_html__( 'ディスカッション', 'earn-pocket-money' ),
			)
		);

		$this->Customizer->register( $this->Customizer->Control(
			'checkbox',
			'disable-comment-area',
			array(
				'label' => esc_html__( 'コメントエリアを表示しない', 'earn-pocket-money' ),
			)
		) )->join( $Section );
	}
}

$Customizer_Discussion = new Earn_Pocket_Money_Customizer_Discussion();
$Customizer_Discussion->comment_area();
