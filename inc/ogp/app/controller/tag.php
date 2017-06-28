<?php
class Earn_Pocket_Money_OGP_Tag extends Earn_Pocket_Money_OGP_Abstract_Controller {
	public function init() {
		$term              = get_queried_object();
		$this->title       = single_tag_title( '', false );
		$this->type        = 'blog';
		$this->url         = get_term_link( $term );
		$this->description = wp_strip_all_tags( tag_description( $term->term_id ) );
	}
}
