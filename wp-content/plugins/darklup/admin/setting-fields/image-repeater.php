<?php
namespace Darklup\Admin\Field;
 /**
  * 
  * @package    Darklup - WP Dark Mode
  * @version    1.1.2
  * @author     
  * @Websites: 
  *
  */
 


trait Image_Repeater {

  public static $args;


	public function image_repeater_field( $args ) {

    $default = [
      'title'     => esc_html__( 'Image Repeater Field', 'darklup' ),
      'sub_title' => esc_html__( 'This is image repeater Field', 'darklup' ),
      'placeholder' => '',
      'name'      => '',
      'class'     => ''
    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::image_repeater_markup();

	}

  public static function image_repeater_markup() {

    $optionName = self::$optionName;
    $args = self::$args;
    $getData = self::$getOptionData;
    $fieldName  = $args['name'];
    $lightValue = !empty( $getData['light_img'] ) ? $getData['light_img'] : '';
    $darkValue = !empty( $getData['dark_img'] ) ? $getData['dark_img'] : '';
    $images = '';
    // array check
    if( is_array( $lightValue ) && is_array( $darkValue ) ) {
      $images = array_combine( $lightValue, $darkValue);
    }
    
    ?>
<div class="darklup-row darklup--image-repeater--field">
    <div class="darklup-col-lg-12 darklup-col-md-12">
        <div class="input-area">
            <div class="darklup-single-input-inner style-two">
                <label
                    for="darklup_<?php echo esc_attr( $fieldName ); ?>"><?php echo esc_html( $args['title'] ); ?></label>
                <div class="img-url-repeater">
                    <div class="field-wrapper">
                        <?php
                  if( !empty( $images ) ):
                    foreach ( $images as $key => $value ) :
                  ?>
                        <div class="single-field">
                            <input type="text" name="darklup_settings[light_img][]"
                                placeholder="<?php esc_html_e( 'Light Image Url', 'darklup' ); ?>"
                                value="<?php echo esc_url( $key ); ?>" />
                            <input type="text" class="darklup-image-repeater-dark-img"
                                name="darklup_settings[dark_img][]"
                                placeholder="<?php esc_html_e( 'Dark Image Url', 'darklup' ); ?>"
                                value="<?php echo esc_url( $value ); ?>" />
                            <span
                                class="removetime fb-admin-btn"><?php esc_html_e( 'Remove', 'foodbook-lite' ); ?></span>
                        </div>
                        <?php 
                  endforeach;
                  endif
                  ?>
                    </div>
                    <span class="addFieldGroup"><?php esc_html_e( 'Add', 'foodbook-lite' ); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
  }


}  