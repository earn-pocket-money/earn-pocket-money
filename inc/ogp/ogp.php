<?php
include_once( dirname( __FILE__ ) . '/app/controller/abstract.php' );

foreach ( glob( dirname( __FILE__ ) . '/app/controller/*.php' ) as $file ) {
	include_once( $file );
}

class Earn_Pocket_Money_OGP {

	protected $OGP;

	public function __construct() {
		if ( is_tax() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Taxonomy();
		} elseif ( is_attachment() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Attachment();
		} elseif ( is_page() && ! is_front_page() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Page();
		} elseif ( is_post_type_archive() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Post_Type_Archive();
		} elseif ( is_single() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Single();
		} elseif ( is_category() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Category();
		} elseif ( is_tag() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Tag();
		} elseif ( is_author() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Author();
		} elseif ( is_day() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Day();
		} elseif ( is_month() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Month();
		} elseif ( is_year() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Year();
		} elseif ( is_home() && ! is_front_page() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Home();
		} elseif ( is_front_page() ) {
			$this->OGP = new Earn_Pocket_Money_OGP_Front_Page();
		}
	}

	public function get_title() {
		if ( ! $this->OGP ) {
			return;
		}
		return $this->OGP->get_title();
	}

	public function get_type() {
		if ( ! $this->OGP ) {
			return;
		}
		return $this->OGP->get_type();
	}

	public function get_url() {
		if ( ! $this->OGP ) {
			return;
		}
		return $this->OGP->get_url();
	}

	public function get_image() {
		if ( ! $this->OGP ) {
			return;
		}
		$image = $this->OGP->get_image();

		if ( empty( $image ) ) {
			$image = get_theme_mod( 'default-og-image' );
		}

		return $image;
	}

	public function get_description() {
		if ( ! $this->OGP ) {
			return;
		}
		$description = $this->OGP->get_description();

		if ( empty( $description ) ) {
			$description = wp_strip_all_tags( get_bloginfo( 'description' ) );
		}

		return wp_trim_words( str_replace( array( "\r", "\n" ), '', $description ) );
	}

	public function get_site_name() {
		if ( ! $this->OGP ) {
			return;
		}
		return $this->OGP->get_site_name();
	}

	public function get_locale() {
		if ( ! $this->OGP ) {
			return;
		}
		return $this->OGP->get_locale();
	}
}
