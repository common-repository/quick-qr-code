<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://sharabindu.com/plugins/quick-qr/
 * @since      1.0.2
 *
 * @package    quick_qr
 * @subpackage quick_qr/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.2
 * @package    quick_qr
 * @subpackage quick_qr/includes
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class quickcode_lite_deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.2
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

}
