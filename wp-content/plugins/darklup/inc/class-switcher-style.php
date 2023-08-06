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
 * Switch Style class
 */
class Switch_Style {

	/**
	 *
	 * @since 1.0.0
	 * @param number $style
	 * @return void
	 */
	public static function switchStyle( $style, $preview = false ) {

		$getStyle = '';

		switch( $style ) {

			case '1' :
				$getStyle = self::style_1($preview);
				break;
			case '2' :
				$getStyle = self::style_2($preview);
				break;
			case '3' :
				$getStyle = self::style_3($preview);
				break;
			case '4' :
				$getStyle = self::style_4($preview);
				break;
			case '5' :
				$getStyle = self::style_5($preview);
				break;
			case '6' :
				$getStyle = self::style_6($preview);
				break;
			case '7' :
				$getStyle = self::style_7($preview);
				break;
			case '8' :
				$getStyle = self::style_8($preview);
				break;
			case '9' :
				$getStyle = self::style_9($preview);
				break;
			case '10' :
				$getStyle = self::style_10($preview);
				break;
			case '11' :
				$getStyle = self::style_11($preview);
				break;
            case '12' :
                $getStyle = self::style_12($preview);
                break;
            case '13' :
                $getStyle = self::style_13($preview);
                break;
            case '14' :
                $getStyle = self::style_14($preview);
                break;
            case '15' :
                $getStyle = self::style_15($preview);
                break;
			default :
				$getStyle = self::style_1($preview);
				break;
				
		}

		return $getStyle;

	}



    public static function tooltip_settings($type) {
        $showToolTip = \Darklup\Helper::getOptionData('darklup_show_tooltip');
        $switchPosition = \Darklup\Helper::getOptionData('switch_position');
        if(!empty($switchPosition)){
            if(in_array($switchPosition, array("top_left", "bottom_left"))){
                $switchPosition = "right";
            }else{
                $switchPosition = "left";
            }
        }else{
            $switchPosition = "left";
        }
        $toolTipTextOnDark = \Darklup\Helper::getOptionData('tooltip_text_on_dark');
        $toolTipTextOnFont = \Darklup\Helper::getOptionData('tooltip_text_on_font');
        $toolTipTextOnDark = !empty($toolTipTextOnDark) ? $toolTipTextOnDark : "Toggle Dark Mode";
        $toolTipTextOnFont = !empty($toolTipTextOnFont) ? $toolTipTextOnFont : "Toggle Font Size";
        if(!empty($showToolTip)){
            if($showToolTip == "yes"){

                if($type === "dark"){
                    return "darklup-data-tooltip='".esc_html( $toolTipTextOnDark )."' darklup-data-tooltip-location='".esc_html( $switchPosition )."'";
                }else{
                    return "darklup-data-tooltip='".esc_html( $toolTipTextOnFont )."' darklup-data-tooltip-location='".esc_html( $switchPosition )."'";
                }
            }
        }
        return "";
    }


