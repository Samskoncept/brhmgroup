<?php
$default_settings = [
    'content_list' => '',
    'column' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$primary_color = consultio_get_opt( 'primary_color' );
?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="ct-process ct-process1 ct-process-<?php echo esc_attr($column); ?>-column style2">
        <?php foreach ($content_list as $key => $value):
            $title = isset($value['title']) ? $value['title'] : '';
            $description = isset($value['description']) ? $value['description'] : '';
            $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
            $icon_key = $widget->get_repeater_setting_key( 'ct_icon', 'content_list', $key );
            $has_icon = ! empty( $value['ct_icon'] );
            $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
            if ( ! empty( $value['btn_link']['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $value['btn_link']['url'] );

                if ( $value['btn_link']['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }

                if ( $value['btn_link']['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key );
            ?>
            <div class="ct-process-item">
                <div class="ct-process-item-inner">
                    <div class="ct-piechart ct-piechart-process wow flipInX">
                        <div class="item--value percentage" style="height: 165px;" data-size="165" data-bar-color="<?php if(!empty($settings['bar_color'])) { echo esc_attr($settings['bar_color']); } else { echo esc_attr($primary_color); } ?>" data-track-color="" data-line-width="14" data-percent="-75"></div>
                        <div class="ct-process-border">
                            <div class="ct-process-circle"></div>
                        </div>
                        <?php if ( $has_icon ) : ?>
                            <div class="ct-process-icon">
                                <?php
                                    if($is_new):
                                        \Elementor\Icons_Manager::render_icon( $value['ct_icon'], [ 'aria-hidden' => 'true' ] );
                                ?>
                                <?php else: ?>
                                    <i <?php ct_print_html($widget->get_render_attribute_string( $icon_key )); ?>></i>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($title)) : ?>
                        <h3 class="ct-process-title"><?php echo esc_attr($title); ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($description)) : ?>
                        <div class="ct-process-description"><?php echo ct_print_html($description); ?></div>
                    <?php endif; ?>
                    <?php if(!empty($btn_text)) : ?>
                        <div class="ct-process-button">
                            <a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo esc_attr($btn_text); ?><i class="fac fac-angle-right"></i></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>