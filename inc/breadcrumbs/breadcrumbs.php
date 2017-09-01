<?php
include_once( dirname( __FILE__ ) . '/abstract-breadcrumbs.php' );

foreach ( glob( dirname( __FILE__ ) . '/inc/*.php' ) as $file ) {
	include_once( $file );
}

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Earn_Pocket_Money_Breadcrumbs {

	/**
	 * Store each item of breadcrumbs in ascending order
	 * @var array
	 */
	protected $breadcrumbs = array();

	/**
	 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
	 */
	public function __construct() {
		$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Front_Page();
		$this->set_items( $breadcrumb->get() );

		$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Blog();
		$this->set_items( $breadcrumb->get() );

		if ( is_404() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Not_Found();
		} elseif ( is_search() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Search();
		} elseif ( is_tax() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Taxonomy();
		} elseif ( is_attachment() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Attachment();
		} elseif ( is_page() && ! is_front_page() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Page();
		} elseif ( is_post_type_archive() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Post_Type_Archive();
		} elseif ( is_single() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Single();
		} elseif ( is_category() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Category();
		} elseif ( is_tag() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Tag();
		} elseif ( is_author() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Author();
		} elseif ( is_day() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Day();
		} elseif ( is_month() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Month();
		} elseif ( is_year() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Year();
		} elseif ( is_home() && ! is_front_page() ) {
			$breadcrumb = new Earn_Pocket_Money_Breadcrumbs_Home();
		}

		$this->set_items( $breadcrumb->get() );
	}

	/**
	 * Sets breadcrumbs items
	 *
	 * @param array $items
	 * @return void
	 */
	protected function set_items( $items ) {
		foreach ( $items as $item ) {
			$this->set( $item['title'], $item['link'] );
		}
	}

	/**
	 * Adds a item
	 *
	 * @param string $title
	 * @param string $link
	 */
	protected function set( $title, $link = '' ) {
		$this->breadcrumbs[] = array(
			'title' => $title,
			'link'  => $link,
		);
	}

	/**
	 * Gets breadcrumbs items
	 *
	 * @return array
	 */
	public function get() {
		return apply_filters( 'earn_pocket_money_breadcrumbs', $this->breadcrumbs );
	}
}
