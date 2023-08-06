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


class General_Settings_Tab extends Settings_Fields_Base {

    public function get_option_name() {
      return 'darklup_settings'; // set option name it will be same or different name
    }


   public function tab_setting_fields() {

        $this->start_fields_section([

            'title' => 'GENERAL SETTINGS',
            'class' => 'darklup-general-settings darklup-d-hide darklup-settings-content',
            'icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/general.svg' ),
            'dark_icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/general-white.svg' ),
            'id' => 'darklup_general_settings'

        ]);

        $this->switch_field([
          'title' => esc_html__( 'Enable Frontend Dark mode', 'darklup' ),
          'sub_title' => esc_html__( 'Turn ON to enable the dark mode in the frontend.', 'darklup' ),
          'name' => 'frontend_darkmode'
        ]);

        $this->switch_field([
          'title'     => esc_html__( 'Display Floating Switch in Desktop', 'darklup' ),
          'sub_title' => esc_html__( 'Enable the switch to show the dark mode switch button on the Desktop screen.', 'darklup' ),
          'name'      => 'switch_in_desktop',
          'input_classes' => 'darklup_default_checked'
        ]);

        $this->switch_field([
          'title'     => esc_html__( 'Display Floating Switch in Mobile', 'darklup' ),
          'sub_title' => esc_html__( 'Enable the switch to show the dark mode switch button on the Mobile screen.', 'darklup' ),
          'name'      => 'switch_in_mobile',
          'input_classes' => 'darklup_default_checked'
        ]);
        
        $this->switch_field([
          'title' => esc_html__( 'Enable Backend Dark mode', 'darklup' ),
          'sub_title' => esc_html__( 'Enable the backend dark mode to display a dark mode switch button in the admin bar for the admins on the backend.', 'darklup' ),
          'name' => 'backend_darkmode'
        ]);
        $this->switch_field([
          'title' => esc_html__( 'Enable OS Aware Dark Mode', 'darklup' ),
          'sub_title' => esc_html__( 'This option will be served a dark mode of your website when their device preference is set to Dark Mode.', 'darklup' ),
          'name' => 'enable_os_switcher'
        ]);

       $this->switch_field([
           'title' => esc_html__( 'Enable Keyboard Shortcut', 'darklup' ),
           'sub_title' => esc_html__( 'Press Ctrl+Alt+D to turn ON / OFF dark mode', 'darklup' ),
           'name' => 'keyboard_shortcut'
       ]);
       
        $this->end_fields_section(); // End fields section

   }




}

new General_Settings_Tab();