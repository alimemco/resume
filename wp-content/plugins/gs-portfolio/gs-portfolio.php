<?php
/**
 *
 * @package   GS_Portfolio
 * @author    GS Plugins <samdani1997@gmail.com>
 * @license   GPL-2.0+
 * @link      https://www.gsplugins.com
 * @copyright 2015 GS Plugins
 *
 * @wordpress-plugin
 * Plugin Name:			GS Portfolio Lite
 * Plugin URI:			https://www.gsplugins.com/wordpress-plugins
 * Description:       	Best Responsive Portfolio plugin for your Wordpress site. Display anywhere at your site using shortcode like [gs_portfolio hover_effect="effect-sadie"] Check more shortcode examples and documention at <a href="http://portfolio.gsplugins.com">GS Portfolio Docs</a> 
 * Version:           	1.5.4
 * Author:       		GS Plugins
 * Author URI:       	https://www.gsplugins.com
 * Text Domain:       	gsportfolio
 * License:           	GPL-2.0+
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
 */

if( ! defined( 'GSPORTFOLIO_HACK_MSG' ) ) define( 'GSPORTFOLIO_HACK_MSG', __( 'Sorry cowboy! This is not your place', 'gsportfolio' ) );

/**
 * Protect direct access
 */
if ( ! defined( 'ABSPATH' ) ) die( GSPORTFOLIO_HACK_MSG );

/**
 * Defining constants
 */
