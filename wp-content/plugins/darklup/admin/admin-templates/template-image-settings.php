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


class Image_Settings_Tab extends Settings_Fields_Base {

    public function get_option_name() {
      return 'darklup_settings'; // set option name it will be same or different name
    }


   public function tab_setting_fields() {

        $this->start_fields_section([

            'title' => esc_html__( 'IMAGE SETTINGS', 'darklup' ),
            'class' => 'darklup-image-settings darklup-d-hide darklup-settings-content',
            'icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/picture.svg' ),
            'dark_icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/picture-white.svg' ),
            'id' => 'darklup_image_settings'

        ]);

        $this->image_effects_switch_field([
          'title' => esc_html__( 'Show Image Effects', 'darklup' ),
          'sub_title' => esc_html__( 'Enable/ disable the dark mode image effects.', 'darklup' ),
          'name' => 'darklup_image_effects'
        ]);

        $this->range_slider([
          'title' => esc_html__( 'Grayscale', 'darklup' ),
          'sub_title' => esc_html__( '', 'darklup' ),
          'condition' => ["key" => "darklup_image_effects", "value" => "yes"],
          'default_value' => '0',
          'class' => 'settings-slider',
          'name'  => 'image_grayscale',
        ]);

        $this->range_slider([
          'title' => esc_html__( 'Brightness', 'darklup' ),
          'sub_title' => esc_html__( '', 'darklup' ),
          'condition' => ["key" => "darklup_image_effects", "value" => "yes"],
          'default_value' => '1',
          'class' => 'settings-slider',
          'name'  => 'image_brightness',
          'step'  => '0.1',
          'max'   => '3',
          'min'   => '0',
        ]);

        $this->range_slider([
          'title' => esc_html__( 'Contrast', 'darklup' ),
          'sub_title' => esc_html__( '', 'darklup' ),
          'condition' => ["key" => "darklup_image_effects", "value" => "yes"],
          'default_value' => '1',
          'class' => 'settings-slider',
          'name'  => 'image_contrast',
          'step'  => '0.1',
          'max'   => '3',
          'min'   => '0',
        ]);

        $this->range_slider([
          'title' => esc_html__( 'Opacity', 'darklup' ),
          'sub_title' => esc_html__( '', 'darklup' ),
          'condition' => ["key" => "darklup_image_effects", "value" => "yes"],
          'default_value' => '1',
          'class' => 'settings-slider',
          'name'  => 'image_opacity',
        ]);

        $this->range_slider([
          'title' => esc_html__( 'Sepia', 'darklup' ),
          'sub_title' => esc_html__( '', 'darklup' ),
          'condition' => ["key" => "darklup_image_effects", "value" => "yes"],
          'default_value' => '0',
          'class' => 'settings-slider',
          'name'  => 'image_sepia',
        ]);



        $this->media_upload_field([
          'title' => esc_html__( 'Logo Light Url', 'darklup' ),
          'class' => 'settings-switch-position',
          'sub_title' => esc_html__( 'Set logo light mode url.', 'darklup' ),
          'name'  => 'logo_light_url'
        ]);
        $this->media_upload_field([
          'title' => esc_html__( 'Logo Dark Url', 'darklup' ),
          'sub_title' => esc_html__( 'Set logo dark mode url.', 'darklup' ),
          'class' => 'settings-switch-position',
          'name'  => 'logo_dark_url'
        ]);


        $this->image_repeater_field([
          'title' => esc_html__( 'Dark Mode Image Upload', 'darklup' ),
          'sub_title' => esc_html__( 'Set darkmode image.', 'darklup' ),
          'class' => 'settings-switch-position',
          'name'  => 'image_darkmode'
        ]);


        $this->end_fields_section(); // End fields section

   }


}

new Image_Settings_Tab();