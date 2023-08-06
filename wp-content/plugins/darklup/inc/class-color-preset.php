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
 * Hooks class
 */
class Color_Preset {

	/**
	 * Get color preset
	 *
	 * @since 1.0.0
	 * @param string $preset
	 * @return array
	 */
	public static function getColorPreset( $preset = '1' ) {

		switch( $preset ) {

			case '1' :
				return self::color_preset_1();
				break;
			case '2' :
				return self::color_preset_2();
				break;
			case '3' :
				return self::color_preset_3();
				break;
			case '4' :
				return self::color_preset_4();
				break;
			case '5' :
				return self::color_preset_5();
				break;
			case '6' :
				return self::color_preset_6();
				break;
			case '7' :
				return self::color_preset_7();
                break;
			case '8' :
				return self::color_preset_8();
                break;
			case '9' :
				return self::color_preset_9();
				break;
			case '10' :
				return self::color_preset_10();
				break;
            case '11' :
                return self::color_preset_11();
                break;
            case '12' :
                return self::color_preset_12();
                break;
			default :
				return self::color_preset_1();

		}

	}

	/**
	 * Get custom color
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public static function CustomColor() {

		$colorBg 	= \Darklup\Helper::getOptionData('custom_bg_color');
		$colorText 	= \Darklup\Helper::getOptionData('custom_text_color');
		$colorLink 	= \Darklup\Helper::getOptionData('custom_link_color');
		$colorLinkHover = \Darklup\Helper::getOptionData('custom_link_hover_color');
		$colorBorder	= \Darklup\Helper::getOptionData('custom_border_color');


		return [

			'background-color' 	=> esc_html( $colorBg ),
			'color' 			=> esc_html( $colorText ),
			'anchor-color' 		=> esc_html( $colorLink ),
			'anchor-hover-color' => esc_html( $colorLinkHover ),
			'input-bg-color' 	=> '#353535',
			'border-color' 		=> esc_html( $colorBorder ),
			'btn-bg-color' 		=> '#141414',
			'btn-color' 		=> esc_html( $colorText ),

		];


	}
	/**
	 * Get Admin custom color
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public static function AdminCustomColor() {

		$colorBg 	= \Darklup\Helper::getOptionData('admin_custom_bg_color');
		$colorText 	= \Darklup\Helper::getOptionData('admin_custom_text_color');
		$colorLink 	= \Darklup\Helper::getOptionData('admin_custom_link_color');
		$colorLinkHover = \Darklup\Helper::getOptionData('admin_custom_link_hover_color');
		$colorBorder	= \Darklup\Helper::getOptionData('admin_custom_border_color');

		return [

			'background-color' 	=> esc_html( $colorBg ),
			'color' 			=> esc_html( $colorText ),
			'anchor-color' 		=> esc_html( $colorLink ),
			'anchor-hover-color' => esc_html( $colorLinkHover ),
			'input-bg-color' 	=> '#353535',
			'border-color' 		=> esc_html( $colorBorder ),
			'btn-bg-color' 		=> '#141414',
			'btn-color' 		=> esc_html( $colorText ),

		];

	}

    public static function color_preset_1() {
        return [
            // 'background-color' => 'rgb(36,37,37)',
            // 'secondary_bg' => 'rgb(39,40,39)',
            'background-color' => 'rgb(39,40,39)',
            'secondary_bg' => 'rgb(36,37,37)',
            'tertiary_bg' => 'rgb(46,44,44)',
            'color' => '#e5e0d8',
            'anchor-color' => '#EDEDED',
            'anchor-hover-color' => '#3fb950',
            'input-bg-color' => '#353535',
            'border-color' => 'rgba(143, 132, 117, 0.3)',
            'btn-bg-color' => '#141414',
            'btn-color' => '#EDEDED',
        ];
    }

    public static function color_preset_2() {
        return [
            'background-color' => 'rgb(18,18,18)',
            'secondary_bg' => 'rgb(37,38,38)',
            'tertiary_bg' => 'rgb(45,43,43)',
            'color' => '#f7f7f7',
            'anchor-color' => '#749ae5',
            'anchor-hover-color' => '#749ae5',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#f7f7f7',
        ];
    }

    public static function color_preset_3() {
        return [
            'background-color' => 'rgb(13,17,23)',
            'secondary_bg' => 'rgb(35,36,36)',
            'tertiary_bg' => 'rgb(41,41,53)',
            'color' => '#fff',
            'anchor-color' => '#ff8200',
            'anchor-hover-color' => '#ff8200',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#fff',
        ];
        
    }

    public static function color_preset_4() {

        return [
            'background-color' => '#0f172a',
            'secondary_bg' => 'rgb(36,37,38)',
            'tertiary_bg' => 'rgb(47,48,49)',
            'color' => '#fff',
            'anchor-color' => '#ccae05',
            'anchor-hover-color' => '#ccae05',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#fff',
        ];
    }

    public static function color_preset_5() {

        return [
            'background-color' => '#32373c',
            'secondary_bg' => 'rgb(37,38,39)',
            'tertiary_bg' => 'rgb(48,49,50)',
            'color' => '#fff',
            'anchor-color' => '#30ceff',
            'anchor-hover-color' => '#30ceff',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#fff',
        ];
    }

    public static function color_preset_6() {

        return [
            'background-color' => '#071639',
            'secondary_bg' => 'rgb(38,39,40)',
            'tertiary_bg' => 'rgb(48,50,51)',
            'color' => '#fff',
            'anchor-color' => '#03dac5',
            'anchor-hover-color' => '#03dac5',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#fff',
        ];
    }

    public static function color_preset_7() {

        return [
            'background-color' => '#090809',
            'secondary_bg' => 'rgb(39,40,41)',
            'tertiary_bg' => 'rgb(50,51,52)',
            'color' => '#fff',
            'anchor-color' => '#d19fe8',
            'anchor-hover-color' => '#d19fe8',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#fff',
        ];
    }

    public static function color_preset_8() {

        return [
            'background-color' => '#000000',
            'secondary_bg' => 'rgb(40,41,42)',
            'tertiary_bg' => 'rgb(51,52,53)',
            'color' => '#fff',
            'anchor-color' => '#f976e8',
            'anchor-hover-color' => '#f976e8',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#fff',
        ];
    }

    public static function color_preset_9() {

        return [
            'background-color' => '#181818',
            'secondary_bg' => 'rgb(41,42,43)',
            'tertiary_bg' => 'rgb(52,53,54)',
            'color' => '#fff',
            'anchor-color' => '#00d577',
            'anchor-hover-color' => '#00d577',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#fff',
        ];
    }

    public static function color_preset_10() {

        return [
            'background-color' => '#18191a',
            'secondary_bg' => 'rgb(42,43,44)',
            'tertiary_bg' => 'rgb(53,54,55)',
            'color' => '#fff',
            'anchor-color' => '#2e89ff',
            'anchor-hover-color' => '#2e89ff',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#fff',
        ];
    }

    public static function color_preset_11() {

        return [
            'background-color' => '#000000',
            'secondary_bg' => 'rgb(35,35,35)',
            'tertiary_bg' => 'rgb(47,48,45)',
            'color' => '#fff',
            'anchor-color' => '#1da1f2',
            'anchor-hover-color' => '#1da1f2',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#fff',
        ];
    }

    public static function color_preset_12() {

        return [
            'background-color' => '#15202b',
            'secondary_bg' => 'rgb(32,32,32)',
            'tertiary_bg' => 'rgb(41,41,41)',
            'color' => '#fff',
            'anchor-color' => '#1da1f2',
            'anchor-hover-color' => '#1da1f2',
            'input-bg-color' => '#353535',
            'border-color' => '#455465',
            'btn-bg-color' => '#141414',
            'btn-color' => '#fff',
        ];
    }

}