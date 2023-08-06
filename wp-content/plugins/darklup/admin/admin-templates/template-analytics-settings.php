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


class Analytics_Settings_Tab extends Settings_Fields_Base {

  public function get_option_name() {
    return 'darklup_settings'; // set option name it will be same or different name
  }

   public function tab_setting_fields() {

        $this->start_fields_section([

            'title' => 'USAGE ANALYTICS',
            'class' => 'darklup-analytics-settings darklup-d-hide darklup-settings-content',
            'icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/analysis.svg' ),
            'dark_icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/analysis-white.svg' ),
            'id' => 'darklup_analytics_settings'

        ]);

        $this->switch_field([
          'title' => esc_html__('Enable Analytics?', 'darklup'),
          'sub_title' => esc_html__('Enable/ disable the dark mode usage analytics.', 'darklup'),
          'name' => 'darklup_show_analytics'
      ]);

        $this->switch_field([
          'title' => esc_html__('Dashboard Widget?', 'darklup'),
          'sub_title' => esc_html__('Show/ hide the dark mode usage dashboard chart widget.', 'darklup'),
          'condition' => ["key" => "darklup_show_analytics", "value" => "yes"],
          
          'name' => 'darklup_show_dashboard'
      ]);

      $this->select_box([
        'title' => esc_html__('Analytics Duration', 'darklup'),
        'sub_title' => esc_html__('Select How much percentage of users use dark mode on dashboard.', 'darklup'),
        'name' => 'darklup_analytics_duration',
        'condition' => ["key" => "darklup_show_analytics", "value" => "yes"],
        'options' => [
            '7'   => esc_html__('Last 7 Days', 'darklup'),
            '30'  => esc_html__('Last 30 Days', 'darklup'),
        ]
    ]);

        $this->switch_field([
          'title' => esc_html__('Email Reporting?', 'darklup'),
          'sub_title' => esc_html__('Enable/ disable the dark mode usage email reporting.', 'darklup'),
          'condition' => ["key" => "darklup_show_analytics", "value" => "yes"],          
          'name' => 'darklup_email_reporting'
      ]);

      $this->select_box([
        'title' => esc_html__('Reporting Frequency', 'darklup'),
        'sub_title' => esc_html__('Select the reporting frequency, when the email will be send.', 'darklup'),
        'name' => 'darklup_reporting_frequency',
        'condition' => ["key" => "darklup_show_analytics", "value" => "yes"],
        'options' => [
            '7'   => esc_html__('Weekly', 'darklup'),
            '30'  => esc_html__('Monthly', 'darklup'),
        ]
    ]);

     
        $this->end_fields_section(); // End fields section

   }




}

new Analytics_Settings_Tab();