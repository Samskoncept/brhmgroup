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



trait Color_Scheme_Button {

    public static $args;


    public function color_scheme_radio_field( $args ) {

        $default = [

            'title'     => esc_html__( 'Image Radio Field', 'darklup' ),
            'sub_title' => esc_html__( 'This is image radio Field', 'darklup' ),
            'name'      => '',
            'condition' => '',
            'class'     => '',
            'wrapper_class'  => '',
            'is_pro'    => 'no',
            'options_title'=> [],
            'options' => []

        ];

        $args = wp_parse_args( $args, $default );

        self::$args = $args;

        self::color_scheme_radio_markup();

    }

    public static function color_scheme_radio_markup() {

        $optionName = self::$optionName;
        $args = self::$args;
        $getData = self::$getOptionData;
        $fieldName  = $args['name'];
        $optionTitle  = $args['options_title'];
        $value = !empty( $getData[$fieldName] ) ? $getData[$fieldName] : '';

        $conditionData = '';
        if( !empty( $args['condition'] ) ) {
            $conditionData = json_encode( $args['condition'] );
        }

        ?>
<div class="darklup-row <?php echo esc_html( $args['class'] ); ?>"
    data-condition="<?php echo esc_html($conditionData); ?>">
    <div class="darklup-col-lg-12 darklup-col-md-12">
        <div class="darklup-single-settings-inner color_scheme_wrapper">
            <div class="details">
                <h5><?php echo esc_html( $args['title'] ); ?></h5>
                <?php
                        if( !empty( $args['sub_title'] ) ) {
                            echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
                        }
                        ?>
            </div>
            <div class="rect-design">
                <?php
                        foreach( $args['options'] as $key => $option ) {
                            echo '<label class="rect-design-single"><input class="' . esc_attr($optionTitle[$key]) .'" type="radio" name="' . esc_attr($optionName) . '[' . $fieldName . ']" ' . checked($value, $key, false) . ' value="' . esc_attr($key) . '" /><img src="' . esc_url($option) . '"><span class="label-text">'.esc_attr($optionTitle[$key]).'</span></label>';
                        }
                        ?>
            </div>
        </div>
    </div>
</div>
<?php
    }

}