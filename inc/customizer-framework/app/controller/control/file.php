<?php
class Earn_Pocket_Money_Customizer_Framework_File extends Earn_Pocket_Money_Customizer_Framework_Control {
	public function register_control( WP_Customize_Manager $wp_customize ) {
		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				$this->get_id(),
				$this->_generate_register_control_args()
			)
		);
	}
}
