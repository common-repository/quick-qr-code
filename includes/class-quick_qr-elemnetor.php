<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com/plugins/quick-qr//
 * @since      1.0.2
 *
 * @package    quick_qr
 * @subpackage quick_qr/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.2
 * @package    quick_qr
 * @subpackage quick_qr/includes
 * @author     Sharabindu Bakshi <sharabindu.bakshi@gmail.com>
 */
final class quickcode_Elementor_Widget {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.2
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.2';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.2
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.2
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.7';

	/**
	 * Instance
	 *
	 * @since 1.0.2
	 *
	 * @access private
	 * @static
	 *
	 * @var quickcode_Masonry_Filter The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.2
	 *
	 * @access public
	 * @static
	 *
	 * @return quickcode_Masonry_Filter An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.2
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );


		add_action( 'elementor/elements/categories_registered', array($this,'wps_widget_categories') ,5);

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.2
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'quick_qr' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.2
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action('elementor/editor/before_enqueue_scripts', [ $this, 'admin_init_widgets' ] );



		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

	}

	public function admin_init_widgets(){
		wp_enqueue_style( 'elemnetor-admin', QUICK_QR_LITE_URL . 'admin/css/admin.css',array(),'1.1',false );

	}




	public function widget_styles() {



     	wp_register_script( 'quickqr_elemnts', QUICK_QR_LITE_URL . 'admin/js/qrelemnts.js',array('jquery','qr-code-styling'),QUICK_QR_LITE_VERSION ,true );   

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.2
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'quick_qr' ),
			'<strong>' . esc_html__( 'quick_QR Elementor', 'quick_qr' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'quick_qr' ) . '</strong>'
		);



	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.2
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'quick_qr' ),
			'<strong>' . esc_html__( 'quick_QR Elementor', 'quick_qr' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'quick_qr' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.2
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'quick_qr' ),
			'<strong>' . esc_html__( 'quick_QR Elementor', 'quick_qr' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'quick_qr' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.2
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files

		require_once( QUICK_QR_LITE_PATH . '/includes/elements/quickcode_elements.php' );

		// Register widget
	
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \quickcode_Elements_Widget() );
	
	


	}


	function wps_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'quick_qr-category',
			[
				'title' => esc_html__( 'quickcode QR', 'quick_qr' ),
				'icon' => 'fa fa-plug',
			]
		);

	}














}

quickcode_Elementor_Widget::instance();
