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

function darklup_darkmode_component( $atts, $content= null ) {
	$settings = shortcode_atts( array(
		'switch_style' 	     => '1',
		'switch_alignment' 	 => 'left',
	), $atts );
	
	ob_start();
   
	// Switch style 
	echo '<div class="darklup-wbp-switch-wrapper" style="text-align:'.esc_attr($settings['switch_alignment']).'">';
		echo \Darklup\Switch_Style::switchStyle( esc_html( $settings['switch_style'] ) );
	echo '</div>';

	$html = ob_get_clean();
	return $html;
  
}
