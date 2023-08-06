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


class Home_Settings_Tab extends Settings_Fields_Base {

  public function get_option_name() {
    return 'darklup_settings'; // set option name it will be same or different name
  }

  public function tab_setting_fields() {

      $this->start_fields_section([
        'title' => esc_html__( 'Home', 'darklup' ),
        'class' => 'darklup-home-settings darklup-d-show darklup-settings-content',
        'icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/home.svg' ),
        'dark_icon'  => esc_url( DARKLUP_DIR_URL. 'assets/img/home-white.svg' ),
        'id'    => 'darklup_home_settings'
      ]);

      ?>
<div class="darklup-single-about mb-100">
    <div class="darklup-row">
        <div class="darklup-col-md-8 darklup-col-12 align-self-center">
            <div class="details">
                <h3><span
                        class="dashicons dashicons-info-outline important-note--icon"></span><?php esc_html_e('Important Note', 'darklup-lite');?>
                </h3>
                <p class="darklup-welcome--notice">
                    <?php esc_html_e("Each website template has its unique design, and as a result, some sections may not appear in dark mode due to a background image that is not dark. This could be frustrating and lead to the assumption that a plugin is not useful. However, our dark mode functionality is designed to ensure that every website displays perfectly in dark mode. Please don't hesitate to contact us for assistance, as we are confident that we can provide you with a solution.", 'darklup-lite')?>
                </p>
            </div>


        </div>
        <div class="darklup-col-md-4 darklup-col-12 align-self-center">
            <div class="thumb">
                <img src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/1.png' ); ?>" alt="img">
            </div>
        </div>
    </div>
</div>
<div class="darklup-row mb-100">
    <div class="darklup-col-md-4 darklup-col-sm-6 darklup-col-12">
        <div class="darklup-single-video-inner">
            <div class="thumb">
                <img src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/video-thumb-01.jpg' ); ?>" alt="img">
                <a class="video-play-btn" href="https://www.youtube.com/watch?v=Rg_LeF3KFF4"
                    data-effect="mfp-zoom-in"><img
                        src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/2.png' ); ?>" alt="img"></a>
            </div>
            <p><?php esc_html_e( 'How to Use Darklup WordPress Dark Mode Plugin', 'darklup' ); ?></p>
        </div>
    </div>
    <div class="darklup-col-md-4 darklup-col-sm-6 darklup-col-12">
        <div class="darklup-single-video-inner">
            <div class="thumb">
                <img src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/video-thumb-02.jpg' ); ?>" alt="img">
                <a class="video-play-btn" href="https://www.youtube.com/watch?v=NlEnuhMknvg"
                    data-effect="mfp-zoom-in"><img
                        src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/2.png' ); ?>" alt="img"></a>
            </div>
            <p><?php esc_html_e( 'Switch Style - Darklup WordPress Dark Mode Plugin', 'darklup' ); ?></p>
        </div>
    </div>
    <div class="darklup-col-md-4 darklup-col-sm-6 darklup-col-12">
        <div class="darklup-single-video-inner">
            <div class="thumb">
                <img src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/video-thumb-03.jpg' ); ?>" alt="img">
                <a class="video-play-btn" href="https://www.youtube.com/watch?v=sQKaFMJKbaU"
                    data-effect="mfp-zoom-in"><img
                        src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/2.png' ); ?>" alt="img"></a>
            </div>
            <p><?php esc_html_e( 'Color Setting of Darklup Plugin', 'darklup' ); ?></p>
        </div>
    </div>
    <div class="darklup-col-md-12 darklup-col-sm-12 darklup-col-12 darklup-w-100">
        <div class="darklup-admin-btn-area darklup-w-100">
            <a target="_blank" class="darklup-btn darklup-btn-base"
                href="https://www.youtube.com/channel/UCwbKkyju-e6bCkR0qQUUPZQ"><?php esc_html_e( 'VIEW MORE TUTORIALS', 'darklup' ); ?></a>
        </div>
    </div>
</div>
<div class="darklup-row mb-100">
    <div class="darklup-col-md-6 darklup-col-12 align-self-center">
        <div class="darklup-single-about darklup-single-about-red">
            <div class="details">
                <h3><?php esc_html_e( 'Documentation', 'darklup') ?></h3>
                <p><?php esc_html_e( 'We have created a well organized and detailed documentation to get familiar with Darklup- WP Dark Mode. You will easily understand how our plugin will work.', 'darklup' )?>
                </p>
                <a target="_blank" class="darklup-btn darklup-btn-base"
                    href="https://documentation.darklup.com/"><?php esc_html_e( 'Documentation', 'darklup' ); ?></a>
            </div>
        </div>
    </div>
    <div class="darklup-col-md-6 darklup-col-12 align-self-center">
        <div class="darklup-single-about darklup-single-about-purple">
            <div class="details">
                <h3><?php esc_html_e('Help and Support', 'darklup'); ?></h3>
                <p><?php esc_html_e( 'Facing any technical issue? Need consultation with an expert? Simply Take our live chat support option. We will respond to you shortly. We are ready to help you', 'darklup' ); ?>
                </p>
                <a target="_blank" class="darklup-btn darklup-btn-purple"
                    href="http://darklup.com/"><?php esc_html_e( 'GET SUPPORT', 'darklup' ); ?></a>
            </div>
        </div>
    </div>
</div>
<div class="darklup-single-about style-two darklup-single-about-blue mb-100">
    <div class="darklup-row">
        <div class="darklup-col-md-7 darklup-col-12 align-self-center">
            <div class="details">
                <h3><?php esc_html_e( 'ARE WE MISSING ANY FEATURE?', 'darklup' ); ?></h3>
                <p><?php esc_html_e( 'Are we missing any feature that you need a lot? We are requesting you to do a feature request so we can add that feature on our next update', 'darklup'); ?>
                </p>
                <a target="_blank" class="darklup-btn darklup-btn-blue"
                    href="http://darklup.com/"><?php esc_html_e( 'FEATURE REQUEST', 'darklup' ); ?></a>
            </div>
        </div>
        <div class="darklup-col-md-5 darklup-col-12">
            <div class="thumb">
                <img src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/4.png' ); ?>" alt="img">
            </div>
        </div>
    </div>
</div>
<div class="darklup-single-about style-three darklup-single-about-red">
    <div class="darklup-row">
        <div class="darklup-col-md-5 darklup-col-12">
            <div class="thumb">
                <img src="<?php echo esc_url( DARKLUP_DIR_ADMIN_ASSETS_URL.'img/5.png' ); ?>" alt="img">
            </div>
        </div>
        <div class="darklup-col-md-7 darklup-col-12 align-self-center">
            <div class="details">
                <h3><?php esc_html_e( 'HAPPY WITH DARKLUP?', 'darklup' ); ?></h3>
                <p><?php esc_html_e( 'If you are really happy and satisfied with our plugin, We hardly request you to give us a 5* rating in WordPress Org.', 'darklup' ); ?>
                </p>
                <a target="_blank" class="darklup-btn darklup-btn-base"
                    href="http://darklup.com/"><?php esc_html_e( 'GIVE A 5* RATING', 'darklup' ); ?> </a>
            </div>
        </div>
    </div>
</div>
<?php
      $this->end_fields_section();

  }
  
}

new Home_Settings_Tab();