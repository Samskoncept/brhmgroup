<?php
namespace Darklup;
 /**
  * 
  * @package    Darklup - WP Dark Mode
  * @version    1.1.2
  * @author 	Darklup   
  * @Websites:  https://darklup.com/
  *
  */
 
if( ! defined( 'ABSPATH' ) ) {
    die( DARKLUP_ALERT_MSG );
}

/**
 * Darklup_Enqueue class
 */
if( !class_exists( 'Darklup_Enqueue' ) ) {
	
	class Darklup_Enqueue{
		
	   /**
		* Darklup_Enqueue constructor
		*
		* @since  1.1.2
		* @return void
		*/
		public function __construct() {
		
			if(  \Darklup\Helper::getOptionData('frontend_darkmode')  == 'yes' ) {

				add_action( 'wp_enqueue_scripts', array( $this, 'frontendEnqueueScripts' ) );

				add_action( 'wp_ajax_darklup_analytics_save_record', array($this, 'darklup_analytics_save_record') );
				add_action( 'wp_ajax_nopriv_darklup_analytics_save_record', array($this, 'darklup_analytics_save_record'));
				add_filter('script_loader_tag', array($this, 'deferScriptInHead'), 10, 3);
			}
			
		}

		function darklup_analytics_save_record() {
			include_once DARKLUP_DIR_INC . "darklup_analytics_save_record.php";
			wp_die();
		}


	   /**
		* Front-End enqueue scripts 
		* 
		* @since  1.1.2
		* @return void
		*/
		public function frontendEnqueueScripts() {
			
			wp_enqueue_style( 'darklup-style', DARKLUP_DIR_URL.'assets/css/darklup-style.css', array(), DARKLUP_VERSION, false );
			wp_enqueue_style( 'darklup-switch', DARKLUP_DIR_URL.'assets/css/darklup-switch.css', array(), DARKLUP_VERSION, false );
			// wp_enqueue_style( 'darklup-variables', DARKLUP_DIR_URL.'assets/css/darklup-variables.css', array(), DARKLUP_VERSION, false );

			/********************
				Js Enqueue
			********************/

			// wp_enqueue_script( 'tinycolor', DARKLUP_DIR_URL.'assets/js/tinycolor-min.js', array(), DARKLUP_VERSION, true );
			
			$colorMode = 'darklup_dynamic';
			// $getMode = 'darklup_presets';
			$getMode = \Darklup\Helper::getOptionData('full_color_settings');

			if($getMode !== 'darklup_dynamic'){
				$colorMode = 'darklup_presets';
				$this->addDarklupJSWithDynamicVersion('darklup_presets', $src = 'assets/es-js/presets.js', $dep = NULL, $js_footer = false);
				wp_enqueue_style( 'darklup-variables', DARKLUP_DIR_URL.'assets/css/darklup-variables.css', array(), DARKLUP_VERSION, false );
			}else{
				$this->addDarklupJSWithDynamicVersion();
			}

			$darkenLevel = 85;
			$getDarkenLevel = \Darklup\Helper::getOptionData('darkmode_level');
			if($getDarkenLevel) $darkenLevel = $getDarkenLevel;
			

			$bgColor = $bgSecondaryColor = $bgTertiary = '';


            $customBg = \Darklup\Helper::getOptionData('custom_bg_color');
            $customBg = \Darklup\Helper::is_real_color($customBg);
    
            // Custom colors
            $customSecondaryBg = \Darklup\Helper::getOptionData('custom_secondary_bg_color');
            $customSecondaryBg = \Darklup\Helper::is_real_color($customSecondaryBg);
    
            $customTertiaryBg = \Darklup\Helper::getOptionData('custom_tertiary_bg_color');
            $customTertiaryBg = \Darklup\Helper::is_real_color($customTertiaryBg);

    
			$colorPreset = \Darklup\Helper::getOptionData('color_preset');
            $presetColor = \Darklup\Color_Preset::getColorPreset($colorPreset);            
    
            $bgColor = esc_html($presetColor['background-color']);
            if($customBg) $bgColor = $customBg;
            $bgColor = \Darklup\Helper::hex_to_color($bgColor);

            $bgSecondaryColor = esc_html($presetColor['secondary_bg']);
            if($customSecondaryBg) $bgSecondaryColor = $customSecondaryBg;
            $bgSecondaryColor = \Darklup\Helper::hex_to_color($bgSecondaryColor);

            $bgTertiary = esc_html($presetColor['tertiary_bg']);
            if($customTertiaryBg) $bgTertiary = $customTertiaryBg;
            $bgTertiary = \Darklup\Helper::hex_to_color($bgTertiary);


			$excludeElement  = Helper::getOptionData('exclude_element');
			$getElements = explode( ',', $excludeElement );
			$excludedElemetns = [];
			if( !empty( $getElements ) ) {
				foreach( $getElements as $element ) {
					if($element){
						$excludedElemetns[] = trim($element);
						if (strpos($element, '*') == false) {
							$excludedElemetns[] = trim($element).' *';
						}
					}
					
				}
			}

			
			$excludeBgElements  = Helper::getOptionData('exclude_bg_overlay');
			$getBgElements = explode( ',', $excludeBgElements );
			$excludedBgOverlay = [];
			if( !empty( $getBgElements ) ) {
				foreach( $getBgElements as $element ) {
					if($element){
						$excludedBgOverlay[] = trim($element);
					}
					
				}
			}

			$ifBgOverlay  = Helper::getOptionData('apply_bg_overlay');
			$darklup_js = [
                'primary_bg' => $bgColor,
                'secondary_bg' => $bgSecondaryColor,
                'tertiary_bg' => $bgTertiary,
                'bg_image_dark_opacity' => '0.5',
				'exclude_element' => $excludedElemetns,
				'apply_bg_overlay' => $ifBgOverlay,
				'exclude_bg_overlay' => $excludedBgOverlay,
            ];
            wp_localize_script($colorMode, 'DarklupJs', $darklup_js);

			wp_enqueue_script('jquery-ui-draggable');
			wp_enqueue_script( 'jquery-ui-touch-punch', DARKLUP_DIR_URL.'assets/js/jquery-ui-touch-punch.min.js', array('jquery', 'jquery-ui-draggable'), DARKLUP_VERSION, true );
			wp_enqueue_script( 'darklup', DARKLUP_DIR_URL.'assets/js/darklup.js', array('jquery', 'jquery-ui-draggable', 'jquery-ui-touch-punch'), DARKLUP_VERSION, true );
			
			$siteLogo = Helper::getSiteLogo();
			$frontendObject = array(
				'ajaxUrl' 	  	=> admin_url( 'admin-ajax.php' ),
				'sitelogo' 		=> Helper::getSiteLogo(),
				'lightlogo' 	=> $siteLogo['light'],
				'darklogo' 		=> $siteLogo['dark'],
				'darkenLevel' 	=> $darkenLevel,
				'darkimages' 	=> Helper::getDarkImages(),
				'timeBasedMode' => Helper::darkmodeTimeMaping(),
				'security' => wp_create_nonce('darklup_analytics_hashkey'),
				'time_based_mode_active' => Helper::getOptionData('time_based_darkmode'),
				'time_based_mode_start_time' => Helper::getOptionData('mode_start_time'),
				'time_based_mode_end_time' => Helper::getOptionData('mode_end_time'),
			);

			wp_localize_script( $colorMode, 'frontendObject', $frontendObject);
		}

        public static function addDarklupJSWithDynamicVersion($handle = 'darklup_dynamic', $src = 'assets/es-js/index.js', $dep = NULL, $js_footer = false)
        {
            $dirFull = DARKLUP_DIR_PATH . $src;
            $uriFull = DARKLUP_DIR_URL . $src;
            $version = date("1.0.ymdGis", filemtime( $dirFull ));
            wp_enqueue_script( $handle, $uriFull, $dep, $version , $js_footer );	
        }

        public function deferScriptInHead($tag, $handle)
        {
            if (!is_admin()) {
                if ($handle == 'darklup_dynamic') {
                    $tag = str_replace('></script>', ' defer></script>', $tag);
                }
            }
            return $tag;
        }
		

	}

	// Init Darklup_Enqueue
	$obj = new Darklup_Enqueue();
}