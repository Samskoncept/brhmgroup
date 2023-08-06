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
 

abstract class Settings_Fields_Base {

  public static  $optionName;

  public static $getOptionData;

  use \Darklup\Admin\Field\CSS_Editor;
  use \Darklup\Admin\Field\Image_Radio_Button;
  use \Darklup\Admin\Field\Color_Scheme_Button;
  use \Darklup\Admin\Field\Select;
  use \Darklup\Admin\Field\Switcher;
  use \Darklup\Admin\Field\Text_Area;
  use \Darklup\Admin\Field\Text;
  use \Darklup\Admin\Field\Color_Picker;
  use \Darklup\Admin\Field\Multiple_Selectbox;
  use \Darklup\Admin\Field\Number;
  use \Darklup\Admin\Field\Switch_Margin;
  use \Darklup\Admin\Field\Image_Repeater;
  use \Darklup\Admin\Field\Media_Upload;
  use \Darklup\Admin\Field\Slider;
  use \Darklup\Admin\Field\Switch_Image_Effects;
  use \Darklup\Admin\Field\Choose_Radio_Buttons;


  public function __construct() {

    self::$optionName = $this->get_option_name();
    self::$getOptionData = get_option(self::$optionName);

    $this->tab_setting_fields();

  }

  public function get_option_name() {}
  public function tab_setting_fields() {}

  public function start_fields_section( $args ) {

    $default = [
      'title'     => esc_html__( 'Title goes here', 'darklup' ),
      'class'     => '',
      'icon'      => '',
      'dark_icon' => '',
      'id'        => '',
    ];

    $args = wp_parse_args( $args, $default );

    ?>
<div class="<?php echo esc_attr( $args['class'] ); ?>" id="<?php echo esc_attr( $args['id'] ); ?>">
    <div class="darklup-section-title">
        <div class="darklup-row">
            <div class="darklup-col-sm-8 darklup-col-12 darklup-item-center">
                <div class="darklup-title-icon">
                    <img class="admin-light-icon" src="<?php echo esc_url( $args['icon'] ); ?>"
                        alt="<?php echo esc_attr( $args['title'] ); ?>" />
                    <img class="admin-dark-icon" src="<?php echo esc_url( $args['dark_icon'] ); ?>"
                        alt="<?php echo esc_attr( $args['title'] ); ?>" />
                </div>
                <h3 class="title"><?php echo esc_html( $args['title'] ); ?></h3>
            </div>
            <?php 
              // Settings save button
              require DARKLUP_DIR_ADMIN .'admin-templates/template-save-button.php';
              ?>
        </div>
    </div>
    <?php
  }

  public function end_fields_section() {
    echo '</div>';
  }


}