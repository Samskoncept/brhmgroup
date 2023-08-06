<?php

namespace Darklup;
/**
 *
 * @package    Darklup - WP Dark Mode
 * @version    1.1.2
 * @author   Darklup
 * @Websites:  https://darklup.com/
 *
 */
if (!defined('ABSPATH')) {
    die(DARKLUP_ALERT_MSG);
}

/**
 * Hooks class
 */
class Hooks
{

    /**
     * Hooks constructor
     *
     * @return void
     * @since  1.0.0
     */
    function __construct()
    {
        self::init();
    }

    /**
     * init action and filter hook
     *
     * @return void
     * @since  1.0.0
     */
    public static function init()
    {

        add_action('wp_footer', [__CLASS__, 'modeSwitcher']);
        
        // wp content filter hook
        add_filter('the_content', [__CLASS__, 'pageAndPostTopSwitch']);

        // wp_nav_menu_items hook for darkmode switch show in menu
        $switchInMenu = \Darklup\Helper::getOptionData('switch_in_menu');
        if (!empty($switchInMenu) && $switchInMenu == 'yes') {
            add_filter('wp_nav_menu_items', [__CLASS__, 'add_switch_menu'], 10, 2);
        }

        //
        if(is_admin()){
            $switchInMenu = \Darklup\Helper::getOptionData('backend_darkmode');
            if (!empty($switchInMenu) && $switchInMenu == 'yes') {
                add_action('admin_bar_menu', [__CLASS__, 'add_adminbar_items'], 100);
            }
        }

        // custom css on wp head
        add_action('wp_head', [__CLASS__, 'custom_css']);

    }

    /**
     * get settings option value
     *
     * @param string $optionName
     * @return void
     * @since  1.0.0
     */
    public static function getOptionData($optionName)
    {
        return \Darklup\Helper::getOptionData($optionName);
    }

    /**
     * get switch style
     *
     * @return void
     * @since  1.0.0
     */
    public static function getSwitchStyle()
    {
        $switchStyle = self::getOptionData('switch_style');
        return \Darklup\Switch_Style::switchStyle($switchStyle);
    }

    /**
     * get switch style
     *
     * @since  1.0.0
     * @return void
     */
    public static function getMobileSwitchStyle()
    {
        $switchStyle = self::getOptionData('switch_style_mobile');
        return \Darklup\Switch_Style::switchStyle($switchStyle);
    }
    /**
     * get switch style
     *
     * @since  1.0.0
     * @return void
     */
    public static function getMenuSwitchStyle()
    {
        $switchStyle = self::getOptionData('switch_style_menu');
        return \Darklup\Switch_Style::switchStyle($switchStyle);
    }
    /**
     * Check if page included
     * @param $includedPages
     * @return bool
     */
    public static function isPageIncluded($includedPages)
    {
        if (!empty($includedPages)) {
            if (is_array($includedPages)) {
                if (is_singular('page')) {
                    if (in_array(get_the_ID(), $includedPages)) {
                        return True;
                    }
                } else if(is_singular('post')) {
                    return True;
                }else if (class_exists('woocommerce')) {
                    if (is_shop() && in_array(get_option('woocommerce_shop_page_id'), $includedPages)) {
                        return True;
                    }
                }
            }
        }
        return False;
    }
    /**
     * Check if page Excluded
     * @param $excludedPages
     * @return bool
     */
    public static function isPageExcluded($excludedPages)
    {
        if (!empty($excludedPages)) {
            if (is_array($excludedPages)) {
                if (is_singular('page')) {
                    if (in_array(get_the_ID(), $excludedPages)) {
                        return True;
                    }
                } else if (class_exists('woocommerce')) {
                    if (is_shop() && in_array(get_option('woocommerce_shop_page_id'), $excludedPages)) {
                        return True;
                    }
                }
            }
        }
        return False;
    }

    /**
     * Check if Post is Included
     * @param $includedPosts
     * @return bool
     */
    public static function isPostIncluded($includedPosts)
    {
        if (!empty($includedPosts)) {
            if (is_array($includedPosts)) {
                if (is_singular('post')) {
                    if (in_array(get_the_ID(), $includedPosts)) {
                        return True;
                    }
                }else{
                    return True;
                }
            }
        }
        return False;
    }

    /**
     * Check if Post is Excluded
     * @param $excludedPosts
     * @return bool
     */
    public static function isPostExcluded($excludedPosts)
    {
        if (!empty($excludedPosts)) {
            if (is_array($excludedPosts)) {
                if (is_singular('post')) {
                    if (in_array(get_the_ID(), $excludedPosts)) {
                        return True;
                    }
                }
            }
        }
        return False;
    }


