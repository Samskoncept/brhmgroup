<?php

class CT_CtParticles_Widget extends Case_Theme_Core_Widget_Base{
    protected $name = 'ct_particles';
    protected $title = 'Case Particles V2';
    protected $icon = 'eicon-barcode';
    protected $categories = array( 'case-theme-core' );
    protected $params = '{"sections":[{"name":"content_section","label":"Content","tab":"content","controls":[]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'lib-particles-js','ct-particles-js' );
}