<?php

/**
 * Plugin Name:       Darklup - WP Dark Mode
 * Plugin URI:        https://darklup.com/
 * Description:          All in one WordPress plugin to create a stunning dark version for your WordPress website and dashboard
 * Version:           3.1.0
 * Author:              Darklup
 * Author URI:          https://darklup.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       darklup
 * Domain Path:       /languages
 */

// Block Direct access
if (!defined('ABSPATH')) {
    die(__('You should not access this file directly!.', 'darklup'));
}

update_option('darklup_lic_Key', 'GPL4IMES-GPL16IES-GPL819ES-TIMEAGPL');
 update_option('darklup_lic_email', 'noreply@gmail.com');
 
/**
 * Define all constant
 *
 */
// Define Constants for direct access alert message.
if (!defined('DARKLUP_ALERT_MSG')) {
    define('DARKLUP_ALERT_MSG', esc_html__('You should not access this file directly.!', 'darklup'));
}

// Version constant
if (!defined('DARKLUP_VERSION')) {
    define('DARKLUP_VERSION', '3.1.0');
}

// Plugin dir path constant
if (!defined('DARKLUP_DIR_PATH')) {
    define('DARKLUP_DIR_PATH', trailingslashit(plugin_dir_path(__FILE__)));
}

if (!defined('DARKLUP_DIR_PATH_WITHOUT_TRAILINGSLASH')) {
    define('DARKLUP_DIR_PATH_WITHOUT_TRAILINGSLASH', plugin_dir_path(__FILE__));
}

// Plugin dir url constant
if (!defined('DARKLUP_DIR_URL')) {
    define('DARKLUP_DIR_URL', trailingslashit(plugin_dir_url(__FILE__)));
}
// Plugin dir admin assets url constant
if (!defined('DARKLUP_DIR_ADMIN_ASSETS_URL')) {
    define('DARKLUP_DIR_ADMIN_ASSETS_URL', trailingslashit(DARKLUP_DIR_URL . 'admin/assets'));
}
// Admin dir path constant
if (!defined('DARKLUP_DIR_ADMIN')) {
    define('DARKLUP_DIR_ADMIN', trailingslashit(DARKLUP_DIR_PATH . 'admin'));
}
// Inc dir path constant
if (!defined('DARKLUP_DIR_INC')) {
    define('DARKLUP_DIR_INC', trailingslashit(DARKLUP_DIR_PATH . 'inc'));
}
// Page builder dir path constant
if (!defined('DARKLUP_DIR_PAGE_BUILDER')) {
    define('DARKLUP_DIR_PAGE_BUILDER', trailingslashit(DARKLUP_DIR_PATH . 'page-builder'));
}
// Plugin Base Path
if (!defined('DARKLUP_BASE_PATH')) {
    define('DARKLUP_BASE_PATH', plugin_basename(__FILE__));
}

require_once "darklupBase.php";

add_action('admin_init', 'darklup_plugin_activation');
function darklup_plugin_activation()
{
    if (is_admin() && current_user_can('activate_plugins') && !is_plugin_active('darklup-lite-wp-dark-mode/darklup-lite.php')) {
        add_action('admin_notices', 'darklup_child_plugin_notice');
    } else {
        if (get_transient('darklup-admin-notice') != 'no') {
            set_transient('darklup-admin-notice', 'yes', 0);
            add_action('admin_notices', 'darklup_plugin_activated_notices');
        }
    }
}

function darklup_plugin_activated_notices()
{
    if (get_transient('darklup-admin-notice')) {
        printf('<div class="notice error is-dismissible"><h3>Warning!</h3><p><strong>' . esc_html__('Your Darklup license is inactive. In order to activate the plugin, receive feature updates, and access premium support, you must enter an active license or make a ', 'darklup') .wp_kses_post('<a href="https://darklup.com/pricing/" target="_blank">purchase</a>.'). '</strong></p><p><a class="button button-primary" href="' . admin_url('/admin.php?page=darklup') . '">' . esc_html__('Activate License', 'darklup') . '</a></p></div>');
    }
}

