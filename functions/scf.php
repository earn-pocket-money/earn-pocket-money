<?php
/**
 * Registers custom fields with Smart Custom Fields
 */
if ( class_exists( 'SCF' ) ) {
	class Earn_Pocket_Money_Resisters_Smart_Custom_Fields {

		public function __construct() {
			add_filter( 'smart-cf-register-fields', array( $this, 'front_page_main_visual_pc' ), 10, 4 );
			add_filter( 'smart-cf-register-fields', array( $this, 'front_page_main_visual_mobile' ), 10, 4 );
			add_filter( 'smart-cf-register-fields', array( $this, 'front_page_recommend' ), 10, 4 );
			add_filter( 'smart-cf-register-fields', array( $this, 'front_page_ranking' ), 10, 4 );
			add_filter( 'smart-cf-register-fields', array( $this, 'affiliate_tag' ), 10, 4 );
			add_filter( 'smart-cf-register-fields', array( $this, 'ranking' ), 10, 4 );
			add_filter( 'smart-cf-register-fields', array( $this, 'recommend' ), 10, 4 );
			add_filter( 'smart-cf-register-fields', array( $this, 'seo' ), 10, 4 );
		}

		public function front_page_main_visual_pc( $settings, $type, $id, $meta_type ) {
			if ( $this->_is_front_page( $type, $id, $meta_type ) ) {
				$Setting = SCF::add_setting( 'front-page-main-visual-pc', 'トップページメインビジュアル（PC）' );
				$Setting->add_group( 'group-front-page-main-visual-pc', true, array(
					array(
						'name'  => 'front-page-main-visual-pc-id',
						'label' => esc_html__( 'メインビジュアル', 'earn-pocket-money' ),
						'type'  => 'image',
						'notes' => esc_html__( '1280px × 720px 推奨', 'earn-pocket-money' ),
						'size'  => 'medium',
					),
				) );
				$settings[] = $Setting;
			}
			return $settings;
		}

		public function front_page_main_visual_mobile( $settings, $type, $id, $meta_type ) {
			if ( $this->_is_front_page( $type, $id, $meta_type ) ) {
				$Setting = SCF::add_setting( 'front-page-main-visual-mobile', 'トップページメインビジュアル（モバイル）' );
				$Setting->add_group( 'group-front-page-main-visual-mobile', true, array(
					array(
						'name'  => 'front-page-main-visual-mobile-id',
						'label' => esc_html__( 'メインビジュアル', 'earn-pocket-money' ),
						'type'  => 'image',
						'notes' => esc_html__( '768px × 576px 推奨', 'earn-pocket-money' ),
						'size'  => 'medium',
					),
				) );
				$settings[] = $Setting;
			}
			return $settings;
		}

		public function front_page_recommend( $settings, $type, $id, $meta_type ) {
			if ( $this->_is_front_page( $type, $id, $meta_type ) ) {
				$Setting = SCF::add_setting( 'front-page-recommend', 'おすすめ記事' );
				$Setting->add_group( 'group-front-page-recommend', false, array(
					array(
						'name'      => 'front-page-recommend',
						'label'     => esc_html__( 'おすすめ記事', 'earn-pocket-money' ),
						'type'      => 'relation',
						'post-type' => array( 'recommend' ),
						'limit'     => 1,
					),
				) );
				$settings[] = $Setting;
			}
			return $settings;
		}

		public function front_page_ranking( $settings, $type, $id, $meta_type ) {
			if ( $this->_is_front_page( $type, $id, $meta_type ) ) {
				$Setting = SCF::add_setting( 'front-page-ranking', 'ランキング' );
				$Setting->add_group( 'group-front-page-ranking', false, array(
					array(
						'name'      => 'front-page-ranking',
						'label'     => esc_html__( 'ランキング', 'earn-pocket-money' ),
						'type'      => 'relation',
						'post-type' => array( 'ranking' ),
						'limit'     => 1,
					),
				) );
				$settings[] = $Setting;
			}
			return $settings;
		}

		public function affiliate_tag( $settings, $type, $id, $meta_type ) {
			if ( 'post' === $meta_type && 'affiliate-tag' === $type ) {
				$Setting = SCF::add_setting( 'setting-affiliate-tag', 'アフィリエイトタグ' );
				$Setting->add_group( 'group-format', false, array(
					array(
						'name'    => 'format',
						'label'   => esc_html__( '表示スタイル', 'earn-pocket-money' ),
						'type'    => 'radio',
						'default' => '_0',
						'choices' => array(
							'_0' => esc_html__( 'フォーマットして表示', 'earn-pocket-money' ),
							'_1' => esc_html__( 'アフィリエイトバナー広告のみ表示', 'earn-pocket-money' ),
							'_2' => esc_html__( 'アフィリエイトテキスト広告のみ表示', 'earn-pocket-money' ),
						),
					),
				) );

				$Setting->add_group( 'group-star', false, array(
					array(
						'name'    => 'star',
						'label'   => esc_html__( 'スター', 'earn-pocket-money' ),
						'type'    => 'radio',
						'default' => '_0',
						'choices' => array(
							'_0' => esc_html__( 'なし', 'earn-pocket-money' ),
							'_1' => esc_html__( '1つ', 'earn-pocket-money' ),
							'_2' => esc_html__( '2つ', 'earn-pocket-money' ),
							'_3' => esc_html__( '3つ', 'earn-pocket-money' ),
							'_4' => esc_html__( '4つ', 'earn-pocket-money' ),
							'_5' => esc_html__( '5つ', 'earn-pocket-money' ),
						),
					),
				) );

				$Setting->add_group( 'group-affiliate-banner', false, array(
					array(
						'name'    => 'affiliate-banner',
						'label'   => esc_html__( 'アフィリエイトバナー広告', 'earn-pocket-money' ),
						'type'    => 'textarea',
					),
				) );

				$Setting->add_group( 'group-affiliate-text', false, array(
					array(
						'name'    => 'affiliate-text',
						'label'   => esc_html__( 'アフィリエイトテキスト広告', 'earn-pocket-money' ),
						'type'    => 'text',
					),
				) );

				$Setting->add_group( 'group-detail-link', false, array(
					array(
						'name'    => 'detail-link',
						'label'   => esc_html__( '詳細ページの URL', 'earn-pocket-money' ),
						'type'    => 'text',
					),
				) );

				$Setting->add_group( 'group-detail-link-text', false, array(
					array(
						'name'    => 'detail-link-text',
						'label'   => esc_html__( '詳細ページリンクボタンのテキスト', 'earn-pocket-money' ),
						'type'    => 'text',
					),
				) );

				$settings[] = $Setting;
			}
			return $settings;
		}

		public function ranking( $settings, $type, $id, $meta_type ) {
			if ( 'post' === $meta_type && 'ranking' === $type ) {
				$Setting = SCF::add_setting( 'setting-ranking', 'ランキング' );
				$Setting->add_group( 'group-ranking', false, array(
					array(
						'name'      => 'ranking',
						'label'     => esc_html__( 'ランキング', 'earn-pocket-money' ),
						'type'      => 'relation',
						'post-type' => array( 'affiliate-tag' ),
					),
				) );
				$settings[] = $Setting;
			}
			return $settings;
		}

		public function recommend( $settings, $type, $id, $meta_type ) {
			if ( 'post' === $meta_type && 'recommend' === $type ) {
				$Setting = SCF::add_setting( 'setting-recommend', 'おすすめ記事' );
				$Setting->add_group( 'group-recommend', false, array(
					array(
						'name'      => 'recommend',
						'label'     => esc_html__( 'おすすめ記事', 'earn-pocket-money' ),
						'type'      => 'relation',
						'post-type' => array( 'post' ),
					),
				) );
				$settings[] = $Setting;
			}
			return $settings;
		}

		public function seo( $settings, $type, $id, $meta_type ) {
			if ( 'post' === $meta_type ) {
				$exclude_post_types = array( 'attachment' );
				$post_types = get_post_types( array(
					'public' => true,
				) );

				foreach ( $post_types as $post_type ) {
					if ( in_array( $post_type, $exclude_post_types ) ) {
						continue;
					}

					if ( $post_type === $type ) {
						$Setting = SCF::add_setting( 'setting-seo', 'SEO' );
						$Setting->add_group( 'group-keywords', false, array(
							array(
								'name'  => 'keywords',
								'label' => esc_html__( 'キーワード', 'earn-pocket-money' ),
								'type'  => 'text',
							),
						) );
						$Setting->add_group( 'group-description', false, array(
							array(
								'name'  => 'description',
								'label' => esc_html__( 'ディスクリプション', 'earn-pocket-money' ),
								'type'  => 'text',
							),
						) );
						$settings[] = $Setting;
					}
				}
			}
			return $settings;
		}

		protected function _is_front_page( $type, $id, $meta_type ) {
			if ( 'page' === $type
				&& 'post' === $meta_type
				&& 'page-templats/front-page.php' === get_post_meta( $id, '_wp_page_template', true )
			) {
				return true;
			}
			return false;
		}

		protected function _is_site_option( $type, $id, $meta_type ) {
			if ( 'option' === $meta_type && 'site-option' === $type ) {
				return true;
			}
			return false;
		}
	}

	new Earn_Pocket_Money_Resisters_Smart_Custom_Fields();
}
