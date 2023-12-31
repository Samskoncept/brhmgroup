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
 


trait Color_Picker {

  public static $args;

	public function color_field($args) {

    $default = [
      'title'     => esc_html__( 'Color Picker', 'darklup' ),
      'sub_title' => esc_html__( 'Set the color', 'darklup' ),
      'name'      => '',
      'class'     => '',
      'condition' => '',
      'switch_condition' => array(),
    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::color_markup();
		
	}

  public static function color_markup() {


    $optionName = self::$optionName;
    $args = self::$args;
    $getData = self::$getOptionData;
    $fieldName  = $args['name'];
    $value = !empty( $getData[$fieldName] ) ? $getData[$fieldName] : '';

    $conditionData = '';
    if( !empty( $args['condition'] ) ) {
      $conditionData = json_encode( $args['condition'] );
    }

    $switchConditionData = '';
    if( !empty( $args['switch_condition'] ) ) {
        $switchConditionData = json_encode( $args['switch_condition'] );
    }

    ?>
    <div class="darklup-row" data-condition="<?php echo esc_html($conditionData); ?>" data-switchcondition="<?php echo esc_html($switchConditionData); ?>">
      <div class="darklup-col-lg-6 darklup-col-md-12">
        <div class="input-area">
            <div class="darklup-single-input-inner darklup-color-picker">
              <label for="darklup_<?php echo esc_attr( $fieldName ); ?>"><?php echo esc_html( $args['title'] ); ?></label>
              <?php 
              if( !empty( $args['sub_title'] ) ) {
                echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
              }
              ?>
              <input type="text" id="darklup_<?php echo esc_attr( $fieldName ); ?>" class="color-picker" value="<?php echo esc_html( $value ); ?>" name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>" />
            </div>
        </div>
      </div>
    </div>
    <?php
  }



}  