if( ! defined( 'GSPORTFOLIO_VERSION' ) ) define( 'GSPORTFOLIO_VERSION', '1.5.4' );
if( ! defined( 'GSPORTFOLIO_MENU_POSITION' ) ) define( 'GSPORTFOLIO_MENU_POSITION', 34 );
if( ! defined( 'GSPORTFOLIO_PLUGIN_DIR' ) ) define( 'GSPORTFOLIO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
if( ! defined( 'GSPORTFOLIO_PLUGIN_URI' ) ) define( 'GSPORTFOLIO_PLUGIN_URI', plugins_url( '', __FILE__ ) );
if( ! defined( 'GSPORTFOLIO_FILES_DIR' ) ) define( 'GSPORTFOLIO_FILES_DIR', GSPORTFOLIO_PLUGIN_DIR . 'gsportfolio-files' );
if( ! defined( 'GSPORTFOLIO_FILES_URI' ) ) define( 'GSPORTFOLIO_FILES_URI', GSPORTFOLIO_PLUGIN_URI . '/gsportfolio-files' );

require_once GSPORTFOLIO_FILES_DIR . '/includes/gs-portfolio-cpt.php';
require_once GSPORTFOLIO_FILES_DIR . '/includes/gs-portfolio-metabox.php';
require_once GSPORTFOLIO_FILES_DIR . '/includes/gs-portfolio-column.php';
require_once GSPORTFOLIO_FILES_DIR . '/includes/gs-portfolio-shortcode.php';
require_once GSPORTFOLIO_FILES_DIR . '/gs-portfolio-script.php';
require_once GSPORTFOLIO_FILES_DIR . '/admin/class.settings-api.php';
require_once GSPORTFOLIO_FILES_DIR . '/admin/gs_portfolio_options_config.php';
require_once GSPORTFOLIO_FILES_DIR . '/gs-plugins/gs-plugins.php';
require_once GSPORTFOLIO_FILES_DIR . '/gs-plugins/gs-plugins-free.php';
require_once GSPORTFOLIO_FILES_DIR . '/gs-plugins/gs-portfolio-help.php';


add_action('do_meta_boxes', 'gs_pf_fea_img_box');
function gs_pf_fea_img_box() {
    remove_meta_box( 'postimagediv', 'gs-portfolio', 'side' );
    add_meta_box('postimagediv', __('Portfolio Image'), 'post_thumbnail_meta_box', 'gs-portfolio', 'side', 'low');
}


//--------- Add plugin action links ---------------- 

// add_filter( 'plugin_action_links', 'gs_portfolio_add_action_plugin', 10, 5 );

function gs_portfolio_add_action_plugin( $actions, $gsp_plugin_file ) 
{
	static $gsp_plugin;

	if (!isset($gsp_plugin))
		$gsp_plugin = plugin_basename(__FILE__);

		$admin_link = admin_url();
	
	if ($gsp_plugin == $gsp_plugin_file) {

			$settings = array('settings' => '<a href="'. $admin_link .'edit.php?post_type=gs-portfolio">' . __('Portfolio', 'General') . '</a>');
			$site_link = array('support' => '<a href="https://www.gsplugins.com/support" target="_blank">Support</a>');
			$more_plugin = array('more' => '<a href="https://www.gsplugins.com/wordpress-plugins" target="_blank">More Plugings</a>');
		
    			$actions = array_merge($settings, $actions);
				$actions = array_merge($site_link, $actions);
				//$actions = array_merge($more_plugin, $actions);	
		}	
		return $actions;
}



if ( ! function_exists('gs_portfolio_pro_link') ) {
    function gs_portfolio_pro_link( $gsPortfolio_links ) {
        $gsPortfolio_links[] = '<a style="color: red; font-weight: bold;" class="gs-pro-link" href="https://www.gsplugins.com/product/gs-portfolio" target="_blank">Go Pro!</a>';
        $gsPortfolio_links[] = '<a href="https://www.gsplugins.com/wordpress-plugins" target="_blank">GS Plugins</a>';
        return $gsPortfolio_links;
    }
    add_filter( 'plugin_action_links_' .plugin_basename(__FILE__), 'gs_portfolio_pro_link' );
}

// Add new image sizes
add_image_size( 'gs-square-thumb', 420, 420, true );
add_image_size( 'gs-grid-thumb', 420, 270, true );
add_image_size( 'gs-masonry-thumb', 420, 0, true );
add_image_size( 'gs-3d-thumb', 800, 500, true );

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_gs_portfolio() {

    if ( ! class_exists( 'AppSero\Insights' ) ) {
        require_once GSPORTFOLIO_FILES_DIR . '/appsero/src/Client.php';
    }

    $client = new Appsero\Client( '714ad138-6b90-4549-bc3c-e8d66d5338e4', 'GS Portfolio', __FILE__  );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_gs_portfolio();


/**
 * @gsportfolio_review_dismiss()
 * @gsportfolio_review_pending()
 * @gsportfolio_review_notice_message()
 * Make all the above functions working.
 */
function gsportfolio_review_notice(){

    gsportfolio_review_dismiss();
    gsportfolio_review_pending();

    $activation_time    = get_site_option( 'gsportfolio_active_time' );
    $review_dismissal   = get_site_option( 'gsportfolio_review_dismiss' );
    $maybe_later        = get_site_option( 'gsportfolio_maybe_later' );

    if ( 'yes' == $review_dismissal ) {
        return;
    }

    if ( ! $activation_time ) {
        add_site_option( 'gsportfolio_active_time', time() );
    }
    
    $daysinseconds = 259200; // 3 Days in seconds.
   
    if( 'yes' == $maybe_later ) {
        $daysinseconds = 604800 ; // 7 Days in seconds.
    }

    if ( time() - $activation_time > $daysinseconds ) {
    add_action( 'admin_notices' , 'gsportfolio_review_notice_message' );
    }
}
add_action( 'admin_init', 'gsportfolio_review_notice' );



/**
 * For the notice preview.
 */
function gsportfolio_review_notice_message(){
    $scheme      = (parse_url( $_SERVER['REQUEST_URI'], PHP_URL_QUERY )) ? '&' : '?';
    $url         = $_SERVER['REQUEST_URI'] . $scheme . 'gsportfolio_review_dismiss=yes';
    $dismiss_url = wp_nonce_url( $url, 'gsportfolio-review-nonce' );

    $_later_link = $_SERVER['REQUEST_URI'] . $scheme . 'gsportfolio_review_later=yes';
    $later_url   = wp_nonce_url( $_later_link, 'gsportfolio-review-nonce' );
    ?>
    
    <div class="gsteam-review-notice">
        <div class="gsteam-review-thumbnail">
            <img src="<?php echo plugins_url('gs-portfolio/gsportfolio-files/assets/img/icon-128x128.png') ?>" alt="">
        </div>
        <div class="gsteam-review-text">
            <h3><?php _e( 'Leave A Review?', 'gsportfolio' ) ?></h3>
            <p><?php _e( 'We hope you\'ve enjoyed using GS Portfolio! Would you consider leaving us a review on WordPress.org?', 'gsportfolio' ) ?></p>
            <ul class="gsteam-review-ul">
                <li>
                    <a href="https://wordpress.org/support/plugin/gs-portfolio/reviews/" target="_blank">
                        <span class="dashicons dashicons-external"></span>
                        <?php _e( 'Sure! I\'d love to!', 'gsportfolio' ) ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $dismiss_url ?>">
                        <span class="dashicons dashicons-smiley"></span>
                        <?php _e( 'I\'ve already left a review', 'gsportfolio' ) ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $later_url ?>">
                        <span class="dashicons dashicons-calendar-alt"></span>
                        <?php _e( 'Maybe Later', 'gsportfolio' ) ?>
                    </a>
                </li>
                <li>
                    <a href="https://www.gsplugins.com/support" target="_blank">
                        <span class="dashicons dashicons-sos"></span>
                        <?php _e( 'I need help!', 'gsportfolio' ) ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $dismiss_url ?>">
                        <span class="dashicons dashicons-dismiss"></span>
                        <?php _e( 'Never show again', 'gsportfolio' ) ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <?php
}

/**
 * For Dismiss! 
 */
function gsportfolio_review_dismiss(){

    if ( ! is_admin() ||
        ! current_user_can( 'manage_options' ) ||
        ! isset( $_GET['_wpnonce'] ) ||
        ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'gsportfolio-review-nonce' ) ||
        ! isset( $_GET['gsportfolio_review_dismiss'] ) ) {

        return;
    }

    add_site_option( 'gsportfolio_review_dismiss', 'yes' );
    
}

/**
 * For Maybe Later Update.
 */
function gsportfolio_review_pending() {

    if ( ! is_admin() ||
        ! current_user_can( 'manage_options' ) ||
        ! isset( $_GET['_wpnonce'] ) ||
        ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'gsportfolio-review-nonce' ) ||
        ! isset( $_GET['gsportfolio_review_later'] ) ) {

        return;
    }
    // Reset Time to current time.
    update_site_option( 'gsportfolio_active_time', time() );
    update_site_option( 'gsportfolio_maybe_later', 'yes' );

}

