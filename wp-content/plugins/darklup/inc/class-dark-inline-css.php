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

/**
 * Dark_Inline_CSS class
 */
class Dark_Inline_CSS {

	/**
	 * Dark_Inline_CSS constructor
	 * @since  1.0.0
	 * @return void
	 */
	function __construct() {
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueueStyle' ] );
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'adminEnqueueStyle' ] );
	}

	/**
	 * Admin enqueue style
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public static function adminEnqueueStyle() {

		$backendDarkmode = \Darklup\Helper::getOptionData('backend_darkmode');
		if( !$backendDarkmode ) {
			return;
		}
		wp_enqueue_style( 'darklup-dark-style', DARKLUP_DIR_URL.'assets/css/dark-style.css' );
		self::adminAddStyle();
	}

	/**
	 * Enqueue style
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public static function enqueueStyle() {
		wp_enqueue_style( 'darklup-dark-style', DARKLUP_DIR_URL.'assets/css/dark-style.css' );
		self::addStyle();
	}
	/**
	 * Add Front-End inline css
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public static function addStyle() {
		$css  = self::inlineCss();
		$js  = self::inlineJs();
		wp_add_inline_style( 'darklup-dark-style', $css );
		wp_add_inline_script( 'jquery', $js );
	}
	/**
	 *
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public static function adminAddStyle() {
		$css  = self::adminInlineCss();
        $js  = self::inlineAdminJs();
		wp_add_inline_style( 'darklup-dark-style', $css );
        wp_add_inline_script( 'jquery', $js );
	}


    public static function inlineAdminJs() {
        $inline_js = "";
        $backendDarkModeSettingsEnabled  = \Darklup\Helper::getOptionData('backend_darkmode');
        if( $backendDarkModeSettingsEnabled ) {
            $inline_js .= "let isBackendDarkModeSettingsEnabled = true;";
        }else{
            $inline_js .= "let isBackendDarkModeSettingsEnabled = false;";
        }
        return $inline_js;
    }
	public static function inlineJs() {
        $enableOS  = \Darklup\Helper::getOptionData('enable_os_switcher');
        $defaultDarkMode  = \Darklup\Helper::getOptionData('default_dark_mode');
        $enableKeyboardShortcut  = \Darklup\Helper::getOptionData('keyboard_shortcut');

        $inline_js = "";

        if( $enableOS ) {
            $inline_js .= "let isOSDarkModeEnabled = true;";
        }else{
            $inline_js .= "let isOSDarkModeEnabled = false;";
        }

        if( $defaultDarkMode ) {
            $inline_js .= "let isDefaultDarkModeEnabled = true;";
        }else{
            $inline_js .= "let isDefaultDarkModeEnabled = false;";
        }

        if( $enableKeyboardShortcut ) {
            $inline_js .= "let isKeyShortDarkModeEnabled = true;";
        }else{
            $inline_js .= "let isKeyShortDarkModeEnabled = false;";
        }

        return $inline_js;
    }

    public static function calculateSwitchMargin($switchMarginUnit, $switchStyle, $switchPosition, $marginType, $marginValue){

	    $updatedMarginValue = empty($marginValue) ? $marginValue."px" : ( ($switchMarginUnit == "percent") ? $marginValue."%" : $marginValue."px" );

	    if(empty($marginValue)){

	        if($switchPosition == "top_right" && $marginType == "switch_top_margin"){
                $updatedMarginValue = "38px";
            }else if($switchPosition == "top_right" && $marginType == "switch_right_margin"){
                $updatedMarginValue = "20px";
            }else if($switchPosition == "top_left" && $marginType == "switch_top_margin"){
                $updatedMarginValue = "38px";
            }else if($switchPosition == "top_left" && $marginType == "switch_left_margin"){
                $updatedMarginValue = "20px";
            }else if($switchPosition == "bottom_right" && $marginType == "switch_bottom_margin"){
                $updatedMarginValue = "20px";
            }else if($switchPosition == "bottom_right" && $marginType == "switch_right_margin"){
                $updatedMarginValue = "20px";
            }else if($switchPosition == "bottom_left" && $marginType == "switch_bottom_margin"){
                $updatedMarginValue = "10px";
            }else if($switchPosition == "bottom_left" && $marginType == "switch_left_margin"){
                $updatedMarginValue = "20px";
            }else{
                $updatedMarginValue = "none";
            }

	        /* For Switch Style 12 */
            if($switchStyle == "12"){
                if($switchPosition == "top_right" && $marginType == "switch_right_margin"){
                    $updatedMarginValue = "-10px";
                }else if($switchPosition == "top_left" && $marginType == "switch_left_margin"){
                    $updatedMarginValue = "-10px";
                }else if($switchPosition == "bottom_right" && $marginType == "switch_right_margin"){
                    $updatedMarginValue = "-10px";
                }else if($switchPosition == "bottom_left" && $marginType == "switch_left_margin"){
                    $updatedMarginValue = "-10px";
                }
            }

        }

	    return $updatedMarginValue;
    }

    public static function defaultSwitchColors($switchStyle){
        $colors = array();
        $colors['custom_switch_bg_color'] = "#3700B3";
        $colors['custom_switch_icon_color'] = "#ffffff";
        $colors['custom_switch_icon_plate_color'] = "#3700B3";
        $colors['custom_switch_text_color'] = "#ffffff";
        $colors['custom_switch_border_color'] = "#3700B3";
        $colors['custom_switch_active_bg_color'] = "#3b3b3b";
        $colors['custom_switch_active_icon_color'] = "#ffffff";
        $colors['custom_switch_bg_color_on_dark'] = "#1B171C";
        $colors['custom_switch_text_color_on_dark'] = "#ffffff";
        $colors['custom_switch_icon_plate_color_on_dark'] = "#3700B3";
        $colors['custom_switch_border_color_on_dark'] = "#3700B3";
        $colors['custom_switch_icon_color_on_dark'] = "#ffffff";

        if($switchStyle == "2"){
            $colors['custom_switch_bg_color'] = "#03DAC5";
        }
        if($switchStyle == "3"){
            $colors['custom_switch_icon_plate_color'] = "#ffffff";
        }
        if($switchStyle == "4"){
            $colors['custom_switch_bg_color'] = "#E8E8E8";
            $colors['custom_switch_icon_plate_color'] = "#ffffff";
            $colors['custom_switch_text_color'] = "#444444";
        }
        if($switchStyle == "5"){
            $colors['custom_switch_bg_color'] = "#E8E8E8";
            $colors['custom_switch_icon_color'] = "#1B171C";
            $colors['custom_switch_icon_plate_color'] = "#ffffff";
            $colors['custom_switch_text_color'] = "#1B171C";
        }
        if($switchStyle == "6"){
            $colors['custom_switch_icon_color'] = "#1B171C";
            $colors['custom_switch_icon_plate_color'] = "#ffffff";
        }
        if($switchStyle == "6"){
            $colors['custom_switch_icon_color'] = "#1B171C";
            $colors['custom_switch_icon_plate_color'] = "#ffffff";
        }
        if($switchStyle == "7"){
            $colors['custom_switch_bg_color'] = "#3D00C5";
            $colors['custom_switch_icon_color'] = "#F6DE3D";
            $colors['custom_switch_icon_plate_color'] = "#ffffff";
            $colors['custom_switch_border_color'] = "#3700B3";

            $colors['custom_switch_bg_color_on_dark'] = "#242424";
            $colors['custom_switch_icon_plate_color_on_dark'] = "#000000";
            $colors['custom_switch_border_color_on_dark'] = "#3A3A3A";
        }
        if($switchStyle == "8"){
            $colors['custom_switch_bg_color_on_dark'] = "#3700B3";
        }

        if($switchStyle == "9"){
            $colors['custom_switch_bg_color_on_dark'] = "#3700B3";
        }
        if($switchStyle == "10"){
            $colors['custom_switch_bg_color'] = "#000000";
            $colors['custom_switch_bg_color_on_dark'] = "#444444";
        }
        if($switchStyle == "11"){
            $colors['custom_switch_icon_color'] = "#000000";
        }
        if($switchStyle == "12"){
            $colors['custom_switch_bg_color'] = "#ffffff";
            $colors['custom_switch_icon_color'] = "#3b3b3b";
            $colors['custom_switch_border_color'] = "#3b3b3b";
        }
        if($switchStyle == "13"){
            $colors['custom_switch_icon_plate_color'] = "#ffffff";
        }
        if($switchStyle == "15"){
            $colors['custom_switch_bg_color'] = "#1a1a1a";
            $colors['custom_switch_bg_color_on_dark'] = "#1a1a1a";
            $colors['custom_switch_icon_color'] = "#ffa41b";
        }
        return $colors;
    }

	public static function inlineCss() {

		$presetEnabled = \Darklup\Helper::getOptionData('color_preset_enabled');
		$customEnabled = \Darklup\Helper::getOptionData('custom_color_enabled');
		$enableOS  = \Darklup\Helper::getOptionData('enable_os_switcher');
		$includeElement  = \Darklup\Helper::getOptionData('include_element');
		$excludeElement  = \Darklup\Helper::getOptionData('exclude_element');
        $accessibilityZoomLevel  = \Darklup\Helper::getOptionData('accessibility_zoom_level');

		$lightText = \Darklup\Helper::getOptionData('switch_text_light');
		$lightText = !empty( $lightText ) ? $lightText : esc_html__( 'Light', 'darklup' );
		$darkText  = \Darklup\Helper::getOptionData('switch_text_dark');
		$darkText  = !empty( $darkText ) ? $darkText : esc_html__( 'Dark', 'darklup' );
		$fontSize  = \Darklup\Helper::getOptionData('body_font_size');

        $darklup_image_effects  = \Darklup\Helper::getOptionData('darklup_image_effects');
        $darklup_image_effects = !empty($darklup_image_effects) ? $darklup_image_effects : 'no';

        $imgGrayscale  = \Darklup\Helper::getOptionData('image_grayscale');
        $imgGrayscale  = !empty($imgGrayscale) ? $imgGrayscale : '0';
        $imgBrightness = \Darklup\Helper::getOptionData('image_brightness');
        $imgBrightness = !empty($imgBrightness) ? $imgBrightness : '1';
        $imgContrast   = \Darklup\Helper::getOptionData('image_contrast');
        $imgContrast   = !empty($imgContrast ) ? $imgContrast  : '1';
        $imgOpacity    = \Darklup\Helper::getOptionData('image_opacity');
        $imgOpacity    = !empty($imgOpacity ) ? $imgOpacity  : '1';
        $imgSepia      = \Darklup\Helper::getOptionData('image_sepia');
        $imgSepia      = !empty($imgSepia ) ? $imgSepia  : '0';


		$topMargin 	  = \Darklup\Helper::getOptionData('switch_top_margin');
		$bottomMargin = \Darklup\Helper::getOptionData('switch_bottom_margin');
		$leftMargin   = \Darklup\Helper::getOptionData('switch_left_margin');
		$rightMargin  = \Darklup\Helper::getOptionData('switch_right_margin');

        $switchPosition 	  = \Darklup\Helper::getOptionData('switch_position');
        $switchStyle 	  = \Darklup\Helper::getOptionData('switch_style');
        $switchMarginUnit 	  = \Darklup\Helper::getOptionData('switch_margin_unit');

		$topMargin = self::calculateSwitchMargin($switchMarginUnit, $switchStyle, $switchPosition, 'switch_top_margin', $topMargin);
        $bottomMargin = self::calculateSwitchMargin($switchMarginUnit, $switchStyle, $switchPosition, 'switch_bottom_margin', $bottomMargin);
        $leftMargin = self::calculateSwitchMargin($switchMarginUnit, $switchStyle, $switchPosition, 'switch_left_margin', $leftMargin);
        $rightMargin = self::calculateSwitchMargin($switchMarginUnit, $switchStyle, $switchPosition, 'switch_right_margin', $rightMargin);

        $switch_menu_top_margin = \Darklup\Helper::getOptionData('switch_menu_top_margin');
		$switch_menu_bottom_margin = \Darklup\Helper::getOptionData('switch_menu_bottom_margin');
		$switch_menu_left_margin = \Darklup\Helper::getOptionData('switch_menu_left_margin');
		$switch_menu_right_margin = \Darklup\Helper::getOptionData('switch_menu_right_margin');


        $customSwitchColorEnabled = Helper::getOptionData('custom_switch_color_enabled');
        if( !empty( $customSwitchColorEnabled ) && $customSwitchColorEnabled == 'yes') {
            $customSwitchBgColor = Helper::getOptionData('custom_switch_bg_color');
            $customSwitchIconColor = Helper::getOptionData('custom_switch_icon_color');
            $customSwitchIconPlateColor = Helper::getOptionData('custom_switch_icon_plate_color');
            $customSwitchTextColor = Helper::getOptionData('custom_switch_text_color');
            $customSwitchBorderColor = Helper::getOptionData('custom_switch_border_color');
            $customSwitchActiveBGColor = Helper::getOptionData('custom_switch_active_bg_color');
            $customSwitchActiveIconColor = Helper::getOptionData('custom_switch_active_icon_color');
            $customSwitchBgColorOnDark = Helper::getOptionData('custom_switch_bg_color_on_dark');
            $customSwitchTextColorOnDark = Helper::getOptionData('custom_switch_text_color_on_dark');
            $customSwitchIconPlateColorOnDark = Helper::getOptionData('custom_switch_icon_plate_color_on_dark');
            $customSwitchBorderColorOnDark = Helper::getOptionData('custom_switch_border_color_on_dark');
            $customSwitchIconColorOnDark = Helper::getOptionData('custom_switch_icon_color_on_dark');
		}else{
            $defaultSwitchColors = self::defaultSwitchColors($switchStyle);
            $customSwitchBgColor = $defaultSwitchColors['custom_switch_bg_color'];
            $customSwitchIconColor = $defaultSwitchColors['custom_switch_icon_color'];
            $customSwitchIconPlateColor = $defaultSwitchColors['custom_switch_icon_plate_color'];
            $customSwitchTextColor = $defaultSwitchColors['custom_switch_text_color'];
            $customSwitchBorderColor = $defaultSwitchColors['custom_switch_border_color'];
            $customSwitchActiveBGColor = $defaultSwitchColors['custom_switch_active_bg_color'];
            $customSwitchActiveIconColor = $defaultSwitchColors['custom_switch_active_icon_color'];
            $customSwitchBgColorOnDark = $defaultSwitchColors['custom_switch_bg_color_on_dark'];
            $customSwitchTextColorOnDark = $defaultSwitchColors['custom_switch_text_color_on_dark'];
            $customSwitchIconPlateColorOnDark = $defaultSwitchColors['custom_switch_icon_plate_color_on_dark'];
            $customSwitchBorderColorOnDark = $defaultSwitchColors['custom_switch_border_color_on_dark'];
            $customSwitchIconColorOnDark = $defaultSwitchColors['custom_switch_icon_color_on_dark'];
        }

        if(Helper::is_real_color(Helper::getOptionData('custom_switch_bg_color'))){
            $customSwitchBgColor = Helper::getOptionData('custom_switch_bg_color');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_icon_color'))){
            $customSwitchIconColor = Helper::getOptionData('custom_switch_icon_color');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_icon_plate_color'))){
            $customSwitchIconPlateColor = Helper::getOptionData('custom_switch_icon_plate_color');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_text_color'))){
            $customSwitchTextColor = Helper::getOptionData('custom_switch_text_color');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_border_color'))){
            $customSwitchBorderColor = Helper::getOptionData('custom_switch_border_color');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_active_bg_color'))){
            $customSwitchActiveBGColor = Helper::getOptionData('custom_switch_active_bg_color');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_active_icon_color'))){
            $customSwitchActiveIconColor = Helper::getOptionData('custom_switch_active_icon_color');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_bg_color_on_dark'))){
            $customSwitchBgColorOnDark = Helper::getOptionData('custom_switch_bg_color_on_dark');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_text_color_on_dark'))){
            $customSwitchTextColorOnDark = Helper::getOptionData('custom_switch_text_color_on_dark');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_icon_plate_color_on_dark'))){
            $customSwitchIconPlateColorOnDark = Helper::getOptionData('custom_switch_icon_plate_color_on_dark');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_border_color_on_dark'))){
            $customSwitchBorderColorOnDark = Helper::getOptionData('custom_switch_border_color_on_dark');
        }
        if(Helper::is_real_color(Helper::getOptionData('custom_switch_icon_color_on_dark'))){
            $customSwitchIconColorOnDark = Helper::getOptionData('custom_switch_icon_color_on_dark');
        }

        $switch_size_base_width = "100";
        $switch_size_base_height = "40";
        $switch_size_icon_width = "30";
        $switch_size_icon_height = "30";

        $switch_size_base_width = \Darklup\Helper::getOptionData('switch_size_base_width');
        $switch_size_base_height = \Darklup\Helper::getOptionData('switch_size_base_height');
        $switch_size_base_width =  empty( $switch_size_base_width) ? "100" : $switch_size_base_width;
        $switch_size_base_height =  empty( $switch_size_base_height) ? "40" : $switch_size_base_height;


        // Switch button Icon width and height for desktop
        $switch_icon_size_width_height = '';
        $switch_size_icon_width = \Darklup\Helper::getOptionData('floating_switch_icon_width');
        $switch_size_icon_height = \Darklup\Helper::getOptionData('floating_switch_icon_height');
        if(!empty( $switch_size_icon_width)){
            $switch_icon_size_width_height .= "--darklupl-btn-icon-width: {$switch_size_icon_width}px;";
        }
        if(!empty( $switch_size_icon_height)){
            $switch_icon_size_width_height .= "--darklupl-btn-icon-height: {$switch_size_icon_height}px;";
        }


        $tooltipEnabled = \Darklup\Helper::getOptionData('darklup_show_tooltip');
        if( !empty( $tooltipEnabled ) && $tooltipEnabled == 'yes') {
            $customSwitchToolTipBgColor = \Darklup\Helper::getOptionData('tooltip_bg_color');
            $customSwitchToolTipTextColor = \Darklup\Helper::getOptionData('tooltip_text_color');

            if( empty( $customSwitchToolTipBgColor) ){
                $customSwitchToolTipBgColor = "#0a2457";
            }
            if( empty( $customSwitchToolTipTextColor) ){
                $customSwitchToolTipTextColor = "#ffffff";
            }
        }else{
            $customSwitchToolTipBgColor = "#0a2457";
            $customSwitchToolTipTextColor = "#ffffff";
        }


        $allowedElement = '';
        if( !empty( $includeElement ) ) {

            $getIncludedElements = explode( ',', $includeElement );

            if( !empty( $getIncludedElements ) ) {
                foreach( $getIncludedElements as $element ) {
                    $allowedElement .= 'html.darklup-dark-mode-enabled '.trim($element).' *,';
                }
                if(!empty($allowedElement)){
                    $allowedElement = substr($allowedElement, 0, -1);
                }
            }

        }

		//
		$notElement = '';
		if( !empty( $excludeElement ) ) {

		$getElements = explode( ',', $excludeElement );

        // var_dump($getElements);

		if( !empty( $getElements ) ) {
			foreach( $getElements as $element ) {
				$notElement .= ':not('.trim($element).')'.':not('.trim($element).' *)';
			}
		}

		}


        $zoomLevel = '100';
        $zoomResolveLevel = 100;
        if( !empty( $accessibilityZoomLevel ) ) {
            $zoomLevel = esc_html($accessibilityZoomLevel);
            $zoomResolveLevel = (100 / ($zoomLevel / 100));
        }

		if( !empty( $presetEnabled ) && $presetEnabled == 'yes' && 'yes' != $customEnabled ) {

			// Preset Color

			$colorPreset = \Darklup\Helper::getOptionData('color_preset');
			$presetColor =  \Darklup\Color_Preset::getColorPreset( $colorPreset );

			$bgColor 	 = esc_html( $presetColor['background-color'] );
			$color 		 = esc_html( $presetColor['color'] );
			$anchorColor = esc_html( $presetColor['anchor-color'] );
			$anchorHoverColor = esc_html( $presetColor['anchor-hover-color'] );
			$inputBgColor = esc_html( $presetColor['input-bg-color'] );
			$borderColor  = esc_html( $presetColor['border-color'] );
			$btnBgColor   = esc_html( $presetColor['btn-bg-color'] );
			$btnColor 	  = esc_html( $presetColor['color'] );

		} else {

			if( !empty( $customEnabled ) && $customEnabled == 'yes' ) {

				$customColor =  \Darklup\Color_Preset::CustomColor();

				$bgColor 	 = esc_html( $customColor['background-color'] );
				$color 		 = esc_html( $customColor['color'] );
				$anchorColor = esc_html( $customColor['anchor-color'] );
				$anchorHoverColor = esc_html( $customColor['anchor-hover-color'] );
				$inputBgColor = esc_html( $customColor['input-bg-color'] );
				$borderColor  = esc_html( $customColor['border-color'] );
				$btnBgColor   = esc_html( $customColor['btn-bg-color'] );
				$btnColor 	  = esc_html( $customColor['color'] );

			}else{
                $colorPreset = \Darklup\Helper::getOptionData('color_preset');
                $presetColor =  \Darklup\Color_Preset::getColorPreset( $colorPreset );

                $bgColor 	 = esc_html( $presetColor['background-color'] );
                $color 		 = esc_html( $presetColor['color'] );
                $anchorColor = esc_html( $presetColor['anchor-color'] );
                $anchorHoverColor = esc_html( $presetColor['anchor-hover-color'] );
                $inputBgColor = esc_html( $presetColor['input-bg-color'] );
                $borderColor  = esc_html( $presetColor['border-color'] );
                $btnBgColor   = esc_html( $presetColor['btn-bg-color'] );
                $btnColor 	  = esc_html( $presetColor['color'] );
            }

		}
        


        $bgSecondaryColor = esc_html($presetColor['secondary_bg']);
        $bgTertiary = esc_html($presetColor['tertiary_bg']);
        

        $imgFilter = '';
        $bgImgFilter = '';
        $inlineSvgFilter = '';

        $customBg = Helper::getOptionData('custom_bg_color');
        $customBg = Helper::is_real_color($customBg);
        if($customBg) $bgColor = $customBg;

        $customSecondaryBg = Helper::getOptionData('custom_secondary_bg_color');
        $customSecondaryBg = Helper::is_real_color($customSecondaryBg);
        if($customSecondaryBg) $bgSecondaryColor = $customSecondaryBg;
        
        $customTertiaryBg = Helper::getOptionData('custom_tertiary_bg_color');
        $customTertiaryBg = Helper::is_real_color($customTertiaryBg);
        if($customTertiaryBg) $bgTertiary = $customTertiaryBg;
        
        $customColor = Helper::getOptionData('custom_text_color');
        $customColor = Helper::is_real_color($customColor);
        if($customColor) $color = $customColor;

        $customAnchorColor = Helper::getOptionData('custom_link_color');
        $customAnchorColor = Helper::is_real_color($customAnchorColor);
        if($customAnchorColor) $anchorColor = $customAnchorColor;

        $customAnchorHoverColor = Helper::getOptionData('custom_link_hover_color');
        $customAnchorHoverColor = Helper::is_real_color($customAnchorHoverColor);
        if($customAnchorHoverColor) $anchorHoverColor = $customAnchorHoverColor;

        $customBorderColor = Helper::getOptionData('custom_border_color');
        $customBorderColor = Helper::is_real_color($customBorderColor);
        if($customBorderColor) $borderColor = $customBorderColor;

        $customBtnBgColor = Helper::getOptionData('custom_btn_bg_color');
        $customBtnBgColor = Helper::is_real_color($customBtnBgColor);
        if($customBtnBgColor) $btnBgColor = $customBtnBgColor;

        $customBtnTextColor = Helper::getOptionData('custom_btn_text_color');
        $customBtnTextColor = Helper::is_real_color($customBtnTextColor);
        if($customBtnTextColor) $btnColor = $customBtnTextColor;
        
        $customInputBgColor = Helper::getOptionData('custom_input_bg_color');
        $customInputBgColor = Helper::is_real_color($customInputBgColor);
        if($customInputBgColor) $inputBgColor = $customInputBgColor;


		// large: 120, Extra Large 150

        $inlinecss = "

        :root {
            --wpc-darklup--bg: $bgColor;
            --wpc-darklup--secondary-bg: $bgSecondaryColor;
            --wpc-darklup--tertiary-bg: $bgTertiary;
            --wpc-darklup--text-color: $color;
            --wpc-darklup--link-color: $anchorColor;
            --wpc-darklup--link-hover-color: $anchorHoverColor;
            --wpc-darklup--input-bg: $inputBgColor;
            --wpc-darklup--input-text-color: $color;
            --wpc-darklup--input-placeholder-color: $color;
            --wpc-darklup--border-color: $borderColor;
            --wpc-darklup--btn-bg: $btnBgColor;
            --wpc-darklup--btn-text-color: $btnColor;
            --wpc-darklup--img-filter: $imgFilter;
            --wpc-darklup--bg-img-filter: $bgImgFilter;
            --wpc-darklup--svg-filter: $inlineSvgFilter;
            --darkluplite-btn-width: {$switch_size_base_width}px;
            --darkluplite-btn-height: {$switch_size_base_height}px;
            {$switch_icon_size_width_height}
        }

        html.darklup-font-mode-enabled body > :not(.darklup-mode-switcher):not(.darklup-dark-ignore){
            -moz-transform: scale({$zoomLevel}%);
            -moz-transform-origin: 0 0;
            zoom: {$zoomLevel}%;
        }

        @-moz-document url-prefix() {
            html.darklup-font-mode-enabled body > :not(.darklup-mode-switcher):not(.darklup-dark-ignore){
                width: {$zoomResolveLevel}%;
            }
        }
		html.darklup-dark-mode-enabled body {
			font-size: {$fontSize}px;
		}
		
        ";

		if($darklup_image_effects == "yes"){
            $inlinecss .= "html.darklup-dark-mode-enabled img{$notElement} {
                                filter: grayscale({$imgGrayscale}) opacity({$imgOpacity}) sepia({$imgSepia}) brightness({$imgBrightness}) contrast({$imgContrast}) !important;
                            }";
        }
        
        $allowedElement = '';
        if( !empty( $includeElement ) ) {

            $getIncludedElements = explode( ',', $includeElement );

            if( !empty( $getIncludedElements ) ) {
                foreach( $getIncludedElements as $element ) {
                    $allowedElement .= "
                    html.darklup-dark-mode-enabled ".trim($element)." :not(.darklup-dark-ignore):not(input):not(textarea):not(button):not(select):not(mark):not(code):not(pre):not(ins):not(option):not(img):not(progress):not(iframe):not(.mejs-iframe-overlay):not(svg):not(video):not(canvas):not(a):not(path):not(.elementor-element-overlay):not(.elementor-background-overlay):not(i):not(button *):not(a){$notElement} {
                        color: {$color} !important;
                        background-color: {$bgColor} !important;
                        border-color: {$borderColor}!important;
                    }
                    html.darklup-dark-mode-enabled ".trim($element)." a{
                      color: {$anchorColor} !important;
                    }
                    
                    html.darklup-dark-mode-enabled ".trim($element)." a:hover {
                        color: {$anchorHoverColor} !important;
                    }
                    ";
                }
            }

        }


        if(!empty($allowedElement)){
            $inlinecss = $allowedElement;
        }

        $inlinecss .= "
        
        :root {
          --darklup-btn-width: {$switch_size_base_width}px;
          --darklup-btn-height: {$switch_size_base_height}px;
        }
        
		.darklup-switch.style4 .toggle-btn span:nth-child(1):after, .darklup-switch.style4 .left-placeholder span:after,
		.darklup-switch.style5 .right-placeholder span:after,
		.darklup-switch.style6 .toggle-checkbox:checked~.right-placeholder span:after,
		.darklup-switch.style7 .toggle-checkbox:checked~.right-placeholder span:after{
            content: '{$lightText}';
        }
        .darklup-switch.style4 .toggle-btn span:nth-child(2):after, .darklup-switch.style4 .right-placeholder span:after,
        .darklup-switch.style5 .toggle-checkbox:checked~.right-placeholder span:after,
        .darklup-switch.style6 .right-placeholder span:after,
        .darklup-switch.style7 .right-placeholder span:after{
            content: '{$darkText}';
        }
		.darklup-mode-switcher {
			top: {$topMargin};
			bottom: {$bottomMargin};
			left: {$leftMargin};
			right: {$rightMargin};
		}

		
		.darklup-switch.style1, .darklup-switch.style2, .darklup-switch.style3, .darklup-switch.style4,
		.darklup-switch.style5, .darklup-switch.style6, .darklup-switch.style7, .darklup-square-switch.style8,
		.darklup-square-switch.style9, .darklup-square-switch.style10, .darklup-accessibility-switch.style12,
		.darklup-switch.style13, .darklup-square-switch.style14,
		.darklup-switch.style15, .darklup-switch.style15 .toggle-btn::after{
		    background:{$customSwitchBgColor} !important;
		}
		.darklup-switch.style7,
		.darklup-accessibility-switch.style12.darkBtn, .darklup-accessibility-switch.style12.textBtn{
		    border-color:{$customSwitchBorderColor} !important;
		}
		html.darklup-dark-mode-enabled .darklup-switch.style7{
		    border-color:{$customSwitchBorderColorOnDark} !important;
		}
		html.darklup-dark-mode-enabled .darklup-switch.style5, html.darklup-dark-mode-enabled .darklup-switch.style7,
		html.darklup-dark-mode-enabled .darklup-square-switch.style8, html.darklup-dark-mode-enabled .darklup-square-switch.style9,
		html.darklup-dark-mode-enabled .darklup-square-switch.style10,
		html.darklup-dark-mode-enabled .darklup-switch.style15, html.darklup-dark-mode-enabled .darklup-switch.style15 .toggle-btn::after{
		    background:{$customSwitchBgColorOnDark} !important;
		}
		.darklup-switch.style1 .toggle-btn svg #style-1-light, .darklup-switch.style2 .toggle-btn svg #style-2-light,
		.darklup-switch.style5 .toggle-btn svg #style-5-light, .darklup-switch.style6 .toggle-btn svg #style-6-light,
		.darklup-switch.style7 .toggle-btn svg #style-7-light, .darklup-square-switch.style8 .toggle-btn svg #style-8-light,
		.darklup-square-switch.style9 .toggle-btn svg #style-9-light, .darklup-square-switch.style10 .toggle-btn svg #style-10-light,
		.darklup-square-switch.style11 .toggle-btn svg #style-11-light, .darklup-accessibility-switch.style12 .toggle-btn svg #style-12-light,
		.darklup-switch.style13 .left-placeholder svg #style-13-light, .darklup-switch.style13 .right-placeholder svg #style-13-light,
		.darklup-square-switch.style14 .toggle-btn svg #style-14-light{
            fill: {$customSwitchIconColor} !important;
        }
        .darklup-switch.style15 .toggle-btn:before{
            background: {$customSwitchIconColor} !important;
        }
        .darklup-square-switch.style10 .toggle-btn svg #style-10-light-stroke, .darklup-accessibility-switch.style12 .toggle-btn svg #style-12-light-stroke{
            stroke: {$customSwitchIconColor} !important;
        }
        html.darklup-dark-mode-enabled .darklup-square-switch.style8 .toggle-btn svg #style-8-light,
        html.darklup-dark-mode-enabled .darklup-square-switch.style9 .toggle-btn svg #style-9-light,
        html.darklup-dark-mode-enabled .darklup-square-switch.style10 .toggle-btn svg #style-10-light,
        html.darklup-dark-mode-enabled .darklup-square-switch.style11 .toggle-btn svg #style-11-light{
            fill: {$customSwitchIconColorOnDark} !important;
        }
        html.darklup-dark-mode-enabled .darklup-switch.style15 .toggle-checkbox:checked + .toggle-btn::before{
            background: {$customSwitchIconColorOnDark} !important;
        }
        html.darklup-dark-mode-enabled .darklup-square-switch.style10 .toggle-btn svg #style-10-light-stroke{
            stroke: {$customSwitchIconColorOnDark} !important;
        }
        .darklup-switch.style4 .toggle-btn span, .darklup-switch.style4 .right-placeholder span, .darklup-switch.style4 .left-placeholder span,
        .darklup-switch.style5 .right-placeholder span, .darklup-switch.style6 .right-placeholder span, .darklup-switch.style7 .right-placeholder span{
            color: {$customSwitchTextColor} !important;
        }
        html.darklup-dark-mode-enabled .darklup-switch.style5 .right-placeholder span,
        html.darklup-dark-mode-enabled .darklup-switch.style7 .right-placeholder span{
            color: {$customSwitchTextColorOnDark} !important;
        }
        .darklup-switch.style2 .toggle-btn .plate, .darklup-switch.style3 .toggle-btn .plate,
        .darklup-switch.style4 .toggle-btn .plate, .darklup-switch.style5 .toggle-btn .plate,
        .darklup-switch.style6 .toggle-btn .plate, .darklup-switch.style7 .toggle-btn .plate,
        .darklup-switch.style13 .toggle-btn{
            background:{$customSwitchIconPlateColor} !important;
        }
        html.darklup-dark-mode-enabled .darklup-switch.style7 .toggle-btn .plate{
            background:{$customSwitchIconPlateColorOnDark} !important;
        }
        html.darklup-dark-mode-enabled .darklup-accessibility-switch.style12.darkBtn, html.darklup-font-mode-enabled .darklup-accessibility-switch.style12.textBtn{
            background: {$customSwitchActiveBGColor} !important;
        }
        html.darklup-dark-mode-enabled .darklup-accessibility-switch.style12.darkBtn #style-12-light, html.darklup-font-mode-enabled .darklup-accessibility-switch.style12.textBtn #style-12-light{
            fill: {$customSwitchActiveIconColor} !important;
        }
        html.darklup-dark-mode-enabled .darklup-accessibility-switch.style12.darkBtn #style-12-light-stroke, html.darklup-font-mode-enabled .darklup-accessibility-switch.style12.textBtn{
            stroke: {$customSwitchActiveIconColor} !important;
        }
        

        [darklup-data-tooltip]:before {
            background-color: {$customSwitchToolTipBgColor} !important;
        }
        [darklup-data-tooltip]:after {
            border-color: {$customSwitchToolTipBgColor} transparent transparent transparent !important;
        }
        [darklup-data-tooltip-location=\"left\"]:after {
            border-color: transparent transparent transparent {$customSwitchToolTipBgColor} !important;
        }
        [darklup-data-tooltip-location=\"right\"]:after {
            border-color: transparent {$customSwitchToolTipBgColor} transparent transparent !important;
        }
        [darklup-data-tooltip]:before {
          color: {$customSwitchToolTipTextColor} !important;
        }
        
		li.darklup-menu-switch label {
			margin-top:{$switch_menu_top_margin}px;
			margin-bottom:{$switch_menu_bottom_margin}px;
			margin-left:{$switch_menu_left_margin}px;
			margin-right:{$switch_menu_right_margin}px;
		}
		";


		return $inlinecss;
	}

	/**
	 * Admin inline css
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public static function adminInlineCss() {

		$presetEnabled = \Darklup\Helper::getOptionData('admin_color_preset_enabled');
		$customEnabled = \Darklup\Helper::getOptionData('admin_custom_color_enabled');

        

        $imgGrayscale  = \Darklup\Helper::getOptionData('image_grayscale');
        $imgGrayscale  = !empty($imgGrayscale ) ? $imgGrayscale  : '0';
        $imgBrightness = \Darklup\Helper::getOptionData('image_brightness');
        $imgBrightness = !empty($imgBrightness ) ? $imgBrightness  : '1';
        $imgContrast   = \Darklup\Helper::getOptionData('image_contrast');
        $imgContrast   = !empty($imgContrast) ? $imgContrast : '1';
        $imgOpacity    = \Darklup\Helper::getOptionData('image_opacity');
        $imgOpacity    = !empty( $imgOpacity) ?  $imgOpacity : '1';
        $imgSepia      = \Darklup\Helper::getOptionData('image_sepia');  
        $imgSepia      = !empty($imgSepia) ? $imgSepia : '0';

		if( !empty( $presetEnabled ) && $presetEnabled == 'yes' && 'yes' != $customEnabled ) {

			// Preset Color color_admin_preset
			$colorPreset = \Darklup\Helper::getOptionData('color_admin_preset');
			$presetColor =  \Darklup\Color_Preset::getColorPreset( $colorPreset );

			$bgColor 	 = esc_html( $presetColor['background-color'] );
			$color 		 = esc_html( $presetColor['color'] );
			$anchorColor = esc_html( $presetColor['anchor-color'] );
			$anchorHoverColor = esc_html( $presetColor['anchor-hover-color'] );
			$inputBgColor = esc_html( $presetColor['input-bg-color'] );
			$borderColor  = esc_html( $presetColor['border-color'] );
			$btnBgColor   = esc_html( $presetColor['btn-bg-color'] );
			$btnColor 	  = esc_html( $presetColor['color'] );

		} else {

			if( !empty( $customEnabled ) && $customEnabled == 'yes' ) {

				$customColor =  \Darklup\Color_Preset::AdminCustomColor();

				$bgColor 	 = esc_html( $customColor['background-color'] );
				$color 		 = esc_html( $customColor['color'] );
				$anchorColor = esc_html( $customColor['anchor-color'] );
				$anchorHoverColor = esc_html( $customColor['anchor-hover-color'] );
				$inputBgColor = esc_html( $customColor['input-bg-color'] );
				$borderColor  = esc_html( $customColor['border-color'] );
				$btnBgColor   = esc_html( $customColor['btn-bg-color'] );
				$btnColor 	  = esc_html( $customColor['color'] );

			}else{
                // Preset Color
                $colorPreset = \Darklup\Helper::getOptionData('color_admin_preset');
                $presetColor =  \Darklup\Color_Preset::getColorPreset( $colorPreset );

                $bgColor 	 = esc_html( $presetColor['background-color'] );
                $color 		 = esc_html( $presetColor['color'] );
                $anchorColor = esc_html( $presetColor['anchor-color'] );
                $anchorHoverColor = esc_html( $presetColor['anchor-hover-color'] );
                $inputBgColor = esc_html( $presetColor['input-bg-color'] );
                $borderColor  = esc_html( $presetColor['border-color'] );
                $btnBgColor   = esc_html( $presetColor['btn-bg-color'] );
                $btnColor 	  = esc_html( $presetColor['color'] );
            }

		}

        // Get extended colors
        $bgSecondaryColor = esc_html($presetColor['secondary_bg']);
        $bgTertiary = esc_html($presetColor['tertiary_bg']);
        
        $customBg = Helper::getOptionData('admin_custom_bg_color');
        $customBg = Helper::is_real_color($customBg);
        if($customBg) $bgColor = $customBg;

        $customSecondaryBg = Helper::getOptionData('admin_custom_secondary_bg_color');
        $customSecondaryBg = Helper::is_real_color($customSecondaryBg);
        if($customSecondaryBg) $bgSecondaryColor = $customSecondaryBg;
        
        $customTertiaryBg = Helper::getOptionData('admin_custom_tertiary_bg_color');
        $customTertiaryBg = Helper::is_real_color($customTertiaryBg);
        if($customTertiaryBg) $bgTertiary = $customTertiaryBg;
        
        $customColor = Helper::getOptionData('admin_custom_text_color');
        $customColor = Helper::is_real_color($customColor);
        if($customColor) $color = $customColor;

        $customAnchorColor = Helper::getOptionData('admin_custom_link_color');
        $customAnchorColor = Helper::is_real_color($customAnchorColor);
        if($customAnchorColor) $anchorColor = $customAnchorColor;

        $customAnchorHoverColor = Helper::getOptionData('admin_custom_link_hover_color');
        $customAnchorHoverColor = Helper::is_real_color($customAnchorHoverColor);
        if($customAnchorHoverColor) $anchorHoverColor = $customAnchorHoverColor;

        $customBorderColor = Helper::getOptionData('admin_custom_border_color');
        $customBorderColor = Helper::is_real_color($customBorderColor);
        if($customBorderColor) $borderColor = $customBorderColor;

        $customBtnBgColor = Helper::getOptionData('admin_custom_btn_bg_color');
        $customBtnBgColor = Helper::is_real_color($customBtnBgColor);
        if($customBtnBgColor) $btnBgColor = $customBtnBgColor;

        $customBtnTextColor = Helper::getOptionData('admin_custom_btn_text_color');
        $customBtnTextColor = Helper::is_real_color($customBtnTextColor);
        if($customBtnTextColor) $btnColor = $customBtnTextColor;
        
        $customInputBgColor = Helper::getOptionData('admin_custom_input_bg_color');
        $customInputBgColor = Helper::is_real_color($customInputBgColor);
        if($customInputBgColor) $inputBgColor = $customInputBgColor;




		$inlinecss = "

        :root {
            --wpc-darklup--bg: $bgColor;
            --wpc-darklup--secondary-bg: $bgSecondaryColor;
            --wpc-darklup--tertiary-bg: $bgTertiary;
            --wpc-darklup--text-color: $color;
            --wpc-darklup--link-color: $anchorColor;
            --wpc-darklup--link-hover-color: $anchorHoverColor;
            --wpc-darklup--input-bg: $inputBgColor;
            --wpc-darklup--input-text-color: $color;
            --wpc-darklup--input-placeholder-color: $color;
            --wpc-darklup--border-color: $borderColor;
            --wpc-darklup--btn-bg: $btnBgColor;
            --wpc-darklup--btn-text-color: $btnColor;
        }
		
        .darklup-image-effects-preview img{
            filter: grayscale({$imgGrayscale}) opacity({$imgOpacity}) sepia({$imgSepia}) brightness({$imgBrightness}) contrast({$imgContrast}) ;
        }

		";

		return $inlinecss;

	}


}

// Init Dark Inline CSS obj
new Dark_Inline_CSS();