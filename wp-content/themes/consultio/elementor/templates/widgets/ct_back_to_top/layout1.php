<?php 
$default_settings = [
    'btt_text' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); 
?>
<div class="ct-wg-backtotop <?php echo esc_attr($ct_animate); ?>">
    <div class="ct-wg-backtotop-inner">
        <div class="ct-wg-backtotop-holder">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 512.171 512.171" style="enable-background:new 0 0 512.171 512.171;" xml:space="preserve">
                 <g>
                    <path d="M476.723,216.64L263.305,3.115C261.299,1.109,258.59,0,255.753,0c-2.837,0-5.547,1.131-7.552,3.136L35.422,216.64
                        c-3.051,3.051-3.947,7.637-2.304,11.627c1.664,3.989,5.547,6.571,9.856,6.571h117.333v266.667c0,5.888,4.779,10.667,10.667,10.667
                        h170.667c5.888,0,10.667-4.779,10.667-10.667V234.837h116.885c4.309,0,8.192-2.603,9.856-6.592
                        C480.713,224.256,479.774,219.691,476.723,216.64z"/>
                </g>
            </svg>
            <span>
                <?php if(!empty($btt_text)) { 
                    echo esc_attr($btt_text);
                } else {
                    echo esc_html__('Back to Top', 'consultio');
                } ?>
            </span>
        </div>
    </div>
</div>