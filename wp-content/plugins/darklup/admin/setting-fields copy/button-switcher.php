<?php
namespace Darklup\Admin\Field;

/**
 *
 * @package    Darklup - WP Dark Mode
 * @version    1.0.0
 * @author
 * @Websites:
 *
 */

trait Choose_Radio_Buttons
{

    public static $args;

    public function button_radio_field($args)
    {

        $default = [

            // 'title' => esc_html__('Button Radio Field', 'darklup-lite'),
            // 'sub_title' => esc_html__('This is button radio Field', 'darklup-lite'),
            'title' => '',
            'sub_title' => '',
            'name' => '',
            'condition' => '',
            'default' => '',
            'class' => '',
            'wrapper_class' => '',
            'is_pro' => 'no',
            'options' => [],

        ];

        $args = wp_parse_args($args, $default);

        self::$args = $args;

        self::button_radio_markup();

    }

    public static function button_radio_markup()
    {

        $optionName = self::$optionName;
        $args = self::$args;
        $getData = self::$getOptionData;
        $fieldName = $args['name'];
        $default = $args['default'];
        $value = !empty($getData[$fieldName]) ? $getData[$fieldName] : $default;

        $conditionData = '';
        if (!empty($args['condition'])) {
            $conditionData = json_encode($args['condition']);
        }

        ?>
<div class="darklup-row <?php echo esc_html($args['wrapper_class'] . ' ' . $args['class']); ?>"
    data-condition="<?php echo esc_html($conditionData); ?>">
    <div class="darklup-col-lg-12 darklup-col-md-12">
        <div class="darklup-single-settings-inner radio-image-wrapper">
            <div class="darklup-radio-btns-wrap">
                <?php
                if ($args['is_pro'] == 'yes') {
                    echo '<div class="darklup-pro-ribbon">' . esc_html__('Pro', 'darklup-lite') . '</div>';
                }
                if (!($args['sub_title'] == '' AND $args['title'] == '' )) {
                    ?>
                <div class="details">
                    <h5><?php echo esc_html($args['title']); ?></h5>
                    <?php
                    if (!empty($args['sub_title'])) {
                        echo '<p>' . esc_html($args['sub_title']) . '</p>';
                    }
                    ?>
                </div>
                <?php
                }
                ?>

                <div class="button-switch rect-design">
                    <?php
                foreach ($args['options'] as $key => $option) {
                    echo '<div class="radio-btn-wrap"><input type="radio" id="darklup_' . esc_attr($fieldName . $key) . '" name="' . esc_attr($optionName) . '[' . $fieldName . ']" ' . checked($value, $key, false) . ' class="darklup_' . esc_attr($fieldName . $key) . ' radio-btn--input" value="' . esc_attr($key) . '" /><label class="radio-btn-label" for="darklup_' . esc_attr($fieldName . $key) . '">' . esc_attr($option) . '</label></div>';
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