function darklup_child_plugin_notice()
{
    $darklup_main_plugin = __('Darklup - WP Dark Mode', 'darklup');
    $darklup_lite_plugin = __('Darklup Lite - WP Dark Mode', 'darklup');

    echo '<div class="notice notice-error is-dismissible"><p>' . sprintf(
        esc_html__('%1$s requires %2$s to be installed and activated to function properly. %3$s', 'darklup'),
        '<strong>' . esc_html($darklup_main_plugin) . '</strong>',
        '<strong>' . esc_html($darklup_lite_plugin) . '</strong>',
        '<a href="' . esc_url(admin_url('plugin-install.php?s=DarklupLite&tab=search&type=term')) . '">' . __('Please click on this link and install Darklup Lite - WP Dark Mode', 'darklup') . '</a>'
    )
        . '</p></div>';
}

// Plugin uninstall hook
register_uninstall_hook(__FILE__, 'pluginDeleted');
function pluginDeleted()
{
    delete_option('darklup_settings');
}

/**
 * Darklup final class
 */

final class Darklup
{

    // License File
    public $plugin_file = __FILE__;
    public $responseObj;
    public $licenseMessage;
    public $showMessage = false;
    public $slug = "darklup";
    /**
     * Get the plugin object
     *
     * @since  1.0.0
     * @var null
     */
    private static $instance = null;

    /**
     * Darklup constructor
     *
     * @since  1.0.0
     * @return void
     */

    public function __construct()
    {

        add_action('admin_print_styles', [$this, 'SetAdminStyle']);
        $licenseKey = get_option("darklup_lic_Key", "");
        $liceEmail = get_option("darklup_lic_email", "");
        darklupBase::addOnDelete(function () {
            delete_option("darklup_lic_Key");
        });
        if (darklupBase::CheckWPPlugin($licenseKey, $liceEmail, $this->licenseMessage, $this->responseObj, __FILE__)) {
            set_transient('darklup-admin-notice', 'no', 0);
            add_action('admin_post_darklup_el_deactivate_license', [$this, 'action_deactivate_license']);

            $this->includeFiels();
            add_action('elementor/widgets/widgets_registered', [$this, 'elementorOnWidgetsRegistered']);
        } else {
            if (!empty($licenseKey) && !empty($this->licenseMessage)) {
                $this->showMessage = true;
            }
            update_option("darklup_lic_Key", "") || add_option("darklup_lic_Key", "");
            add_action('admin_post_darklup_el_activate_license', [$this, 'action_activate_license']);
            add_action('admin_menu', [$this, 'InactiveMenu']);
        }

        // Plugin activation hook
        register_activation_hook(__FILE__, [$this, 'pluginActivate']);

        // Plugin deactivation hook
        register_deactivation_hook(__FILE__, [$this, 'pluginDeactivate']);

        //Hooks for Analytics Reports

        if (class_exists('\Darklup\Helper')) {
            add_filter('cron_schedules', [$this, 'analytics_schedules']);
            add_action('admin_init', [$this, 'analytics_schedule_event']);
            add_action('analytics_cron_hook', [$this, 'email_analytics_report']);
        }
    }

    /**
     *
     * @since 1.0.0
     * @return object
     */

