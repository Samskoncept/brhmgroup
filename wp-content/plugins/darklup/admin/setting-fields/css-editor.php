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
 


trait CSS_Editor {
  

  public static $args;


  public function css_editor_field( $args ) {

    $default = [

      'title'     => esc_html__( 'CSS Editor Field', 'darklup' ),
      'sub_title' => esc_html__( 'This is CSS editor Field', 'darklup' ),
      'placeholder' => '',
      'name'      => '',
      'class'     => '',

    ];

    $args = wp_parse_args( $args, $default );

    self::$args = $args;

    self::editor_markup();

  }


	public static function editor_markup() {

    $optionName = self::$optionName;
    $args = self::$args;
    $getData = self::$getOptionData;
    $fieldName  = $args['name'];
    $value = !empty( $getData[$fieldName] ) ? $getData[$fieldName] : '';


    $compiler = new \ScssPhp\ScssPhp\Compiler();
    try {
        $value = $compiler->compile($value);
    } catch (\Exception $e) {}

		?>
<div class="darklup-row">
    <div class="darklup-col-lg-12 darklup-col-md-12">
        <div class="input-area">
            <div class="darklup-single-input-inner style-two">
                <label
                    for="darklup_<?php echo esc_attr( $fieldName ); ?>"><?php echo esc_html( $args['title'] ); ?></label>
                <input type="text" hidden id="editortext"
                    name="<?php echo esc_attr( $optionName ).'['.$fieldName.']'; ?>">
                <div id="darklupEditor" class="custom-editor"><?php echo esc_textarea( $value );  ?></div>
            </div>
        </div>
    </div>
</div>
<?php
	}

}  