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
 


trait Text {

  public static $args;


	public function text_field( $args ) {

    $default = [

      'title'     => esc_html__( 'Text Field', 'darklup' ),
      'sub_title' => esc_html__( 'This is Text Field', 'darklup' ),
      'placeholder' => '',
      'name'      => '',
      'class'     => '',
      'condition'   => '',
      'condition_in_btn' => '',

    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::text_markup();

	}

  public static function text_markup() {

    $optionName = self::$optionName;
    $args = self::$args;
    $getData = self::$getOptionData;
    $fieldName  = $args['name'];
    $value = !empty( $getData[$fieldName] ) ? $getData[$fieldName] : '';


    $conditionData = '';
    if( !empty( $args['condition'] ) ) {
        $conditionData = json_encode( $args['condition'] );
    }
    $btnConditionData = '';
    if( !empty( $args['condition_in_btn'] ) ) {
        $btnConditionData = json_encode( $args['condition_in_btn'] );
    }
    ?>

<div class="darklup-row <?php echo esc_attr( $args['class'] ); ?>"
    data-condition="<?php echo esc_html($conditionData); ?>"
    data-btncondition="<?php echo esc_html($btnConditionData); ?>">
    <div class="darklup-col-lg-12 darklup-col-md-12">
        <div class="input-area">

            <div class="darklup-single-input-inner style-two">
                <label
                    for="darklup_<?php echo esc_attr( $fieldName ); ?>"><?php echo esc_html( $args['title'] ); ?></label>
                <?php 
              if( !empty( $args['sub_title'] ) ) {
                echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
              }
              ?>
                <input id="darklup_<?php echo esc_attr( $fieldName ); ?>"
                    class="<?php echo esc_attr( $args['class'] ); ?>" type="text"
                    name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>"
                    placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
                    value="<?php echo esc_html( $value ); ?>">
            </div>
        </div>
    </div>
</div>


<?php
  }


}  