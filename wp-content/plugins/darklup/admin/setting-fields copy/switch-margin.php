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



trait Switch_Margin {

    public static $args;


    public function margin_field( $args ) {

        $default = [

            'title'     => esc_html__( 'Margin Field', 'darklup' ),
            'sub_title' => esc_html__( 'This is number Field for Switch Margin', 'darklup' ),
            'placeholder' => array(),
            'name'      => array(),
            'step'      => '1',
            'min'       => '1',
            'max'       => '10',
            'condition' => '',

        ];

        $args = wp_parse_args( $args, $default );

        self::$args = $args;

        self::margin_markup();

    }

    public static function margin_markup() {

        $optionName = self::$optionName;
        $args = self::$args;
        $getData = self::$getOptionData;
        $fieldName  = $args['name'];
        $value = array();
        foreach ($fieldName as $field){
            $value[] = !empty( $getData[$field] ) ? $getData[$field] : '';
        }


        $conditionData = '';
        if( !empty( $args['condition'] ) ) {
            $conditionData = json_encode( $args['condition'] );
        }

        ?>
<!-- <div class="darklup-row" data-condition="<?php echo esc_html($conditionData); ?>">
    <div class="darklup-col-lg-6 darklup-col-md-12">
        <div class="input-area">
            <div class="darklup-multi-input-inner style-two">
                <label><?php echo esc_html( $args['title'] ); ?></label>
                <?php
                        if( !empty( $args['sub_title'] ) ) {
                            echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
                        }
                        ?>
                <div class="darklup-row">
                    <?php
                            foreach ($fieldName as $key=>$field){
                                ?>
                    <div class="darklup-col-lg-6 darklup-col-md-12 darklup-multi-field-container">
                        <input id="darklup_<?php echo esc_attr( $field ); ?>"
                            step="<?php echo esc_attr( $args['step'] ); ?>"
                            max="<?php echo esc_attr( $args['max'] ); ?>" type="number"
                            name="<?php echo esc_attr( $optionName ).'['.$field.']'; ?>"
                            placeholder="<?php echo esc_attr( $args['placeholder'][$key] ); ?>"
                            value="<?php echo esc_html( $value[$key] ); ?>">
                    </div>
                    <?php
                            }
                            ?>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="darklup-row darklup-margin--field" data-condition="<?php echo esc_html($conditionData); ?>">
    <div class="darklup-col-lg-12 darklup-col-md-12">
        <div class="input-area">
            <div class="darklup-multi-input-inner style-two">
                <label><?php echo esc_html( $args['title'] ); ?></label>
                <?php
                        if( !empty( $args['sub_title'] ) ) {
                            echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
                        }
                        ?>
                <div class="darklup-row">
                    <?php
                            foreach ($fieldName as $key=>$field){
                                ?>
                    <div class="darklup-col-lg-3 darklup-col-md-12 darklup-multi-field-container">
                        <input id="darklup_<?php echo esc_attr( $field ); ?>"
                            step="<?php echo esc_attr( $args['step'] ); ?>"
                            max="<?php echo esc_attr( $args['max'] ); ?>" type="number"
                            name="<?php echo esc_attr( $optionName ).'['.$field.']'; ?>"
                            placeholder="<?php echo esc_attr( $args['placeholder'][$key] ); ?>"
                            value="<?php echo esc_html( $value[$key] ); ?>">
                    </div>
                    <?php
                            }
                            ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }


}