/**
 * Remove Reviews Metadata on plugin Deactivation.
 */
function gsportfolio_deactivate() {
    delete_option('gsportfolio_active_time');
    delete_option('gsportfolio_maybe_later');
}
register_deactivation_hook(__FILE__, 'gsportfolio_deactivate');


/**
 * Activation redirects
 *
 * @since v1.0.0
 */
function gsportfolio_activate() {
    add_option('gsportfolio_activation_redirect', true);
}
register_activation_hook(__FILE__, 'gsportfolio_activate');

/**
 * Redirect to options page
 *
 * @since v1.0.0
 */
function gsportfolio_redirect() {
    if (get_option('gsportfolio_activation_redirect', false)) {
        delete_option('gsportfolio_activation_redirect');
        if(!isset($_GET['activate-multi']))
        {
            wp_redirect("edit.php?post_type=gs-portfolio&page=gs-portfolio-help");
        }
    }
}
add_action('admin_init', 'gsportfolio_redirect');


/**
 * Admin Notice
 */
function gsportfolio_admin_notice() {
  if ( current_user_can( 'install_plugins' ) ) {
    global $current_user ;
    $user_id = $current_user->ID;
    /* Check that the user hasn't already clicked to ignore the message */
    if ( ! get_user_meta($user_id, 'gsportfolio_ignore_notice279') ) {
      echo '<div class="gstesti-admin-notice updated" style="display: flex; align-items: center; padding-left: 0; border-left-color: #EF4B53"><p style="width: 32px;">';
      echo '<img style="width: 100%; display: block;"  src="' . plugins_url('gs-portfolio/gsportfolio-files/assets/img/icon-128x128.png'). '" ></p><p> ';
      printf(__('<strong>GS Portfolio</strong> now powering huge websites. Use the coupon code <strong>ENJOY25P</strong> to redeem a <strong>25&#37; </strong> discount on Pro. <a href="https://www.gsplugins.com/product/gs-portfolio" target="_blank" style="text-decoration: none;"><span class="dashicons dashicons-smiley" style="margin-left: 10px;"></span> Apply Coupon</a>
        <a href="%1$s" style="text-decoration: none; margin-left: 10px;"><span class="dashicons dashicons-dismiss"></span> I\'m good with free version</a>'),  admin_url( 'edit.php?post_type=gs-portfolio&page=portfolio-settings&gsportfolio_nag_ignore=0' ));
      echo "</p></div>";
    }
  }
}
add_action('admin_notices', 'gsportfolio_admin_notice');

/**
 * Nag Ignore
 */
function gsportfolio_nag_ignore() {
  global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['gsportfolio_nag_ignore']) && '0' == $_GET['gsportfolio_nag_ignore'] ) {
             add_user_meta($user_id, 'gsportfolio_ignore_notice279', 'true', true);
  }
}
add_action('admin_init', 'gsportfolio_nag_ignore');


/**
 * Admin Offer Ticker
 *
 * @since v1.0.0
 */
if(! function_exists('gs_admin_tickr_notice')){

    function gs_admin_tickr_notice(){
        global $current_user ;
        $user_id = $current_user->ID;
        if ( ! get_user_meta($user_id, 'gstickr_nag_ignore') ) {
            $protocol = is_ssl() ? 'https' : 'http';
            $promo_content = wp_remote_get( $protocol . '://gsplugins.com/gs_plugins_list/admin_notice.php' );

            ?>
            <div class="notice notice-info" style="position: relative;">
                <?php  echo $promo_content['body'];

                printf(__('<a href="%1$s" style="text-decoration: none; background: #fff;right:6px;top: 10px; float:right;position: absolute;"><span class="dashicons dashicons-dismiss"></span> </a>'),  admin_url( 'index.php?&gstickr_nag_ignore=0' ));
            ?>
            </div>
            <?php 
        }
    }

    // add_action('admin_notices', 'gs_admin_tickr_notice');

    function gstickr_nag_ignore() {

        global $current_user;
        $user_id = $current_user->ID;
            /* If user clicks to ignore the notice, add that to their user meta */
            if ( isset($_GET['gstickr_nag_ignore']) && '0' == $_GET['gstickr_nag_ignore'] ) {
                add_user_meta($user_id, 'gstickr_nag_ignore', 'true', true);
                add_site_option( 'gstickr_active_time', time() );
            }

            $daysinseconds = 259200; // 3 Days in seconds.
            $activation_time    = get_site_option( 'gstickr_active_time' );

            if ( time() - $activation_time > $daysinseconds ) {
                delete_option('gstickr_active_time');
                delete_user_meta($user_id, 'gstickr_nag_ignore');
            }
    }
    // add_action('admin_init', 'gstickr_nag_ignore');
}