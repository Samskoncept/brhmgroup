<?php

/* Receive post data */
$result = array();
if(isset($_REQUEST['security'])) {

    check_ajax_referer( 'darklup_analytics_hashkey', 'security' );

    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }

    $ip = $_SERVER['REMOTE_ADDR'];

    global $wpdb;
    $table_name = $wpdb->prefix .'darklup_analytics';

    if ( ! empty( $ip ) ) {

        $enable_analytics       =  \Darklup\Helper::getOptionData('darklup_show_analytics');
        if( 'yes' === $enable_analytics){
            $wpdb->insert($table_name,array( 'ip_address' => $ip) );
            if( $wpdb->insert_id){
                $result = array("status" => 'true');
            } else{
                $result = array("status" => 'false');
            }
        }else{
            $result = array("status" => 'false');
        }

    }
}else{
    $result = array("status" => 'false');
}


echo json_encode($result,  JSON_UNESCAPED_UNICODE);