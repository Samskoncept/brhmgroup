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
 * Helper class
 */
class Helper
{

    /**
     * Switch style and demo image list
     * @return array
     */
    public static function switchDemoImage()
    {

        $images = [
            '1' => [
                'name' => 'Switch 1',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-1.svg',
            ],
            '2' => [
                'name' => 'Switch 2',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-2.svg',
            ],
            '3' => [
                'name' => 'Switch 3',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-3.svg',
            ],
            '4' => [
                'name' => 'Switch 4',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-4.png',
            ],
            '5' => [
                'name' => 'Switch 5',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-5.png',
            ],
            '6' => [
                'name' => 'Switch 6',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-6.svg',
            ],
            '7' => [
                'name' => 'Switch 7',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-7.svg',
            ],
            '8' => [
                'name' => 'Switch 8',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-8.svg',
            ],
            '9' => [
                'name' => 'Switch 9',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-9.svg',
            ],
            '10' => [
                'name' => 'Switch 10',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-10.svg',
            ],
            '11' => [
                'name' => 'Switch 11',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-11.png',
            ],
            '12' => [
                'name' => 'Switch 12',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-12.png',
            ],
            '13' => [
                'name' => 'Switch 12',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-13.svg',
            ],
            '14' => [
                'name' => 'Switch 12',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-14.svg',
            ],
            '15' => [
                'name' => 'Switch 12',
                'url' => DARKLUP_DIR_URL . 'assets/img/switch-15.svg',
            ],

        ];

        return $images;

    }

    /**
     * get settings option value
     * @param string $optionKey
     * @return void
     */
    public static function getOptionData($optionKey)
    {

        $options = get_option('darklup_settings');

        $value = '';

        if (!empty($options[$optionKey])) {
            $value = $options[$optionKey];
        }

        return $value;

    }


    // cehck if string is a real color
    public static function is_real_color($color_string) {
        // Remove any whitespace or other characters that might interfere with the pattern matching
        $color_string = preg_replace('/\s+/', '', $color_string);
      
        // Check if the string matches any of the color patterns
        if (preg_match('/^#?([a-fA-F0-9]{3}|[a-fA-F0-9]{6}|[a-fA-F0-9]{8})$/', $color_string) ||
            preg_match('/^rgb\((\d{1,3}),(\d{1,3}),(\d{1,3})\)$/', $color_string) ||
            preg_match('/^rgba\((\d{1,3}),(\d{1,3}),(\d{1,3}),([01]?\.?\d*?)\)$/', $color_string)) {
          return $color_string;
        } else {
          return false;
        }
      }

    public static function hex_to_color($colorString) {

        $trimColorString = trim($colorString, "# ");

        // check if the string is already an RGB color
        if (preg_match('/^rgb\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})\)$/', $trimColorString, $matches)) {
            return $colorString;
            // return array($matches[1], $matches[2], $matches[3]);
        }
        if (ctype_xdigit($trimColorString) && strlen($trimColorString) == 6) {
            // convert the hexadecimal string to RGB values
            $rgb = array(
              hexdec(substr($trimColorString, 0, 2)),
              hexdec(substr($trimColorString, 2, 2)),
              hexdec(substr($trimColorString, 4, 2))
            );
            $colorString = "rgb($rgb[0], $rgb[1], $rgb[1])";
            return $colorString;
      }
      return $colorString;
    } 
 
 
      /**
     * get time list
     *
     * @return array
     */
    public static function getTimes()
    {

        return [
            '00:00' => '12:00 AM',
            '01:00' => '01:00 AM',
            '02:00' => '02:00 AM',
            '03:00' => '03:00 AM',
            '04:00' => '04:00 AM',
            '05:00' => '05:00 AM',
            '06:00' => '06:00 AM',
            '07:00' => '07:00 AM',
            '08:00' => '08:00 AM',
            '09:00' => '09:00 AM',
            '10:00' => '10:00 AM',
            '11:00' => '11:00 AM',
            '12:00' => '12:00 PM',
            '13:00' => '01:00 PM',
            '14:00' => '02:00 PM',
            '15:00' => '03:00 PM',
            '16:00' => '04:00 PM',
            '17:00' => '05:00 PM',
            '18:00' => '06:00 PM',
            '19:00' => '07:00 PM',
            '20:00' => '08:00 PM',
            '21:00' => '09:00 PM',
            '22:00' => '10:00 PM',
            '23:00' => '11:00 PM',
        ];

    }