    public static function getInstance()
    {

        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * File include
     *
     * @since 1.0.0
     * @return viod
     */

    public function includeFiels()
    {

        require_once DARKLUP_DIR_INC . 'class-helper.php';
        require_once DARKLUP_DIR_INC . 'class-enqueue.php';
        require_once DARKLUP_DIR_INC . 'class-hooks.php';
        require_once DARKLUP_DIR_INC . 'class-color-preset.php';
        require_once DARKLUP_DIR_INC . 'class-switcher-style.php';
        require_once DARKLUP_DIR_INC . 'class-dark-inline-css.php';
        require_once DARKLUP_DIR_INC . 'scssphp/scss.inc.php';
        require_once DARKLUP_DIR_ADMIN . 'setting-fields/class-settings-fields.php';
        require_once DARKLUP_DIR_ADMIN . 'admin.php';
        require_once DARKLUP_DIR_ADMIN . 'inc/class-admin-page.php';
        require_once DARKLUP_DIR_PAGE_BUILDER . 'wpbakery/darklup-vc-init.php';
        require_once DARKLUP_DIR_PAGE_BUILDER . 'shortcode/class-switch-shortcode.php';

        global $pagenow;
        if ($pagenow != 'widgets.php') {
            require_once DARKLUP_DIR_PAGE_BUILDER . 'gutenberg-block/darklup-switch-block/src/init.php';
        }

        require_once DARKLUP_DIR_PAGE_BUILDER . 'wp-widget/widget-darkmode-switch.php';
        // Elemenor custom control
        require_once DARKLUP_DIR_INC . 'custom-controls/elemenor-control/custom-control.php';
    }

    /**
     * Plugin activation default settings
     *
     * @since 1.0.0
     * @return void
     */
    public function pluginActivate()
    {
        // Default options set
        $defaultOption = array(
            "frontend_darkmode" => 'yes',
            "apply_bg_overlay" => 'yes',
            "switch_in_desktop" => 'yes',
            "switch_in_mobile" => 'yes',
            "color_preset_enabled" => 'yes',
            "custom_color_enabled" => 'no',
            "admin_color_preset_enabled" => 'yes',
            "admin_custom_color_enabled" => 'no',
            "switch_style" => '1',
            "switch_style_mobile" => '1',
            "switch_style_menu" => '1',
            "color_preset" => '1',
            "color_admin_preset" => '1',
            "switch_position" => 'bottom_right',
            "darklup_image_effects" => 'yes',
            "full_color_settings" => 'darklup_dynamic',
            "switch_cases" => 'desktop_switch',
            "darkmode_level" => 80,
        );

        if (!get_option("darklup_settings")) {
            update_option('darklup_settings', $defaultOption);
        }

        // Start Analytics & Reporting table
        global $wpdb;

        $sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}darklup_analytics` (
		`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
		`ip_address` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL ,
		`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";

        include_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);

        // End Analytics & Reporting table

    }

    /**
     * Plugin deactivation default settings
     *
     * @since 1.1.3
     * @return void
     */
    public function pluginDeactivate()
    {
        $timestamp = wp_next_scheduled('analytics_cron_hook');
        wp_unschedule_event($timestamp, 'analytics_cron_hook');
    }

    /**
     * Elementor widgets registered
     * @since 1.0.0
     * @return void
     */
    public function elementorOnWidgetsRegistered()
    {

        require_once DARKLUP_DIR_PAGE_BUILDER . 'elementor-widget/elementor-darkmode-switch.php';

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Darklup\Widgets\Darklup_Darkmode_Switch());
    }

    public function SetAdminStyle()
    {
        wp_register_style("darklupLic", plugins_url("assets/css/_lic_style.css", $this->plugin_file), 10);
        wp_enqueue_style("darklupLic");
    }

    public function InactiveMenu()
    {
        add_menu_page("Darklup", "Darklup", 'activate_plugins', "darklup", [$this, "LicenseForm"], plugins_url('darklup/admin/assets/img/darklup-icon.svg'), 6);
    }

    public function action_activate_license()
    {
        check_admin_referer('el-license');
        $licenseKey = !empty($_POST['el_license_key']) ? $_POST['el_license_key'] : "";
        $licenseEmail = !empty($_POST['el_license_email']) ? $_POST['el_license_email'] : "";
        update_option("darklup_lic_Key", $licenseKey) || add_option("darklup_lic_Key", $licenseKey);
        update_option("darklup_lic_email", $licenseEmail) || add_option("darklup_lic_email", $licenseEmail);
        update_option('_site_transient_update_plugins', '');
        wp_safe_redirect(admin_url('admin.php?page=' . $this->slug));
    }

    public function action_deactivate_license()
    {
        check_admin_referer('el-license');
        $message = "";
        if (darklupBase::RemoveLicenseKey(__FILE__, $message)) {
            update_option("darklup_lic_Key", "") || add_option("darklup_lic_Key", "");
            update_option('_site_transient_update_plugins', '');
            deactivate_plugins('/darklup/darklup.php');
            wp_safe_redirect(admin_url('plugins.php'));
        } else {
            wp_safe_redirect(admin_url('admin.php?page=' . $this->slug));
        }
    }

    public function Activated()
    {
        ?>
<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <input type="hidden" name="action" value="darklup_el_deactivate_license" />
    <div class="el-license-container">
        <h3 class="el-license-title"><i class="dashicons-before dashicons-star-filled"></i>
            <?php _e("Darklup License Info", "darklup");?> </h3>
        <hr>
        <ul class="el-license-info">
            <li>
                <div>
                    <span class="el-license-info-title"><?php _e("Status", "darklup");?></span>

                    <?php if ($this->responseObj->is_valid): ?>
                    <span class="el-license-valid"><?php _e("Valid", "darklup");?></span>
                    <?php else: ?>
                    <span class="el-license-valid"><?php _e("Invalid", "darklup");?></span>
                    <?php endif;?>
                </div>
            </li>

            <li>
                <div>
                    <span class="el-license-info-title"><?php _e("License Type", "darklup");?></span>
                    <?php echo $this->responseObj->license_title; ?>
                </div>
            </li>

            <li>
                <div>
                    <span class="el-license-info-title"><?php _e("License Expired on", "darklup");?></span>
                    <?php echo $this->responseObj->expire_date;
        if (!empty($this->responseObj->expire_renew_link)) {
            ?>
                    <a target="_blank" class="el-blue-btn"
                        href="<?php echo $this->responseObj->expire_renew_link; ?>">Renew</a>
                    <?php
}
        ?>
                </div>
            </li>

            <li>
                <div>
                    <span class="el-license-info-title"><?php _e("Support Expired on", "darklup");?></span>
                    <?php
echo $this->responseObj->support_end;
        if (!empty($this->responseObj->support_renew_link)) {
            ?>
                    <a target="_blank" class="el-blue-btn"
                        href="<?php echo $this->responseObj->support_renew_link; ?>">Renew</a>
                    <?php
}
        ?>
                </div>
            </li>
            <li>
                <div>
                    <span class="el-license-info-title"><?php _e("Your License Key", "darklup");?></span>
                    <span
                        class="el-license-key"><?php echo esc_attr(substr($this->responseObj->license_key, 0, 9) . "XXXXXXXX-XXXXXXXX" . substr($this->responseObj->license_key, -9)); ?></span>
                </div>
            </li>
        </ul>
        <div class="el-license-active-btn">
            <?php wp_nonce_field('el-license');?>
            <?php submit_button('Deactivate');?>
        </div>
    </div>
</form>
<?php
}

    public function LicenseForm()
    {
        ?>
<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <input type="hidden" name="action" value="darklup_el_activate_license" />
    <div class="el-license-container">
        <h3 class="el-license-title"><i class="dashicons-before dashicons-star-filled"></i>
            <?php _e("Darklup Licensing", "darklup");?></h3>
        <hr>
        <?php
if (!empty($this->showMessage) && !empty($this->licenseMessage)) {
            ?>
        <div class="notice notice-error is-dismissible">
            <p><?php echo _e($this->licenseMessage, "darklup"); ?></p>
        </div>
        <?php
}
        ?>
        <p><?php _e("Enter your license key here, to activate the product, and get full feature updates and premium support.", "darklup");?>
        </p>
        <ol>
            <li><?php _e("Check Your Email For License Code And Paste The code here. Then click on activate", "darklup");?>
            </li>
        </ol>
        <div class="el-license-field">
            <label for="el_license_key"><?php _e("License code", "darklup");?></label>
            <input type="text" class="regular-text code" name="el_license_key" size="50"
                placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
        </div>
        <div class="el-license-field">
            <label for="el_license_key"><?php _e("Email Address", "darklup");?></label>
            <?php
$purchaseEmail = get_option("darklup_lic_email", get_bloginfo('admin_email'));
        ?>
            <input type="text" class="regular-text code" name="el_license_email" size="50"
                value="<?php echo $purchaseEmail; ?>" placeholder="" required="required">
            <div>
                <small><?php _e("We will send update news of this product by this email address, don't worry, we hate spam", "darklup");?></small>
            </div>
        </div>
        <div class="el-license-active-btn">
            <?php wp_nonce_field('el-license');?>
            <?php submit_button('Activate');?>
        </div>
    </div>
</form>
<?php
}

    /**
     * Darklup  Analytics  Schedules
     *
     * @since  1.1.3
     * @return  $schedules
     */
    public function analytics_schedules($schedules)
    {
        $email_frequency = \Darklup\Helper::getOptionData('darklup_reporting_frequency');

        $interval = '';
        $display = '';

        if ('7' === $email_frequency) {
            $interval = 60 * 60 * 24 * 7;
            $display = esc_html__('Weekly Schedule');
        } elseif ('30' === $email_frequency) {
            $interval = 60 * 60 * 24 * 30;
            $display = esc_html__('Monthly Schedule');
        }

        $schedules['analytics_schedule'] = array(
            'interval' => $interval,
            'display' => $display,
        );

        return $schedules;
    }

    /**
     * Darklup  Email  Analytics  Report
     *
     * @since  1.1.3
     * @return  void
     */
    public function email_analytics_report()
    {
        $enable_analytics = \Darklup\Helper::getOptionData('darklup_show_analytics');
        $enable_email_reporting = \Darklup\Helper::getOptionData('darklup_email_reporting');

        if ('yes' === $enable_analytics && 'yes' === $enable_email_reporting) {

            global $wpdb;
            $table_name = $wpdb->prefix . 'darklup_analytics';
            $email_frequency = \Darklup\Helper::getOptionData('darklup_reporting_frequency');
            $result = $wpdb->get_results("select
			date(created_at) as creation_date,count(*) as cnt
			from $table_name  WHERE   created_at BETWEEN NOW() - INTERVAL ( $email_frequency -1 ) DAY AND NOW()  group by creation_date");

            $mail_body_html = "<h2 style='margin-bottom: 40px;'> This is your Darklup Usage Analytics Report of last " . $email_frequency . " days.</h2> <div style='max-width: 600px;'><h3 style='text-align: center;'>Usage Report</h3> <table style='font-family: arial, sans-serif; border-collapse: collapse;  width: 100%;'> <tr><th style='border: 1px solid #dddddd;text-align: left; padding: 8px;'>Date</th><th style='border: 1px solid #dddddd;text-align: left; padding: 8px;'>Usage</th></tr>";

            $count = 0;

            foreach ($result as $analytics) {
                $count++;

                if ('1' == $analytics->cnt) {
                    $analytics_count = $analytics->cnt . " Time";
                } else {
                    $analytics_count = $analytics->cnt . " Times";
                }

                if ($count % 2 == 0) {
                    $tr_bg = '';
                } else {
                    $tr_bg = "style='background-color:#c7c7c740;'";
                }

                $analytics_phpdate = strtotime($analytics->creation_date);
                $analytics_date = date('d-M-Y', $analytics_phpdate);

                $mail_body_html .= "<tr $tr_bg > <td style='border: 1px solid #dddddd;text-align: left; padding: 8px; width:300px;'>" . $analytics_date . "</td> <td style='border: 1px solid #dddddd;text-align: left; padding: 8px; width:300px;'>" . $analytics_count . "</td> </tr>";
            }

            $mail_body_html .= "</table> </div>";

            $admin_email = get_bloginfo('admin_email');
            $sitename = get_bloginfo('name');
            $subject = "Dark Mode Usage Report for Last " . $email_frequency . " Days - " . $sitename;
            $headers[] = 'Content-Type: text/html; charset=UTF-8';
            $headers[] = 'From: ' . $sitename . ' <' . $admin_email . '>';

            if (sizeof($result) >= 2) {
                wp_mail($admin_email, $subject, $mail_body_html, $headers);
            }
        }
    }

    /**
     * Darklup  Analytics  Schedules Event
     *
     * @since  1.1.3
     * @return  void
     */
    public function analytics_schedule_event()
    {
        // Schedule the event if it is not scheduled.
        if (!wp_next_scheduled('analytics_cron_hook')) {
            wp_schedule_event(time(), 'analytics_schedule', 'analytics_cron_hook');
        }
    }
}

/**
/**base
 * Darklup Initialization
 */
function darklup_add_crossorigin_to_css($html, $handle) {
    $site_url = get_site_url();
    if (strpos($html, '.css') !== false && strpos($html, $site_url) === false && strpos($html, 'crossorigin="anonymous"') === false) {
        $html = str_replace('<link', '<link crossorigin="anonymous"', $html);
    }
    return $html;
}
add_filter('style_loader_tag', 'darklup_add_crossorigin_to_css', 10, 2);

function darklup_check_free_activation()
{
    if (in_array('darklup-lite-wp-dark-mode/darklup-lite.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        Darklup::getInstance();
    }
}
add_action('darklup_init', 'darklup_check_free_activation', 10, 2);
do_action('darklup_init');