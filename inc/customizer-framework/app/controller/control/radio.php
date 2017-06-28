<?php
class Earn_Pocket_Money_Customizer_Framework_Radio extends Earn_Pocket_Money_Customizer_Framework_Control {
	public function register_control( WP_Customize_Manager $wp_customize ) {
		$this->args = array_merge(
			$this->args, array(
				'type' => 'radio',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$this->get_id(),
				$this->_generate_register_control_args()
			)
		);
	}
}
