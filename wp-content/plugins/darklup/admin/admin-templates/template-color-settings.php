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


class Color_Settings_Tab extends Settings_Fields_Base {

  public function get_option_name() {
    return 'darklup_settings'; // set option name it will be same or different name
  }

   public function tab_setting_fields() {

      $this->start_fields_section([
          'title' => 'COLOR SETTINGS',
          'class' => 'darklup-color-settings darklup-d-hide darklup-settings-content',
          'icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/color.svg' ),
          'dark_icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/color-white.svg' ),
          'id' => 'darklup_color_settings'
      ]);

      $switch_cases = [
        'darklup_dynamic' => 'Dynamic',
        'front_end_colors' => 'Front End Color Presets',
        'dashoard_colors' => 'Admin Dashboard Color Presets',
      ];

      $this->button_radio_field([
          'class' => 'settings-color-preset',
          'name' => 'full_color_settings',
          'options' => $switch_cases,
          'default' => 'front_end_colors',
      ]);

      ?>

<div class="darklup-row  darkluplite-dynamic-color"
    data-condition='{"key":"full_color_settings","value":"darklup_dynamic"}'>
    <div class="darklup-col-lg-12 darklup-col-md-12 darklup-col-12 align-self-center">
        <div class="darklup-single-about">
            <div class="details">
                <h3><span
                        class="dashicons dashicons-info-outline important-note--icon"></span><?php esc_html_e('About Dynamic Dark Mode', 'darklup-lite');?>
                </h3>
                <p class="darklup-welcome--notice">
                    <?php esc_html_e("With the help of the dynamic dark mode option, you can easily enable the dark mode feature on your website
          without doing any complex configuration. Darklup Dark Mode utilizes an intelligent, dynamic algorithm to
          effortlessly generate stunning dark mode color schemes for your website.", 'darklup-lite')?>
                </p>
            </div>
        </div>

    </div>

</div>


<div class="darkluplite-presets-customization-wrap darkluplite-dynamic-color-level"
    data-condition='{"key":"full_color_settings","value":"darklup_dynamic"}'>
    <div class="darkluplite-row darkluplite-section--header">
        <h3>Dark Mode Intensity (Default: 80)</h3>
        <p>Adjust the dark mode intensity for your website by selecting a desired level. The website background will
            become darker as you increase the value.<br> At 100%, the background color will be completely dark.
            Implementing this adjustment can significantly enhance the visual aesthetics of your website.<br>
            Surprisingly, you may not need to replace any existing images on your website to look good in dark mode.</p>
    </div>

    <?php

      $this->range_slider([
        'title' => esc_html__( 'Value', 'darklup' ),
        // 'sub_title' => esc_html__( 'Adjust the dark mode intensity for your website by selecting a desired level. The website background will become darker as you increase the value. At 100%, the background color will be completely dark.', 'darklup' ),
        'sub_title' => esc_html__( '', 'darklup' ),
        'condition' => ["key" => "full_color_settings", "value" => "darklup_dynamic"],
        'default_value' => '80',
        'class' => 'settings-slider',
        'name'  => 'darkmode_level',
        'step'  => '1',
        'max'   => '100',
        'min'   => '60',
      ]);
?>
</div>

<?php

      $preset_image_titles = ['1' => 'Default', '2' => 'Blue', '3' => 'Orange', '4' => 'Bird Flower', '5' => 'Dim Light',
      '6' => 'Light Green', '7' => 'Bright Ube', '8' => 'Blush Pink', '9' => 'Generic Green', '10' => 'Facebook', '11' => 'Twitter Lights', '12' => 'Twitter Dim'];
      $preset_images = [
          '1' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Default.svg',
          '2' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Blue.svg',
          '3' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Orange.svg',
          '4' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Bird-Flower.svg',
          '5' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Dim-Light.svg',
          '6' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Light-Green.svg',
          '7' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Bright-Ube.svg',
          '8' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Blush-Pink.svg',
          '9' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Generic-Green.svg',
          '10' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Facebook.svg',
          '11' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Twitter-Lights-Out.svg',
          '12' => DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/Twitter-Dim.svg',
      ];

       $this->color_scheme_radio_field([
           'title' => esc_html__( 'Front-End Darkmode Color Preset', 'darklup' ),
           'sub_title' => esc_html__( 'Select the front-end darkmode color.', 'darklup' ),
           'class' => 'settings-color-preset front-end-dark--presets',
           'name' => 'color_preset',
           'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
           'options_title' => $preset_image_titles,
           'options' => $preset_images
       ]);
        
       $this->color_scheme_radio_field([
           'title' => esc_html__( 'Dashboard Darkmode Color Preset', 'darklup' ),
           'sub_title' => esc_html__( 'Select the admin darkmode color.', 'darklup' ),
           'class' => 'settings-color-preset dashboard-dark--presets',
           'condition' => ["key" => "admin_color_preset_enabled", "value" => "yes"],
           'name' => 'color_admin_preset',
           'options_title' => $preset_image_titles,
           'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
           'options' => $preset_images
       ]);

        ?>
<div class="darkluplite-presets-customization-wrap"
    data-condition='{"key":"full_color_settings","value":"front_end_colors"}'>
    <div class="darkluplite-row darkluplite-section--header">
        <h3>Preset Color Customization</h3>
        <p>Customize the preset colors whatever you want.</p>
    </div>

    <?php

      $this->color_field([
        'title' => esc_html__( 'Background Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Select the primary background color of your website when dark mode is enabled.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
        'name' => 'custom_bg_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Secondary Background Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom background color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
        'name' => 'custom_secondary_bg_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Tertiary Background Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom background color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
        'name' => 'custom_tertiary_bg_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Text Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom text color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
        'name' => 'custom_text_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Link Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom link color.', 'darklup-lite' ),
        'name' => 'custom_link_color',
        'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
      ]);
      $this->color_field([
        'title' => esc_html__( 'Link Hover Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom link hover color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
        'name' => 'custom_link_hover_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Border Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom border color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
        'name' => 'custom_border_color'
      ]);

      $this->color_field([
        'title' => esc_html__( 'Button Background Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom button background Color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
        'name' => 'custom_btn_bg_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Button Text Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom button text Color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
        'name' => 'custom_btn_text_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Input Field Background Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom button text Color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "front_end_colors"],
        'name' => 'custom_input_bg_color'
      ]);
      
      ?>
</div>
<?php

      // Admin Colors

      ?>
<div class="darkluplite-presets-customization-wrap"
    data-condition='{"key":"full_color_settings","value":"dashoard_colors"}'>
    <div class="darkluplite-row darkluplite-section--header">
        <h3>Preset Color Customization</h3>
        <p>Customize the preset colors whatever you want.</p>
    </div>
    <?php




      $this->color_field([
        'title' => esc_html__( 'Background Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Select the primary background color of your website when dark mode is enabled.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
        'name' => 'admin_custom_bg_color'
      ]);
    $this->color_field([
        'title' => esc_html__( 'Secondary Background Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom background color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
        'name' => 'admin_custom_secondary_bg_color'
      ]);
    $this->color_field([
        'title' => esc_html__( 'Tertiary Background Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom background color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
        'name' => 'admin_custom_tertiary_bg_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Text Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom text color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
        'name' => 'admin_custom_text_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Link Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom link color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
        'name' => 'admin_custom_link_color',
      ]);
      $this->color_field([
        'title' => esc_html__( 'Link Hover Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom link hover color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
        'name' => 'admin_custom_link_hover_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Border Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom border color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
        'name' => 'admin_custom_border_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Button Background Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom button background Color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
        'name' => 'admin_custom_btn_bg_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Button Text Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom button text Color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
        'name' => 'admin_custom_btn_text_color'
      ]);
      $this->color_field([
        'title' => esc_html__( 'Input Field Background Color', 'darklup-lite' ),
        'sub_title' => esc_html__( 'Set custom button text Color.', 'darklup-lite' ),
        'condition' => ["key" => "full_color_settings", "value" => "dashoard_colors"],
        'name' => 'admin_custom_input_bg_color'
      ]);
      
        ?>
</div>
<?php

        $this->end_fields_section(); // End fields section

   }




}

new Color_Settings_Tab();