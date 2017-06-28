<?php
class Earn_Pocket_Money_OGP_Year extends Earn_Pocket_Money_OGP_Abstract_Controller {
	public function init() {
		$year = get_query_var( 'year' );
		if ( ! $year ) {
			$ymd  = get_query_var( 'm' );
			$year = $ymd;
		}
		$this->title = $this->_year( $year );
		$this->type  = 'blog';
		$this->url   = get_year_link( $year );
	}
}
