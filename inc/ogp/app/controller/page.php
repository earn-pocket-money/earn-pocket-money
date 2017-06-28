<?php
class Earn_Pocket_Money_OGP_Page extends Earn_Pocket_Money_OGP_Abstract_Controller {
	public function init() {
		$this->title       = get_the_title();
		$this->type        = 'article';
		$this->url         = get_permalink();
		$this->image       = wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' );
		$this->description = $this->_get_description();
	}
}
