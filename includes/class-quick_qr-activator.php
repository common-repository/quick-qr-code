<?php


/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.2
 * @package    quick_qr
 * @subpackage quick_qr/includes
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class quickcode_lite_activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.2
	 */
	public static function activate() {
		flush_rewrite_rules();
		$tmp = get_option( 'quickcode_settings' );
		if(isset($_POST['action']) && current_user_can('manage_options')) {

		  update_option( 'quickcode_settings' , sanitize_text_field($_POST['quickcode_settings']));

		}



		

	}


}
