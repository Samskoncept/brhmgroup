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

if(!class_exists('Darklup_Image_Switch_Param')) {
	class Darklup_Image_Switch_Param {
		function __construct() {
			if(function_exists('vc_add_shortcode_param')) {
				vc_add_shortcode_param('imageswitch' , array(&$this, 'switch_settings_field' ));
			}
		}
	
		function switch_settings_field($settings, $value){

			ob_start();

			if(!empty($value)){
			    $hval = $value;
			}
			else{
			    $hval = '';
			}

			?>
			<div class="image-select-content-wrapper">
				<style>
					.darklup-image-select-item label {
						display: block;
					}
					.image-select-content-wrapper .darklup-image-select-item {
						width: 18%;
					    padding: 5px;
					    border: 2px solid #bababa;
					    margin: 5px;
					    float: left;
					}
					.image-select-content-wrapper .darklup-image-select-item img{
						width: 100%;
					}
					.darklup-image-select-item label input {
					    display: none;
					}
					.darklup-image-select-item {
						transition: all 0.7s;
						cursor: pointer;
					}
					.darklup-image-select-item.darklup_block-active, .darklup-image-select-item:hover {
					    border-color: #3700B3;
					    position: relative;
					}
				</style>
				<input type="hidden" value="<?php echo esc_attr( $hval ); ?>" id="imageradio<?php echo $settings['param_name']; ?>" name="<?php echo $settings['param_name']; ?>" class="wpb_vc_param_value wpb-input">
	            <?php 
	            foreach( $settings['options'] as $key => $option ):

	            	$active = '';
	            	if( $value == $key ) {
	            		$active = 'darklup_block-active';
	            	}

	            ?>
	            <div class="darklup-image-select-item <?php echo esc_attr( $active ); ?>">
	                <label for="darklup_switch_<?php echo esc_attr( $key ); ?>" class="image-item">
	                    <img src="<?php echo esc_url( $option['url'] ); ?>" />
	                    <input id="darklup_switch_<?php echo esc_attr( $key ); ?>" class="wpb_vc_param_value wpb-radioinput<?php echo esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field'; ?>"  type="radio" name="image_radio_<?php echo esc_attr( $settings['param_name'] ); ?>" value="<?php echo esc_html( $key ); ?>" <?php checked( $value, $key ); ?> />
	                </label>
	            </div>
	            <?php 
	        	endforeach;
	            ?>

			<script>
			jQuery(".wpb-radioinput<?php echo $settings['param_name']; ?>").change(function(){
			    var s = jQuery(this).val();
			    jQuery("#imageradio<?php echo $settings['param_name']; ?>").val(s);
			    jQuery('.darklup_block-active').removeClass('darklup_block-active');
			    jQuery(this).closest('.darklup-image-select-item').addClass('darklup_block-active');

			});
			</script>
	        </div>
			<?php

			return ob_get_clean();
		}
		
	}
	
	$Darklup_Image_Switch_Param = new Darklup_Image_Switch_Param();

}