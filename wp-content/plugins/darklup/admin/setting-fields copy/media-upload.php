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
 


trait Media_Upload {

  public static $args;

	public function media_upload_field( $args ) {

    $default = [

      'title'     => esc_html__( 'Text Area Field', 'darklup' ),
      'sub_title' => esc_html__( 'This is Text Area Field', 'darklup' ),
      'placeholder' => '',
      'name'      => '',
      'class'     => '',

    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::media_upload_markup();
		
	}

  public static function media_upload_markup() {

    $optionName = self::$optionName;
    $args       = self::$args;
    $getData    = self::$getOptionData;
    $fieldName  = $args['name'];
    $value = !empty( $getData[$fieldName] ) ? $getData[$fieldName] : '';

    ?>
<!-- <div class="darklup-row">
    <div class="darklup-col-lg-6 darklup-col-md-12">
        <div class="input-area">
            <div class="darklup-single-input-inner style-two">
                <label
                    for="darklup_<?php echo esc_attr( $args['name'] ); ?>"><?php echo esc_html( $args['title'] ); ?></label>
                <?php 
              if( !empty( $args['sub_title'] ) ) {
                echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
              }
              ?>
                <input class="darklup_image_uploader" type="text"
                    name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>"
                    value="<?php echo esc_html( $value ); ?>" />
                <input type="button" class="darklup_image_upload_btn"
                    value="<?php esc_html_e( 'Upload', 'darklup' ) ?>" />

            </div>
        </div>
    </div>
</div> -->

<div class="darklup-row darklup--media--field <?php echo esc_attr( $args['class'] ); ?>">
    <div class="darklup-col-lg-12 darklup-col-md-12">
        <div class="input-area">

            <div class="darklup-single-input-inner style-two">
                <label
                    for="darklup_<?php echo esc_attr( $args['name'] ); ?>"><?php echo esc_html( $args['title'] ); ?></label>
                <?php 
              if( !empty( $args['sub_title'] ) ) {
                echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
              }
              ?>
                <div class="darklup-media--inputs">
                    <input class="darklup_image_uploader" type="text"
                        name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>"
                        value="<?php echo esc_html( $value ); ?>" />

                    <input type="button" class="darklup_image_upload_btn"
                        value="<?php esc_html_e( 'Upload', 'darklup-lite' ) ?>" />

                </div>


            </div>
        </div>
    </div>
</div>
<?php
  }



}  