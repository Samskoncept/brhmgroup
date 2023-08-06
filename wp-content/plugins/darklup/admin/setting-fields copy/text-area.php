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
 


trait Text_Area {

  public static $args;

	public function textarea_field( $args ) {

    $default = [

      'title'     => esc_html__( 'Text Area Field', 'darklup' ),
      'sub_title' => esc_html__( 'This is Text Area Field', 'darklup' ),
      'placeholder' => '',
      'name'      => '',
      'class'     => '',

    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::textarea_markup();
		
	}

  public function textarea_markup() {

    $optionName = self::$optionName;
    $args = self::$args;
    $getData = self::$getOptionData;
    $fieldName  = $args['name'];
    $value = !empty( $getData[$fieldName] ) ? $getData[$fieldName] : '';


    ?>
    <div class="darklup-row">
      <div class="darklup-col-lg-6 darklup-col-md-12">
        <div class="input-area">
            <div class="darklup-single-input-inner style-two">
              <label for="darklup_<?php echo esc_attr( $args['name'] ); ?>"><?php echo esc_html( $args['title'] ); ?></label>
              <?php 
              if( !empty( $args['sub_title'] ) ) {
                echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
              }
              ?>
                <textarea id="darklup_<?php echo esc_attr( $fieldName ); ?>" class="" name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>"><?php echo esc_html( $value ); ?></textarea>
            </div>
        </div>
      </div>
    </div>
    <?php
  }



}  