    /**
     * Check if Category is included
     * @param $includedCategories
     * @return bool
     */
    public static function isCategoryIncluded($includedCategories)
    {
        if (!empty($includedCategories)) {
            if (is_array($includedCategories)) {
                if (is_singular('post')) {
                    $current_post_cats = wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) );
                    if(is_array($current_post_cats)){
                        if (array_intersect(wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) ), $includedCategories)) {
                            return True;
                        }
                    }
                }else if(is_singular('page')) {
                    return True;
                }
            }
        }
        return False;
    }

    /**
     * Check if Category is Excluded
     * @param $excludedCategories
     * @return bool
     */
    public static function isCategoryExcluded($excludedCategories)
    {
        if (!empty($excludedCategories)) {
            if (is_array($excludedCategories)) {
                if (is_singular('post')) {
                    $current_post_cats = wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) );
                    if(is_array($current_post_cats)){
                        if (array_intersect(wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) ), $excludedCategories)) {
                            return True;
                        }
                    }
                }
            }
        }
        return False;
    }

    /**
     * Check if Woo Product Excluded
     * @param $excludedProducts
     * @return bool
     */
    public static function isWooProductExcluded($excludedProducts)
    {
        if (!empty($excludedProducts)) {
            if (is_array($excludedProducts)) {
                if (class_exists('woocommerce')) {
                    if (is_product()) {
                        if (in_array(get_the_ID(), $excludedProducts)) {
                            return True;
                        }
                    }
                }
            }
        }
        return False;
    }

    /**
     * Check if Woo Product Included
     * @param $includedProducts
     * @return bool
     */
    public static function isWooProductIncluded($includedProducts)
    {
        if (!empty($includedProducts)) {
            if (is_array($includedProducts)) {
                if (class_exists('woocommerce')) {
                    if (is_product()) {
                        if (in_array(get_the_ID(), $includedProducts)) {
                            return True;
                        }
                    }
                }
            }
        }
        return False;
    }


    /**
     * Check if Woo Category Included
     * @param $includedWooCategories
     * @return bool
     */
    public static function isWooCategoryIncluded($includedWooCategories)
    {
        if (!empty($includedWooCategories)) {
            if (is_array($includedWooCategories)) {
                if (class_exists('woocommerce')) {
                    if (is_product_category()) {
                        $current_category = get_queried_object();
                        if (isset($current_category->term_id)) {
                            if (in_array($current_category->term_id, $includedWooCategories)) {
                                return True;
                            }
                        }
                    }

                }
            }
        }
        return False;
    }

    /**
     * Check if Woo Category Excluded
     * @param $excludedWooCategories
     * @return bool
     */
    public static function isWooCategoryExcluded($excludedWooCategories)
    {
        if (!empty($excludedWooCategories)) {
            if (is_array($excludedWooCategories)) {
                if (class_exists('woocommerce')) {
                    if (is_product_category()) {
                        $current_category = get_queried_object();
                        if (isset($current_category->term_id)) {
                            if (in_array($current_category->term_id, $excludedWooCategories)) {
                                return True;
                            }
                        }
                    }

                }
            }
        }
        return False;
    }

    /**
     * Dark mode switch floating markup
     *
     * @return void
     * @since  1.0.0
     */
    public static function modeSwitcher()
    {
        $allowedToDisplaySwitch = True;
        $excludePages = self::getOptionData('exclude_pages');
        $excludeCategories = self::getOptionData('exclude_categories');
        $excludePosts = self::getOptionData('exclude_posts');

        $includePages = self::getOptionData('include_pages');
        $includePosts = self::getOptionData('include_posts');
        $includeCategories = self::getOptionData('include_categories');

        $excludeWooProducts = self::getOptionData('exclude_woo_products');
        $includedWooProducts = self::getOptionData('include_woo_products');
        $excludedWooCategories = self::getOptionData('exclude_woo_categories');
        $includeWooCategories = self::getOptionData('include_woo_categories');

        if (class_exists('woocommerce')) {
            if (is_product()) {
                if ((!empty($includedWooProducts) && !self::isWooProductIncluded($includedWooProducts))
                    || (!empty($excludeWooProducts) && self::isWooProductExcluded($excludeWooProducts))) {
                    $allowedToDisplaySwitch = False;
                }
            }

            if (is_product_category()) {
                if ((!empty($includeWooCategories) && !self::isWooCategoryIncluded($includeWooCategories))
                    || (!empty($excludedWooCategories) && self::isWooCategoryExcluded($excludedWooCategories))) {
                    $allowedToDisplaySwitch = False;
                }
            }
        }

        if ((!empty($includePages) && !self::isPageIncluded($includePages))
            || (!empty($excludePages) && self::isPageExcluded($excludePages))) {
            $allowedToDisplaySwitch = False;
        }

        if ((!empty($includePosts) && !self::isPostIncluded($includePosts))
            || (!empty($excludePosts) && self::isPostExcluded($excludePosts))) {
            $allowedToDisplaySwitch = False;
        }

        if ((!empty($includeCategories) && !self::isCategoryIncluded($includeCategories))
            || (!empty($excludeCategories) && self::isCategoryExcluded($excludeCategories))) {
            $allowedToDisplaySwitch = False;
        }

        if ($allowedToDisplaySwitch) {
            self::displaySwitcherBtn();
        }else{
            ?>
<script>
let darklupPageExcluded = true;
</script>
<?php
        }
    }



    /**
     * Dark mode switch floating markup
     *
     * @return void
     * @since  1.0.0
     */
    public static function displaySwitcherBtn()
    {
        $switchPosition = self::getOptionData('switch_position');
        $get_screen = wp_is_mobile();
        $switchInDesktop = self::getOptionData('switch_in_desktop');
        $switchInMobile  = self::getOptionData('switch_in_mobile');
        $floatingSwitchClass = '';
        $enable_draggable_floating_switch = self::getOptionData('enable_draggable_floating_switch');
        
        if( !empty( $enable_draggable_floating_switch ) && $enable_draggable_floating_switch == 'yes'){
            $floatingSwitchClass = ' enable-draggable-floating-switch';
        }
        
        if(  self::getOptionData('frontend_darkmode')  == 'yes' ) {

            if( !empty( $switchInDesktop ) && $switchInDesktop == 'yes' && !$get_screen ){ ?>
<div class="darklup-mode-switcher <?php echo esc_attr($switchPosition.$floatingSwitchClass); ?>">
    <div class="mode-switcher-inner switcher-darkmode-enabled darklup-dark-ignore">
        <?php echo self::getSwitchStyle(); ?>
    </div>
</div>
<?php } else if( !empty( $switchInMobile ) && $switchInMobile == 'yes' && $get_screen ) { ?>
<div class="darklup-mode-switcher <?php echo esc_attr($switchPosition.$floatingSwitchClass); ?>">
    <div class="mode-switcher-inner switcher-darkmode-enabled darklup-dark-ignore">
        <?php echo self::getMobileSwitchStyle(); ?>
    </div>
</div>
<?php } else if( !empty( $switchInDesktop ) && $switchInDesktop == 'yes' && ( !empty( $switchInMobile ) && $switchInMobile == 'yes' ) ) { ?>
<div class="darklup-mode-switcher <?php echo esc_attr($switchPosition.$floatingSwitchClass); ?>">
    <div class="mode-switcher-inner switcher-darkmode-enabled darklup-dark-ignore">
        <?php echo self::getSwitchStyle(); ?>
    </div>
</div>

<?php  }

        } 
        
    }

    /**
     * Dark Mode change switch top of page and post
     *
     * @param string $content
     * @return void
     * @since  1.0.0
     */
    public static function pageAndPostTopSwitch($content)
    {

        $abovePosts = self::getOptionData('show_above_posts');
        $abovePages = self::getOptionData('show_above_pages');

        $custom_content = '';

        if ((is_page() && $abovePages) || (is_single() && $abovePosts)) {
            $custom_content = self::getSwitchStyle();
        }

        $custom_content .= $content;
        return $custom_content;

    }

    /**
     * Dark Mode change switch in menu
     *
     * @param html $items , array $args
     * @return void
     * @since  1.0.0
     */
    public static function add_switch_menu($items, $args)
    {

        $locations = self::getOptionData('menu_location');

        if (!empty($locations) && in_array($args->theme_location, $locations)) {
            $items .= '<li class="darklup-menu-switch">' . self::getMenuSwitchStyle() . '</li>';
        }
        return $items;
    }

    /**
     * Dark Mode change switch in admin bar
     *
     * @param object $admin_bar
     * @return void
     * @since  1.0.0
     */
    public static function add_adminbar_items($admin_bar)
    {
        $admin_bar->add_menu(array(
            'id' => 'darklup-admin-switch',
            'title' => '<div class="on-off-toggle button-switch">
                <input class="on-off-toggle__input time_based_darkmode switch-trigger" name="darklup_settings[time_based_darkmode]" value="yes" type="checkbox" id="darklup_admin_darkmode">
                <label for="darklup_admin_darkmode" class="on-off-toggle__slider"></label>
            </div>',
            'href' => '#',
            'meta' => array(
                'title' => esc_html__('Dark Mode Switch', 'darklup'),
            ),
        ));
    }

    /**
     * print custom css
     *
     * @return void
     * @since  1.0.0
     */
    public static function custom_css()
    {
        $compiler = new \ScssPhp\ScssPhp\Compiler();
        try {
            $css = $compiler->compile("html.darklup-dark-mode-enabled{" . self::getOptionData('custom_css') . "}");
        } catch (\Exception $e) {
            $css = self::getOptionData('custom_css');
        }
        ?>
<style>
<?php echo $css;
?>
</style>
<?php
    }


}

/**
 * Initialization
 */
new Hooks();