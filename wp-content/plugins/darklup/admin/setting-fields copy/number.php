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
 


trait Number {

  public static $args;


	public function number_field( $args ) {

    $default = [

      'title'     => esc_html__( 'Number Field', 'darklup' ),
      'sub_title' => esc_html__( 'This is number Field', 'darklup' ),
      'placeholder' => '',
      'name'      => '',
      'step'      => '1',
      'min'       => '1',
      'max'       => '10',
      'class'     => '',
      'condition'   => '',

    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::number_markup();

	}

  public static function number_markup() {

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
<!-- <div class="darklup-row <?php echo esc_attr( $args['class'] ); ?> darklup--number--field"
    data-condition="<?php echo esc_html($conditionData); ?>">
    <div class="darklup-col-lg-6 darklup-col-md-12">
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
                    step="<?php echo esc_attr( $args['step'] ); ?>" max="<?php echo esc_attr( $args['max'] ); ?>"
                    class="<?php echo esc_attr( $args['class'] ); ?>" type="number"
                    name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>"
                    placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
                    value="<?php echo esc_html( $value ); ?>">
            </div>
        </div>
    </div>
</div> -->

<div class="darklup-row <?php echo esc_attr( $args['class'] ); ?> darklup--number--field"
    data-condition="<?php echo esc_html($conditionData); ?>">
    <div class="darklup-col-lg-12 darklup-col-md-12">
        <div class="input-area">

            <div class="darklup-single-input-inner style-two">
                <div class="wpc-color-picker--content">
                    <div class="wpc-color-picker--titles">
                        <label
                            for="darklup_<?php echo esc_attr( $fieldName ); ?>"><?php echo esc_html( $args['title'] ); ?></label>
                        <?php 
                if( !empty( $args['sub_title'] ) ) {
                  echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
                }
                ?>
                    </div>
                    <div class="wpc-color-picker--inputs">
                        <input id="darklup_<?php echo esc_attr( $fieldName ); ?>"
                            step="<?php echo esc_attr( $args['step'] ); ?>"
                            max="<?php echo esc_attr( $args['max'] ); ?>"
                            class="<?php echo esc_attr( $args['class'] ); ?>" type="number"
                            name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>"
                            placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
                            value="<?php echo esc_html( $value ); ?>">
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<?php
  }


}  