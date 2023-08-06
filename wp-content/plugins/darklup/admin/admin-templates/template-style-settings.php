<?php

namespace Darklup\Admin;
/**
 *
 * @package    Darklup - WP Dark Mode
 * @version    1.1.2
 * @author
 * @Websites:
 *
 */
class Style_Settings_Tab extends Settings_Fields_Base
{

    public function get_option_name()
    {
        return 'darklup_settings'; // set option name it will be same or different name
    }

    public function tab_setting_fields()
    {

        $this->start_fields_section([
            'title' => esc_html__('SWITCH STYLES', 'darklup'),
            'class' => 'darklup-style-settings darklup-d-hide darklup-settings-content',
            'icon' => esc_url(DARKLUP_DIR_URL . 'assets/img/style.svg'),
            'dark_icon' => esc_url(DARKLUP_DIR_URL . 'assets/img/style-white.svg'),
            'id' => 'darklup_style_settings'
        ]);

        $switch_cases = [
            'desktop_switch' => 'Floating Switch (Desktop)',
            'mobile_switch' => 'Floating Switch (Mobile)',
            'menu_switch' => 'Menu Switch',
            'advance_style' => 'Advance Settings',
        ];

        $this->button_radio_field([
            'class' => 'settings-color-preset',
            'name' => 'switch_cases',
            'options' => $switch_cases,
            'default' => 'desktop_switch',
        ]);

        $switch_styles = [
            '1' => DARKLUP_DIR_URL . 'assets/img/switch-1.svg',
            '2' => DARKLUP_DIR_URL . 'assets/img/switch-2.svg',
            '3' => DARKLUP_DIR_URL . 'assets/img/switch-3.svg',
            '4' => DARKLUP_DIR_URL . 'assets/img/switch-4.svg',
            '5' => DARKLUP_DIR_URL . 'assets/img/switch-5.png',
            '6' => DARKLUP_DIR_URL . 'assets/img/switch-6.svg',
            '7' => DARKLUP_DIR_URL . 'assets/img/switch-7.svg',
            '8' => DARKLUP_DIR_URL . 'assets/img/switch-8.svg',
            '9' => DARKLUP_DIR_URL . 'assets/img/switch-9.svg',
            '10' => DARKLUP_DIR_URL . 'assets/img/switch-10.svg',
            '11' => DARKLUP_DIR_URL . 'assets/img/switch-11.png',
            '12' => DARKLUP_DIR_URL . 'assets/img/switch-12.png',
            '13' => DARKLUP_DIR_URL . 'assets/img/switch-13.svg',
            '14' => DARKLUP_DIR_URL . 'assets/img/switch-14.svg',
            '15' => DARKLUP_DIR_URL . 'assets/img/switch-15.svg',
        ];

        /******************************** Desktop Settings **********************************************/
        $this->switch_field([
            'title'     => esc_html__( 'Display Floating Switch in Desktop', 'darklup' ),
            'sub_title' => esc_html__( 'Enable the switch to show the dark mode switch button on the Desktop screen.', 'darklup' ),
            'name'      => 'switch_in_desktop',
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'input_classes' => 'darklup_default_checked'
          ]);

        $this->image_radio_field([
            'title' => esc_html__('Switch Style', 'darklup'),
            'sub_title' => esc_html__('Select the switcher button style for the frontend.', 'darklup'),
            'class' => 'settings-color-preset',
            'name' => 'switch_style',
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'options' => $switch_styles
        ]);

        $this->select_box([
            'title' => esc_html__('Zoom Level', 'darklup'),
            'sub_title' => esc_html__('Select the zoom level on text accessibility switcher button on the frontend.', 'darklup'),
            'condition' => ["key" => "switch_style", "value" => "12"],
            'class' => 'accessibility-zoom-level',
            'name' => 'accessibility_zoom_level',
            'options' => [
                '120' => esc_html__('Large    ', 'darklup'),
                '150' => esc_html__('Extra Large    ', 'darklup'),
                '180' => esc_html__('Huge    ', 'darklup')
            ]
        ]);

        $this->select_box([
            'title' => esc_html__('Switch Animation', 'darklup'),
            'sub_title' => esc_html__('Select an animation effect for the switch.', 'darklup'),
            'name' => 'darklup_switcher_animate',
            'condition' => ["key" => "switch_cases", "value" => "advance_style"],
            'options' => [
                'none' => esc_html__('None', 'darklup'),
                'animate_vibrate'   => esc_html__('Vibrate', 'darklup'),
                'animate_shake'     => esc_html__('Shake', 'darklup'),
                'animate_heartbeat' => esc_html__('Heartbeat', 'darklup'),
                'animate_rotate'    => esc_html__('Rotate', 'darklup'),
                'animate_spring'    => esc_html__(' Spring', 'darklup'),
            ]
        ]);
        $this->switch_field([
            'title' => esc_html__('Show tooltip?', 'darklup'),
            'sub_title' => esc_html__('Choose to display tooltip on switch hover.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "advance_style"],
            'name' => 'darklup_show_tooltip'
        ]);



        $this->text_field([
            'title' => esc_html__('Tooltip Text on Dark Mode Button', 'darklup'),
            'sub_title' => esc_html__('Text to be displayed on Tooltip when hover on dark mode button.', 'darklup'),
            'name' => 'tooltip_text_on_dark',
            'condition' => ["key" => "switch_cases", "value" => "advance_style"],
            'placeholder' => esc_html__('e.g Toggle Dark Mode', 'darklup')
        ]);
        $this->text_field([
            'title' => esc_html__('Tooltip Text on Font Zoom Button', 'darklup'),
            'sub_title' => esc_html__('Text to be displayed on Tooltip when hover on font zoom button.', 'darklup'),
            'name' => 'tooltip_text_on_font',
            'condition' => ["key" => "switch_cases", "value" => "advance_style"],
            'placeholder' => esc_html__('e.g Toggle Font Size', 'darklup')
        ]);
        $this->color_field([
            'title' => esc_html__('Tooltip Background Color', 'darklup'),
            'sub_title' => esc_html__('Set switch background color.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "advance_style"],
            'name' => 'tooltip_bg_color'
        ]);
        $this->color_field([
            'title' => esc_html__('Tooltip Text Color', 'darklup'),
            'sub_title' => esc_html__('Set switch text color.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "advance_style"],
            'name' => 'tooltip_text_color'
        ]);



        $this->color_field([
            'title' => esc_html__('Switch Base Background Color', 'darklup'),
            'sub_title' => esc_html__('Set switch background color.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15),
            'name' => 'custom_switch_bg_color'
        ]);

        $this->color_field([
            'title' => esc_html__('Switch Icon Color', 'darklup'),
            'sub_title' => esc_html__('Set switch icon color.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(1, 2, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15),
            'name' => 'custom_switch_icon_color'
        ]);

        $this->color_field([
            'title' => esc_html__('Switch Icon Plate Color', 'darklup'),
            'sub_title' => esc_html__('Set switch icon plate color.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(2, 3, 4, 5, 6, 7, 13),
            'name' => 'custom_switch_icon_plate_color'
        ]);

        $this->color_field([
            'title' => esc_html__('Switch Text Color', 'darklup'),
            'sub_title' => esc_html__('Set switch text color.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(4, 5, 6, 7),
            'name' => 'custom_switch_text_color'
        ]);
        $this->color_field([
            'title' => esc_html__('Switch Border Color', 'darklup'),
            'sub_title' => esc_html__('Set switch border color.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(7, 12),
            'name' => 'custom_switch_border_color'
        ]);
        
        $this->color_field([
            'title' => esc_html__('Active Switch Background Color', 'darklup'),
            'sub_title' => esc_html__('Set switch border color.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(12),
            'name' => 'custom_switch_active_bg_color'
        ]);
        $this->color_field([
            'title' => esc_html__('Active Switch Icon Color', 'darklup'),
            'sub_title' => esc_html__('Set switch border color.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(12),
            'name' => 'custom_switch_active_icon_color'
        ]);

        $this->color_field([
            'title' => esc_html__('Switch Base Background Color on Dark Mode', 'darklup'),
            'sub_title' => esc_html__('Set switch background color when dark mode is active.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(5, 7, 8, 9, 10, 15),
            'name' => 'custom_switch_bg_color_on_dark'
        ]);
        $this->color_field([
            'title' => esc_html__('Switch Icon Color on Dark Mode', 'darklup'),
            'sub_title' => esc_html__('Set switch icon color when dark mode is active.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(8, 9, 10, 11, 15),
            'name' => 'custom_switch_icon_color_on_dark'
        ]);
        $this->color_field([
            'title' => esc_html__('Switch Icon Plate Color on Dark Mode', 'darklup'),
            'sub_title' => esc_html__('Set switch icon plate color when dark mode is active.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(7),
            'name' => 'custom_switch_icon_plate_color_on_dark'
        ]);
        $this->color_field([
            'title' => esc_html__('Switch Text Color on Dark Mode', 'darklup'),
            'sub_title' => esc_html__('Set switch text color when dark mode is active.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(5, 7),
            'name' => 'custom_switch_text_color_on_dark'
        ]);
        $this->color_field([
            'title' => esc_html__('Switch Border Color on Dark Mode', 'darklup'),
            'sub_title' => esc_html__('Set switch border color when dark mode is active.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'switch_condition' => array(7),
            'name' => 'custom_switch_border_color_on_dark'
        ]);


        
        $this->margin_field([
            'title' => esc_html__('Custom Switch Size (px)', 'darklup'),
            'sub_title' => esc_html__('Set floating switch custom size in px.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'name' => array("switch_size_base_width", "switch_size_base_height"),
            'step' => '1',
            'max' => '500',
            'placeholder' => array("Width (Default 100)", "Height (Default 40)"),
        ]);

        $this->switch_field([
            'title' => esc_html__('Enable Draggable Floating Switch', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "advance_style"],
            'sub_title' => esc_html__('This feature allow users to drag the floating toggle switch to any position on the page.', 'darklup'),
            'name' => 'enable_draggable_floating_switch'
        ]);

        $this->select_box([
            'title' => esc_html__('Switch Position', 'darklup'),
            'sub_title' => esc_html__('Select the position of the floating dark mode switcher button on the frontend.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'class' => 'settings-switch-position',
            'name' => 'switch_position',
            'options' => [
                'top_right' => esc_html__('Top Right', 'darklup'),
                'top_left' => esc_html__('Top Left', 'darklup'),
                'bottom_right' => esc_html__('Bottom Right ', 'darklup'),
                'bottom_left' => esc_html__('Bottom Left', 'darklup'),
            ]
        ]);


        $this->select_box([
            'title' => esc_html__('Switch Margin Unit', 'darklup'),
            'sub_title' => esc_html__('Select the unit (pixel or percentage) to set Customized Switch Margin.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'class' => 'settings-switch-position',
            'name' => 'switch_margin_unit',
            'options' => [
                'pixel' => esc_html__('Pixel (px)', 'darklup'),
                'percent' => esc_html__('Percent (%)', 'darklup')
            ]
        ]);


        $this->margin_field([
            'title' => esc_html__('Switch Margin', 'darklup'),
            'sub_title' => esc_html__('Set floating switch margin in given unit.', 'darklup'),
            'name' => array("switch_top_margin", "switch_bottom_margin", "switch_right_margin", "switch_left_margin"),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'step' => '1',
            'max' => '5000',
            'placeholder' => array("Top Margin", "Bottom Margin", "Right Margin", "Left Margin")
        ]);

        $this->number_field([
            'title' => esc_html__('Text Font Size', 'darklup'),
            'sub_title' => esc_html__('Set dark mode text font size.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'class' => 'settings-switch-position',
            'name' => 'body_font_size',
            'step' => '1',
            'max' => '50',
            'placeholder' => esc_html__('e.g 14', 'darklup')
        ]);
        $this->text_field([
            'title' => esc_html__('Switch Text (Light)', 'darklup'),
            'sub_title' => esc_html__('Switch light text.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'class' => 'settings-switch-position',
            'name' => 'switch_text_light',
            'placeholder' => esc_html__('e.g Light', 'darklup')
        ]);
        $this->text_field([
            'title' => esc_html__('Switch Text (Dark)', 'darklup'),
            'sub_title' => esc_html__('Switch dark text.', 'darklup'),
            'condition' => ["key" => "switch_cases", "value" => "desktop_switch"],
            'class' => 'settings-switch-position',
            'name' => 'switch_text_dark',
            'placeholder' => esc_html__('e.g Dark', 'darklup')
        ]);

        

        /******************************** Mobile Settings **********************************************/

        $this->switch_field([
            'title'     => esc_html__( 'Display Floating Switch in Mobile', 'darklup' ),
            'sub_title' => esc_html__( 'Enable the switch to show the dark mode switch button on the Mobile screen.', 'darklup' ),
            'name'      => 'switch_in_mobile',
            'condition' => ["key" => "switch_cases", "value" => "mobile_switch"],
            'input_classes' => 'darklup_default_checked'
          ]);
          $this->image_radio_field([
            'title' => esc_html__('Switch Style', 'darklup-lite'),
            'sub_title' => esc_html__('Select the switcher button style for the frontend.', 'darklup-lite'),
            'class' => 'settings-switch-style mobile-switch-style',
            'name' => 'switch_style_mobile',
            'condition' => ["key" => "switch_cases", "value" => "mobile_switch"],
            'options' => $switch_styles
        ]);


        /******************************** Menu Settings ************************************ */
        $this->switch_field([
          'title'     => esc_html__( 'Display Switch in Menu', 'darklup' ),
          'sub_title' => esc_html__( 'Darkmode switch display in the menu.', 'darklup' ),
          'condition' => ["key" => "switch_cases", "value" => "menu_switch"],
          'name'      => 'switch_in_menu'
        ]);

        $this->image_radio_field([
            'title' => esc_html__('Switch Style', 'darklup-lite'),
            'sub_title' => esc_html__('Select the switcher button style for the frontend.', 'darklup-lite'),
            'class' => 'settings-switch-style menu-switch-style',
            'name' => 'switch_style_menu',
            'condition' => ["key" => "switch_cases", "value" => "menu_switch"],
            'options' => $switch_styles
        ]);
        $this->Multiple_select_box([
            'title'     => esc_html__( 'Select Menu', 'darklup' ),
            'sub_title' => esc_html__( 'Set the menu location', 'darklup' ),
            'condition' => ["key" => "switch_cases", "value" => "menu_switch"],
            'name'      => 'menu_location',
            'options'   => \Darklup\Helper::getMenuLocations()
          ]);
       $this->margin_field([
           'title' => esc_html__('Switch Menu Margin (px)', 'darklup'),
           'sub_title' => esc_html__('Set switch menu margin in px.', 'darklup'),
           'condition' => ["key" => "switch_cases", "value" => "menu_switch"],
           'name' => array("switch_menu_top_margin", "switch_menu_bottom_margin", "switch_menu_right_margin", "switch_menu_left_margin"),
           'step' => '1',
           'max' => '200',
           'placeholder' => array("Top Margin", "Bottom Margin", "Right Margin", "Left Margin")
       ]);


        $this->end_fields_section(); // End fields section

    }

}

new Style_Settings_Tab();