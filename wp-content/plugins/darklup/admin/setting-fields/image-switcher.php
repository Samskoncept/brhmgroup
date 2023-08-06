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
 


trait Image_Radio_Button {

  public static $args;


  public function image_radio_field( $args ) {

    $default = [

      'title'     => esc_html__( 'Image Radio Field', 'darklup' ),
      'sub_title' => esc_html__( 'This is image radio Field', 'darklup' ),
      'name'      => '',
      'condition' => '',
      'class'     => '',
      'condition_in_btn' => '',
      'options' => []

    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::image_radio_markup();

  }

	public static function image_radio_markup() {

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
<div class="darklup-row HELLO <?php echo esc_html( $args['class'] ); ?>"
    data-condition="<?php echo esc_html($conditionData); ?>"
    data-btncondition="<?php echo esc_html($btnConditionData); ?>">
    <div class="darklup-col-lg-6 darklup-col-md-12">
        <div class="darklup-single-settings-inner radio-image-wrapper">
            <div class="details">
                <h5><?php echo esc_html( $args['title'] ); ?></h5>
                <?php
                if( !empty( $args['sub_title'] ) ) {
                  echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
                }
                ?>
            </div>
            <div class="button-switch">
                <?php 
                foreach( $args['options'] as $key => $option ) {
                  echo '<label class="radio-img"><input type="radio" name="'.esc_attr( $optionName ).'['.$fieldName.']" '.checked(  $value,$key,false ).' value="'.esc_attr( $key ).'" /><img src="'.esc_url( $option ).'"></label>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="darklup-col-lg-2 darklup-col-md-12"></div>
    <div class="darklup-col-lg-4 darklup-col-md-12">
        <div class="darklup-switch-preview-inner">
            <div class="details">
                <h5><?php echo esc_html__('Switch Preview', 'darklup'); ?></h5>
                <p><?php echo esc_html__('Choose Switch Style to preview switch toggle effect and style.', 'darklup'); ?>
                </p>
            </div>

            <div class="darklup-switch-preview darklup-switch-preview-1">
                <?php echo \Darklup\Switch_Style::switchStyle(1, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-2">
                <?php echo \Darklup\Switch_Style::switchStyle(2, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-3">
                <?php echo \Darklup\Switch_Style::switchStyle(3, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-4">
                <?php echo \Darklup\Switch_Style::switchStyle(4, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-5">
                <?php echo \Darklup\Switch_Style::switchStyle(5, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-6">
                <?php echo \Darklup\Switch_Style::switchStyle(6, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-7">
                <?php echo \Darklup\Switch_Style::switchStyle(7, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-8">
                <?php echo \Darklup\Switch_Style::switchStyle(8, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-9">
                <?php echo \Darklup\Switch_Style::switchStyle(9, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-10">
                <?php echo \Darklup\Switch_Style::switchStyle(10, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-11">
                <?php echo \Darklup\Switch_Style::switchStyle(11, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-12">
                <?php echo \Darklup\Switch_Style::switchStyle(12, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-13">
                <?php echo \Darklup\Switch_Style::switchStyle(13, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-14">
                <?php echo \Darklup\Switch_Style::switchStyle(14, true); ?>
            </div>
            <div class="darklup-switch-preview darklup-switch-preview-15">
                <?php echo \Darklup\Switch_Style::switchStyle(15, true); ?>
            </div>
        </div>
    </div>
</div>
<?php
	}

}  