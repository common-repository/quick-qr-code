<?php
/**
 * Plugin Name:       Quick QR Code
 * Plugin URI:        https://wordpress.org/plugins/quick-qr-code
 * Description:       Quick QR Code generates a QR code based on the current page URL
 * Version:           1.0.2
 * Author:            Dipashi
 * Author URI:        https://quickqr.sharabindu.com/
 * Text Domain:       quick-qr
 * Domain Path:       /languages
 */

    // If this file is called directly, abort.
    if (!defined('ABSPATH'))
    {
        die();
    }
    /**
     * Include plugin.php
     *Check Qr composer Lite Version is enable.
     * Then Deactive lite version and activate Pro version
     */

    include_once (ABSPATH . 'wp-admin/includes/plugin.php');
    if (is_plugin_active('quick-qrcode/quickcode-qr.php'))
    {
        add_action('update_option_active_plugins', 'deactivate_mqr_lite_version');
    }
    function deactivate_mqr_lite_version()
    {
        deactivate_plugins('quick-qrcode/quickcode-qr.php');
    }
    /**
     * Currently plugin version.
     * Start at version 1.0.2 and use SemVer - https://semver.org
     * Rename this for your plugin and update it as you release new versions.
     */
    define('QUICK_QR_LITE_VERSION', '1.0.2');

    /**
     * The core plugin path that is used to define internationalization
     */
    define('QUICK_QR_LITE_PATH', plugin_dir_path(__FILE__));

    /**
     * The core plugin url that is used to define internationalization
     */
    define('QUICK_QR_LITE_URL', plugin_dir_url(__FILE__));

    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-quick_qr-activator.php
     */
    function quickcode_lite_activate()
    {

        require_once plugin_dir_path(__FILE__) . 'includes/class-quick_qr-activator.php';
        quickcode_lite_activator::activate();

    }

    /**
     * The code that runs during plugin deactivation.
     * This action is documented in includes/class-quick_qr-deactivator.php
     */
    function quickcode_lite_deactivate()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/class-quick_qr-deactivator.php';
        quickcode_lite_deactivator::deactivate();
    }

    register_activation_hook(__FILE__, 'quickcode_lite_activate');
    register_deactivation_hook(__FILE__, 'quickcode_lite_deactivate');

    /**
     * The core plugin class that is used to define internationalization,
     * admin-specific hooks, and public-facing site hooks.
     */
    require plugin_dir_path(__FILE__) . 'includes/class-quick_qr.php';

    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.2
     */
    function quickcode_lite_run()
    {

        $plugin = new quick_qr_lite();
        $plugin->run();

    }
    quickcode_lite_run();

