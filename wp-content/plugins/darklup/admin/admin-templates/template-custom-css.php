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


class Custom_Css_Settings_Tab extends Settings_Fields_Base {

  public function get_option_name() {
    return 'darklup_settings'; // set option name it will be same or different name
  }

   public function tab_setting_fields() {

        $this->start_fields_section([

            'title' => esc_html__( 'CUSTOM CSS SETTINGS', 'darklup' ),
            'class' => 'darklup-customcss-settings darklup-d-hide darklup-settings-content',
            'icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/css.svg' ),
            'dark_icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/css-white.svg' ),
            'id'    => 'darklup_custom_css_settings'

        ]);

        $this->css_editor_field([
            'title' => esc_html__( 'Custom CSS', 'darklup' ),
            'name' => 'custom_css',
        ]);

        $this->end_fields_section(); // End fields section

   }

}

new Custom_Css_Settings_Tab();