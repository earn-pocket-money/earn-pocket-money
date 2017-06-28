<?php
abstract class Earn_Pocket_Money_Customizer_Framework_Control {

	protected $id;
	protected $args = array();
	protected $Section;

	public function __construct( $id, $args = array() ) {
		$this->id   = $id;
		$this->args = $args;
		add_filter( 'theme_mod_' . $id , array( $this, 'theme_mod' ) );
	}

	public function get_id() {
		return $this->id;
	}

	public function get_args() {
		return $this->args;
	}

	public function join( Earn_Pocket_Money_Customizer_Framework_Section $Section ) {
		$this->Section = $Section;
		return $this->Section;
	}

	public function Section() {
		return $this->Section;
	}

	public function theme_mod( $value ) {
		if ( is_null( $value ) || false === $value ) {
			if ( isset( $this->args['default'] ) ) {
				return $this->args['default'];
			}
		}
		return $value;
	}

	abstract public function register_control( WP_Customize_Manager $wp_customize );

	protected function _generate_register_control_args() {
		return array_merge(
			$this->get_args(),
			array(
				'section'  => $this->Section->get_id(),
				'settings' => $this->get_id(),
			)
		);
	}
}
