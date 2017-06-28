<?php
class Earn_Pocket_Money_OGP_Front_Page extends Earn_Pocket_Money_OGP_Abstract_Controller {
	public function init() {
		$show_on_front = get_option( 'show_on_front' );
		$page_on_front = get_option( 'page_on_front' );

		if ( 'page' === $show_on_front && $page_on_front ) {
			$this->type        = 'website';
			$this->url         = get_permalink( $page_on_front );
			$this->image       = wp_get_attachment_image_url( get_post_thumbnail_id( $page_on_front ), 'full' );
			$this->description = $this->_get_description( $page_on_front );
		} else {
			$this->type  = 'blog';
			$this->url   = home_url();
		}

		$this->title = get_bloginfo( 'name' );
	}
}
