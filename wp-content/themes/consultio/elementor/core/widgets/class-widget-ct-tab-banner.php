<?php

class CT_CtTabBanner_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_tab_banner';
    protected $title = 'Case Tab Banner';
    protected $icon = 'eicon-tabs';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","prefix_class":"ct-tab-banner-layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/brhmgroup\/wp-content\/themes\/consultio\/elementor\/templates\/widgets\/ct_tab_banner\/layout-image\/layout1.jpg"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/brhmgroup\/wp-content\/themes\/consultio\/elementor\/templates\/widgets\/ct_tab_banner\/layout-image\/layout2.jpg"},"3":{"label":"Layout 3","image":"http:\/\/localhost\/brhmgroup\/wp-content\/themes\/consultio\/elementor\/templates\/widgets\/ct_tab_banner\/layout-image\/layout3.jpg"}}}]},{"name":"section_tabs","label":"Tabs","tab":"content","controls":[{"name":"active_tab","label":"Active Tab","type":"number","default":1,"separator":"after"},{"name":"tabs","label":"Tabs Items","type":"repeater","condition":{"layout":["1","2"]},"controls":[{"name":"ct_icon","label":"Icon","type":"icons","fa4compatibility":"icon"},{"name":"tab_title","label":"Title","type":"text","default":"Tab Title","placeholder":"Tab Title","label_block":true},{"name":"tab_content","label":"Content","type":"wysiwyg","default":"Tab Content","placeholder":"Tab Content","show_label":false},{"name":"banner","label":"Image","type":"media","description":"Select image."}],"title_field":"{{{ tab_title }}}"},{"name":"tabs3","label":"Tabs Items","type":"repeater","condition":{"layout":["3"]},"controls":[{"name":"ct_icon","label":"Icon","type":"icons","fa4compatibility":"icon"},{"name":"tab_title","label":"Title","type":"text","default":"Tab Title","placeholder":"Tab Title","label_block":true},{"name":"tab_content","label":"Content","type":"textarea","default":"Tab Content","placeholder":"Tab Content","show_label":false},{"name":"banner","label":"Image","type":"media","description":"Select image."},{"name":"box_title","label":"Box Title","type":"text","label_block":true},{"name":"box_subtitle","label":"Box Sub Title","type":"text","label_block":true},{"name":"box_content","label":"Box Content","type":"textarea","show_label":false},{"name":"box_btn_text","label":"Box Button Text","type":"text","label_block":true},{"name":"box_btn_link","label":"Box Button Link","type":"url"}],"title_field":"{{{ tab_title }}}"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'ct-tabs-widget-js' );
}