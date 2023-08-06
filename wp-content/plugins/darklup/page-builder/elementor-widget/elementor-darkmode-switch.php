<?php
namespace Darklup\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * elementor section widget.
 *
 * @since 1.0
 */
class Darklup_Darkmode_Switch extends Widget_Base {

	public function get_name() {
		return 'darklup-darkmode-switch';
	}

	public function get_title() {
		return esc_html__( 'Darkmode Switch', 'darklup' );
	}

	public function get_icon() {
		return 'eicon-adjust';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	protected function _register_controls() {


        // ---------------------------------------- Content Settings ------------------------------
        $this->start_controls_section(
            'darklup_darkmode_switch',
            [
                'label' => esc_html__( 'Dark Mode Switch Settings', 'darklup' ),
            ]
        );

        $this->add_control(
            'switch_style',
            [
                'label' => esc_html__( 'Select Style', 'darklup' ),
                'type' => 'image-select',
                'label_block' => false,
                'options' => \Darklup\Helper::switchDemoImage()
            ]
        );
        
        $this->add_control(
            'text_align',
            [
                'label' => esc_html__( 'Alignment', 'darklup' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'darklup' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'darklup' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'darklup' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .darklup-elementor-switch-wrapper' => 'text-align: {{VALUE}} !important',
                ]
            ]
        );


        $this->end_controls_section(); // End section top content

        
	}

	protected function render() {

        $settings = $this->get_settings();

        echo '<div class="darklup-elementor-switch-wrapper">';
            echo \Darklup\Switch_Style::switchStyle( esc_html( $settings['switch_style'] ) );
        echo '</div>';

    }

	
}
