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


class Advance_Settings_Tab extends Settings_Fields_Base {

  public function get_option_name() {
    return 'darklup_settings'; // set option name it will be same or different name
  }

   public function tab_setting_fields() {

        $this->start_fields_section([
            'title' => 'ADVANCE SETTINGS',
            'class' => 'darklup-advance-settings darklup-d-hide darklup-settings-content',
            'icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/advanced.svg' ),
            'dark_icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/advanced-white.svg' ),
            'id'    => 'darklup_advance_settings'
        ]);


        $this->switch_field([
          'title' => esc_html__( 'Enable Frontend Dark mode', 'darklup' ),
          'sub_title' => esc_html__( 'Turn ON to enable the dark mode in the frontend.', 'darklup' ),
          // 'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
          'name' => 'frontend_darkmode'
        ]);
  
        $this->switch_field([
          'title' => esc_html__( 'Enable Dashboard Dark mode', 'darklup' ),
          'sub_title' => esc_html__( 'Turn ON to enable the dark mode in the admin dashboard.', 'darklup' ),
          // 'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
          'name' => 'backend_darkmode'
        ]);

       $this->switch_field([
           'title'     => esc_html__( 'Dark Mode as Default', 'darklup' ),
           'sub_title' => esc_html__( 'Make dark mode by default. Users will see dark mode first after visiting.', 'darklup' ),
           'name'      => 'default_dark_mode'
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

        $this->switch_field([
          'title'     => esc_html__( 'Time Based Dark Mode', 'darklup' ),
          'sub_title' => esc_html__( 'Automatically turn on the dark mode between a given time range.', 'darklup' ),
          'name'      => 'time_based_darkmode'
        ]);
        $this->select_box([
          'title'     => esc_html__( 'Dark Mode Start Time', 'darklup' ),
          'sub_title' => esc_html__( 'Time to start dark mode.', 'darklup' ),
          'name'      => 'mode_start_time',
          'condition' => ["key" => "time_based_darkmode", "value" => "yes"],
          'options'   => \Darklup\Helper::getTimes()
        ]);
        $this->select_box([
          'title'     => esc_html__( 'Dark Mode End Time', 'darklup' ),
          'sub_title' => esc_html__( 'Time to end dark mode.', 'darklup' ),
          'condition' => ["key" => "time_based_darkmode", "value" => "yes"],
          'name'      => 'mode_end_time',
          'options'   => \Darklup\Helper::getTimes()
        ]);

        $this->end_fields_section();

   }


}

new Advance_Settings_Tab();