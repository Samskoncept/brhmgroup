<?php

namespace Darklup\Admin;
/**
 *
 * @package    Darklup - WP Dark Mode
 * @version    1.1.2
 * @author
 * @Websites:
 *
 */
class Woocommerce_Settings_Tab extends Settings_Fields_Base
{

    public function get_option_name()
    {
        return 'darklup_settings'; // set option name it will be same or different name
    }

    public function tab_setting_fields()
    {

        $this->start_fields_section([
            'title' => esc_html__('WOOCOMMERCE SETTINGS', 'darklup'),
            'class' => 'darklup-woocommerce-settings darklup-d-hide darklup-settings-content',
            'icon' => esc_url(DARKLUP_DIR_URL . 'assets/img/woocommerce.svg'),
            'dark_icon' => esc_url(DARKLUP_DIR_URL . 'assets/img/woocommerce-white.svg'),
            'id' => 'darklup_woocommerce_settings'
        ]);

        $this->Multiple_select_box([
            'title' => esc_html__('Exclude WooCommerce Products', 'darklup'),
            'sub_title' => esc_html__('Select the products where you don\'t want to show the dark mode switch', 'darklup'),
            'name' => 'exclude_woo_products',
            'options' => \Darklup\Helper::getWooProducts()
        ]);
        
        $this->Multiple_select_box([
            'title' => esc_html__('Exclude WooCommerce Categories', 'darklup'),
            'sub_title' => esc_html__('Select the categories where you don\'t want to show the dark mode switch', 'darklup'),
            'name' => 'exclude_woo_categories',
            'options' => \Darklup\Helper::getWooCategories()
        ]);

        $this->end_fields_section(); // End fields section

    }


}

new Woocommerce_Settings_Tab();