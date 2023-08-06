<?php 
 /**
  * 
  * @package    Darklup - WP Dark Mode
  * @version    1.0.0
  * @author     
  * @Websites: 
  *
  */
if( ! defined( 'ABSPATH' ) ) {
    die( DARKLUP_ALERT_MSG );
}

add_action( 'vc_before_init', 'darklup_darkmode_switch' );
function darklup_darkmode_switch() {

	// vc_map check
	if( function_exists( 'vc_map' ) ) {
		vc_map( array(
		  "name" => esc_html__( "Dark Mode Switch", "darklup" ),
		  "base" => "vc_darklup_darkmode_switch",
		  "class" => "",
		  "icon" => "",
		  "category" => esc_html__( "Content", "darklup"),
		  "params" => array(
			
			array(
				"type" => "imageswitch",
				"heading" => esc_html__( "Select Switch Style", "darklup" ),
				"param_name" => "switch_style",
				"value" => '1', //Default Red color
				"description" => esc_html__( "Set section bottom padding", "darklup" ),
				'group' => esc_html__( 'Dark Mode Switch Settings', 'darklup' ),
				'options' => \Darklup\Helper::switchDemoImage()
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Switch Alignment", "darklup" ),
				"param_name" => "switch_alignment",
				"value" => 'left', //Default value
				'group' => esc_html__( 'Dark Mode Switch Settings', 'darklup' ),
				'value' => array(
                    esc_html__( 'Left', 'darklup' ) 	=> 'left',
                    esc_html__( 'Center', 'darklup' ) 	=> 'center',
                    esc_html__( 'Right', 'darklup' ) 	=> 'right',
                )
			),


		  )
		) );
	} // end vc_map Check


}