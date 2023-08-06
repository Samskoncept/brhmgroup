<?php

class CT_CtTextBox_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_text_box';
    protected $title = 'Case Text Box';
    protected $icon = 'eicon-icon-box';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"sub_title","label":"Sub Title","type":"text"},{"name":"title","label":"Title","type":"text","label_block":true},{"name":"description","label":"Description","type":"textarea","rows":10,"show_label":false},{"name":"btn_text","label":"Button Text","type":"text"},{"name":"btn_link","label":"Button Link","type":"url","default":{"url":"#"}},{"name":"ct_animate","label":"Case Animate","type":"select","options":{"":"None","wow bounce":"bounce","wow flash":"flash","wow pulse":"pulse","wow rubberBand":"rubberBand","wow shake":"shake","wow swing":"swing","wow tada":"tada","wow wobble":"wobble","wow bounceIn":"bounceIn","wow bounceInDown":"bounceInDown","wow bounceInLeft":"bounceInLeft","wow bounceInRight":"bounceInRight","wow bounceInUp":"bounceInUp","wow bounceOut":"bounceOut","wow bounceOutDown":"bounceOutDown","wow bounceOutLeft":"bounceOutLeft","wow bounceOutRight":"bounceOutRight","wow bounceOutUp":"bounceOutUp","wow fadeIn":"fadeIn","wow fadeInDown":"fadeInDown","wow fadeInDownBig":"fadeInDownBig","wow fadeInLeft":"fadeInLeft","wow fadeInLeftBig":"fadeInLeftBig","wow fadeInRight":"fadeInRight","wow fadeInRightBig":"fadeInRightBig","wow fadeInUp":"fadeInUp","wow fadeInUpBig":"fadeInUpBig","wow fadeOut":"fadeOut","wow fadeOutDown":"fadeOutDown","wow fadeOutDownBig":"fadeOutDownBig","wow fadeOutLeft":"fadeOutLeft","wow fadeOutLeftBig":"fadeOutLeftBig","wow fadeOutRight":"fadeOutRight","wow fadeOutRightBig":"fadeOutRightBig","wow fadeOutUp":"fadeOutUp","wow fadeOutUpBig":"fadeOutUpBig","wow flip":"flip","wow flipInX":"flipInX","wow flipInY":"flipInY","wow flipOutX":"flipOutX","wow flipOutY":"flipOutY","wow lightSpeedIn":"lightSpeedIn","wow lightSpeedOut":"lightSpeedOut","wow rotateIn":"rotateIn","wow rotateInDownLeft":"rotateInDownLeft","wow rotateInDownRight":"rotateInDownRight","wow rotateInUpLeft":"rotateInUpLeft","wow rotateInUpRight":"rotateInUpRight","wow rotateOut":"rotateOut","wow rotateOutDownLeft":"rotateOutDownLeft","wow rotateOutDownRight":"rotateOutDownRight","wow rotateOutUpLeft":"rotateOutUpLeft","wow rotateOutUpRight":"rotateOutUpRight","wow hinge":"hinge","wow rollIn":"rollIn","wow rollOut":"rollOut","wow zoomIn":"zoomIn","wow zoomInDown":"zoomInDown","wow zoomInLeft":"zoomInLeft","wow zoomInRight":"zoomInRight","wow zoomInUp":"zoomInUp","wow zoomOut":"zoomOut","wow zoomOutDown":"zoomOutDown","wow zoomOutLeft":"zoomOutLeft","wow zoomOutRight":"zoomOutRight","wow zoomOutUp":"zoomOutUp","wow skewIn":"skewIn"},"default":""}]},{"name":"section_style","label":"Style","tab":"content","controls":[{"name":"sub_title_color","label":"Sub Title Color","type":"color","selectors":{"{{WRAPPER}} .ct-text-box .item--sub-title":"color: {{VALUE}};"}},{"name":"title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .ct-text-box .item--title":"color: {{VALUE}};"}},{"name":"title_typography","label":"Title Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .ct-text-box .item--title"},{"name":"desc_color","label":"Description Color","type":"color","selectors":{"{{WRAPPER}} .ct-text-box .item--description":"color: {{VALUE}};"}},{"name":"box_bg_color","label":"Box Background Color","type":"color","selectors":{"{{WRAPPER}} .ct-text-box .ct-text-box-inner":"background-color: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}