<?php
/**
 * Sets content of the head element
 */
if ( ! function_exists( 'earn_pocket_money_wp_head' ) ) {
	function earn_pocket_money_wp_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php
	}
}
add_action( 'wp_head', 'earn_pocket_money_wp_head' );

/**
 * Custom logo size
 */
if ( ! function_exists( 'earn_pocket_money_wp_head_custom_logo_css' ) ) {
	function earn_pocket_money_wp_head_custom_logo_css() {
		$custom_logo = get_custom_logo();
		if ( ! $custom_logo ) {
			return;
		}

		preg_match( '/height="(\d+?)"/', $custom_logo, $reg );
		if ( ! isset( $reg[1] ) ) {
			return;
		}
		$height = $reg[1];

		preg_match( '/width="(\d+?)"/', $custom_logo, $reg );
		if ( ! isset( $reg[1] ) ) {
			return;
		}
		$width = $reg[1];
		?>
		<style>
		.p-site-branding .custom-logo { height: <?php echo esc_html( $height / 2 ); ?>px; width: <?php echo esc_html( $width / 2 ); ?>px; }
		</style>
		<?php
	}
}
add_action( 'wp_head', 'earn_pocket_money_wp_head_custom_logo_css' );

/**
 * Add meta keywords to single page
 */
if ( ! function_exists( 'earn_pocket_money_wp_head_keywords' ) ) {
	function earn_pocket_money_wp_head_keywords() {
		if ( ! class_exists( 'SCF' ) ) {
			return;
		}

		if ( ! is_singular() || is_front_page() ) {
			return;
		}

		$keywords = strip_tags( SCF::get( 'keywords' ) );

		if ( ! $keywords ) {
			$keywords   = array();
			$categories = strip_tags( get_the_category_list( ',' ) );
			$tags       = strip_tags( get_the_tag_list( '', ',', '' ) );
			if ( $categories ) {
				$keywords[] = $categories;
			}
			if ( $tags ) {
				$keywords[] = $tags;
			}
			$keywords = implode( ',', $keywords );
		}

		if ( ! $keywords ) {
			return;
		}

		printf(
			'<meta name="keywords" content="%1$s">',
			esc_attr( $keywords )
		);
	}
}
add_action( 'wp_head', 'earn_pocket_money_wp_head_keywords' );

/**
 * Add meta description to single page
 */
if ( ! function_exists( 'earn_pocket_money_wp_head_description' ) ) {
	function earn_pocket_money_wp_head_description() {
		if ( ! class_exists( 'SCF' ) ) {
			return;
		}

		if ( ! is_singular() || is_front_page() ) {
			return;
		}

		$description = strip_tags( SCF::get( 'description' ) );

		if ( ! $description ) {
			global $post;

			$description = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $post->post_excerpt ) ) );
			if ( ! $description ) {
				$description = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $post->post_content ) ) );
			}
		}

		if ( ! $description ) {
			return;
		}

		printf(
			'<meta name="description" content="%1$s">',
			esc_attr( $description )
		);
	}
}
add_action( 'wp_head', 'earn_pocket_money_wp_head_description' );

/**
 * Add meta for google search console
 */
if ( ! function_exists( 'earn_pocket_money_wp_head_google_search_console' ) ) {
	function earn_pocket_money_wp_head_google_search_console() {
		$search_console = get_theme_mod( 'google-search-console' );
		if ( ! $search_console ) {
			return;
		}

		echo wp_kses(
			$search_console,
			array(
				'meta' => array(
					'name'    => array(),
					'content' => array(),
				),
			)
		);
	}
}
add_action( 'wp_head', 'earn_pocket_money_wp_head_google_search_console' );

/**
 * Add OGP
 */
