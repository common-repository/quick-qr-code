<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sharabindu.com/plugins/quick-qr/
 * @since      1.0.2
 *
 * @package    quick_qr
 * @subpackage quick_qr/public
 */
class quickcode_lite_public
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.2
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;
    /**
     * The version of this plugin.
     *
     * @since    1.0.2
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.2
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/quickcode_shortcode_func.php';

    }
    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.2
     */
    public function enqueue_styles()
    {

    }
    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.2
     */
    public function enqueue_scripts()
    {

    
        wp_enqueue_script('quick-qr-code', QUICK_QR_LITE_URL . 'public/js/qr-code-min.js', array(
            'jquery'
        ) , QUICK_QR_LITE_VERSION, false,10); 

    }


    function qcr_shortcode_setting()
    {

        add_shortcode('quick-qr', array(
            $this,
            'quickqrshortcode_atts'
        ));

    }

    function quickqrshortcode_atts($atts)
    {

        global $wp;
        $current_id_link = home_url(add_query_arg(array() , $wp->request));

        $current_title = get_the_title(get_the_id());
        $random_id = rand(37684782, 23297323);
        $x = 1;
        $options = get_option('quickcode_settings');

        include QUICK_QR_LITE_PATH . '/admin/extra/generaalOptionValue.php';

        return quickcode_currentshtcode($random_id,$current_id_link,$qrc_size,$qrc_margin,$quick_dot_style,$quick_corner_square);

    }

}