	/**
	 * Switch style 1
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_1($preview = false) {
        
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-switch-container darklup-dark-ignore">
            <label class="darklup-switch style1 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="toggle-btn darklup-dark-ignore">
                    <svg xmlns="http://www.w3.org/2000/svg" width="54.312" height="54.312" viewBox="0 0 54.312 54.312">
                        <circle id="style-1-light" cx="17.71" cy="17.71" r="17.71" transform="translate(9.446 9.446)" fill="#fff"/>
                        <g id="Group_1174" data-name="Group 1174">
                            <path id="style-1-light" d="M235.847,7.084A1.181,1.181,0,0,0,237.027,5.9V1.181a1.181,1.181,0,1,0-2.361,0V5.9A1.181,1.181,0,0,0,235.847,7.084Z" transform="translate(-208.691)" fill="#fff"/>
                            <path id="style-1-light" d="M235.847,426.667a1.181,1.181,0,0,0-1.181,1.181v4.723a1.181,1.181,0,0,0,2.361,0v-4.723A1.181,1.181,0,0,0,235.847,426.667Z" transform="translate(-208.691 -379.439)" fill="#fff"/>
                            <path id="style-1-light" d="M432.57,234.667h-4.723a1.181,1.181,0,1,0,0,2.361h4.723a1.181,1.181,0,0,0,0-2.361Z" transform="translate(-379.438 -208.692)" fill="#fff"/>
                            <path id="style-1-light" d="M7.084,235.847A1.181,1.181,0,0,0,5.9,234.666H1.181a1.181,1.181,0,1,0,0,2.361H5.9A1.181,1.181,0,0,0,7.084,235.847Z" transform="translate(0 -208.691)" fill="#fff"/>
                            <path id="style-1-light" d="M119.9,37.359a1.18,1.18,0,0,0,1.025.59,1.164,1.164,0,0,0,.59-.158,1.181,1.181,0,0,0,.432-1.613l-2.361-4.09a1.181,1.181,0,0,0-2.045,1.181Z" transform="translate(-104.395 -28.018)" fill="#fff"/>
                            <path id="style-1-light" d="M332.9,401.583a1.181,1.181,0,0,0-2.045,1.181l2.361,4.09a1.18,1.18,0,0,0,1.025.59,1.164,1.164,0,0,0,.59-.158,1.181,1.181,0,0,0,.432-1.613Z" transform="translate(-294.096 -356.612)" fill="#fff"/>
                            <path id="style-1-light" d="M402.117,121.864a1.164,1.164,0,0,0,.59-.158l4.09-2.361a1.181,1.181,0,0,0-1.095-2.092q-.044.023-.086.05l-4.09,2.361a1.181,1.181,0,0,0,.59,2.2v0Z" transform="translate(-356.557 -104.154)" fill="#fff"/>
                            <path id="style-1-light" d="M36.125,330.633l-4.09,2.361a1.181,1.181,0,0,0,.59,2.2,1.164,1.164,0,0,0,.59-.158l4.09-2.361a1.181,1.181,0,1,0-1.095-2.092q-.044.023-.086.05Z" transform="translate(-27.964 -293.873)" fill="#fff"/>
                            <path id="style-1-light" d="M31.67,119.325l4.09,2.361a1.164,1.164,0,0,0,.588.158,1.181,1.181,0,0,0,.59-2.2l-4.09-2.361a1.181,1.181,0,0,0-1.267,1.993q.042.027.086.05Z" transform="translate(-27.599 -104.135)" fill="#fff"/>
                            <path id="style-1-light" d="M406.453,332.976l-4.09-2.361a1.181,1.181,0,0,0-1.267,1.993c.028.018.057.034.086.05l4.09,2.361a1.164,1.164,0,0,0,.59.158,1.181,1.181,0,0,0,.59-2.2v0Z" transform="translate(-356.212 -293.855)" fill="#fff"/>
                            <path id="style-1-light" d="M331.27,37.793a1.164,1.164,0,0,0,.59.158,1.181,1.181,0,0,0,1.025-.59l2.361-4.09a1.181,1.181,0,0,0-2.045-1.181l-2.361,4.09A1.181,1.181,0,0,0,331.27,37.793Z" transform="translate(-294.078 -28.02)" fill="#fff"/>
                            <path id="style-1-light" d="M121.465,401.1a1.181,1.181,0,0,0-1.613.432l-2.361,4.09a1.181,1.181,0,0,0,.432,1.613,1.164,1.164,0,0,0,.59.158,1.181,1.181,0,0,0,1.025-.59l2.361-4.09a1.181,1.181,0,0,0-.434-1.612Z" transform="translate(-104.345 -356.557)" fill="#fff"/>
                        </g>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="52.335" height="55.288" viewBox="0 0 52.335 55.288">
                        <path id="style-1-light" data-name="moon (2)" d="M27.664,55.285A26.915,26.915,0,0,0,52.358,39.709a21.107,21.107,0,0,1-8.9,1.756A21.743,21.743,0,0,1,21.741,19.746,22.508,22.508,0,0,1,33.453.329,41.274,41.274,0,0,0,27.664,0a27.641,27.641,0,0,0,0,55.283Zm0,0" transform="translate(-0.023 0.001)" fill="#fff"/>
                    </svg>
                </div>
            </label>
        </div>
		<?php
		return ob_get_clean();
	}
	/**
	 * Switch style 2
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_2($preview = false) {
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-switch-container darklup-dark-ignore">
            <label class="darklup-switch style2 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="toggle-btn darklup-dark-ignore">
                    <div class="plate darklup-dark-ignore">
                        <svg xmlns="http://www.w3.org/2000/svg" width="54.312" height="54.312" viewBox="0 0 54.312 54.312">
                            <circle id="style-2-light" cx="17.71" cy="17.71" r="17.71" transform="translate(9.446 9.446)" fill="#fff"/>
                            <g id="Group_1174" data-name="Group 1174">
                                <path id="style-2-light" d="M235.847,7.084A1.181,1.181,0,0,0,237.027,5.9V1.181a1.181,1.181,0,1,0-2.361,0V5.9A1.181,1.181,0,0,0,235.847,7.084Z" transform="translate(-208.691)" fill="#fff"/>
                                <path id="style-2-light" d="M235.847,426.667a1.181,1.181,0,0,0-1.181,1.181v4.723a1.181,1.181,0,0,0,2.361,0v-4.723A1.181,1.181,0,0,0,235.847,426.667Z" transform="translate(-208.691 -379.439)" fill="#fff"/>
                                <path id="style-2-light" d="M432.57,234.667h-4.723a1.181,1.181,0,1,0,0,2.361h4.723a1.181,1.181,0,0,0,0-2.361Z" transform="translate(-379.438 -208.692)" fill="#fff"/>
                                <path id="style-2-light" d="M7.084,235.847A1.181,1.181,0,0,0,5.9,234.666H1.181a1.181,1.181,0,1,0,0,2.361H5.9A1.181,1.181,0,0,0,7.084,235.847Z" transform="translate(0 -208.691)" fill="#fff"/>
                                <path id="style-2-light" d="M119.9,37.359a1.18,1.18,0,0,0,1.025.59,1.164,1.164,0,0,0,.59-.158,1.181,1.181,0,0,0,.432-1.613l-2.361-4.09a1.181,1.181,0,0,0-2.045,1.181Z" transform="translate(-104.395 -28.018)" fill="#fff"/>
                                <path id="style-2-light" d="M332.9,401.583a1.181,1.181,0,0,0-2.045,1.181l2.361,4.09a1.18,1.18,0,0,0,1.025.59,1.164,1.164,0,0,0,.59-.158,1.181,1.181,0,0,0,.432-1.613Z" transform="translate(-294.096 -356.612)" fill="#fff"/>
                                <path id="style-2-light" d="M402.117,121.864a1.164,1.164,0,0,0,.59-.158l4.09-2.361a1.181,1.181,0,0,0-1.095-2.092q-.044.023-.086.05l-4.09,2.361a1.181,1.181,0,0,0,.59,2.2v0Z" transform="translate(-356.557 -104.154)" fill="#fff"/>
                                <path id="style-2-light" d="M36.125,330.633l-4.09,2.361a1.181,1.181,0,0,0,.59,2.2,1.164,1.164,0,0,0,.59-.158l4.09-2.361a1.181,1.181,0,1,0-1.095-2.092q-.044.023-.086.05Z" transform="translate(-27.964 -293.873)" fill="#fff"/>
                                <path id="style-2-light" d="M31.67,119.325l4.09,2.361a1.164,1.164,0,0,0,.588.158,1.181,1.181,0,0,0,.59-2.2l-4.09-2.361a1.181,1.181,0,0,0-1.267,1.993q.042.027.086.05Z" transform="translate(-27.599 -104.135)" fill="#fff"/>
                                <path id="style-2-light" d="M406.453,332.976l-4.09-2.361a1.181,1.181,0,0,0-1.267,1.993c.028.018.057.034.086.05l4.09,2.361a1.164,1.164,0,0,0,.59.158,1.181,1.181,0,0,0,.59-2.2v0Z" transform="translate(-356.212 -293.855)" fill="#fff"/>
                                <path id="style-2-light" d="M331.27,37.793a1.164,1.164,0,0,0,.59.158,1.181,1.181,0,0,0,1.025-.59l2.361-4.09a1.181,1.181,0,0,0-2.045-1.181l-2.361,4.09A1.181,1.181,0,0,0,331.27,37.793Z" transform="translate(-294.078 -28.02)" fill="#fff"/>
                                <path id="style-2-light" d="M121.465,401.1a1.181,1.181,0,0,0-1.613.432l-2.361,4.09a1.181,1.181,0,0,0,.432,1.613,1.164,1.164,0,0,0,.59.158,1.181,1.181,0,0,0,1.025-.59l2.361-4.09a1.181,1.181,0,0,0-.434-1.612Z" transform="translate(-104.345 -356.557)" fill="#fff"/>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="52.335" height="55.288" viewBox="0 0 52.335 55.288">
                            <path id="style-2-light" data-name="moon (2)" d="M27.664,55.285A26.915,26.915,0,0,0,52.358,39.709a21.107,21.107,0,0,1-8.9,1.756A21.743,21.743,0,0,1,21.741,19.746,22.508,22.508,0,0,1,33.453.329,41.274,41.274,0,0,0,27.664,0a27.641,27.641,0,0,0,0,55.283Zm0,0" transform="translate(-0.023 0.001)" fill="#fff"/>
                        </svg>
                    </div>

                </div>
            </label>
        </div>
		<?php
		return ob_get_clean();
	}
	/**
	 * Switch style 3
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_3($preview = false) {
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-switch-container darklup-dark-ignore">
            <label class="darklup-switch style3 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="toggle-btn darklup-dark-ignore">
                    <div class="plate darklup-dark-ignore"></div>
                </div>
            </label>
        </div>
		<?php
		return ob_get_clean();
	}
	/**
	 * Switch style 4
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_4($preview = false) {
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-switch-container darklup-dark-ignore">
            <label class="darklup-switch style4 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">

                <div class="left-placeholder darklup-dark-ignore">
                    <span class="darklup-dark-ignore"></span>
                </div>
                <div class="right-placeholder darklup-dark-ignore">
                    <span class="darklup-dark-ignore"></span>
                </div>
                <div class="toggle-btn darklup-dark-ignore">
                    <div class="plate darklup-dark-ignore">
                        <span class="darklup-dark-ignore"></span>
                        <span class="darklup-dark-ignore"></span>
                    </div>
                </div>
            </label>
        </div>
		<?php
		return ob_get_clean();
	}
	/**
	 * Switch style 5
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_5($preview = false) {
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-switch-container darklup-dark-ignore">
            <label class="darklup-switch style5 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="right-placeholder darklup-dark-ignore">
                    <span class="darklup-dark-ignore"></span>
                </div>
                <div class="toggle-btn darklup-dark-ignore">
                    <div class="plate darklup-dark-ignore">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28.295" height="28.295" viewBox="0 0 28.295 28.295">
                            <path id="style-5-light" d="M124.682,117a7.682,7.682,0,1,0,7.682,7.682A7.69,7.69,0,0,0,124.682,117Zm0,13.705a6.024,6.024,0,1,1,6.024-6.024A6.031,6.031,0,0,1,124.682,130.705Z" transform="translate(-110.534 -110.534)"/>
                            <path id="style-5-light" d="M241.829,4.512a.829.829,0,0,0,.829-.829V.829a.829.829,0,1,0-1.658,0V3.683A.829.829,0,0,0,241.829,4.512Z" transform="translate(-227.681 0)"/>
                            <path id="style-5-light" d="M434.04,241h-2.854a.829.829,0,0,0,0,1.658h2.854a.829.829,0,1,0,0-1.658Z" transform="translate(-406.574 -227.681)"/>
                            <path id="style-5-light" d="M241.829,430.357a.829.829,0,0,0-.829.829v2.854a.829.829,0,1,0,1.658,0v-2.854A.829.829,0,0,0,241.829,430.357Z" transform="translate(-227.681 -406.574)"/>
                            <path id="style-5-light" d="M4.512,241.829A.829.829,0,0,0,3.683,241H.829a.829.829,0,1,0,0,1.658H3.683A.829.829,0,0,0,4.512,241.829Z" transform="translate(0 -227.681)"/>
                            <path id="style-5-light" d="M375.724,74.262a.826.826,0,0,0,.586-.243L378.329,72a.829.829,0,0,0-1.172-1.172l-2.018,2.018a.829.829,0,0,0,.586,1.415Z" transform="translate(-354.177 -66.686)"/>
                            <path id="style-5-light" d="M376.311,375.14a.829.829,0,1,0-1.172,1.172l2.018,2.018a.829.829,0,0,0,1.172-1.172Z" transform="translate(-354.177 -354.179)"/>
                            <path id="style-5-light" d="M72.847,375.138l-2.018,2.018A.829.829,0,1,0,72,378.329l2.018-2.018a.829.829,0,1,0-1.172-1.172Z" transform="translate(-66.686 -354.177)"/>
                            <path id="style-5-light" d="M72.847,74.02a.829.829,0,0,0,1.172-1.172L72,70.829A.829.829,0,0,0,70.829,72Z" transform="translate(-66.686 -66.686)"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26.304" height="26.304" viewBox="0 0 26.304 26.304">
                            <g transform="translate(0 0)">
                                <path id="style-5-light" d="M26.082,10.738a.771.771,0,0,0-1.509-.032A7.485,7.485,0,1,1,15.6,1.731.771.771,0,0,0,15.566.222,13.26,13.26,0,0,0,13.152,0a13.152,13.152,0,0,0-9.3,22.452,13.152,13.152,0,0,0,22.452-9.3A13.276,13.276,0,0,0,26.082,10.738ZM13.152,24.762a11.611,11.611,0,0,1-.974-23.181A9.024,9.024,0,1,0,24.722,14.126,11.627,11.627,0,0,1,13.152,24.762Z" transform="translate(0 0)" fill="#1b171c"/>
                            </g>
                        </svg>

                    </div>
                </div>
            </label>
        </div>

		<?php
		return ob_get_clean();
	}
	/**
	 * Switch style 6
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_6($preview = false) {
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-switch-container darklup-dark-ignore">
            <label class="darklup-switch style6 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="right-placeholder darklup-dark-ignore">
                    <span class="darklup-dark-ignore"></span>
                </div>
                <div class="toggle-btn darklup-dark-ignore">
                    <div class="plate darklup-dark-ignore">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28.295" height="28.295" viewBox="0 0 28.295 28.295">
                            <path id="style-6-light" d="M124.682,117a7.682,7.682,0,1,0,7.682,7.682A7.69,7.69,0,0,0,124.682,117Zm0,13.705a6.024,6.024,0,1,1,6.024-6.024A6.031,6.031,0,0,1,124.682,130.705Z" transform="translate(-110.534 -110.534)"/>
                            <path id="style-6-light" d="M241.829,4.512a.829.829,0,0,0,.829-.829V.829a.829.829,0,1,0-1.658,0V3.683A.829.829,0,0,0,241.829,4.512Z" transform="translate(-227.681 0)"/>
                            <path id="style-6-light" d="M434.04,241h-2.854a.829.829,0,0,0,0,1.658h2.854a.829.829,0,1,0,0-1.658Z" transform="translate(-406.574 -227.681)"/>
                            <path id="style-6-light" d="M241.829,430.357a.829.829,0,0,0-.829.829v2.854a.829.829,0,1,0,1.658,0v-2.854A.829.829,0,0,0,241.829,430.357Z" transform="translate(-227.681 -406.574)"/>
                            <path id="style-6-light" d="M4.512,241.829A.829.829,0,0,0,3.683,241H.829a.829.829,0,1,0,0,1.658H3.683A.829.829,0,0,0,4.512,241.829Z" transform="translate(0 -227.681)"/>
                            <path id="style-6-light" d="M375.724,74.262a.826.826,0,0,0,.586-.243L378.329,72a.829.829,0,0,0-1.172-1.172l-2.018,2.018a.829.829,0,0,0,.586,1.415Z" transform="translate(-354.177 -66.686)"/>
                            <path id="style-6-light" d="M376.311,375.14a.829.829,0,1,0-1.172,1.172l2.018,2.018a.829.829,0,0,0,1.172-1.172Z" transform="translate(-354.177 -354.179)"/>
                            <path id="style-6-light" d="M72.847,375.138l-2.018,2.018A.829.829,0,1,0,72,378.329l2.018-2.018a.829.829,0,1,0-1.172-1.172Z" transform="translate(-66.686 -354.177)"/>
                            <path id="style-6-light" d="M72.847,74.02a.829.829,0,0,0,1.172-1.172L72,70.829A.829.829,0,0,0,70.829,72Z" transform="translate(-66.686 -66.686)"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26.304" height="26.304" viewBox="0 0 26.304 26.304">
                            <g transform="translate(0 0)">
                                <path id="style-6-light" d="M26.082,10.738a.771.771,0,0,0-1.509-.032A7.485,7.485,0,1,1,15.6,1.731.771.771,0,0,0,15.566.222,13.26,13.26,0,0,0,13.152,0a13.152,13.152,0,0,0-9.3,22.452,13.152,13.152,0,0,0,22.452-9.3A13.276,13.276,0,0,0,26.082,10.738ZM13.152,24.762a11.611,11.611,0,0,1-.974-23.181A9.024,9.024,0,1,0,24.722,14.126,11.627,11.627,0,0,1,13.152,24.762Z" transform="translate(0 0)" fill="#1b171c"/>
                            </g>
                        </svg>

                    </div>
                </div>
            </label>
        </div>
		<?php
		return ob_get_clean();
	}
	/**
	 * Switch style 7
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_7($preview = false) {
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-switch-container darklup-dark-ignore">
            <label class="darklup-switch style7 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="right-placeholder darklup-dark-ignore">
                    <span class="darklup-dark-ignore"></span>
                </div>
                <div class="toggle-btn darklup-dark-ignore">
                    <div class="plate darklup-dark-ignore">
                        <svg xmlns="http://www.w3.org/2000/svg" width="52.149" height="52.149" viewBox="0 0 52.149 52.149">
                            <g id="Group_1315" transform="translate(-823 -2667)">
                                <g id="Group_1255" transform="translate(-0.073 -0.073)">
                                    <path id="style-7-light" d="M242.528,430.357A1.528,1.528,0,0,0,241,431.885v5.26a1.528,1.528,0,1,0,3.056,0v-5.26A1.528,1.528,0,0,0,242.528,430.357Z" transform="translate(606.62 2280.549)" fill="#f6de3d"/>
                                    <g id="Group_1254">
                                        <path id="style-7-light" d="M242.528,8.316a1.528,1.528,0,0,0,1.528-1.528V1.528a1.528,1.528,0,1,0-3.056,0v5.26A1.528,1.528,0,0,0,242.528,8.316Z" transform="translate(606.62 2667.073)" fill="#f6de3d"/>
                                        <path id="style-7-light" d="M437.145,241h-5.26a1.528,1.528,0,0,0,0,3.056h5.26a1.528,1.528,0,1,0,0-3.056Z" transform="translate(436.549 2450.62)" fill="#f6de3d"/>
                                        <path id="style-7-light" d="M8.316,242.528A1.528,1.528,0,0,0,6.788,241H1.528a1.528,1.528,0,1,0,0,3.056h5.26A1.528,1.528,0,0,0,8.316,242.528Z" transform="translate(823.073 2450.62)" fill="#f6de3d"/>
                                        <path id="style-7-light" d="M376.423,77.361a1.522,1.522,0,0,0,1.08-.447l3.719-3.719a1.528,1.528,0,0,0-2.161-2.161l-3.72,3.719a1.528,1.528,0,0,0,1.081,2.608Z" transform="translate(486.362 2603.676)" fill="#f6de3d"/>
                                        <path id="style-7-light" d="M377.5,375.345a1.528,1.528,0,0,0-2.161,2.161l3.72,3.719a1.528,1.528,0,0,0,2.16-2.161Z" transform="translate(486.362 2330.36)" fill="#f6de3d"/>
                                        <path id="style-7-light" d="M74.753,375.343l-3.719,3.719a1.528,1.528,0,1,0,2.161,2.161l3.719-3.719a1.528,1.528,0,0,0-2.161-2.161Z" transform="translate(759.676 2330.362)" fill="#f6de3d"/>
                                        <path id="style-7-light" d="M74.753,76.914a1.528,1.528,0,0,0,2.161-2.161l-3.719-3.719a1.528,1.528,0,0,0-2.161,2.161Z" transform="translate(759.676 2603.676)" fill="#f6de3d"/>
                                    </g>
                                </g>
                                <circle id="style-7-light" cx="12.5" cy="12.5" r="12.5" transform="translate(837 2681)" fill="#f6de3d"/>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="53.118" height="51.845" viewBox="0 0 53.118 51.845">
                            <g id="moon" transform="translate(0 0)">
                                <path id="style-7-light" data-name="moon (2)" d="M23.179,51.842A25.239,25.239,0,0,1,.023,37.236a19.792,19.792,0,0,0,8.345,1.647A20.389,20.389,0,0,0,28.734,18.517,21.106,21.106,0,0,0,17.751.309,38.7,38.7,0,0,1,23.179,0a25.92,25.92,0,1,1,0,51.84Zm0,0" transform="translate(4.019 0.001)" fill="#f6de3d"/>
                            </g>
                            <path id="style-7-light" data-name="Path 1" d="M35.982,108.7c0-1.244,2.082-3.326,3.326-3.326-1.244,0-3.326-2.082-3.326-3.326,0,1.244-2.082,3.326-3.326,3.326C33.9,105.374,35.982,107.457,35.982,108.7Z" transform="translate(-15.764 -94.778)" fill="#f6de3d"/>
                            <path id="style-7-light" data-name="Path 3" d="M35.982,108.7c0-1.244,2.082-3.326,3.326-3.326-1.244,0-3.326-2.082-3.326-3.326,0,1.244-2.082,3.326-3.326,3.326C33.9,105.374,35.982,107.457,35.982,108.7Z" transform="translate(-19.807 -78.341)" fill="#f6de3d"/>
                            <path id="style-7-light" data-name="Path 2" d="M37.018,110.772c0-1.631,2.731-4.362,4.362-4.362-1.631,0-4.362-2.731-4.362-4.362,0,1.631-2.731,4.362-4.362,4.362C34.287,106.41,37.018,109.141,37.018,110.772Z" transform="translate(-23.464 -88.101)" fill="#f6de3d"/>
                        </svg>

                    </div>
                </div>
            </label>
        </div>

		<?php
		return ob_get_clean();
	}
	/**
	 * Switch style 8
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_8($preview = false) {
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-square-switch-container darklup-dark-ignore">
            <label class="darklup-square-switch style8 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="toggle-btn darklup-dark-ignore">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70.067" height="70.067" viewBox="0 0 70.067 70.067">
                        <circle id="style-8-light" cx="22.848" cy="22.848" r="22.848" transform="translate(12.185 12.185)" fill="#3b3b3b"/>
                        <g>
                            <path id="style-8-light" d="M236.189,9.139a1.523,1.523,0,0,0,1.523-1.523V1.523a1.523,1.523,0,0,0-3.046,0V7.616A1.523,1.523,0,0,0,236.189,9.139Z" transform="translate(-201.156)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M236.189,426.667a1.523,1.523,0,0,0-1.523,1.523v6.093a1.523,1.523,0,0,0,3.046,0V428.19A1.523,1.523,0,0,0,236.189,426.667Z" transform="translate(-201.156 -365.739)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M434.282,234.667h-6.093a1.523,1.523,0,1,0,0,3.046h6.093a1.523,1.523,0,0,0,0-3.046Z" transform="translate(-365.739 -201.157)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M9.139,236.189a1.523,1.523,0,0,0-1.523-1.523H1.523a1.523,1.523,0,0,0,0,3.046H7.616A1.523,1.523,0,0,0,9.139,236.189Z" transform="translate(0 -201.156)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M120.631,39.058a1.523,1.523,0,0,0,1.322.762,1.5,1.5,0,0,0,.762-.2,1.523,1.523,0,0,0,.557-2.081l-3.046-5.276a1.523,1.523,0,0,0-2.638,1.523Z" transform="translate(-100.626 -27.006)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M333.539,401.752a1.523,1.523,0,0,0-2.638,1.523l3.046,5.276a1.523,1.523,0,0,0,1.322.762,1.5,1.5,0,0,0,.762-.2,1.523,1.523,0,0,0,.557-2.081Z" transform="translate(-283.477 -343.737)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M402.46,123.241a1.5,1.5,0,0,0,.762-.2l5.276-3.046a1.523,1.523,0,0,0-1.412-2.7q-.057.03-.111.064L401.7,120.4a1.523,1.523,0,0,0,.762,2.842v0Z" transform="translate(-343.683 -100.393)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M37.482,330.685l-5.276,3.046a1.523,1.523,0,0,0,.762,2.842,1.5,1.5,0,0,0,.762-.2l5.276-3.046a1.523,1.523,0,0,0-1.412-2.7q-.057.03-.111.064Z" transform="translate(-26.954 -283.263)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M31.854,119.972l5.276,3.046a1.5,1.5,0,0,0,.759.2,1.523,1.523,0,0,0,.762-2.842l-5.276-3.046A1.523,1.523,0,0,0,31.74,119.9q.054.034.111.064Z" transform="translate(-26.602 -100.375)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M408.166,333.714l-5.276-3.046a1.523,1.523,0,0,0-1.634,2.571q.054.035.111.064l5.276,3.046a1.5,1.5,0,0,0,.762.2,1.523,1.523,0,0,0,.762-2.842v0Z" transform="translate(-343.351 -283.245)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M331.44,39.617a1.5,1.5,0,0,0,.762.2,1.524,1.524,0,0,0,1.322-.762l3.046-5.276a1.523,1.523,0,0,0-2.638-1.523l-3.046,5.276A1.523,1.523,0,0,0,331.44,39.617Z" transform="translate(-283.46 -27.008)" fill="#3b3b3b"/>
                            <path id="style-8-light" d="M122.664,401.142a1.523,1.523,0,0,0-2.081.557l-3.046,5.276a1.523,1.523,0,0,0,.557,2.081,1.5,1.5,0,0,0,.762.2,1.523,1.523,0,0,0,1.322-.762l3.046-5.276a1.523,1.523,0,0,0-.56-2.08Z" transform="translate(-100.577 -343.684)" fill="#3b3b3b"/>
                        </g>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="65.636" height="69.339" viewBox="0 0 65.636 69.339">
                        <path id="style-8-light" d="M34.689,69.336A33.756,33.756,0,0,0,65.659,49.8,26.471,26.471,0,0,1,54.5,52,27.268,27.268,0,0,1,27.26,24.765,28.228,28.228,0,0,1,41.949.413,51.763,51.763,0,0,0,34.689,0a34.666,34.666,0,0,0,0,69.332Zm0,0" transform="translate(-0.023 0.001)" fill="#3b3b3b"/>
                    </svg>
                </div>
            </label>
        </div>
		<?php
		return ob_get_clean();
	}
	/**
	 * Switch style 9
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_9($preview = false) {
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-square-switch-container darklup-dark-ignore">
            <label class="darklup-square-switch style9 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="toggle-btn darklup-dark-ignore">
                    <svg xmlns="http://www.w3.org/2000/svg" width="66.16" height="66.16" viewBox="0 0 66.16 66.16">
                        <path id="style-9-light" d="M134.961,117a17.961,17.961,0,1,0,17.961,17.961A17.982,17.982,0,0,0,134.961,117Zm0,32.046a14.085,14.085,0,1,1,14.085-14.085A14.1,14.1,0,0,1,134.961,149.046Z" transform="translate(-101.881 -101.881)"/>
                        <path id="style-9-light" d="M242.938,10.55a1.938,1.938,0,0,0,1.938-1.938V1.938a1.938,1.938,0,0,0-3.877,0V8.612A1.938,1.938,0,0,0,242.938,10.55Z" transform="translate(-209.858 0)"/>
                        <path id="style-9-light" d="M438.969,241h-6.674a1.938,1.938,0,0,0,0,3.877h6.674a1.938,1.938,0,0,0,0-3.877Z" transform="translate(-374.747 -209.858)"/>
                        <path id="style-9-light" d="M242.938,430.357A1.938,1.938,0,0,0,241,432.295v6.674a1.938,1.938,0,0,0,3.877,0v-6.674A1.938,1.938,0,0,0,242.938,430.357Z" transform="translate(-209.858 -374.747)"/>
                        <path id="style-9-light" d="M10.55,242.938A1.938,1.938,0,0,0,8.612,241H1.938a1.938,1.938,0,0,0,0,3.877H8.612A1.938,1.938,0,0,0,10.55,242.938Z" transform="translate(0 -209.858)"/>
                        <path id="style-9-light" d="M376.834,79.182a1.931,1.931,0,0,0,1.37-.568l4.719-4.719a1.938,1.938,0,0,0-2.741-2.741l-4.719,4.719a1.938,1.938,0,0,0,1.371,3.309Z" transform="translate(-326.452 -61.465)"/>
                        <path id="style-9-light" d="M378.2,375.465a1.938,1.938,0,0,0-2.741,2.741l4.719,4.718a1.938,1.938,0,0,0,2.741-2.741Z" transform="translate(-326.452 -326.454)"/>
                        <path id="style-9-light" d="M75.873,375.463l-4.719,4.719a1.938,1.938,0,1,0,2.741,2.741l4.719-4.719a1.938,1.938,0,0,0-2.741-2.741Z" transform="translate(-61.465 -326.452)"/>
                        <path id="style-9-light" d="M75.873,78.614a1.938,1.938,0,1,0,2.741-2.741L73.9,71.154A1.938,1.938,0,0,0,71.154,73.9Z" transform="translate(-61.465 -61.465)"/>
                        <path id="style-9-light" d="M314.86,28.34a1.937,1.937,0,0,0,2.534-1.046l2.561-6.162a1.938,1.938,0,0,0-3.58-1.488l-2.561,6.162A1.938,1.938,0,0,0,314.86,28.34Z" transform="translate(-273.134 -16.065)"/>
                        <path id="style-9-light" d="M424.7,316.375l-6.162-2.561a1.938,1.938,0,1,0-1.488,3.58l6.162,2.561a1.938,1.938,0,0,0,1.488-3.58Z" transform="translate(-362.118 -273.134)"/>
                        <path id="style-9-light" d="M153.753,416a1.938,1.938,0,0,0-2.534,1.046l-2.561,6.162a1.938,1.938,0,1,0,3.58,1.487l2.561-6.162A1.938,1.938,0,0,0,153.753,416Z" transform="translate(-129.319 -362.119)"/>
                        <path id="style-9-light" d="M19.645,152.238l6.162,2.561a1.938,1.938,0,0,0,1.488-3.58l-6.162-2.561a1.938,1.938,0,0,0-1.488,3.58Z" transform="translate(-16.066 -129.319)"/>
                        <path id="style-9-light" d="M416.171,154.255a1.936,1.936,0,0,0,2.531,1.052l6.168-2.547a1.938,1.938,0,1,0-1.479-3.583l-6.168,2.547A1.938,1.938,0,0,0,416.171,154.255Z" transform="translate(-362.266 -129.772)"/>
                        <path id="style-9-light" d="M316.985,417.223A1.938,1.938,0,0,0,313.4,418.7l2.547,6.168a1.938,1.938,0,0,0,3.583-1.479Z" transform="translate(-272.776 -362.266)"/>
                        <path id="style-9-light" d="M28.131,314.453A1.938,1.938,0,0,0,25.6,313.4l-6.168,2.546a1.938,1.938,0,1,0,1.479,3.583l6.168-2.547A1.938,1.938,0,0,0,28.131,314.453Z" transform="translate(-15.876 -272.776)"/>
                        <path id="style-9-light" d="M151.724,27.08a1.938,1.938,0,0,0,3.583-1.479l-2.547-6.168a1.938,1.938,0,0,0-3.583,1.479Z" transform="translate(-129.773 -15.877)"/>
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="67.405" height="67.405" viewBox="0 0 67.405 67.405">
                        <g transform="translate(0 0)">
                            <path id="style-9-light" d="M66.837,27.516a1.975,1.975,0,0,0-3.866-.082,19.18,19.18,0,1,1-23-23A1.975,1.975,0,0,0,39.889.569,33.979,33.979,0,0,0,33.7,0,33.7,33.7,0,0,0,9.871,57.534,33.7,33.7,0,0,0,67.405,33.7,34.021,34.021,0,0,0,66.837,27.516ZM33.7,63.456a29.754,29.754,0,0,1-2.5-59.4A23.126,23.126,0,1,0,63.352,36.2,29.8,29.8,0,0,1,33.7,63.456Z" transform="translate(0 0)"/>
                        </g>
                    </svg>

                </div>
            </label>
        </div>
		<?php
		return ob_get_clean();
	}
	/**
	 * Switch style 10
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_10($preview = false) {
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-square-switch-container darklup-dark-ignore">
            <label class="darklup-square-switch style10 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="toggle-btn darklup-dark-ignore">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                        <g transform="translate(-1126 -2620)">
                            <g id="style-10-light-stroke" transform="translate(1126 2620)" fill="none" stroke="#000" stroke-width="2">
                                <rect width="40" height="40" rx="20" stroke="none"/>
                                <rect x="1" y="1" width="38" height="38" rx="19" fill="none"/>
                            </g>
                            <path id="style-10-light" d="M20,0c-.021-.06.07,40.026,0,40A20,20,0,0,1,20,0Z" transform="translate(1126 2620)"/>
                        </g>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                        <g transform="translate(-1126 -2620)">
                            <g id="style-10-light-stroke" transform="translate(1126 2620)" fill="none" stroke="#f6de3d" stroke-width="2">
                                <rect width="40" height="40" rx="20" stroke="none"/>
                                <rect x="1" y="1" width="38" height="38" rx="19" fill="none"/>
                            </g>
                            <path id="style-10-light" d="M.027,0c.021-.06-.07,40.026,0,40A19.973,19.973,0,0,0,19.973,20,19.973,19.973,0,0,0,.027,0Z" transform="translate(1146.027 2620)" fill="#f6de3d"/>
                        </g>
                    </svg>
                </div>
            </label>
        </div>
		<?php
		return ob_get_clean();
	}
	/**
	 * Switch style 10
	 * 
	 * @since 1.0.0
	 * @return void
	 */
	public static function style_11($preview = false) {
        $animate_class = self::switcher_animation();

		ob_start();
		?>
        <div class="darklup-square-switch-container darklup-dark-ignore">
            <label class="darklup-square-switch style11 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="toggle-btn darklup-dark-ignore">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70.067" height="70.067" viewBox="0 0 70.067 70.067">
                        <circle id="style-11-light" cx="22.848" cy="22.848" r="22.848" transform="translate(12.185 12.185)" fill="#3b3b3b"/>
                        <g>
                            <path id="style-11-light" d="M236.189,9.139a1.523,1.523,0,0,0,1.523-1.523V1.523a1.523,1.523,0,0,0-3.046,0V7.616A1.523,1.523,0,0,0,236.189,9.139Z" transform="translate(-201.156)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M236.189,426.667a1.523,1.523,0,0,0-1.523,1.523v6.093a1.523,1.523,0,0,0,3.046,0V428.19A1.523,1.523,0,0,0,236.189,426.667Z" transform="translate(-201.156 -365.739)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M434.282,234.667h-6.093a1.523,1.523,0,1,0,0,3.046h6.093a1.523,1.523,0,0,0,0-3.046Z" transform="translate(-365.739 -201.157)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M9.139,236.189a1.523,1.523,0,0,0-1.523-1.523H1.523a1.523,1.523,0,0,0,0,3.046H7.616A1.523,1.523,0,0,0,9.139,236.189Z" transform="translate(0 -201.156)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M120.631,39.058a1.523,1.523,0,0,0,1.322.762,1.5,1.5,0,0,0,.762-.2,1.523,1.523,0,0,0,.557-2.081l-3.046-5.276a1.523,1.523,0,0,0-2.638,1.523Z" transform="translate(-100.626 -27.006)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M333.539,401.752a1.523,1.523,0,0,0-2.638,1.523l3.046,5.276a1.523,1.523,0,0,0,1.322.762,1.5,1.5,0,0,0,.762-.2,1.523,1.523,0,0,0,.557-2.081Z" transform="translate(-283.477 -343.737)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M402.46,123.241a1.5,1.5,0,0,0,.762-.2l5.276-3.046a1.523,1.523,0,0,0-1.412-2.7q-.057.03-.111.064L401.7,120.4a1.523,1.523,0,0,0,.762,2.842v0Z" transform="translate(-343.683 -100.393)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M37.482,330.685l-5.276,3.046a1.523,1.523,0,0,0,.762,2.842,1.5,1.5,0,0,0,.762-.2l5.276-3.046a1.523,1.523,0,0,0-1.412-2.7q-.057.03-.111.064Z" transform="translate(-26.954 -283.263)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M31.854,119.972l5.276,3.046a1.5,1.5,0,0,0,.759.2,1.523,1.523,0,0,0,.762-2.842l-5.276-3.046A1.523,1.523,0,0,0,31.74,119.9q.054.034.111.064Z" transform="translate(-26.602 -100.375)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M408.166,333.714l-5.276-3.046a1.523,1.523,0,0,0-1.634,2.571q.054.035.111.064l5.276,3.046a1.5,1.5,0,0,0,.762.2,1.523,1.523,0,0,0,.762-2.842v0Z" transform="translate(-343.351 -283.245)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M331.44,39.617a1.5,1.5,0,0,0,.762.2,1.524,1.524,0,0,0,1.322-.762l3.046-5.276a1.523,1.523,0,0,0-2.638-1.523l-3.046,5.276A1.523,1.523,0,0,0,331.44,39.617Z" transform="translate(-283.46 -27.008)" fill="#3b3b3b"/>
                            <path id="style-11-light" d="M122.664,401.142a1.523,1.523,0,0,0-2.081.557l-3.046,5.276a1.523,1.523,0,0,0,.557,2.081,1.5,1.5,0,0,0,.762.2,1.523,1.523,0,0,0,1.322-.762l3.046-5.276a1.523,1.523,0,0,0-.56-2.08Z" transform="translate(-100.577 -343.684)" fill="#3b3b3b"/>
                        </g>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="65.636" height="69.339" viewBox="0 0 65.636 69.339">
                        <path id="style-11-light" d="M34.689,69.336A33.756,33.756,0,0,0,65.659,49.8,26.471,26.471,0,0,1,54.5,52,27.268,27.268,0,0,1,27.26,24.765,28.228,28.228,0,0,1,41.949.413,51.763,51.763,0,0,0,34.689,0a34.666,34.666,0,0,0,0,69.332Zm0,0" transform="translate(-0.023 0.001)" fill="#3b3b3b"/>
                    </svg>
                </div>
            </label>
        </div>
		<?php
		return ob_get_clean();
	}

