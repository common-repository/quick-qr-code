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

class quickqrProMetavalues
{

    public function __construct()
    {

        add_action('admin_init', array(
            $this,
            'qcr_metabox_page'
        ));


    }
    /**
     *  metabox function
     */

    public function qcr_metabox_page()
    {
        $excluded_posttypes = array(
            'attachment',
            'revision',
            'nav_menu_item',
            'custom_css',
            'customize_changeset',
            'oembed_cache',
            'user_request',
            'wp_block',
            'scheduled-action',
            'product_variation',
            'shop_order',
            'shop_order_refund',
            'shop_coupon',
            'elementor_library',
            'e-landing-page'
        );

        $types = get_post_types();
        $post_types = array_diff($types, $excluded_posttypes);

        add_meta_box('quickcode_metabox', esc_html__('Quick QR Code (Pro fetaures)', 'quick-qr') , array(
            $this,
            'quickcode_metabox_func'
        ) , array(
            $post_types
        ));

    }

    /**
     * This is call back function of add_meta_box
     */

    public function quickcode_metabox_func($post)
    {

        $qrc_meta_check_info = get_post_meta($post->ID, 'quickcode_meta', true) ? get_post_meta($post->ID, 'quickcode_meta', true) : 1;

?>
	<ul  class="quickqr_metaoutput_wrap">
	    <li>
	    <label for="checkbox_3" class="checkbox_qr_3"><strong><?php esc_html_e('Hide from frontend?', 'quick-qr') ?> </strong></label>
	    </li><li>
	    <select>
	        
	    <option value="no" selected><?php esc_html_e('No', 'quick-qr'); ?></option>
	    <option value="yes"><?php esc_html_e('Yes', 'quick-qr'); ?></option>

	    </select>
	    </li>

	    <li class="mast_mta_bx">
           <img src="<?php echo QUICK_QR_LITE_URL .'/admin/img/rererer.png' ?>" alt="Quick QR"> 
        </li>
    </ul>
	    <?php



    }



}
if (class_exists('quickqrProMetavalues'))
{
    new quickqrProMetavalues();
}

