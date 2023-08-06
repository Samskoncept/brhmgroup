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
class Trigger_Settings_Tab extends Settings_Fields_Base
{

    public function get_option_name()
    {
        return 'darklup_settings'; // set option name it will be same or different name
    }

    public function tab_setting_fields()
    {

        $this->start_fields_section([
            'title' => esc_html__('TRIGGER SETTINGS', 'darklup'),
            'class' => 'darklup-trigger-settings darklup-d-hide darklup-settings-content',
            'icon' => esc_url(DARKLUP_DIR_URL . 'assets/img/trigger.svg'),
            'dark_icon' => esc_url(DARKLUP_DIR_URL . 'assets/img/trigger-white.svg'),
            'id' => 'darklup_trigger_settings'
        ]);

        $this->Multiple_select_box([
            'title' => esc_html__('Exclude Pages', 'darklup'),
            'sub_title' => esc_html__('Select the pages where you don\'t want to show the dark mode switch', 'darklup'),
            'name' => 'exclude_pages',
            'options' => \Darklup\Helper::getPages()
        ]);

        $this->Multiple_select_box([
            'title' => esc_html__('Exclude Posts', 'darklup'),
            'sub_title' => esc_html__('Select the posts where you don\'t want to show the dark mode switch', 'darklup'),
            'name' => 'exclude_posts',
            'options' => \Darklup\Helper::getPosts()
        ]);


        $this->Multiple_select_box([
            'title' => esc_html__('Exclude Categories', 'darklup'),
            'sub_title' => esc_html__('Select the categories to exclude dark mode switch on the selected category posts', 'darklup'),
            'name' => 'exclude_categories',
            'options' => \Darklup\Helper::getCategories()
        ]);


        $this->end_fields_section(); // End fields section

    }


}

new Trigger_Settings_Tab();