    /**
     * Switch Style 12
     * @return void
     */
    public static function style_12($preview = false) {
        $animate_class = self::switcher_animation();

        ob_start();
        ?>

        <div class="darklup-accessibility-switch-container darklup-dark-ignore <?php echo  $animate_class; ?>">
            <div class="darklup-dark-ignore" <?php echo self::tooltip_settings("dark"); ?>>
                <label class="darklup-accessibility-switch style12 darkBtn darklup-dark-ignore">
                    <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                    <div class="toggle-btn darklup-dark-ignore">
                        <svg xmlns="http://www.w3.org/2000/svg" width="83" height="83" viewBox="0 0 83 83">
                            <g transform="translate(-1125.346 -2620)">
                                <g id="style-12-light-stroke" transform="translate(1125.346 2620)" fill="none" stroke="#0a2457" stroke-width="2">
                                    <rect width="83" height="83" rx="41.5" stroke="none"/>
                                    <rect x="1" y="1" width="81" height="81" rx="40.5" fill="none"/>
                                </g>
                                <path id="style-12-light" d="M41.219,0c-.043-.123.144,82.49,0,82.437A41.219,41.219,0,1,1,41.219,0Z" transform="translate(1125.909 2620)" fill="#0a2457"/>
                            </g>
                        </svg>
                    </div>
                </label>
            </div>

            <div class="darklup-dark-ignore" <?php echo self::tooltip_settings("font"); ?>>
                <label class="darklup-accessibility-switch style12 textBtn darklup-dark-ignore">
                    <input type="checkbox" class="toggle-checkbox switch-font-trigger">
                    <div class="toggle-btn darklup-dark-ignore">
                        <svg xmlns="http://www.w3.org/2000/svg" width="169.802" height="145.537" viewBox="0 0 169.802 145.537">
                            <g transform="translate(-318.665 -2256.691)">
                                <path id="style-12-light" d="M117.865-147.825h-47.1V-18.608H51.651V-147.825H4.665v-15.321h113.2Z" transform="translate(314.5 2420.337)" fill="#0a2457" stroke="#0a2457" stroke-width="1"/>
                                <path id="style-12-light" d="M83.467-104.826H50.112v90.3H36.577v-90.3H3.3v-10.706H83.467Z" transform="translate(404.5 2416.256)" fill="#0a2457" stroke="#0a2457" stroke-width="1"/>
                            </g>
                        </svg>
                    </div>
                </label>
            </div>


        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Switch style 13
     *
     * @since 1.0.0
     * @return void
     */
    public static function style_13($preview = false) {
        $animate_class = self::switcher_animation();

        ob_start();
        ?>

        <div class="darklup-switch-container darklup-dark-ignore">
            <label class="darklup-switch style13 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="left-placeholder darklup-dark-ignore">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70.067" height="70.067" viewBox="0 0 70.067 70.067">
                        <circle id="style-13-light" cx="22.848" cy="22.848" r="22.848" transform="translate(12.185 12.185)" fill="#3b3b3b"/>
                        <g>
                            <path id="style-13-light" d="M236.189,9.139a1.523,1.523,0,0,0,1.523-1.523V1.523a1.523,1.523,0,0,0-3.046,0V7.616A1.523,1.523,0,0,0,236.189,9.139Z" transform="translate(-201.156)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M236.189,426.667a1.523,1.523,0,0,0-1.523,1.523v6.093a1.523,1.523,0,0,0,3.046,0V428.19A1.523,1.523,0,0,0,236.189,426.667Z" transform="translate(-201.156 -365.739)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M434.282,234.667h-6.093a1.523,1.523,0,1,0,0,3.046h6.093a1.523,1.523,0,0,0,0-3.046Z" transform="translate(-365.739 -201.157)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M9.139,236.189a1.523,1.523,0,0,0-1.523-1.523H1.523a1.523,1.523,0,0,0,0,3.046H7.616A1.523,1.523,0,0,0,9.139,236.189Z" transform="translate(0 -201.156)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M120.631,39.058a1.523,1.523,0,0,0,1.322.762,1.5,1.5,0,0,0,.762-.2,1.523,1.523,0,0,0,.557-2.081l-3.046-5.276a1.523,1.523,0,0,0-2.638,1.523Z" transform="translate(-100.626 -27.006)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M333.539,401.752a1.523,1.523,0,0,0-2.638,1.523l3.046,5.276a1.523,1.523,0,0,0,1.322.762,1.5,1.5,0,0,0,.762-.2,1.523,1.523,0,0,0,.557-2.081Z" transform="translate(-283.477 -343.737)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M402.46,123.241a1.5,1.5,0,0,0,.762-.2l5.276-3.046a1.523,1.523,0,0,0-1.412-2.7q-.057.03-.111.064L401.7,120.4a1.523,1.523,0,0,0,.762,2.842v0Z" transform="translate(-343.683 -100.393)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M37.482,330.685l-5.276,3.046a1.523,1.523,0,0,0,.762,2.842,1.5,1.5,0,0,0,.762-.2l5.276-3.046a1.523,1.523,0,0,0-1.412-2.7q-.057.03-.111.064Z" transform="translate(-26.954 -283.263)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M31.854,119.972l5.276,3.046a1.5,1.5,0,0,0,.759.2,1.523,1.523,0,0,0,.762-2.842l-5.276-3.046A1.523,1.523,0,0,0,31.74,119.9q.054.034.111.064Z" transform="translate(-26.602 -100.375)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M408.166,333.714l-5.276-3.046a1.523,1.523,0,0,0-1.634,2.571q.054.035.111.064l5.276,3.046a1.5,1.5,0,0,0,.762.2,1.523,1.523,0,0,0,.762-2.842v0Z" transform="translate(-343.351 -283.245)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M331.44,39.617a1.5,1.5,0,0,0,.762.2,1.524,1.524,0,0,0,1.322-.762l3.046-5.276a1.523,1.523,0,0,0-2.638-1.523l-3.046,5.276A1.523,1.523,0,0,0,331.44,39.617Z" transform="translate(-283.46 -27.008)" fill="#3b3b3b"/>
                            <path id="style-13-light" d="M122.664,401.142a1.523,1.523,0,0,0-2.081.557l-3.046,5.276a1.523,1.523,0,0,0,.557,2.081,1.5,1.5,0,0,0,.762.2,1.523,1.523,0,0,0,1.322-.762l3.046-5.276a1.523,1.523,0,0,0-.56-2.08Z" transform="translate(-100.577 -343.684)" fill="#3b3b3b"/>
                        </g>
                    </svg>
                </div>
                <div class="right-placeholder darklup-dark-ignore">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23.304" height="49.304"
                         viewBox="0 0 47.002 49.654">
                        <path id="style-13-light" d="M24.847,49.651A24.173,24.173,0,0,0,47.025,35.662a18.956,18.956,0,0,1-7.992,1.577,19.527,19.527,0,0,1-19.5-19.5A20.214,20.214,0,0,1,30.046.3,37.068,37.068,0,0,0,24.847,0a24.824,24.824,0,0,0,0,49.649Zm0,0"
                              transform="translate(-0.023 0.001)"  />
                    </svg>
                </div>
                <div class="toggle-btn darklup-dark-ignore">
                </div>
            </label>
        </div>

        <?php
        return ob_get_clean();
    }


    /**
     * Switch style 14
     *
     * @since 1.0.0
     * @return void
     */
    public static function style_14($preview = false) {
        $animate_class = self::switcher_animation();

        ob_start();
        ?>
        <div class="darklup-square-switch-container darklup-dark-ignore">
            <label class="darklup-square-switch style14 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="toggle-btn darklup-dark-ignore">

                    <svg xmlns="http://www.w3.org/2000/svg" width="65.636" height="69.339" viewBox="0 0 65.636 69.339">
                        <path id="style-14-light" d="M34.689,69.336A33.756,33.756,0,0,0,65.659,49.8,26.471,26.471,0,0,1,54.5,52,27.268,27.268,0,0,1,27.26,24.765,28.228,28.228,0,0,1,41.949.413,51.763,51.763,0,0,0,34.689,0a34.666,34.666,0,0,0,0,69.332Zm0,0" transform="translate(-0.023 0.001)" fill="#3b3b3b"/>
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="70.067" height="70.067" viewBox="0 0 70.067 70.067">
                        <circle id="style-14-light" cx="22.848" cy="22.848" r="22.848" transform="translate(12.185 12.185)" fill="#3b3b3b"/>
                        <g>
                            <path id="style-14-light" d="M236.189,9.139a1.523,1.523,0,0,0,1.523-1.523V1.523a1.523,1.523,0,0,0-3.046,0V7.616A1.523,1.523,0,0,0,236.189,9.139Z" transform="translate(-201.156)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M236.189,426.667a1.523,1.523,0,0,0-1.523,1.523v6.093a1.523,1.523,0,0,0,3.046,0V428.19A1.523,1.523,0,0,0,236.189,426.667Z" transform="translate(-201.156 -365.739)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M434.282,234.667h-6.093a1.523,1.523,0,1,0,0,3.046h6.093a1.523,1.523,0,0,0,0-3.046Z" transform="translate(-365.739 -201.157)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M9.139,236.189a1.523,1.523,0,0,0-1.523-1.523H1.523a1.523,1.523,0,0,0,0,3.046H7.616A1.523,1.523,0,0,0,9.139,236.189Z" transform="translate(0 -201.156)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M120.631,39.058a1.523,1.523,0,0,0,1.322.762,1.5,1.5,0,0,0,.762-.2,1.523,1.523,0,0,0,.557-2.081l-3.046-5.276a1.523,1.523,0,0,0-2.638,1.523Z" transform="translate(-100.626 -27.006)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M333.539,401.752a1.523,1.523,0,0,0-2.638,1.523l3.046,5.276a1.523,1.523,0,0,0,1.322.762,1.5,1.5,0,0,0,.762-.2,1.523,1.523,0,0,0,.557-2.081Z" transform="translate(-283.477 -343.737)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M402.46,123.241a1.5,1.5,0,0,0,.762-.2l5.276-3.046a1.523,1.523,0,0,0-1.412-2.7q-.057.03-.111.064L401.7,120.4a1.523,1.523,0,0,0,.762,2.842v0Z" transform="translate(-343.683 -100.393)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M37.482,330.685l-5.276,3.046a1.523,1.523,0,0,0,.762,2.842,1.5,1.5,0,0,0,.762-.2l5.276-3.046a1.523,1.523,0,0,0-1.412-2.7q-.057.03-.111.064Z" transform="translate(-26.954 -283.263)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M31.854,119.972l5.276,3.046a1.5,1.5,0,0,0,.759.2,1.523,1.523,0,0,0,.762-2.842l-5.276-3.046A1.523,1.523,0,0,0,31.74,119.9q.054.034.111.064Z" transform="translate(-26.602 -100.375)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M408.166,333.714l-5.276-3.046a1.523,1.523,0,0,0-1.634,2.571q.054.035.111.064l5.276,3.046a1.5,1.5,0,0,0,.762.2,1.523,1.523,0,0,0,.762-2.842v0Z" transform="translate(-343.351 -283.245)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M331.44,39.617a1.5,1.5,0,0,0,.762.2,1.524,1.524,0,0,0,1.322-.762l3.046-5.276a1.523,1.523,0,0,0-2.638-1.523l-3.046,5.276A1.523,1.523,0,0,0,331.44,39.617Z" transform="translate(-283.46 -27.008)" fill="#3b3b3b"/>
                            <path id="style-14-light" d="M122.664,401.142a1.523,1.523,0,0,0-2.081.557l-3.046,5.276a1.523,1.523,0,0,0,.557,2.081,1.5,1.5,0,0,0,.762.2,1.523,1.523,0,0,0,1.322-.762l3.046-5.276a1.523,1.523,0,0,0-.56-2.08Z" transform="translate(-100.577 -343.684)" fill="#3b3b3b"/>
                        </g>
                    </svg>
                </div>
            </label>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Switch style 15
     *
     * @since 1.0.0
     * @return void
     */
    public static function style_15($preview = false) {
        $animate_class = self::switcher_animation();

        ob_start();
        ?>
        <div class="darklup-switch-container darklup-dark-ignore">
            <label class="darklup-switch style15 darklup-dark-ignore <?php echo  $animate_class; ?>" <?php echo self::tooltip_settings("dark"); ?>>
                <input type="checkbox" class="toggle-checkbox <?php echo (!$preview) ? "switch-trigger" : ""; ?>">
                <div class="toggle-btn darklup-dark-ignore"> </div>
            </label>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Switch Animation
     *
     * @since 1.0.1
     * @return void
     */
    public static function  switcher_animation() {
        $darklup_switcher_animate = \Darklup\Helper::getOptionData('darklup_switcher_animate');
        $animate_class = '';

        if( 'animate_shake' == $darklup_switcher_animate ){
            $animate_class = 'animate_shake';
        }elseif( 'animate_vibrate' == $darklup_switcher_animate ){
            $animate_class = 'animate_vibrate';
        }elseif( 'animate_heartbeat' == $darklup_switcher_animate ){
            $animate_class = 'animate_heartbeat';
        }elseif( 'animate_rotate' == $darklup_switcher_animate ){
            $animate_class = 'animate_rotate';
        }elseif( 'animate_spring' == $darklup_switcher_animate ){
            $animate_class = 'animate_spring';
        }

        return $animate_class;
    }


}

