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

if (!defined('ABSPATH')) {
    die(DARKLUP_ALERT_MSG);
}

/**
 * Darklup_Settings_Page class
 */
class Darklup_Settings_Page
{

    /**
     * Darklup_Settings_Page constructor
     *
     * @since  1.1.2
     * @return void
     */

    public $darklup;
    public function __construct($darklup)
    {

        $darklup_options = get_option('darklup_options');
        $this->darklup = $darklup;
        add_action('admin_menu', array($this, 'addPluginPage'));
        add_action('admin_init', array($this, 'pageInit'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueScripts'));
        add_action('plugin_action_links_' . DARKLUP_BASE_PATH, array($this, 'darklup_action_links'));
        //dashboard widget
        add_action('wp_dashboard_setup', [$this, 'darklup_dashboard_widgets'], 10);
      
    }


    /* action links on plugin page */
    public function darklup_action_links($links)
    {
        $settings_url = add_query_arg('page', 'darklup-setting-admin', get_admin_url() . 'admin.php');
        $setting_arr = array('<a href="' . esc_url($settings_url) . '">' . __('Settings', 'darklup') . '</a>');
        $links = array_merge($setting_arr, $links);
        return $links;
    }

    /**
     * Admin menu page
     * 
     * @since  1.1.2
     * @return void
     */
    public function addPluginPage()
    {
        // This page will be under "Settings"
        add_menu_page(
            esc_html__('Darklup', 'darklup'),
            esc_html__('Darklup', 'darklup'),
            'manage_options',
            'darklup-setting-admin',
            array($this, 'adminPage'),
            esc_url(DARKLUP_DIR_ADMIN_ASSETS_URL . 'img/darklup-icon.svg'),
            6
        );

        add_submenu_page(
            'darklup-setting-admin',
            esc_html__('Darklup', 'darklup-lite'),
            esc_html__('Settings', 'darklup-lite'),
            'manage_options',
            'darklup-setting-admin',
            array($this, 'adminPage')
        );

        add_submenu_page(
            'darklup-setting-admin',
            esc_html__('License', 'darklup-lite'),
            esc_html__('License', 'darklup-lite'),
            'activate_plugins',
            'darklup',
            array($this->darklup, "Activated")
        );
    }

    /**
     * register setting
     * 
     * @since  1.1.2
     * @return void
     */
    function pageInit()
    {
        //register our settings
        register_setting('darklup-settings-group', 'darklup_settings');
    }

    /**
     * Darklup settings page
     * 
     * @since  1.1.2
     * @return void
     */
    public function adminPage()
    {

        // check if the user have submitted the settings
        if (isset($_GET['settings-updated'])) {
            // add settings saved message with the class of "updated"
            add_settings_error('darklup_messages', 'darklup_message', esc_html__('Settings Saved', 'darklup'), 'updated');
        }
        // show error/update messages
        settings_errors('darklup_messages');

        // Admin page form
        Admin_Page_Components::formArea();
    }

    /**
     * Admin enqueue scripts 
     * 
     * @since  1.1.2
     * @return void
     */
    public function enqueueScripts()
    {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_media();
        wp_enqueue_style('darklup-grid', DARKLUP_DIR_ADMIN_ASSETS_URL . 'css/darklup-grid.css', array(), DARKLUP_VERSION, false);
        wp_enqueue_style('magnific', DARKLUP_DIR_ADMIN_ASSETS_URL . 'css/magnific.min.css', array(), DARKLUP_VERSION, false);
        wp_enqueue_style('nice-select', DARKLUP_DIR_ADMIN_ASSETS_URL . 'css/nice-select.css', array(), DARKLUP_VERSION, false);
        wp_enqueue_style('select2-darklup', DARKLUP_DIR_ADMIN_ASSETS_URL . 'css/select2.min.css', array(), DARKLUP_VERSION, false);
        wp_enqueue_style('darklup-style', DARKLUP_DIR_ADMIN_ASSETS_URL . 'css/style.css', array(), DARKLUP_VERSION, false);
        wp_enqueue_style('darklup-switch', DARKLUP_DIR_URL . 'assets/css/darklup-switch.css', array(), DARKLUP_VERSION, false);
        wp_enqueue_style('darklup-responsive', DARKLUP_DIR_ADMIN_ASSETS_URL . 'css/responsive.css', array(), DARKLUP_VERSION, false);
        // wp_enqueue_style('darklup-admin-variables', DARKLUP_DIR_ADMIN_ASSETS_URL . 'css/admin-variables.css', array(), DARKLUP_VERSION, false);
        wp_enqueue_style('darklup-new', DARKLUP_DIR_ADMIN_ASSETS_URL . 'css/new-style.css', array(), DARKLUP_VERSION, false);
        

        wp_enqueue_script('ace-editor', DARKLUP_DIR_ADMIN_ASSETS_URL . 'js//ace/ace.js', array('jquery'), '1.0', true);
        wp_enqueue_script('magnific', DARKLUP_DIR_ADMIN_ASSETS_URL . 'js/magnific.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('select-darklup', DARKLUP_DIR_ADMIN_ASSETS_URL . 'js/select.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('select2-darklup', DARKLUP_DIR_ADMIN_ASSETS_URL . 'js/select2.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('darklup-chart-js', DARKLUP_DIR_ADMIN_ASSETS_URL . 'js/darklup-chart.js', array('jquery'), '1.0');

        // Added JS dynamically for avoiding caching Problem
        Darklup_Enqueue::addDarklupJSWithDynamicVersion('darklup-main', 'admin/assets/js/main.js', array('jquery', 'wp-color-picker'), true);

        // wp_enqueue_script('darklup-main', DARKLUP_DIR_ADMIN_ASSETS_URL . 'js/main.js', array('jquery', 'wp-color-picker'), DARKLUP_VERSION, true);

        $darklup_js = [
            1 => \Darklup\Color_Preset::getColorPreset(1),
            2 => \Darklup\Color_Preset::getColorPreset(2),
            3 => \Darklup\Color_Preset::getColorPreset(3),
            4 => \Darklup\Color_Preset::getColorPreset(4),
            5 => \Darklup\Color_Preset::getColorPreset(5),
            6 => \Darklup\Color_Preset::getColorPreset(6),
            7 => \Darklup\Color_Preset::getColorPreset(7),
            8 => \Darklup\Color_Preset::getColorPreset(8),
            9 => \Darklup\Color_Preset::getColorPreset(9),
            10 => \Darklup\Color_Preset::getColorPreset(10),
            11 => \Darklup\Color_Preset::getColorPreset(11),
            12 => \Darklup\Color_Preset::getColorPreset(12),
        ];

        wp_localize_script('darklup-main', 'darklupPresets', $darklup_js);

        // Added Darklup JS dynamically for avoiding caching Problem
        // Darklup_Enqueue::addDarklupJSWithDynamicVersion();

        $dashboardDarkMode = false;
        $getDashboardDarkMOde = \Darklup\Helper::getOptionData('backend_darkmode');
        if($getDashboardDarkMOde == 'yes') $dashboardDarkMode = true;
        if(!$dashboardDarkMode) return;
        
        $colorMode = 'darklup_dynamic';
        $getMode = \Darklup\Helper::getOptionData('full_color_settings');

        if($getMode !== 'darklup_dynamic'){
            $colorMode = 'darklup_presets';
            Darklup_Enqueue::addDarklupJSWithDynamicVersion('darklup_presets', $src = 'assets/es-js/presets.js', $dep = NULL, $js_footer = false);
            wp_enqueue_style('darklup-admin-variables', DARKLUP_DIR_ADMIN_ASSETS_URL . 'css/admin-variables.css', array(), DARKLUP_VERSION, false);
        }else{
            wp_enqueue_style('darklup-dynamic-new', DARKLUP_DIR_ADMIN_ASSETS_URL . 'css/new-dynamic-style.css', array(), DARKLUP_VERSION, false);
            Darklup_Enqueue::addDarklupJSWithDynamicVersion();
        }

        $darkenLevel = 85;
        $getDarkenLevel = \Darklup\Helper::getOptionData('darkmode_level');
        if($getDarkenLevel) $darkenLevel = $getDarkenLevel;
        
        $colorPreset = Helper::getOptionData('admin_color_preset');
        $presetColor = Color_Preset::getColorPreset($colorPreset);

        $customBg = Helper::getOptionData('admin_custom_bg_color');
        $customBg = Helper::is_real_color($customBg);

        $customSecondaryBg = Helper::getOptionData('admin_custom_secondary_bg_color');
        $customSecondaryBg = Helper::is_real_color($customSecondaryBg);

        $customTertiaryBg = Helper::getOptionData('admin_custom_tertiary_bg_color');
        $customTertiaryBg = Helper::is_real_color($customTertiaryBg);


        $bgColor = esc_html($presetColor['background-color']);
        if($customBg) $bgColor = $customBg;
        $bgColor = Helper::hex_to_color($bgColor);

        $bgSecondaryColor = esc_html($presetColor['secondary_bg']);
        if($customSecondaryBg) $bgSecondaryColor = $customSecondaryBg;
        $bgSecondaryColor = Helper::hex_to_color($bgSecondaryColor);

        $bgTertiary = esc_html($presetColor['tertiary_bg']);
        if($customTertiaryBg) $bgTertiary = $customTertiaryBg;
        $bgTertiary = Helper::hex_to_color($bgTertiary);


        $excludeElement  = Helper::getOptionData('exclude_element');
        $getElements = explode( ',', $excludeElement );
        $excludedElemetns = [];
        if( !empty( $getElements ) ) {
            foreach( $getElements as $element ) {
                if($element){
                    $excludedElemetns[] = trim($element);
                    if (strpos($element, '*') == false) {
                        $excludedElemetns[] = trim($element).' *';
                    } 
                }

            }
        }

        $excludeBgElements  = Helper::getOptionData('exclude_bg_overlay');
        $getBgElements = explode( ',', $excludeBgElements );
        $excludedBgOverlay = [];
        if( !empty( $getBgElements ) ) {
            foreach( $getBgElements as $element ) {
                if($element){
                    $excludedBgOverlay[] = trim($element);
                }
                
            }
        }

        $darklup_js = [
            'primary_bg' => $bgColor,
            'secondary_bg' => $bgSecondaryColor,
            'tertiary_bg' => $bgTertiary,
            'bg_image_dark_opacity' => '0.5',
            'exclude_element' => $excludedElemetns,
            'exclude_bg_overlay' => $excludedBgOverlay,
        ];

        wp_localize_script($colorMode, 'DarklupJs', $darklup_js);

        $siteLogo = Helper::getSiteLogo();
        $frontendObject = array(
            'ajaxUrl' 	  	=> admin_url( 'admin-ajax.php' ),
            'sitelogo' 		=> Helper::getSiteLogo(),
            'lightlogo' 	=> $siteLogo['light'],
            'darklogo' 		=> $siteLogo['dark'],
            'darkenLevel' 	=> $darkenLevel,
            'darkimages' 	=> Helper::getDarkImages(),
            'timeBasedMode' => Helper::darkmodeTimeMaping(),
            'security' => wp_create_nonce('darklup_analytics_hashkey'),
            'time_based_mode_active' => Helper::getOptionData('time_based_darkmode'),
            'time_based_mode_start_time' => Helper::getOptionData('mode_start_time'),
            'time_based_mode_end_time' => Helper::getOptionData('mode_end_time'),
        );

        wp_localize_script( $colorMode, 'frontendObject', $frontendObject);

    }

    /**
     * Darklup  Analytics  
     * 
     * @since  1.1.3
     * @return void
     */
    public function darklup_dashboard_widgets()
    {

        $enable_analytics        =  \Darklup\Helper::getOptionData('darklup_show_analytics');
        $enable_analytics_widget =  \Darklup\Helper::getOptionData('darklup_show_dashboard');

        if ( ! $enable_analytics || ! $enable_analytics_widget ) {
            return;
        }

        wp_add_dashboard_widget('darklup_dark_mode', esc_html__('Darklup Dark Mode Usage', 'darklup'), [
            $this,
            'analytics_dashboard_widget'
        ]);

        // Globalize the metaboxes array, this holds all the widgets for wp-admin.
        global $wp_meta_boxes;

        // Get the regular dashboard widgets array
        // (which already has our new widget but appended at the end).
        $default_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

        // Backup and delete our new dashboard widget from the end of the array.
        $darklup_widget_backup = array('darklup_dark_mode' => $default_dashboard['darklup_dark_mode']);
        unset($default_dashboard['darklup_dark_mode']);

        // Merge the two arrays together so our widget is at the beginning.
        $sorted_dashboard = array_merge($darklup_widget_backup, $default_dashboard);

        // Save the sorted array back into the original metaboxes.
        $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
    }

    /**
     * Darklup  Analytics  Dashboard Widget
     * 
     * @since  1.1.3
     * @return void
     */
    public function analytics_dashboard_widget()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'darklup_analytics';
        $analytics_duration =  \Darklup\Helper::getOptionData('darklup_analytics_duration');
        $result     = $wpdb->get_results("select 
        date(created_at) as creation_date, DATE_FORMAT(created_at, '%d %b') as label_data, count(*) as cnt
        from $table_name  WHERE   created_at BETWEEN NOW() - INTERVAL ( $analytics_duration -1 ) DAY AND NOW()  group by creation_date");

        $max_limit        = 7;
		$result_formatted = [];
        $label_data       = [];
        $data             = [];

		if(sizeof($result) > 7){
			$number_of_iteration = (int) (sizeof($result) / $max_limit) + 1;
			$chunks = array_chunk($result, $number_of_iteration);

			foreach ( $chunks as $single_chunk) {
				$i = 0;
				$usages_sum = 0;
				$first_date = "";
				$last_date = "";
				$len = count($single_chunk);
				foreach ($single_chunk as $item) {
					$usages_sum += $item->cnt;
					if ($i == 0) {
						$first_date = $item->label_data;
					} else if ($i == $len - 1) {
						$last_date = $item->label_data;
						$result_formatted[] = array("label_data" => $first_date." - ".$last_date, "cnt" => $usages_sum);
					}
					$i++;
				}
			}

            foreach ($result_formatted as $analytics) {
                $label_data[] = $analytics["label_data"];
                $data[]       = $analytics["cnt"];
            }

		}else{
			$result_formatted = $result;

            foreach ($result_formatted as $analytics) {
                $label_data[] = $analytics->label_data;
                $data[]       = $analytics->cnt;
            }
		}
        

    ?>

<div class="darklup-chart-wrapper">
    <div class="darklup-chart-header">
        <span><?php esc_html_e("How much percentage of users use dark mode in last  $analytics_duration   days.", 'darklup'); ?></span>
    </div>

    <div style=" height: 300px; width:394px;">
        <canvas id="darklup_analytics_Chart" style="width: 394px;height: 300px;"
            data-labels='<?php echo json_encode( $label_data ); ?>'
            data-values='<?php echo json_encode(  $data ); ?>'></canvas>
    </div>
</div>

<?php
    }


}

if (is_admin()) {
    $Darklup_Settings_Page = new Darklup_Settings_Page(new \Darklup());
}