    /**
     * Time maping
     *
     * @return bool
     */
    public static function darkmodeTimeMaping()
    {

        $basedDarkModeActive = self::getOptionData('time_based_darkmode');

        if (!$basedDarkModeActive) {
            return;
        }

        $getStartTime = self::getOptionData('mode_start_time');
        $getEndTime = self::getOptionData('mode_end_time');
        date_default_timezone_set("Asia/Dhaka");
        $currentTime = date('H:i');

        $currentTime = strtotime(date('H:i'));
        $startTime = strtotime($getStartTime);
        $endTime = strtotime($getEndTime);

        $darkModeActivity = false;

        if ($startTime > $endTime) {
            if ($currentTime <= $endTime) {
                $darkModeActivity = true;
            }
            $endTime += (24 * 3600);
        }

        if ($currentTime >= $startTime && $currentTime <= $endTime) {
            $darkModeActivity = true;
        }

        return $darkModeActivity;

    }
    /**
     * Set dark mode switch text light/dark
     *
     * @return array
     */
    public static function switchText()
    {

        $light = self::getOptionData('switch_text_light');
        $dark = self::getOptionData('switch_text_dark');

        return [
            'light' => !empty($light) ? esc_html($light) : 'Light',
            'dark' => !empty($dark) ? esc_html($dark) : 'Dark',
        ];

    }

    /**
     * Get pages list
     *
     * @return array
     */
    public static function getPages()
    {
        $pages = [];
        foreach (get_pages() as $page) {
            $pages[$page->ID] = $page->post_title;
        }
        return $pages;
    }

    /**
     * Get Posts List
     * @return array
     */
    public static function getPosts()
    {
        $posts = [];

        $posts_arg = array('orderby' => 'date', 'order' => 'DESC', 'numberposts' => -1);
        foreach (get_posts($posts_arg) as $post) {
            $posts[$post->ID] = $post->post_title;
        }
        return $posts;
    }

    /**
     * Get Category List
     * @return array
     */
    public static function getCategories()
    {
        $categories = [];

        $category_arg = array('orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0);
        foreach (get_categories($category_arg) as $category) {
            $categories[$category->term_id] = $category->name;
        }
        return $categories;
    }

    /**
     * Get Woocommerce product list
     *
     * @return array
     */
    public static function getWooProducts()
    {
        $products = [];
        if (class_exists('woocommerce')) {
            $args = array('post_type' => 'product', 'posts_per_page' => -1);
            foreach (get_posts($args) as $product) {
                $products[$product->ID] = $product->post_title;
            }
        }
        return $products;
    }

    /**
     * Get Woocommerce category list
     *
     * @return array
     */
    public static function getWooCategories()
    {
        $categories = [];
        if (class_exists('woocommerce')) {

            $cat_args = array('taxonomy' => "product_cat", 'orderby' => 'name', 'order' => 'asc', 'hide_empty' => false);
            $product_categories = get_terms($cat_args);
            foreach ($product_categories as $category) {
                $categories[$category->term_id] = $category->name;
            }
        }
        return $categories;
    }

    /**
     * Get nav menu location
     *
     * @return array
     */
    public static function getMenuLocations()
    {

        $menus = [];
        foreach (get_nav_menu_locations() as $key => $menu) {
            $menus[$key] = str_replace('-', ' ', $key);
        }

        return $menus;

    }

    /**
     * Get light/dark mode site logo url from setings option
     *
     * @return array
     */
    public static function getSiteLogo()
    {

        $logo_light_url = self::getOptionData('logo_light_url');
        $logo_dark_url = self::getOptionData('logo_dark_url');

        return ['light' => $logo_light_url, 'dark' => $logo_dark_url];

    }

    /**
     * Get light/dark mode image url from setings option
     *
     * @return array
     */
    public static function getDarkImages()
    {

        $light_img = self::getOptionData('light_img');
        $dark_img = self::getOptionData('dark_img');
        $images = '';
        // array check
        if (is_array($light_img) && is_array($dark_img)) {
            $images = array_combine($light_img, $dark_img);
        }

        $getImages = [];

        if (!empty($images)) {
            foreach ($images as $key => $val) {
                $getImages[] = [$key, $val];
            }
        }

        return $getImages;

    }

}