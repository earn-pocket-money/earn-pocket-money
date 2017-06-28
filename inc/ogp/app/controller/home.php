<?php
class Earn_Pocket_Money_OGP_Home extends Earn_Pocket_Money_OGP_Abstract_Controller {
	public function init() {
		$show_on_front  = get_option( 'show_on_front' );
		$page_for_posts = get_option( 'page_for_posts' );
		if ( 'page' === $show_on_front && $page_for_posts ) {
			$this->title       = get_the_title( $page_for_posts );
			$this->type        = 'blog';
			$this->url         = get_permalink( $page_for_posts );
			$this->image       = wp_get_attachment_image_url( get_post_thumbnail_id( $page_for_posts ), 'full' );
			$this->description = $this->_get_description( $page_for_posts );
		} else {
			$this->title = get_bloginfo( 'name' );
			$this->type  = 'blog';
			$this->url   = home_url();
		}
	}
}
