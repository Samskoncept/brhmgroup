<?php
namespace Darklup;
 /**
  * 
  * @package    Darklup - WP Dark Mode
  * @version    1.1.2
  * @author     
  * @Websites: 
  *
  */
 
class Admin_Page_Components {

	public static function logo() {
		?>
<div class="darklup-logo">
    <div class="darklup-logo-inner">
        <img class="logo-light" src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/darklup-logo.png' ); ?>"
            alt="<?php esc_attr_e( 'plugin logo', 'darklup' ); ?>">
        <img class="logo-dark" src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/daklup-dark-logo.png' ); ?>"
            alt="<?php esc_attr_e( 'plugin logo', 'darklup' ); ?>">
        <span class="darklup--version">
            <span class="darklup-version-inner">
                <?php echo DARKLUP_VERSION; ?>
            </span>
        </span>
    </div>


</div>
<?php
	}

	public static function formArea() {
		?>
<div class="darklup-admin-wrap">
    <form class="admin-darklup" method="post" action="options.php">
        <?php 
          settings_fields( 'darklup-settings-group' ); 
          do_settings_sections( 'darklup-settings-group' );
          ?>
        <div class="darklup-main-area darklup-admin-settings-area">
            <div class="darklup-row">
                <div class="darklup-col-sm-3 darklup-col-md-3 darklup-col-12 padding-0">
                    <div class="darklup-menu-area">
                        <?php
                      	self::logo();
                        // Tab menu
                        require DARKLUP_DIR_ADMIN .'admin-templates/template-tabs.php';
                      	?>
                    </div>
                </div>

                <div class="darklup-col-sm-9 darklup-col-12 padding-0">
                    <div class="darklup-settings-area darklup-admin-dark-ignore">
                        <?php
                      require DARKLUP_DIR_ADMIN .'admin-templates/template-home-settings.php';
                      require DARKLUP_DIR_ADMIN .'admin-templates/template-advance-settings.php';
                      require DARKLUP_DIR_ADMIN .'admin-templates/template-color-settings.php';
                      require DARKLUP_DIR_ADMIN .'admin-templates/template-style-settings.php';
                      require DARKLUP_DIR_ADMIN .'admin-templates/template-image-settings.php';
                      require DARKLUP_DIR_ADMIN .'admin-templates/template-woocommerce-settings.php';
                      require DARKLUP_DIR_ADMIN .'admin-templates/template-inc-exc-settings.php';
                      require DARKLUP_DIR_ADMIN .'admin-templates/template-trigger-settings.php';
                      require DARKLUP_DIR_ADMIN .'admin-templates/template-custom-css.php';
                      require DARKLUP_DIR_ADMIN .'admin-templates/template-analytics-settings.php';
                      ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
	}

}