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
 


trait Multiple_Selectbox {

  public static $args;

  public function Multiple_select_box( $args ) {

    $default = [
      'title'     => esc_html__( 'Multiple Select Field', 'darklup' ),
      'sub_title' => esc_html__( 'This is Multiple Select Field', 'darklup' ),
      'name'        => '',
      'class'       => '',
      'options'     => []
    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::multiple_selectbox_markup();
  }


	public static function multiple_selectbox_markup() {
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
<!-- <div class="darklup-row" data-condition="<?php echo esc_html($conditionData); ?>">
    <div class="darklup-col-lg-6 darklup-col-md-12">
        <div class="darklup-single-settings-inner">
            <div class="details">
                <h5><?php echo esc_html( $args['title'] ); ?></h5>
                <?php
              if( !empty( $args['sub_title'] ) ) {
                echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
              }
              ?>
            </div>
            <div class="button-switch" style="margin-left: 10px;">
                <div class="single-select-inner">

                    <select class="darklup-select2" name="<?php echo esc_attr( $optionName ).'['.$fieldName.'][]'; ?>"
                        multiple="multiple">
                        <?php 
                    foreach( $args['options'] as  $key => $option ) {

                      $v = '';

                      if( is_array( $value ) && in_array( $key , $value ) ) {

                        $v = $key;

                      }

                      echo '<option value="'.esc_attr( $key ).'" '.selected( $key, $v, false ).'>'.esc_html( $option ).'</option>';
                    }
                    ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="darklup-row <?php echo esc_attr( $args['class'] ); ?>"
    data-condition="<?php echo esc_html($conditionData); ?>">
    <div class="darklup-col-lg-12 darklup-col-md-12">
        <div class="darklup-single-settings-inner">

            <div class="details">
                <h5><?php echo esc_html( $args['title'] ); ?></h5>
                <?php
              if( !empty( $args['sub_title'] ) ) {
                echo '<p>'.esc_html( $args['sub_title'] ).'</p>';
              }
              ?>
            </div>
            <div class="button-switch" style="margin-left: 10px;">
                <div class="single-select-inner">

                    <select class="darklup-select2" name="<?php echo esc_attr( $optionName ).'['.$fieldName.'][]'; ?>"
                        multiple="multiple">
                        <?php 
                    foreach( $args['options'] as  $key => $option ) {

                      $v = '';

                      if( is_array( $value ) && in_array( $key , $value ) ) {

                        $v = $key;

                      }

                      echo '<option value="'.esc_attr( $key ).'" '.selected( $key, $v, false ).'>'.esc_html( $option ).'</option>';
                    }
                    ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
	}

}  