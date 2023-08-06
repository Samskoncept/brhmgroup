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
 


trait Switcher {

	public static $args;


	public function switch_field( $args ) {

    $default = [

      'title'     => esc_html__( 'Switch Field', 'darklup' ),
      'sub_title' => esc_html__( 'This is switch Field', 'darklup' ),
      'name'      => '',
      'class'     => '',
      'condition'   => '',
      'auto_off_by_other_switch_on'   => '',

    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::switcher_markup();

	}


	public static function switcher_markup() {

		$optionName = self::$optionName;
	    $args = self::$args;
	    $getData = self::$getOptionData;
	    $fieldName  = $args['name'];
	    $value = !empty( $getData[$fieldName] ) ? $getData[$fieldName] : '';

        $conditionData = '';
        if( !empty( $args['condition'] ) ) {
            $conditionData = json_encode( $args['condition'] );
        }

        $autoOffByOtherSwitchOn = '';
        if( !empty( $args['auto_off_by_other_switch_on'] ) ) {
            $autoOffByOtherSwitchOn = json_encode( $args['auto_off_by_other_switch_on'] );
        }

		?>

<div class="darklup-row <?php echo esc_html( $args['class'] ); ?> darklup-switcher--field"
    data-condition="<?php echo esc_html($conditionData); ?>"
    data-auto-off-by="<?php echo esc_html($autoOffByOtherSwitchOn); ?>">
    <div class="darklup-col-lg-12 darklup-col-md-12">
        <div class="darklup-single-settings-inner">

            <div class="darklup-switcher-inner-content">
                <div class="details">
                    <h5><?php echo esc_html( $args['title'] ); ?></h5>
                    <?php
						if( !empty( $args['sub_title'] ) ) {
							echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
						}
			            ?>
                </div>
                <div class="switcher-colon">:</div>
                <div class="on-off-toggle button-switch">
                    <input class="on-off-toggle__input <?php echo esc_attr($fieldName); ?>"
                        name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>" value="yes" type="checkbox"
                        <?php checked( $value, 'yes' ); ?> id="darklup_<?php echo esc_attr( $fieldName ); ?>" />
                    <label for="darklup_<?php echo esc_attr( $fieldName ); ?>" class="on-off-toggle__slider"></label>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
	}

}  