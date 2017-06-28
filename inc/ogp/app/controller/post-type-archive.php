<?php
class Earn_Pocket_Money_OGP_Post_Type_Archive extends Earn_Pocket_Money_OGP_Abstract_Controller {
	public function init() {
		$object      = get_post_type_object( get_post_type() );
		$this->title = post_type_archive_title( '', false );
		$this->type  = 'blog';
		$this->url   = get_post_type_archive_link( $object );
	}
}
