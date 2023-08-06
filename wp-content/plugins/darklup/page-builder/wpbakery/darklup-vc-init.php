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

// VC Admin init hook
add_action( 'vc_build_admin_page', 'darklup_custom_param_type' );
function darklup_custom_param_type(){
	require_once DARKLUP_DIR_PAGE_BUILDER . 'wpbakery/image-switch-param.php';
}

// VC Admin init hook
require_once DARKLUP_DIR_PAGE_BUILDER . 'wpbakery/vc-darkmode-switch.php';
require_once DARKLUP_DIR_PAGE_BUILDER . 'wpbakery/vc-darkmode-switch-markup.php';

// Darklup dark mode vc shortcode
add_shortcode( 'vc_darklup_darkmode_switch', 'darklup_darkmode_component' );