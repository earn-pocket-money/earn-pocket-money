<?php
class Earn_Pocket_Money_Customizer_Framework_Section {

	protected $id;
	protected $args = array();
	protected $Panel;

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

	public function join( Earn_Pocket_Money_Customizer_Framework_Panel $Panel ) {
		$this->Panel = $Panel;
		return $this->Panel;
	}

	public function Panel() {
		return $this->Panel;
	}
}
