<?php
class Earn_Pocket_Money_OGP_Attachment extends Earn_Pocket_Money_OGP_Abstract_Controller {
	public function init() {
		$this->title       = get_the_title();
		$this->type        = 'article';
		$this->url         = get_permalink();
		$this->image       = get_the_post_thumbnail_url( $post, 'full' );
		$this->description = $this->_get_description();
	}
}
