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
 


trait Slider {

  public static $args;


	public function range_slider( $args ) {

    $default = [

      'title'         => esc_html__( 'Slide Range', 'darklup' ),
      'sub_title'     => esc_html__( 'This is Slider Field', 'darklup' ),
      'placeholder'   => '',
      'name'          => '',
      'step'          => '0.01',
      'min'           => '0',
      'max'           => '1',
      'class'         => '',
      'condition'     => '',
      'default_value' => '0',

    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::slider_markup();

	}

  public static function slider_markup() {

    $optionName = self::$optionName;
    $args = self::$args;
    $getData = self::$getOptionData;
    $fieldName  = $args['name'];
    $value = !empty( $getData[$fieldName] ) ? $getData[$fieldName] : '';

    $conditionData = '';
    if( !empty( $args['condition'] ) ) {
        $conditionData = json_encode( $args['condition'] );
    }

    ?>
    <div id="darklup_row_<?php echo esc_attr( $fieldName ); ?>" class="darklup-row <?php echo esc_html( $args['class'] ); ?>" data-condition="<?php echo esc_html($conditionData); ?>" >
      <div class="darklup-col-lg-6 darklup-col-md-12">
        <div class="input-area">
          <div class="darklup-single-input-range style-two">
            <div class="darklup-label-wrapper">
              <label for="darklup_<?php echo esc_attr( $fieldName ); ?>"><?php echo esc_html( $args['title'] ); ?></label>
              <span id="darklup_slider_<?php echo esc_attr( $fieldName );?>" class="darklup-slider-value "></span>
            </div>
              
              <?php 
              if( !empty( $args['sub_title'] ) ) {
                echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
              }
              ?>
              <input id="darklup_<?php echo esc_attr( $fieldName ); ?>" class="<?php echo esc_attr( $args['class'] ); ?> slider-input" type="range" name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>" placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>" value="<?php echo  $value ? esc_html( $value ) : $args['default_value']; ?>"  data-elm="brightness" data-range="output" max='<?php echo esc_attr( $args['max'] ); ?>' min='<?php echo esc_attr( $args['min'] ); ?>' step='<?php echo esc_attr( $args['step'] ); ?>'>

          </div>
        </div>
      </div>
    </div>
    <?php
  }


}  
