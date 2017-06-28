<?php
class Earn_Pocket_Money_Customizer_Framework_Panel {

	protected $id;
	protected $args = array();

	public function __construct( $id, $args = array() ) {
		$this->id   = $id;
		$this->args = $args;
	}

	public function get_id() {
		return $this->id;
	}

	public function get_args() {
		return $this->args;
	}
}
