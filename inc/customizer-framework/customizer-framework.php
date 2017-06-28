<?php
foreach ( glob( __DIR__ . '/app/controller/*.php' ) as $file ) {
	include_once( $file );
}
foreach ( glob( __DIR__ . '/app/controller/control/*.php' ) as $file ) {
	include_once( $file );
}

class Earn_Pocket_Money_Customizer_Framework {

	protected static $instance;
	protected static $controls = array();
	protected static $removed_default_controls = array();

	protected function __construct() {
		add_action( 'customize_register', array( $this, 'customize_register' ) );
	}

	public static function init() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function customize_register( WP_Customize_Manager $wp_customize ) {
		foreach ( self::$removed_default_controls as $control_name ) {
			$wp_customize->remove_control( $control_name );
		}

		foreach ( self::$controls as $Control ) {
			$wp_customize->add_setting( $Control->get_id(), $Control->get_args() );
			$Control->register_control( $wp_customize );
			$Section = $Control->Section();
			$Panel   = $Section->Panel();

			$args = $Section->get_args();
			if ( ! empty( $Panel ) ) {
				$args = array_merge( $args, array(
					'panel' => $Panel->get_id(),
				) );
			}

			if ( ! $wp_customize->get_section( $Section->get_id() ) && $args ) {
				$wp_customize->add_section( $Section->get_id(), $args );
			}

			if ( ! empty( $Panel ) ) {
				$wp_customize->add_panel( $Panel->get_id(), $Panel->get_args() );
			}
		}
	}

	public function register( Earn_Pocket_Money_Customizer_Framework_Control $Control ) {
		self::$controls[ $Control->get_id() ] = $Control;
		return self::$controls[ $Control->get_id() ];
	}

	public function deregister( $Control ) {
		if ( is_a( $Control, 'Earn_Pocket_Money_Customizer_Framework_Control' ) ) {
			$control_name = $Control->get_id();
			if ( isset( self::$controls[ $control_name ] ) ) {
				unset( self::$controls[ $control_name ] );
			}
		} else {
			$control_name = $Control;
			self::$removed_default_controls[] = $control_name;
		}
	}

	public function Panel( $id, $args ) {
		return new Earn_Pocket_Money_Customizer_Framework_Panel( $id, $args );
	}

	public function Section( $id, $args = array() ) {
		return new Earn_Pocket_Money_Customizer_Framework_Section( $id, $args );
	}

	public function Control( $type, $id, $args ) {
		$class = 'Earn_Pocket_Money_Customizer_Framework_' . ucfirst( $type );
		if ( class_exists( $class ) ) {
			return new $class( $id, $args );
		}
		echo $class . ' is not found.';
		exit;
	}
}