if ( ! function_exists( 'earn_pocket_money_wp_head_ogp' ) ) {
	function earn_pocket_money_wp_head_ogp() {
		$OGP         = new Earn_Pocket_Money_OGP();
		$title       = $OGP->get_title();
		$type        = $OGP->get_type();
		$url         = $OGP->get_url();
		$image       = $OGP->get_image();
		$site_name   = $OGP->get_site_name();
		$locale      = $OGP->get_locale();
		$description = $OGP->get_description();

		if ( empty( $title ) || empty( $type ) || empty( $url ) ) {
			return;
		}
		?>
		<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
		<meta property="og:type" content="<?php echo esc_attr( $type ); ?>">
		<meta property="og:url" content="<?php echo esc_attr( $url ); ?>">
		<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
		<meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
		<meta property="og:locale" content="<?php echo esc_attr( $locale ); ?>">
		<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
		<?php
	}
}
add_action( 'wp_head', 'earn_pocket_money_wp_head_ogp' );

/**
 * Add Twitter Cards
 */
function earn_pocket_money_wp_head_twitter_cards() {
	$twitter_card = get_theme_mod( 'twitter-card' );
	$twitter_site = get_theme_mod( 'twitter-site' );
	?>
	<meta name="twitter:card" content="<?php echo esc_attr( $twitter_card ); ?>">
	<?php if ( preg_match( '/^@[^@]+$/', $twitter_site ) ) : ?>
	<meta name="twitter:site" content="<?php echo esc_attr( $twitter_site ); ?>">
	<?php endif; ?>
	<?php
}
add_action( 'wp_head', 'earn_pocket_money_wp_head_twitter_cards' );

/**
 * Add customizer styles
 */
if ( ! function_exists( 'earn_pocket_money_wp_head_styles' ) ) {
	function earn_pocket_money_wp_head_styles() {
		if ( 'mincho' === get_theme_mod( 'default-font' ) ) {
			$fonts_general = '"Times New Roman", "HGS明朝E" , "MS PMincho", MyYuMinchoM, YuMincho, "Helvetica Neue", serif';
		} else {
			$fonts_general = '-apple-system, BlinkMacSystemFont, Helvetica, Meiryo, MyYuGothicM, YuGothic, "Helvetica Neue", sans-serif;';
		}
		$image_border_radius = get_theme_mod( 'image-border-radius' );
		?>
<style>
html { font-size: <?php echo get_theme_mod( 'base-font-size' ); ?> }
body { font-family: <?php echo $fonts_general; ?>; background-color: <?php echo get_theme_mod( 'default-bgcolor' ); ?> }
a { color: <?php echo get_theme_mod( 'default-link-color' ); ?> }
.l-header { background-color: <?php echo get_theme_mod( 'header-bgcolor' ); ?> }
.p-global-nav { background-color: <?php echo get_theme_mod( 'gnav-bgcolor' ); ?> }
.p-global-nav .menu > .menu-item > a { color: <?php echo get_theme_mod( 'gnav-link-color' ); ?> }
.l-footer { background-color: <?php echo get_theme_mod( 'footer-bgcolor' ); ?> }
.l-footer { color: <?php echo get_theme_mod( 'footer-text-color' ); ?> }
.l-footer .c-widget__title { border-color: <?php echo get_theme_mod( 'footer-text-color' ); ?> }
.l-footer a { color: <?php echo get_theme_mod( 'footer-link-color' ); ?> }
@media screen and (min-width: 992px) { .p-footer-widgets .c-widget { width: <?php echo ( 100 / get_theme_mod( 'footer-columns' ) ); ?>%; } .p-footer-widgets .c-widget:nth-child(<?php echo get_theme_mod( 'footer-columns' ); ?>n + 1) { clear: both; } }
<?php if ( $image_border_radius ) : ?>.c-entry-summary__figure, .c-entry__content img[class*="wp-image-"], .attachment-thumbnail { border-radius: 6px; }<?php endif; ?>
</style>
		<?php
	}
}
add_action( 'wp_head', 'earn_pocket_money_wp_head_styles' );
